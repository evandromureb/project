<?php

namespace App\Actions\Menu;

use App\Models\Menu;
use App\Support\MenuTree;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ReorderMenuTree
{
    public function __construct(private MenuTree $menuTree) {}

    /**
     * @param  list<array{name?: string|null, children?: list<mixed>}>  $tree
     */
    public function handle(string $group, array $tree): void
    {
        $rows = $this->menuTree->flatten($tree);
        $keys = array_column($rows, 'key');

        if (count($keys) !== count(array_unique($keys))) {
            throw ValidationException::withMessages([
                'tree' => 'A árvore contém chaves duplicadas.',
            ]);
        }

        $menus = Menu::query()
            ->forGroup($group)
            ->whereIn('key', $keys)
            ->get()
            ->keyBy('key');

        if ($menus->count() !== count($keys)) {
            throw ValidationException::withMessages([
                'tree' => 'A árvore contém itens desconhecidos para este grupo.',
            ]);
        }

        $expected = Menu::query()->forGroup($group)->pluck('key')->sort()->values();
        $received = collect($keys)->sort()->values();

        if ($expected->all() !== $received->all()) {
            throw ValidationException::withMessages([
                'tree' => 'A árvore deve incluir todos os itens do grupo.',
            ]);
        }

        DB::transaction(function () use ($rows, $menus): void {
            foreach ($rows as $row) {
                $menu = $menus->get($row['key']);
                $parentId = null;

                if ($row['parent_key'] !== null) {
                    $parent = $menus->get($row['parent_key']);

                    if ($parent === null || $parent->is($menu)) {
                        throw ValidationException::withMessages([
                            'tree' => "Parent inválido para {$row['key']}.",
                        ]);
                    }

                    $parentId = $parent->id;
                }

                $menu->forceFill([
                    'parent_id' => $parentId,
                    'sort' => $row['sort'],
                ])->save();
            }
        });
    }
}
