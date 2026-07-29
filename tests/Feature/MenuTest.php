<?php

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Database\QueryException;

test('it persists a menu and casts the type enum', function () {
    $menu = Menu::factory()->create([
        'key' => 'dashboard',
        'type' => MenuType::ITEM,
    ]);

    $this->assertModelExists($menu);

    expect($menu->type)->toBe(MenuType::ITEM)
        ->and($menu->visible)->toBeTrue()
        ->and($menu->enabled)->toBeTrue()
        ->and($menu->sort)->toBe(0);
});

test('it orders children by sort', function () {
    $parent = Menu::factory()->drop()->create(['key' => 'fundamentos']);

    $second = Menu::factory()->dropItem()->childOf($parent)->create([
        'key' => 'tipografia',
        'sort' => 1,
    ]);

    $first = Menu::factory()->dropItem()->childOf($parent)->create([
        'key' => 'cores',
        'sort' => 0,
    ]);

    $children = $parent->children()->get();

    expect($children)->toHaveCount(2)
        ->and($children->first()->is($first))->toBeTrue()
        ->and($children->last()->is($second))->toBeTrue()
        ->and($first->type)->toBe(MenuType::DROP_ITEM)
        ->and($first->parent->is($parent))->toBeTrue();
});

test('it scopes menus by group and roots', function () {
    Menu::factory()->create(['key' => 'sidebar-home', 'group' => 'sidebar']);
    Menu::factory()->create(['key' => 'auth-login', 'group' => 'auth']);

    $parent = Menu::factory()->drop()->create(['key' => 'fundamentos', 'group' => 'sidebar']);
    Menu::factory()->dropItem()->childOf($parent)->create(['key' => 'cores']);

    expect(Menu::query()->forGroup('sidebar')->count())->toBe(3)
        ->and(Menu::query()->forGroup('sidebar')->roots()->count())->toBe(2)
        ->and(Menu::query()->forGroup('auth')->roots()->count())->toBe(1);
});

test('it enforces unique keys', function () {
    Menu::factory()->create(['key' => 'dashboard']);

    expect(fn () => Menu::factory()->create(['key' => 'dashboard']))
        ->toThrow(QueryException::class);
});

test('factory states set the correct menu types', function () {
    expect(Menu::factory()->drop()->create()->type)->toBe(MenuType::DROP)
        ->and(Menu::factory()->dropItem()->create()->type)->toBe(MenuType::DROP_ITEM)
        ->and(Menu::factory()->separator()->create()->type)->toBe(MenuType::SEPARATOR)
        ->and(Menu::factory()->hidden()->create()->type)->toBe(MenuType::HIDDEN);
});
