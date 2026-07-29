<?php

use App\Enums\MenuType;
use App\Models\Menu;
use Database\Seeders\MenuSeeder;
use Livewire\Livewire;

test('settings sidebar page loads', function () {
    $this->seed(MenuSeeder::class);

    Livewire::test('settings::sidebar')
        ->assertSuccessful()
        ->assertSee('Estrutura do menu')
        ->assertSee('Sincronizar rotas');
});

test('it selects and updates a menu item', function () {
    $this->seed(MenuSeeder::class);

    Livewire::test('settings::sidebar')
        ->call('select', 'dashboard')
        ->assertSet('selectedKey', 'dashboard')
        ->assertSet('formLabel', 'Início')
        ->set('formLabel', 'Home')
        ->call('save')
        ->assertSet('statusMessage', 'Menu atualizado.');

    expect(Menu::query()->where('key', 'dashboard')->value('label'))->toBe('Home');
});

test('it reorders through the livewire action', function () {
    $a = Menu::factory()->create(['key' => 'a', 'sort' => 0, 'group' => 'sidebar']);
    $b = Menu::factory()->create(['key' => 'b', 'sort' => 1, 'group' => 'sidebar']);

    Livewire::test('settings::sidebar')
        ->call('reorder', [
            ['name' => 'b', 'children' => []],
            ['name' => 'a', 'children' => []],
        ])
        ->assertSet('statusMessage', 'Ordem salva.');

    expect($b->fresh()->sort)->toBe(0)
        ->and($a->fresh()->sort)->toBe(1);
});

test('it creates a root menu item', function () {
    Menu::factory()->create(['key' => 'existing', 'group' => 'sidebar']);

    Livewire::test('settings::sidebar')
        ->call('createRoot')
        ->assertSet('statusMessage', 'Item criado.');

    expect(Menu::query()->forGroup('sidebar')->where('label', 'Novo item')->exists())->toBeTrue();
});

test('it syncs missing web routes from the page action', function () {
    Menu::factory()->create([
        'key' => 'dashboard',
        'route' => 'dashboard',
        'group' => 'sidebar',
        'type' => MenuType::ITEM,
    ]);

    Livewire::test('settings::sidebar')
        ->call('syncRoutes');

    expect(Menu::query()->where('route', 'app4')->exists())->toBeTrue();
});
