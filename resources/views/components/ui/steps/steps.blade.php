@props([
    'orientation' => 'horizontal',
    'labelPlacement' => 'bottom',
    'color' => 'primary',
    'size' => 'md',
    'lineStyle' => 'solid',
    'markerStyle' => 'solid',
    'numbered' => true,
    'clickable' => false,
    'card' => false,
    'compact' => false,
    'label' => 'Progresso',
])

@php
    // "color", "size", "lineStyle", "markerStyle", "numbered", "clickable",
    // "orientation", "labelPlacement", "card" e "compact" também viram
    // consumíveis por <x-ui.steps.step-item> via @aware — o consumidor não precisa
    // repeti-los em cada item.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($orientation, ['horizontal', 'vertical'], true)) {
        $orientation = 'horizontal';
    }

    // "right" só faz sentido em horizontal — em vertical o texto já fica à
    // direita do marcador, então rebaixa para "bottom" (sem efeito visual).
    if (! in_array($labelPlacement, ['bottom', 'right'], true)) {
        $labelPlacement = 'bottom';
    }

    if ($orientation === 'vertical') {
        $labelPlacement = 'bottom';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($lineStyle, ['solid', 'dashed', 'dotted'], true)) {
        $lineStyle = 'solid';
    }

    if (! in_array($markerStyle, ['solid', 'soft', 'outline', 'dot'], true)) {
        $markerStyle = 'solid';
    }

    $containerClasses = $orientation === 'horizontal'
        ? 'flex w-full items-start overflow-x-auto pb-1'
        : 'flex w-full flex-col';
@endphp

<ol
    aria-label="{{ $label }}"
    data-orientation="{{ $orientation }}"
    data-label-placement="{{ $labelPlacement }}"
    data-marker-style="{{ $markerStyle }}"
    {{
        $attributes->class([
            $containerClasses,
            'ui-steps-numbered' => $numbered,
        ])
    }}
>
    {{ $slot }}
</ol>
