<?php

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
