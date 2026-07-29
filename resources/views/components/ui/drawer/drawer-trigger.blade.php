@props([
    'name' => null,
    'action' => 'toggle',
    'closes' => null,
    'color' => 'primary',
    'variant' => 'solid',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'start',
])

@php
    // "closes" fecha outro(s) drawer(s) ao abrir este — mesmo mecanismo de
    // <x-ui.modal.modal-trigger>, útil para trocar de painel (ex.: filtro -> carrinho).
    $closesNames = $closes ? (is_array($closes) ? $closes : [$closes]) : [];

    $clickExpr = match ($action) {
        'open' => "\$store.drawer.show('{$name}')",
        'close' => "\$store.drawer.hide('{$name}')",
        default => "\$store.drawer.toggle('{$name}')",
    };

    if ($closesNames) {
        $clickExpr .= '; $store.drawer.hideMany(' . \Illuminate\Support\Js::from($closesNames) . ')';
    }
@endphp

<x-ui.button
    type="button"
    :color="$color"
    :variant="$variant"
    :size="$size"
    :icon="$icon"
    :iconPosition="$iconPosition"
    @click="{{ $clickExpr }}"
>
    {{ $slot }}
</x-ui.button>
