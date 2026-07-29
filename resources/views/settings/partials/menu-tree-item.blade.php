@php
    /** @var \App\Models\Menu $menu */
    $icon = $menu->icon;

    if (! filled($icon)) {
        $icon = match ($menu->type) {
            \App\Enums\MenuType::DROP => 'bi-folder',
            \App\Enums\MenuType::SEPARATOR => 'bi-dash',
            \App\Enums\MenuType::HIDDEN => 'bi-eye-slash',
            default => 'bi-file-earmark',
        };
    }

    $hasChildren = $menu->children->contains(
        fn (\App\Models\Menu $child): bool => in_array($child->type, [\App\Enums\MenuType::DROP_ITEM, \App\Enums\MenuType::DROP], true)
    );

    $canDelete = $menu->type !== \App\Enums\MenuType::DROP || ! $hasChildren;
    $isDrop = $menu->type === \App\Enums\MenuType::DROP;
@endphp

<x-ui.treeview.treeview-item
    :name="$menu->key"
    :label="$menu->label ?? $menu->key"
    :icon="$icon"
>
    <x-slot:end>
        <span class="text-xs text-muted-foreground">({{ $menu->type->value }})</span>

        <x-ui.badge size="sm" pill variant="soft" :color="$menu->visible ? 'success' : 'danger'">
            {{ $menu->visible ? 'visível' : 'oculto' }}
        </x-ui.badge>

        <x-ui.badge size="sm" pill variant="soft" :color="$menu->enabled ? 'success' : 'danger'">
            {{ $menu->enabled ? 'ativo' : 'inativo' }}
        </x-ui.badge>

        <span class="flex shrink-0 items-center gap-0.5">
            @if ($isDrop)
                <button
                    type="button"
                    class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                    wire:click.stop="createChildFor(@js($menu->key))"
                    title="Criar drop-item"
                    aria-label="Criar drop-item"
                >
                    <i class="bi bi-plus-lg text-sm leading-none" aria-hidden="true"></i>
                </button>
            @endif

            <button
                type="button"
                class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                wire:click.stop="edit(@js($menu->key))"
                title="Editar"
                aria-label="Editar"
            >
                <i class="bi bi-pencil text-sm leading-none" aria-hidden="true"></i>
            </button>

            @if ($canDelete)
                <button
                    type="button"
                    class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-danger/10 hover:text-danger"
                    wire:click.stop="deleteMenu(@js($menu->key))"
                    wire:confirm="Excluir este item do menu?"
                    title="Excluir"
                    aria-label="Excluir"
                >
                    <i class="bi bi-trash text-sm leading-none" aria-hidden="true"></i>
                </button>
            @endif
        </span>
    </x-slot:end>

    @foreach ($menu->children as $child)
        @include('settings.partials.menu-tree-item', ['menu' => $child])
    @endforeach
</x-ui.treeview.treeview-item>
