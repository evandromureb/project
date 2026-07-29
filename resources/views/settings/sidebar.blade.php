<?php

use App\Actions\Menu\CreateMenu;
use App\Actions\Menu\DeleteMenu;
use App\Actions\Menu\ReorderMenuTree;
use App\Actions\Menu\SyncWebRoutesToMenus;
use App\Actions\Menu\UpdateMenu;
use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;

return new class extends Component
{
    public string $group = 'sidebar';

    public int $treeVersion = 0;

    public ?string $selectedKey = null;

    public string $formKey = '';

    public string $formLabel = '';

    public string $formIcon = '';

    public string $formType = 'item';

    public string $formRoute = '';

    public string $formUrl = '';

    public string $formTitle = '';

    public string $formDescription = '';

    public bool $formVisible = true;

    public bool $formEnabled = true;

    public string $statusMessage = '';

    public string $statusTone = 'success';

    /**
     * @return Collection<int, Menu>
     */
    #[Computed]
    public function menus(): Collection
    {
        return Menu::treeForGroup($this->group);
    }

    /**
     * @return list<string>
     */
    #[Computed]
    public function expandedKeys(): array
    {
        return Menu::query()
            ->forGroup($this->group)
            ->where('type', MenuType::DROP)
            ->pluck('key')
            ->all();
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    #[Computed]
    public function typeOptions(): array
    {
        return collect(MenuType::cases())
            ->map(fn (MenuType $type): array => [
                'value' => $type->value,
                'label' => $type->value,
            ])
            ->all();
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    #[Computed]
    public function routeOptions(): array
    {
        $routes = app(SyncWebRoutesToMenus::class)->webNamedRoutes();

        return collect($routes)
            ->map(fn (string $name): array => [
                'value' => $name,
                'label' => $name,
            ])
            ->values()
            ->all();
    }

    public function select(?string $key): void
    {
        if ($key === null || $key === '') {
            $this->clearForm();

            return;
        }

        $menu = Menu::query()->forGroup($this->group)->where('key', $key)->first();

        if ($menu === null) {
            $this->clearForm();

            return;
        }

        $this->selectedKey = $menu->key;
        $this->formKey = $menu->key;
        $this->formLabel = (string) ($menu->label ?? '');
        $this->formIcon = (string) ($menu->icon ?? '');
        $this->formType = $menu->type->value;
        $this->formRoute = (string) ($menu->route ?? '');
        $this->formUrl = (string) ($menu->url ?? '');
        $this->formTitle = (string) ($menu->title ?? '');
        $this->formDescription = (string) ($menu->description ?? '');
        $this->formVisible = $menu->visible;
        $this->formEnabled = $menu->enabled;
        $this->statusMessage = '';
        $this->resetErrorBag();
    }

    /**
     * @param  list<array{name?: string|null, children?: list<mixed>}>  $tree
     */
    public function reorder(array $tree): void
    {
        try {
            app(ReorderMenuTree::class)->handle($this->group, $tree);
            $this->statusMessage = 'Ordem salva.';
            $this->statusTone = 'success';
        } catch (ValidationException $exception) {
            $this->statusMessage = collect($exception->errors())->flatten()->first()
                ?? 'Não foi possível salvar a ordem.';
            $this->statusTone = 'danger';
        }

        $this->skipRender();
    }

    public function save(UpdateMenu $updateMenu): void
    {
        if ($this->selectedKey === null) {
            return;
        }

        $this->validate([
            'formKey' => [
                'required',
                'string',
                'max:150',
                Rule::unique('menus', 'key')->ignore(
                    Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->value('id')
                ),
            ],
            'formLabel' => ['nullable', 'string', 'max:150'],
            'formIcon' => ['nullable', 'string', 'max:100'],
            'formType' => ['required', Rule::enum(MenuType::class)],
            'formRoute' => ['nullable', 'string', 'max:150'],
            'formUrl' => ['nullable', 'string', 'max:255'],
            'formTitle' => ['nullable', 'string', 'max:150'],
            'formDescription' => ['nullable', 'string'],
            'formVisible' => ['boolean'],
            'formEnabled' => ['boolean'],
        ]);

        $menu = Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->firstOrFail();

        $updateMenu->handle($menu, [
            'key' => $this->formKey,
            'label' => $this->formLabel !== '' ? $this->formLabel : null,
            'icon' => $this->formIcon !== '' ? $this->formIcon : null,
            'type' => $this->formType,
            'route' => $this->formRoute !== '' ? $this->formRoute : null,
            'url' => $this->formUrl !== '' ? $this->formUrl : null,
            'title' => $this->formTitle !== '' ? $this->formTitle : null,
            'description' => $this->formDescription !== '' ? $this->formDescription : null,
            'visible' => $this->formVisible,
            'enabled' => $this->formEnabled,
        ]);

        $this->selectedKey = $menu->fresh()->key;
        $this->formKey = $this->selectedKey;
        $this->treeVersion++;
        unset($this->menus, $this->expandedKeys);
        $this->statusMessage = 'Menu atualizado.';
        $this->statusTone = 'success';
    }

    public function createRoot(CreateMenu $createMenu): void
    {
        $menu = $createMenu->handle([
            'group' => $this->group,
            'type' => MenuType::ITEM,
            'label' => 'Novo item',
            'title' => 'Novo item',
        ]);

        $this->afterMutation($menu);
        $this->statusMessage = 'Item criado.';
        $this->statusTone = 'success';
    }

    public function createChild(CreateMenu $createMenu): void
    {
        if ($this->selectedKey === null) {
            return;
        }

        $parent = Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->firstOrFail();

        $menu = $createMenu->handle([
            'group' => $this->group,
            'parent_id' => $parent->id,
            'type' => MenuType::DROP_ITEM,
            'label' => 'Novo filho',
            'title' => 'Novo filho',
        ]);

        $this->afterMutation($menu);
        $this->statusMessage = 'Filho criado.';
        $this->statusTone = 'success';
    }

    public function deleteSelected(DeleteMenu $deleteMenu): void
    {
        if ($this->selectedKey === null) {
            return;
        }

        $menu = Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->firstOrFail();
        $deleteMenu->handle($menu);

        $this->clearForm();
        $this->treeVersion++;
        unset($this->menus, $this->expandedKeys);
        $this->statusMessage = 'Item excluído.';
        $this->statusTone = 'success';
    }

    public function syncRoutes(SyncWebRoutesToMenus $sync): void
    {
        $created = $sync->handle($this->group);
        $this->treeVersion++;
        unset($this->menus, $this->expandedKeys, $this->routeOptions);
        $this->statusMessage = $created === []
            ? 'Nenhuma rota nova para sincronizar.'
            : 'Rotas sincronizadas: '.implode(', ', $created);
        $this->statusTone = 'success';
    }

    private function afterMutation(Menu $menu): void
    {
        $this->treeVersion++;
        unset($this->menus, $this->expandedKeys);
        $this->select($menu->key);
    }

    private function clearForm(): void
    {
        $this->selectedKey = null;
        $this->formKey = '';
        $this->formLabel = '';
        $this->formIcon = '';
        $this->formType = MenuType::ITEM->value;
        $this->formRoute = '';
        $this->formUrl = '';
        $this->formTitle = '';
        $this->formDescription = '';
        $this->formVisible = true;
        $this->formEnabled = true;
    }
};
?>

<div class="flex flex-col gap-6 text-foreground">
    @if (filled($statusMessage))
        <x-ui.alert :color="$statusTone" variant="soft" dismissible>
            {{ $statusMessage }}
        </x-ui.alert>
    @endif

    <div class="grid gap-6 lg:grid-cols-2">
        <x-ui.card title="Estrutura do menu" subtitle="Arraste para reordenar. Clique para editar.">
            <div class="mb-4 flex flex-wrap items-center gap-2">
                <x-ui.button type="button" size="sm" wire:click="createRoot" icon="bi-plus-lg">
                    Novo
                </x-ui.button>
                <x-ui.button
                    type="button"
                    size="sm"
                    variant="outline"
                    wire:click="createChild"
                    icon="bi-diagram-2"
                    :disabled="$selectedKey === null"
                >
                    Novo filho
                </x-ui.button>
                <x-ui.button
                    type="button"
                    size="sm"
                    color="danger"
                    variant="outline"
                    wire:click="deleteSelected"
                    wire:confirm="Excluir este item do menu?"
                    icon="bi-trash"
                    :disabled="$selectedKey === null"
                >
                    Excluir
                </x-ui.button>
                {{--<x-ui.button
                    type="button"
                    size="sm"
                    variant="ghost"
                    wire:click="syncRoutes"
                    icon="bi-arrow-repeat"
                >
                    Sincronizar rotas
                </x-ui.button>--}}
            </div>

            <div wire:key="menu-tree-{{ $treeVersion }}" class="rounded-md border border-border bg-background p-2">
                <x-ui.treeview
                    draggable
                    selectable
                    actions
                    variant="flush"
                    :expanded="$this->expandedKeys"
                    :selected="$selectedKey"
                    aria-label="Menus do sidebar"
                    class="bg-transparent"
                    @treeview-reorder="$wire.reorder($event.detail.tree)"
                    @treeview-select="$wire.select($event.detail.name)"
                >
                    @foreach ($this->menus as $menu)
                        @include('settings.partials.menu-tree-item', ['menu' => $menu])
                    @endforeach
                </x-ui.treeview>
            </div>
        </x-ui.card>

        <x-ui.card
            title="{{ $selectedKey ? 'Editar item' : 'Detalhes' }}"
            :subtitle="$selectedKey ? ('Key: '.$selectedKey) : 'Selecione um item na árvore para editar.'"
        >
            @if ($selectedKey === null)
                <div class="flex flex-col items-start gap-3 text-muted-foreground">
                    <i class="bi bi-ui-checks-grid text-2xl text-foreground/40" aria-hidden="true"></i>
                    <p class="mb-0 text-sm">
                        Selecione um item na árvore ao lado, ou clique em <span class="font-medium text-foreground">Novo</span> para criar.
                    </p>
                </div>
            @else
                <form wire:submit.prevent="save" class="flex flex-col gap-4">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-forms.input
                            label="Key"
                            wire:model.live="formKey"
                            name="formKey"
                            :value="$formKey"
                            :error="$errors->first('formKey')"
                        />
                        <x-forms.input
                            label="Label"
                            wire:model.live="formLabel"
                            name="formLabel"
                            :value="$formLabel"
                            :error="$errors->first('formLabel')"
                        />
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-forms.input
                            label="Ícone"
                            wire:model.live="formIcon"
                            name="formIcon"
                            :value="$formIcon"
                            hint="Ex.: bi-house"
                            :error="$errors->first('formIcon')"
                        />
                        <x-forms.select
                            label="Tipo"
                            native
                            :options="$this->typeOptions"
                            wire:model.live="formType"
                            name="formType"
                            :value="$formType"
                            placeholder="Selecione o tipo"
                            :error="$errors->first('formType')"
                        />
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <x-forms.select
                            label="Rota"
                            native
                            :options="$this->routeOptions"
                            wire:model.live="formRoute"
                            name="formRoute"
                            :value="$formRoute"
                            placeholder="— nenhuma —"
                            :error="$errors->first('formRoute')"
                        />
                        <x-forms.input
                            label="URL"
                            wire:model.live="formUrl"
                            name="formUrl"
                            :value="$formUrl"
                            :error="$errors->first('formUrl')"
                        />
                    </div>

                    <x-forms.input
                        label="Title"
                        wire:model.live="formTitle"
                        name="formTitle"
                        :value="$formTitle"
                        :error="$errors->first('formTitle')"
                    />

                    <x-forms.textarea
                        label="Description"
                        wire:model.live="formDescription"
                        name="formDescription"
                        :value="$formDescription"
                        :rows="3"
                        :error="$errors->first('formDescription')"
                    />

                    <div class="grid gap-3 rounded-md border border-border bg-muted/40 p-3 sm:grid-cols-2 dark:bg-muted/20">
                        <x-forms.switch
                            label="Visível"
                            wire:model.live="formVisible"
                            name="formVisible"
                            :checked="$formVisible"
                        />
                        <x-forms.switch
                            label="Habilitado"
                            wire:model.live="formEnabled"
                            name="formEnabled"
                            :checked="$formEnabled"
                        />
                    </div>

                    <div class="flex justify-end border-t border-border pt-4">
                        <x-ui.button type="submit" icon="bi-check-lg" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="save">Salvar</span>
                            <span wire:loading wire:target="save">Salvando…</span>
                        </x-ui.button>
                    </div>
                </form>
            @endif
        </x-ui.card>
    </div>
</div>
