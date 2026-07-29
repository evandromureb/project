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
    // "closes" fecha outro(s) modal(is) ao abrir este — útil para encadear
    // modais (ex.: fechar o modal A e abrir o modal B a partir de um botão
    // dentro do A).
    $closesNames = $closes ? (is_array($closes) ? $closes : [$closes]) : [];

    $clickExpr = match ($action) {
        'open' => "\$store.modal.show('{$name}')",
        'close' => "\$store.modal.hide('{$name}')",
        default => "\$store.modal.toggle('{$name}')",
    };

    if ($closesNames) {
        $clickExpr .= '; $store.modal.hideMany(' . \Illuminate\Support\Js::from($closesNames) . ')';
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
