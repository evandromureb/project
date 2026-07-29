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

test('it nests a drop inside a top-level drop', function () {
    $rootDrop = Menu::factory()->drop()->create(['key' => 'root-drop', 'group' => 'sidebar']);

    Livewire::test('settings::sidebar')
        ->call('startCreate')
        ->set('formType', MenuType::DROP->value)
        ->set('formLabel', 'Nested drop')
        ->set('formIcon', 'bi-folder')
        ->set('formTitle', 'Nested drop')
        ->set('formParentId', (string) $rootDrop->id)
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('statusMessage', 'Item criado.');

    $nestedDrop = Menu::query()->forGroup('sidebar')->where('label', 'Nested drop')->firstOrFail();
    expect($nestedDrop->parent_id)->toBe($rootDrop->id);
});

test('it rejects nesting a drop under an already nested drop', function () {
    $rootDrop = Menu::factory()->drop()->create(['key' => 'root-drop', 'group' => 'sidebar']);
    $nestedDrop = Menu::factory()->drop()->childOf($rootDrop)->create(['key' => 'nested-drop']);

    Livewire::test('settings::sidebar')
        ->call('startCreate')
        ->set('formType', MenuType::DROP->value)
        ->set('formLabel', 'Third level drop')
        ->set('formParentId', (string) $nestedDrop->id)
        ->call('save')
        ->assertHasErrors(['formParentId']);

    expect(Menu::query()->where('label', 'Third level drop')->exists())->toBeFalse();
});

test('it rejects making a drop nested when it already has a nested drop child', function () {
    $rootDrop = Menu::factory()->drop()->create(['key' => 'root-drop', 'group' => 'sidebar']);
    $parentOfNested = Menu::factory()->drop()->create(['key' => 'parent-of-nested', 'group' => 'sidebar']);
    Menu::factory()->drop()->childOf($parentOfNested)->create(['key' => 'nested-drop']);

    Livewire::test('settings::sidebar')
        ->call('edit', 'parent-of-nested')
        ->set('formParentId', (string) $rootDrop->id)
        ->call('save')
        ->assertHasErrors(['formParentId']);

    expect($parentOfNested->fresh()->parent_id)->toBeNull();
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
