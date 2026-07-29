@props([
    'orientation' => 'vertical',
    'variant' => 'line',
    'color' => 'primary',
    'size' => 'md',
    'lineStyle' => 'solid',
    'markerStyle' => 'soft',
    'card' => false,
    'compact' => false,
    'numbered' => false,
])

@php
    // "color", "size", "lineStyle", "markerStyle", "card", "compact" e "numbered"
    // também viram consumíveis por <x-ui.timeline.timeline-item> via @aware — o consumidor
    // não precisa repeti-los em cada item.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($orientation, ['vertical', 'horizontal'], true)) {
        $orientation = 'vertical';
    }

    if (! in_array($variant, ['line', 'alternate', 'gutter'], true)) {
        $variant = 'line';
    }

    // "alternate" (zigue-zague esquerda/direita) e "gutter" (coluna de datas)
    // só fazem sentido para a orientação vertical — em horizontal degradam
    // para "line".
    if ($orientation === 'horizontal' && $variant !== 'line') {
        $variant = 'line';
    }

    if (! in_array($lineStyle, ['solid', 'dashed', 'dotted'], true)) {
        $lineStyle = 'solid';
    }

    if (! in_array($markerStyle, ['soft', 'solid', 'outline', 'dot'], true)) {
        $markerStyle = 'soft';
    }

    $containerClasses = $orientation === 'horizontal'
        ? 'flex w-full items-start overflow-x-auto pb-1'
        : 'flex w-full flex-col';
@endphp

<ul
    data-orientation="{{ $orientation }}"
    data-variant="{{ $variant }}"
    data-marker-style="{{ $markerStyle }}"
    {{
        $attributes->class([
            $containerClasses,
            'ui-timeline-numbered' => $numbered,
        ])
    }}
>
    {{ $slot }}
</ul>
