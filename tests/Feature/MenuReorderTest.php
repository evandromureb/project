<?php

use App\Actions\Menu\ReorderMenuTree;
use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Validation\ValidationException;

test('it reorders menu parent and sort from tree payload', function () {
    $rootA = Menu::factory()->create(['key' => 'a', 'sort' => 0, 'group' => 'sidebar']);
    $rootB = Menu::factory()->drop()->create(['key' => 'b', 'sort' => 1, 'group' => 'sidebar']);
    $child = Menu::factory()->dropItem()->childOf($rootB)->create(['key' => 'c', 'sort' => 0]);

    app(ReorderMenuTree::class)->handle('sidebar', [
        [
            'name' => 'b',
            'children' => [
                ['name' => 'a', 'children' => []],
                ['name' => 'c', 'children' => []],
            ],
        ],
    ]);

    expect($rootA->fresh()->parent_id)->toBe($rootB->id)
        ->and($rootA->fresh()->sort)->toBe(0)
        ->and($child->fresh()->parent_id)->toBe($rootB->id)
        ->and($child->fresh()->sort)->toBe(1)
        ->and($rootB->fresh()->parent_id)->toBeNull()
        ->and($rootB->fresh()->sort)->toBe(0);
});

test('it rejects incomplete tree payloads', function () {
    Menu::factory()->create(['key' => 'a', 'group' => 'sidebar']);
    Menu::factory()->create(['key' => 'b', 'group' => 'sidebar']);

    expect(fn () => app(ReorderMenuTree::class)->handle('sidebar', [
        ['name' => 'a', 'children' => []],
    ]))->toThrow(ValidationException::class);
});

test('menu tree collection serializes keys for treeview', function () {
    $parent = Menu::factory()->drop()->create(['key' => 'fundamentos', 'group' => 'sidebar']);
    Menu::factory()->dropItem()->childOf($parent)->create(['key' => 'cores', 'sort' => 0]);

    $tree = Menu::collectionToTree(Menu::treeForGroup('sidebar'));

    expect($tree)->toHaveCount(1)
        ->and($tree[0]['name'])->toBe('fundamentos')
        ->and($tree[0]['children'][0]['name'])->toBe('cores');
});
