<?php

use App\Actions\Menu\CreateMenu;
use App\Actions\Menu\DeleteMenu;
use App\Actions\Menu\ReorderMenuTree;
use App\Actions\Menu\SyncWebRoutesToMenus;
use App\Actions\Menu\UpdateMenu;
use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Computed;
use Livewire\Component;

return new class extends Component
{
    public string $group = 'sidebar';

    public int $treeVersion = 0;

    public ?string $selectedKey = null;

    public ?string $selectedType = null;

    public bool $isCreating = false;

    public bool $isEditing = false;

    public bool $isCreatingDropItem = false;

    public bool $isCreatingHidden = false;

    public string $formKey = '';

    public string $formLabel = '';

    public string $formIcon = '';

    public string $formType = '';

    public string $formParentId = '';

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
        return Menu::treeForGroup($this->group)
            ->reject(fn (Menu $menu): bool => $menu->type === MenuType::HIDDEN)
            ->values();
    }

    /**
     * @return Collection<int, Menu>
     */
    #[Computed]
    public function hiddenMenus(): Collection
    {
        return Menu::query()
            ->forGroup($this->group)
            ->where('type', MenuType::HIDDEN)
            ->orderBy('sort')
            ->get();
    }

    /**
     * @return list<string>
     */
    #[Computed]
    public function expandedKeys(): array
    {
        return array_values(Menu::query()
            ->forGroup($this->group)
            ->where('type', MenuType::DROP)
            ->pluck('key')
            ->all());
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    #[Computed]
    public function typeOptions(): array
    {
        $hasDrops = $this->dropOptions !== [];

        return array_values(collect(MenuType::cases())
            ->reject(fn (MenuType $menuType): bool => ($menuType === MenuType::HIDDEN && $this->formType !== MenuType::HIDDEN->value)
                || ($menuType === MenuType::DROP_ITEM && ! $hasDrops))
            ->map(fn (MenuType $menuType): array => [
                'value' => $menuType->value,
                'label' => $menuType->label(),
            ])
            ->all());
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    #[Computed]
    public function dropOptions(): array
    {
        return array_values(Menu::query()
            ->forGroup($this->group)
            ->where('type', MenuType::DROP)
            ->orderBy('sort')
            ->get()
            ->map(fn (Menu $menu): array => [
                'value' => (string) $menu->id,
                'label' => (string) ($menu->label ?? $menu->key),
            ])
            ->all());
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    #[Computed]
    public function dropParentOptions(): array
    {
        return array_values(Menu::query()
            ->forGroup($this->group)
            ->where('type', MenuType::DROP)
            ->whereNull('parent_id')
            ->when(
                $this->selectedKey !== null,
                fn ($query) => $query->where('key', '!=', $this->selectedKey),
            )
            ->orderBy('sort')
            ->get()
            ->map(fn (Menu $menu): array => [
                'value' => (string) $menu->id,
                'label' => (string) ($menu->label ?? $menu->key),
            ])
            ->all());
    }

    /**
     * @return list<array{value: string, label: string}>
     */
    #[Computed]
    public function routeOptions(): array
    {
        $usedRoutes = Menu::query()
            ->whereNotNull('route')
            ->where('route', '!=', '')
            ->when(
                $this->selectedKey !== null,
                fn ($query) => $query->where('key', '!=', $this->selectedKey),
            )
            ->pluck('route')
            ->all();

        $routes = resolve(SyncWebRoutesToMenus::class)->webNamedRoutes();

        return array_values(collect($routes)
            ->reject(fn (string $name): bool => in_array($name, $usedRoutes, true))
            ->map(fn (string $name): array => [
                'value' => $name,
                'label' => $name,
            ])
            ->all());
    }

    public function getAllowsIconProperty(): bool
    {
        return in_array($this->formType, [MenuType::ITEM->value, MenuType::DROP->value, MenuType::HIDDEN->value], true);
    }

    public function getIsDropItemProperty(): bool
    {
        return $this->formType === MenuType::DROP_ITEM->value;
    }

    public function getIsDropProperty(): bool
    {
        return $this->formType === MenuType::DROP->value;
    }

    public function getIsSeparatorProperty(): bool
    {
        return $this->formType === MenuType::SEPARATOR->value;
    }

    public function getNeedsLinkProperty(): bool
    {
        return in_array($this->formType, [MenuType::ITEM->value, MenuType::DROP_ITEM->value, MenuType::HIDDEN->value], true);
    }

    public function getFormReadyProperty(): bool
    {
        return $this->formType !== '';
    }

    public function getShowFormProperty(): bool
    {
        return $this->isCreating || $this->isEditing;
    }

    public function updatedFormType(string $value): void
    {
        if (! $this->allowsIcon) {
            $this->formIcon = '';
        }

        if (! in_array($value, [MenuType::DROP_ITEM->value, MenuType::DROP->value], true)) {
            $this->formParentId = '';
        }

        if ($value === MenuType::SEPARATOR->value) {
            $this->formIcon = '';
            $this->formRoute = '';
            $this->formUrl = '';
            $this->formTitle = '';
            $this->formDescription = '';
            $this->formParentId = '';
        }

        if ($this->isCreating) {
            $this->syncFormKey();
        }
    }

    public function updatedFormLabel(): void
    {
        if ($this->isCreating) {
            $this->syncFormKey();
        }
    }

    public function edit(string $key): void
    {
        $menu = Menu::query()->forGroup($this->group)->where('key', $key)->first();

        if ($menu === null) {
            $this->clearForm();

            return;
        }

        $this->isCreating = false;
        $this->isEditing = true;
        $this->isCreatingDropItem = false;
        $this->isCreatingHidden = false;
        $this->fillForm($menu);
        $this->statusMessage = '';
        $this->resetErrorBag();
        unset($this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
    }

    public function startCreate(): void
    {
        $this->clearForm();
        $this->isCreating = true;
        $this->isEditing = false;
        $this->isCreatingDropItem = false;
        $this->isCreatingHidden = false;
        $this->formType = '';
        $this->statusMessage = '';
        $this->resetErrorBag();
        unset($this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
    }

    public function startCreateHidden(): void
    {
        $this->clearForm();
        $this->isCreating = true;
        $this->isEditing = false;
        $this->isCreatingDropItem = false;
        $this->isCreatingHidden = true;
        $this->formType = MenuType::HIDDEN->value;
        $this->syncFormKey();
        $this->statusMessage = '';
        $this->resetErrorBag();
        unset($this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
    }

    public function createChildFor(string $parentKey): void
    {
        $parent = Menu::query()->forGroup($this->group)->where('key', $parentKey)->first();

        if ($parent === null || $parent->type !== MenuType::DROP) {
            return;
        }

        $parentId = (string) $parent->id;

        $this->clearForm();
        $this->isCreating = true;
        $this->isEditing = false;
        $this->isCreatingDropItem = true;
        $this->formType = MenuType::DROP_ITEM->value;
        $this->formParentId = $parentId;
        $this->syncFormKey();
        $this->statusMessage = '';
        $this->resetErrorBag();
        unset($this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
    }

    public function deleteMenu(string $key, DeleteMenu $deleteMenu): void
    {
        $menu = Menu::query()->forGroup($this->group)->where('key', $key)->first();

        if ($menu === null) {
            return;
        }

        if ($menu->type === MenuType::DROP && $this->menuHasChildren($menu)) {
            $this->statusMessage = 'Remova os itens filhos deste drop antes de excluí-lo.';
            $this->statusTone = 'danger';

            return;
        }

        $wasEditingThis = $this->selectedKey === $key;

        $deleteMenu->handle($menu);

        if ($wasEditingThis || $this->isCreating) {
            $this->clearForm();
        }

        $this->treeVersion++;
        unset($this->menus, $this->hiddenMenus, $this->expandedKeys, $this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
        $this->statusMessage = 'Item excluído.';
        $this->statusTone = 'success';
    }

    public function cancelForm(): void
    {
        $this->clearForm();
        $this->statusMessage = '';
        $this->resetErrorBag();
    }

    /**
     * @param  list<array{name?: string|null, children?: list<mixed>}>  $tree
     */
    public function reorder(array $tree): void
    {
        try {
            resolve(ReorderMenuTree::class)->handle($this->group, $tree);
            $this->statusMessage = 'Ordem salva.';
            $this->statusTone = 'success';
        } catch (ValidationException $exception) {
            $this->statusMessage = collect($exception->errors())->flatten()->first()
                ?? 'Não foi possível salvar a ordem.';
            $this->statusTone = 'danger';
        }

        $this->skipRender();
    }

    public function save(CreateMenu $createMenu, UpdateMenu $updateMenu): void
    {
        if (! $this->isCreating && ! $this->isEditing) {
            return;
        }

        if ($this->isCreating) {
            $this->syncFormKey();
        }

        $rules = [
            'formType' => ['required', Rule::enum(MenuType::class)],
            'formLabel' => ['required', 'string', 'max:150'],
            'formKey' => [
                'required',
                'string',
                'max:150',
                Rule::unique('menus', 'key')->ignore(
                    $this->selectedKey === null
                        ? null
                        : Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->value('id')
                ),
            ],
            'formIcon' => [
                Rule::requiredIf(fn (): bool => $this->allowsIcon),
                'nullable',
                'string',
                'max:100',
            ],
            'formRoute' => ['nullable', 'string', 'max:150'],
            'formUrl' => [
                Rule::requiredIf(fn (): bool => $this->needsLink && $this->formRoute === ''),
                'nullable',
                'string',
                'max:255',
            ],
            'formTitle' => [
                Rule::requiredIf(fn (): bool => ! $this->isSeparator),
                'nullable',
                'string',
                'max:150',
            ],
            'formDescription' => ['nullable', 'string'],
            'formVisible' => ['boolean'],
            'formEnabled' => ['boolean'],
        ];

        if ($this->formType === MenuType::DROP_ITEM->value) {
            $rules['formParentId'] = [
                'required',
                'integer',
                Rule::exists('menus', 'id')->where(
                    fn ($query) => $query->where('group', $this->group)->where('type', MenuType::DROP->value)
                ),
            ];
        } elseif ($this->formType === MenuType::DROP->value) {
            $rules['formParentId'] = [
                'nullable',
                'integer',
                Rule::exists('menus', 'id')->where(
                    fn ($query) => $query->where('group', $this->group)
                        ->where('type', MenuType::DROP->value)
                        ->whereNull('parent_id')
                ),
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($value === '' || $value === null || $this->selectedKey === null) {
                        return;
                    }

                    $menu = Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->first();

                    if ($menu === null) {
                        return;
                    }

                    $hasNestedDrop = Menu::query()
                        ->where('parent_id', $menu->id)
                        ->where('type', MenuType::DROP)
                        ->exists();

                    if ($hasNestedDrop) {
                        $fail('Este drop possui um drop filho e não pode ser aninhado em outro drop (máximo de 2 níveis).');
                    }
                },
            ];
        } else {
            $rules['formParentId'] = ['nullable'];
            $this->formParentId = '';
        }

        $this->validate($rules);

        if (! $this->allowsIcon) {
            $this->formIcon = '';
        }

        if ($this->isSeparator) {
            $this->formIcon = '';
            $this->formRoute = '';
            $this->formUrl = '';
            $this->formTitle = '';
            $this->formDescription = '';
            $this->formParentId = '';
        }

        $payload = [
            'key' => $this->formKey,
            'label' => $this->formLabel,
            'icon' => $this->allowsIcon && $this->formIcon !== '' ? $this->formIcon : null,
            'type' => $this->formType,
            'route' => $this->formRoute !== '' ? $this->formRoute : null,
            'url' => $this->formUrl !== '' ? $this->formUrl : null,
            'title' => $this->formTitle !== '' ? $this->formTitle : null,
            'description' => $this->formDescription !== '' ? $this->formDescription : null,
            'visible' => $this->formVisible,
            'enabled' => $this->formEnabled,
        ];

        if ($this->formType === MenuType::DROP_ITEM->value) {
            $payload['parent_id'] = (int) $this->formParentId;
        } elseif ($this->formType === MenuType::DROP->value) {
            $payload['parent_id'] = $this->formParentId !== '' ? (int) $this->formParentId : null;
        } elseif ($this->isCreating) {
            $payload['parent_id'] = null;
        }

        if ($this->isCreating) {
            $createMenu->handle([
                ...$payload,
                'group' => $this->group,
            ]);

            $this->afterMutation();
            $this->statusMessage = 'Item criado.';
            $this->statusTone = 'success';

            return;
        }

        $menu = Menu::query()->forGroup($this->group)->where('key', $this->selectedKey)->firstOrFail();

        $updateMenu->handle($menu, $payload);

        $this->afterMutation();
        $this->statusMessage = 'Menu atualizado.';
        $this->statusTone = 'success';
    }

    public function syncRoutes(SyncWebRoutesToMenus $syncWebRoutesToMenus): void
    {
        $created = $syncWebRoutesToMenus->handle($this->group);
        $this->treeVersion++;
        unset($this->menus, $this->hiddenMenus, $this->expandedKeys, $this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
        $this->statusMessage = $created === []
            ? 'Nenhuma rota nova para sincronizar.'
            : 'Rotas sincronizadas: '.implode(', ', $created);
        $this->statusTone = 'success';
    }

    public function exportSidebar(): void
    {
		buildSidebarExportTree($this->group, fresh: true);
		$this->dispatch('toast', type: 'success', message: 'Sidebar exportado com sucesso');
    }

    private function fillForm(Menu $menu): void
    {
        $this->selectedKey = $menu->key;
        $this->selectedType = $menu->type->value;
        $this->formKey = $menu->key;
        $this->formLabel = (string) ($menu->label ?? '');
        $this->formIcon = (string) ($menu->icon ?? '');
        $this->formType = $menu->type->value;
        $this->formParentId = $menu->parent_id !== null ? (string) $menu->parent_id : '';
        $this->formRoute = (string) ($menu->route ?? '');
        $this->formUrl = (string) ($menu->url ?? '');
        $this->formTitle = (string) ($menu->title ?? '');
        $this->formDescription = (string) ($menu->description ?? '');
        $this->formVisible = $menu->visible;
        $this->formEnabled = $menu->enabled;
    }

    private function afterMutation(): void
    {
        $this->treeVersion++;
        unset($this->menus, $this->hiddenMenus, $this->expandedKeys, $this->routeOptions, $this->dropOptions, $this->dropParentOptions, $this->typeOptions);
        $this->clearForm();
    }

    private function syncFormKey(): void
    {
        if ($this->formType === '') {
            $this->formKey = '';

            return;
        }

        $label = $this->formLabel !== '' ? $this->formLabel : 'item';
        $base = Str::slug($label.$this->formType) ?: 'item';
        $key = $base;
        $suffix = 1;

        while (Menu::query()->where('key', $key)->exists()) {
            $key = "{$base}-{$suffix}";
            $suffix++;
        }

        $this->formKey = $key;
    }

    private function menuHasChildren(Menu $menu): bool
    {
        return Menu::query()
            ->where('parent_id', $menu->id)
            ->whereIn('type', [MenuType::DROP_ITEM, MenuType::DROP])
            ->exists();
    }

    private function clearForm(): void
    {
        $this->selectedKey = null;
        $this->selectedType = null;
        $this->isCreating = false;
        $this->isEditing = false;
        $this->isCreatingDropItem = false;
        $this->isCreatingHidden = false;
        $this->formKey = '';
        $this->formLabel = '';
        $this->formIcon = '';
        $this->formType = '';
        $this->formParentId = '';
        $this->formRoute = '';
        $this->formUrl = '';
        $this->formTitle = '';
        $this->formDescription = '';
        $this->formVisible = true;
        $this->formEnabled = true;
    }
};
?>

<div class="flex w-full min-w-0 flex-col gap-6 text-foreground">
    @if (filled($statusMessage))
        <x-ui.alert :color="$statusTone" variant="soft" dismissible>
            {{ $statusMessage }}
        </x-ui.alert>
    @endif

    <div @class([
        'grid w-full min-w-0 gap-6',
        'lg:grid-cols-2' => $this->showForm,
        'mx-auto max-w-3xl' => ! $this->showForm,
    ])>
        <x-ui.card
            class="min-w-0 overflow-hidden"
            title="Estrutura do menu"
            subtitle="Arraste para reordenar. Use os botões de cada item."
        >
            <div class="mb-4 flex flex-wrap items-center justify-between gap-2">
                <div class="flex flex-wrap items-center gap-2">
                    <x-ui.button type="button" size="sm" wire:click="startCreate" icon="bi-plus-lg">
                        Novo
                    </x-ui.button>

                    <x-ui.button type="button" size="sm" variant="outline" wire:click="startCreateHidden" icon="bi-eye-slash">
                        Novo oculto
                    </x-ui.button>
                </div>

				<x-ui.modal.modal-trigger size="sm" name="static" color="warning" icon="bi-download" variant="outline">Exportar</x-ui.modal.modal-trigger>

				<x-ui.modal
					name="static"
					title="Exportar sidebar"
					centered
					staticBackdrop
				>
					Este modal só fecha pelo botão ou pela tecla Esc — clicar fora não fecha.

					<x-slot:footer>
						<x-ui.modal.modal-trigger name="static" action="close" variant="outline" color="secondary">Cancelar</x-ui.modal.modal-trigger>
						<x-ui.modal.modal-trigger name="static" color="primary" wire:click="exportSidebar">Exportar</x-ui.modal.modal-trigger>
					</x-slot:footer>
				</x-ui.modal>
            </div>

            <div wire:key="menu-tree-{{ $treeVersion }}" class="min-w-0 overflow-x-auto rounded-md border border-border bg-background p-2">
                <x-ui.treeview
                    draggable
                    actions
                    variant="flush"
                    :expanded="$this->expandedKeys"
                    aria-label="Menus do sidebar"
                    class="min-w-0 bg-transparent"
                    @treeview-reorder="$wire.reorder($event.detail.tree)"
                >
                    @foreach ($this->menus as $menu)
                        @include('settings.partials.menu-tree-item', ['menu' => $menu])
                    @endforeach
                </x-ui.treeview>
            </div>

            @if ($this->hiddenMenus->isNotEmpty())
                <div class="mt-4 min-w-0">
                    <p class="mb-2 text-xs font-medium tracking-wide text-muted-foreground uppercase">
                        Itens ocultos
                    </p>

                    <div class="min-w-0 divide-y divide-border rounded-md border border-border bg-background">
                        @foreach ($this->hiddenMenus as $menu)
                            <div class="flex min-w-0 items-center justify-between gap-2 px-3 py-2">
                                <div class="flex min-w-0 items-center gap-2">
                                    <i class="bi bi-eye-slash shrink-0 text-sm leading-none text-muted-foreground" aria-hidden="true"></i>
                                    <span class="truncate text-sm">{{ $menu->label ?? $menu->key }}</span>
                                </div>

                                <span class="flex shrink-0 items-center gap-0.5">
                                    <button
                                        type="button"
                                        class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                                        wire:click="edit(@js($menu->key))"
                                        title="Editar"
                                        aria-label="Editar"
                                    >
                                        <i class="bi bi-pencil text-sm leading-none" aria-hidden="true"></i>
                                    </button>

                                    <button
                                        type="button"
                                        class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-danger/10 hover:text-danger"
                                        wire:click="deleteMenu(@js($menu->key))"
                                        wire:confirm="Excluir este item do menu?"
                                        title="Excluir"
                                        aria-label="Excluir"
                                    >
                                        <i class="bi bi-trash text-sm leading-none" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </x-ui.card>

        @if ($this->showForm)
            <x-ui.card
                class="min-w-0 overflow-hidden"
                title="{{ $isCreatingDropItem ? 'Novo drop-item' : ($isCreatingHidden ? 'Novo item oculto' : ($isCreating ? 'Novo item' : 'Editar item')) }}"
                :subtitle="$isCreatingDropItem ? 'Preencha os dados do drop-item.' : ($isCreatingHidden ? 'Preencha os dados do item oculto.' : ($isCreating ? 'Selecione o tipo para continuar.' : 'Altere os campos e salve.'))"
            >
                <form wire:submit.prevent="save" class="flex flex-col gap-4">
                    @unless ($isCreatingDropItem || $isCreatingHidden)

                        <x-forms.select
                            label="Tipo"
                            clearable
                            :options="$this->typeOptions"
                            wire:model.live="formType"
                            name="formType"
                            :value="$formType"
                            placeholder="Selecione o tipo"
                            :error="$errors->first('formType')"
                        />
                    @endunless

                    @if ($this->formReady)
                        @if ($this->isSeparator)
                            <x-forms.input
								size="sm"
                                label="Text"
                                wire:model.live="formLabel"
                                name="formLabel"
                                :value="$formLabel"
                                :error="$errors->first('formLabel')"
                            />
                        @else
                            <x-forms.input
                                label="Label"
                                wire:model.live="formLabel"
                                name="formLabel"
                                :value="$formLabel"
                                :error="$errors->first('formLabel')"
                            />

                            @if ($this->allowsIcon)
                                <x-forms.input
                                    label="Ícone"
                                    wire:model.live="formIcon"
                                    name="formIcon"
                                    :value="$formIcon"
                                    hint="Ex.: bi-house"
                                    :error="$errors->first('formIcon')"
                                />
                            @endif

                            @if ($this->isDropItem && ! $isCreatingDropItem)
                                <x-forms.select
                                    label="Drop"
                                    clearable
                                    :options="$this->dropOptions"
                                    wire:model.live="formParentId"
                                    name="formParentId"
                                    :value="$formParentId"
                                    placeholder="Selecione o drop"
                                    :error="$errors->first('formParentId')"
                                />
                            @endif

                            @if ($this->isDrop)
                                <x-forms.select
                                    label="Drop pai"
                                    clearable
                                    :options="$this->dropParentOptions"
                                    wire:model.live="formParentId"
                                    name="formParentId"
                                    :value="$formParentId"
                                    placeholder="— nenhum (nível superior) —"
                                    hint="Aninhe este drop dentro de outro drop de nível superior (máximo de 2 níveis)."
                                    :error="$errors->first('formParentId')"
                                />
                            @endif

                            @if ($this->needsLink)
                                <div class="grid gap-4 sm:grid-cols-2">
                                    <x-forms.select
                                        label="Rota"
                                        clearable
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
                                        :hint="$formRoute === '' ? 'Obrigatória quando nenhuma rota for selecionada.' : null"
                                        :error="$errors->first('formUrl')"
                                    />
                                </div>
                            @endif

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
                                    label="Visibilidade"
                                    wire:model.live="formVisible"
                                    name="formVisible"
                                    :checked="$formVisible"
                                />
                                <x-forms.switch
                                    label="Ativo"
                                    wire:model.live="formEnabled"
                                    name="formEnabled"
                                    :checked="$formEnabled"
                                />
                            </div>
                        @endif
                    @endif

                    <div class="flex flex-wrap justify-end gap-2 border-t border-border pt-4">
                        <x-ui.button type="button" variant="outline" wire:click="cancelForm">
                            Cancelar
                        </x-ui.button>
                        @if ($this->formReady)
                            <x-ui.button type="submit" icon="bi-check-lg" wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="save">{{ $isCreating ? 'Criar' : 'Salvar' }}</span>
                                <span wire:loading wire:target="save">{{ $isCreating ? 'Criando…' : 'Salvando…' }}</span>
                            </x-ui.button>
                        @endif
                    </div>
                </form>
            </x-ui.card>
        @endif
    </div>
</div>
