@props([
    'name' => null,
    'color' => 'secondary',
    'variant' => 'outline',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'start',
    'indicator' => false,
])

@php
    // "name" aceita string (um painel) ou array (um gatilho controlando
    // vários painéis ao mesmo tempo). O indicador (seta) sempre reflete o
    // primeiro nome da lista.
    $names = is_array($name) ? array_values($name) : [$name];
    $primary = $names[0] ?? null;
    $ariaControls = collect($names)
        ->filter()
        ->map(fn (string $target): string => 'collapse-'.$target)
        ->implode(' ');
@endphp

<x-ui.button
    type="button"
    :color="$color"
    :variant="$variant"
    :size="$size"
    :icon="$icon"
    :iconPosition="$iconPosition"
    aria-controls="{{ $ariaControls }}"
    @click="$store.collapse.toggleMany({{ \Illuminate\Support\Js::from($names) }})"
    x-bind:aria-expanded="$store.collapse.isOpen('{{ $primary }}') ? 'true' : 'false'"
    class="{{ $indicator ? '[&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2' : '' }}"
>
    {{ $slot }}

    @if ($indicator)
        <i
            class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200"
            x-bind:class="$store.collapse.isOpen('{{ $primary }}') ? 'rotate-180' : ''"
            aria-hidden="true"
        ></i>
    @endif
</x-ui.button>
