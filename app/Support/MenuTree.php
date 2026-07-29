<?php

namespace App\Support;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Str;
use InvalidArgumentException;

class MenuTree
{
    /**
     * Flatten a serialized treeview payload into parent/sort rows.
     *
     * @param  list<array{name?: string|null, children?: list<mixed>}>      $tree
     * @return list<array{key: string, parent_key: string|null, sort: int}>
     */
    public function flatten(array $tree, ?string $parentKey = null): array
    {
        $rows = [];

        foreach ($tree as $sort => $node) {
            $key = $node['name'] ?? null;

            throw_if(!is_string($key) || $key === '', InvalidArgumentException::class, 'Cada nó da árvore precisa de um name (key) válido.');

            $rows[] = [
                'key'        => $key,
                'parent_key' => $parentKey,
                'sort'       => $sort,
            ];

            $children = $node['children'] ?? [];

            if ($children !== []) {
                array_push($rows, ...$this->flatten($children, $key));
            }
        }

        return $rows;
    }

    /**
     * Seed menus from a dashboard config section (sidebar/auth).
     *
     * @param array<int, array<string, mixed>> $items
     */
    public function seedFromConfig(string $group, array $items, ?Menu $parent = null): void
    {
        foreach (array_values($items) as $sort => $item) {
            $type = MenuType::from((string) ($item['type'] ?? MenuType::ITEM->value));
            $key  = $this->resolveKey($group, $item, $parent);
            $meta = $this->extractMeta($item);

            $menu = Menu::query()->updateOrCreate(
                ['key' => $key],
                [
                    'group'       => $group,
                    'parent_id'   => $parent?->id,
                    'sort'        => $sort,
                    'type'        => $type,
                    'label'       => $this->resolveLabel($item),
                    'icon'        => isset($item['icon']) ? (string) $item['icon'] : null,
                    'route'       => isset($item['route']) ? (string) $item['route'] : null,
                    'url'         => isset($item['url']) ? (string) $item['url'] : null,
                    'permission'  => isset($item['permission']) ? (string) $item['permission'] : null,
                    'guard'       => isset($item['guard']) ? (string) $item['guard'] : null,
                    'title'       => isset($item['title']) ? (string) $item['title'] : null,
                    'description' => isset($item['description']) ? (string) $item['description'] : null,
                    'visible'     => $type !== MenuType::HIDDEN,
                    'enabled'     => true,
                    'meta'        => $meta === [] ? null : $meta,
                ],
            );

            $children = $item['items'] ?? [];

            if (is_array($children) && $children !== []) {
                $this->seedFromConfig($group, $children, $menu);
            }
        }
    }

    /**
     * @param array<string, mixed> $item
     */
    public function resolveKey(string $group, array $item, ?Menu $menu = null): string
    {
        if (isset($item['key']) && is_string($item['key']) && $item['key'] !== '') {
            return $item['key'];
        }

        if (isset($item['route']) && is_string($item['route']) && $item['route'] !== '') {
            return $item['route'];
        }

        $type  = (string) ($item['type'] ?? 'item');
        $label = $this->resolveLabel($item) ?? 'item';
        $slug  = Str::slug($label);

        if ($type === MenuType::SEPARATOR->value) {
            return "{$group}-sep-{$slug}";
        }

        if ($menu instanceof \App\Models\Menu) {
            return "{$menu->key}-{$slug}";
        }

        return "{$group}-{$slug}";
    }

    /**
     * @param array<string, mixed> $item
     */
    public function resolveLabel(array $item): ?string
    {
        if (isset($item['label']) && is_string($item['label'])) {
            return $item['label'];
        }

        if (isset($item['text']) && is_string($item['text'])) {
            return $item['text'];
        }

        if (isset($item['title']) && is_string($item['title'])) {
            return $item['title'];
        }

        return null;
    }

    /**
     * @param  array<string, mixed> $item
     * @return array<string, mixed>
     */
    public function extractMeta(array $item): array
    {
        $known = [
            'type', 'icon', 'route', 'position', 'label', 'title', 'description',
            'items', 'text', 'url', 'permission', 'guard', 'key', 'visible', 'enabled',
        ];

        $meta = [];

        foreach ($item as $key => $value) {
            if (in_array($key, $known, true)) {
                if ($key === 'position') {
                    $meta['position'] = $value;
                }

                continue;
            }

            $meta[$key] = $value;
        }

        if (isset($item['position'])) {
            $meta['position'] = $item['position'];
        }

        return $meta;
    }
}
