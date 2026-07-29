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

    $badge = $menu->type === \App\Enums\MenuType::HIDDEN ? 'oculto' : null;
@endphp

<x-ui.treeview.treeview-item
    :name="$menu->key"
    :label="$menu->label ?? $menu->key"
    :icon="$icon"
    :badge="$badge"
>
    @foreach ($menu->children as $child)
        @include('settings.partials.menu-tree-item', ['menu' => $child])
    @endforeach
</x-ui.treeview.treeview-item>
