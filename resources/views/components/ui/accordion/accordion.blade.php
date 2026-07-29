@props([
    'default' => null,
    'multiple' => false,
    'flush' => false,
    'bordered' => false,
    'filled' => false,
    'color' => 'primary',
    'indicator' => 'chevron',
    'indicatorPosition' => 'end',
])

@php
    // "color", "indicator", "indicatorPosition", "bordered" e "filled" também
    // viram consumíveis por <x-ui.accordion.accordion-item> via @aware — o consumidor
    // não precisa repeti-los em cada item.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    $defaultOpen = $multiple
        ? (is_array($default) ? $default : array_filter([$default]))
        : (is_array($default) ? ($default[0] ?? null) : $default);

    $containerClasses = match (true) {
        $bordered => 'flex flex-col gap-2',
        $flush => 'divide-y divide-border',
        default => 'divide-y divide-border rounded-md border border-border',
    };
@endphp

<div
    x-data="accordion(@js($defaultOpen), @js($multiple))"
    x-ref="container"
    @keydown.down.prevent="focusHeader(1)"
    @keydown.up.prevent="focusHeader(-1)"
    @keydown.home.prevent="focusFirst()"
    @keydown.end.prevent="focusLast()"
    {{ $attributes->class($containerClasses) }}
>
    {{ $slot }}
</div>
