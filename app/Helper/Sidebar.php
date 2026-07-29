<?php

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Facades\Cache;

if (!function_exists('getSidebarItemByRoute')) {
    /**
     * Retorna o item do sidebar correspondente à rota informada.
     *
     * @return array<string, string>|null
     */
    function getSidebarItemByRoute(string $currentRoute): ?array
    {
        $sidebarConfig = Cache::get('sidebarMenu', config('dashboard.sidebar'));
        $authConfig    = config('dashboard.auth');

        if ($sidebarConfig) {
            $found = searchInSidebarItems($sidebarConfig, $currentRoute);

            if ($found) {
                return $found;
            }
        }

        if ($authConfig) {
            $found = searchInSidebarItems($authConfig, $currentRoute);

            if ($found) {
                return $found;
            }
        }

        return null;
    }
}

if (!function_exists('searchInSidebarItems')) {
    /**
     * Busca recursivamente o item do sidebar que corresponde à rota atual.
     *
     * @param  array<int, array<string, mixed>> $items
     * @return array<string, string>|null
     */
    function searchInSidebarItems(array $items, string $currentRoute): ?array
    {
        foreach ($items as $item) {
            if (
                in_array($item['type'] ?? null, ['item', 'drop-item', 'hidden'], true)
                && ($item['route'] ?? null) === $currentRoute
            ) {
                return [
                    'title'       => (string) ($item['title'] ?? ''),
                    'description' => (string) ($item['description'] ?? ''),
                ];
            }

            if (($item['type'] ?? null) === 'drop' && isset($item['items'])) {
                $found = searchInSidebarItems($item['items'], $currentRoute);

                if ($found) {
                    return $found;
                }
            }
        }

        return null;
    }
}

if (!function_exists('sidebarDropContainsActiveRoute')) {
    /**
     * Indica se algum drop-item (em qualquer profundidade) corresponde à URL atual.
     *
     * @param array<int, array<string, mixed>> $items
     */
    function sidebarDropContainsActiveRoute(array $items): bool
    {
        foreach ($items as $item) {
            if (
                ($item['type'] ?? null) === 'drop-item'
                && isset($item['route'])
                && request()->url() === route($item['route'])
            ) {
                return true;
            }

            if (
                ($item['type'] ?? null) === 'drop'
                && isset($item['items'])
                && sidebarDropContainsActiveRoute($item['items'])
            ) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('getCurrentTitle')) {
    /**
     * Retorna o título da página atual com base na rota.
     */
    function getCurrentTitle(string $currentRoute): string
    {
        $item = getSidebarItemByRoute($currentRoute);

        return $item ? $item['title'] : '';
    }
}

if (!function_exists('getCurrentDescription')) {
    /**
     * Retorna a descrição da página atual com base na rota.
     */
    function getCurrentDescription(string $currentRoute): string
    {
        $item = getSidebarItemByRoute($currentRoute);

        return $item ? $item['description'] : '';
    }
}

if (!function_exists('getDataPage')) {
    /**
     * Retorna título e descrição da página atual com base na rota.
     *
     * @return array<string, string>
     */
    function getDataPage(string $currentRoute): array
    {
        $item = getSidebarItemByRoute($currentRoute);

        return [
            'title'       => $item ? $item['title'] : '',
            'description' => $item ? $item['description'] : '',
        ];
    }
}

if (!function_exists('buildSidebarExportTree')) {
    /**
     * Retorna a árvore de exportação do sidebar, buscando do cache ou montando
     * a partir do banco (e já armazenando o resultado em cache) quando ausente.
     *
     * @return list<array<string, mixed>>
     */
    function buildSidebarExportTree(string $group = 'sidebar', bool $fresh = false): array
    {
        if ($fresh) {
            Cache::forget('sidebarMenu');
        }

        return Cache::rememberForever('sidebarMenu', function () use ($group): array {
            $menus = Menu::treeForGroup($group)
                ->reject(fn (Menu $menu): bool => $menu->type === MenuType::HIDDEN)
                ->values();

            $hiddenMenus = Menu::query()
                ->forGroup($group)
                ->where('type', MenuType::HIDDEN)
                ->orderBy('sort')
                ->get();

            return array_values($menus
                ->concat($hiddenMenus)
                ->map(fn (Menu $menu): array => exportSidebarMenuNode($menu))
                ->all());
        });
    }
}

if (!function_exists('exportSidebarMenuNode')) {
    /**
     * Converte um menu (e seus filhos, se houver) para o formato de exportação do sidebar.
     *
     * @return array<string, mixed>
     */
    function exportSidebarMenuNode(Menu $menu): array
    {
        $node = match ($menu->type) {
            MenuType::SEPARATOR => [
                'type' => 'separator',
                'text' => $menu->label,
            ],
            MenuType::DROP => array_filter([
                'type'        => 'drop',
                'icon'        => $menu->icon,
                'label'       => $menu->label,
                'title'       => $menu->title,
                'description' => $menu->description,
                'items'       => $menu->children
                    ->reject(fn (Menu $menu): bool => $menu->type === MenuType::HIDDEN)
                    ->map(fn (Menu $menu): array => exportSidebarMenuNode($menu))
                    ->values()
                    ->all(),
            ], fn (mixed $value): bool => $value !== null),
            MenuType::DROP_ITEM => array_filter([
                'type'        => 'drop-item',
                'route'       => $menu->route,
                'url'         => $menu->url,
                'label'       => $menu->label,
                'title'       => $menu->title,
                'description' => $menu->description,
            ], fn (mixed $value): bool => $value !== null),
            MenuType::HIDDEN => array_filter([
                'type'        => 'hidden',
                'icon'        => $menu->icon,
                'route'       => $menu->route,
                'url'         => $menu->url,
                'label'       => $menu->label,
                'title'       => $menu->title,
                'description' => $menu->description,
            ], fn (mixed $value): bool => $value !== null),
            default => array_filter([
                'type'        => 'item',
                'icon'        => $menu->icon,
                'route'       => $menu->route,
                'url'         => $menu->url,
                'label'       => $menu->label,
                'title'       => $menu->title,
                'description' => $menu->description,
            ], fn (mixed $value): bool => $value !== null),
        };

        return array_merge($menu->meta ?? [], $node);
    }
}
