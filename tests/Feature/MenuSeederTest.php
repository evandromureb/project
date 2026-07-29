<?php

use App\Enums\MenuType;
use App\Models\Menu;
use Database\Seeders\MenuSeeder;

test('it seeds sidebar hierarchy from dashboard config', function () {
    $this->seed(MenuSeeder::class);

    expect(Menu::query()->forGroup('sidebar')->where('key', 'dashboard')->exists())->toBeTrue()
        ->and(Menu::query()->forGroup('sidebar')->where('key', 'settings.sidebar')->exists())->toBeTrue()
        ->and(Menu::query()->forGroup('sidebar')->where('key', 'sidebar-settings')->exists())->toBeTrue();

    $parent = Menu::query()->where('key', 'sidebar-settings')->first();

    expect($parent)->not->toBeNull()
        ->and($parent->type)->toBe(MenuType::DROP);

    $children = $parent->children()->orderBy('sort')->get();

    expect($children)->toHaveCount(2)
        ->and($children->first()->key)->toBe('settings.sidebar')
        ->and($children->last()->key)->toBe('app2');
});

test('it seeds auth menus from dashboard config', function () {
    $this->seed(MenuSeeder::class);

    expect(Menu::query()->forGroup('auth')->where('key', 'login')->exists())->toBeTrue()
        ->and(Menu::query()->forGroup('auth')->where('route', 'login')->first()?->type)->toBe(MenuType::HIDDEN);
});

test('it syncs orphan web.php routes as hidden menus', function () {
    $this->seed(MenuSeeder::class);

    foreach (['app', 'app3', 'app4'] as $route) {
        $menu = Menu::query()->where('route', $route)->first();

        expect($menu)->not->toBeNull()
            ->and($menu->type)->toBe(MenuType::HIDDEN)
            ->and($menu->group)->toBe('sidebar');
    }
});

test('it is idempotent when seeded twice', function () {
    $this->seed(MenuSeeder::class);
    $count = Menu::query()->count();

    $this->seed(MenuSeeder::class);

    expect(Menu::query()->count())->toBe($count);
});
