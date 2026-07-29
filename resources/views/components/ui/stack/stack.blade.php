@props([
    'direction' => 'vertical',
    'gap' => 'md',
    'align' => null,
    'justify' => 'start',
    'wrap' => false,
    'reverse' => false,
    'divide' => false,
    'divideColor' => null,
    'grow' => false,
    'inline' => false,
    'as' => 'div',
    'from' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];
    $directions = ['vertical', 'horizontal'];
    $aligns = ['start', 'center', 'end', 'stretch', 'baseline'];
    $justifies = ['start', 'center', 'end', 'between', 'around', 'evenly'];
    $gaps = ['none', 'xs', 'sm', 'md', 'lg', 'xl', '2xl'];
    $breakpoints = ['sm', 'md', 'lg', 'xl'];
    $tags = ['div', 'ul', 'ol', 'section', 'nav', 'article', 'aside', 'header', 'footer', 'form', 'fieldset'];

    if (! in_array($direction, $directions, true)) {
        $direction = 'vertical';
    }

    if ($align !== null && ! in_array($align, $aligns, true)) {
        $align = null;
    }

    // Defaults no estilo do design system: hstack centra no eixo cruzado; vstack estica.
    if ($align === null) {
        $align = $direction === 'horizontal' ? 'center' : 'stretch';
    }

    if (! in_array($justify, $justifies, true)) {
        $justify = 'start';
    }

    if ($from !== null && ! in_array($from, $breakpoints, true)) {
        $from = null;
    }

    if ($divideColor !== null && ! in_array($divideColor, $tokenColors, true)) {
        $divideColor = null;
    }

    if (! in_array($as, $tags, true)) {
        $as = 'div';
    }

    $divideStyle = false;

    if ($divide === true || $divide === 1 || $divide === 'true' || $divide === '1' || $divide === 'solid') {
        $divideStyle = 'solid';
    } elseif (in_array($divide, ['dashed', 'dotted'], true)) {
        $divideStyle = $divide;
    }

    // gap aceita tokens nomeados ou inteiros 0–12 (Tailwind spacing scale).
    if (is_int($gap) || (is_string($gap) && ctype_digit($gap))) {
        $gapKey = (string) max(0, min(12, (int) $gap));
    } elseif (in_array($gap, $gaps, true)) {
        $gapKey = $gap;
    } else {
        $gapKey = 'md';
    }

    $gapClasses = match ($gapKey) {
        'none', '0' => 'gap-0',
        'xs', '1' => 'gap-1',
        'sm', '2' => 'gap-2',
        '3' => 'gap-3',
        'md', '4' => 'gap-4',
        '5' => 'gap-5',
        'lg', '6' => 'gap-6',
        '7' => 'gap-7',
        '8' => 'gap-8',
        'xl', '10' => 'gap-10',
        '2xl', '12' => 'gap-12',
        '9' => 'gap-9',
        '11' => 'gap-11',
        default => 'gap-4',
    };

    $alignClasses = match ($align) {
        'start' => 'items-start',
        'center' => 'items-center',
        'end' => 'items-end',
        'baseline' => 'items-baseline',
        default => 'items-stretch',
    };

    $justifyClasses = match ($justify) {
        'center' => 'justify-center',
        'end' => 'justify-end',
        'between' => 'justify-between',
        'around' => 'justify-around',
        'evenly' => 'justify-evenly',
        default => 'justify-start',
    };

    // direction + from (responsive flip) — literais para o scanner do Tailwind.
    $directionClasses = match (true) {
        $direction === 'horizontal' && $from === 'sm' && $reverse => 'flex-row-reverse sm:flex-col-reverse',
        $direction === 'horizontal' && $from === 'md' && $reverse => 'flex-row-reverse md:flex-col-reverse',
        $direction === 'horizontal' && $from === 'lg' && $reverse => 'flex-row-reverse lg:flex-col-reverse',
        $direction === 'horizontal' && $from === 'xl' && $reverse => 'flex-row-reverse xl:flex-col-reverse',
        $direction === 'horizontal' && $from === 'sm' => 'flex-row sm:flex-col',
        $direction === 'horizontal' && $from === 'md' => 'flex-row md:flex-col',
        $direction === 'horizontal' && $from === 'lg' => 'flex-row lg:flex-col',
        $direction === 'horizontal' && $from === 'xl' => 'flex-row xl:flex-col',
        $direction === 'horizontal' && $reverse => 'flex-row-reverse',
        $direction === 'horizontal' => 'flex-row',

        $from === 'sm' && $reverse => 'flex-col-reverse sm:flex-row-reverse',
        $from === 'md' && $reverse => 'flex-col-reverse md:flex-row-reverse',
        $from === 'lg' && $reverse => 'flex-col-reverse lg:flex-row-reverse',
        $from === 'xl' && $reverse => 'flex-col-reverse xl:flex-row-reverse',
        $from === 'sm' => 'flex-col sm:flex-row',
        $from === 'md' => 'flex-col md:flex-row',
        $from === 'lg' => 'flex-col lg:flex-row',
        $from === 'xl' => 'flex-col xl:flex-row',
        $reverse => 'flex-col-reverse',
        default => 'flex-col',
    };

    // Em vertical, filhos ocupam a largura (estilo vstack). Em horizontal, só
    // a largura necessária — a menos que grow force flex-1 nos filhos.
    $childWidthClasses = match (true) {
        $grow => '[&>[data-stack-item]]:grow [&>:not([data-stack-spacer])]:grow',
        $direction === 'vertical' && $from === null => '[&>[data-stack-item]]:w-full',
        $direction === 'vertical' && $from === 'sm' => '[&>[data-stack-item]]:w-full sm:[&>[data-stack-item]]:w-auto',
        $direction === 'vertical' && $from === 'md' => '[&>[data-stack-item]]:w-full md:[&>[data-stack-item]]:w-auto',
        $direction === 'vertical' && $from === 'lg' => '[&>[data-stack-item]]:w-full lg:[&>[data-stack-item]]:w-auto',
        $direction === 'vertical' && $from === 'xl' => '[&>[data-stack-item]]:w-full xl:[&>[data-stack-item]]:w-auto',
        default => '',
    };

    $divideAxisClasses = match (true) {
        ! $divideStyle => '',
        $direction === 'horizontal' && $from === null => 'divide-x',
        $direction === 'horizontal' && $from === 'sm' => 'divide-x sm:divide-x-0 sm:divide-y',
        $direction === 'horizontal' && $from === 'md' => 'divide-x md:divide-x-0 md:divide-y',
        $direction === 'horizontal' && $from === 'lg' => 'divide-x lg:divide-x-0 lg:divide-y',
        $direction === 'horizontal' && $from === 'xl' => 'divide-x xl:divide-x-0 xl:divide-y',
        $from === 'sm' => 'divide-y sm:divide-y-0 sm:divide-x',
        $from === 'md' => 'divide-y md:divide-y-0 md:divide-x',
        $from === 'lg' => 'divide-y lg:divide-y-0 lg:divide-x',
        $from === 'xl' => 'divide-y xl:divide-y-0 xl:divide-x',
        default => 'divide-y',
    };

    $divideStyleClasses = match ($divideStyle) {
        'dashed' => 'divide-dashed',
        'dotted' => 'divide-dotted',
        'solid' => 'divide-solid',
        default => '',
    };

    $divideColorClasses = match ($divideColor) {
        'primary' => 'divide-primary/30',
        'secondary' => 'divide-secondary/30',
        'success' => 'divide-success/30',
        'warning' => 'divide-warning/30',
        'danger' => 'divide-danger/30',
        'info' => 'divide-info/30',
        default => $divideStyle ? 'divide-border' : '',
    };

    // Eixo efetivo para @aware nos filhos (push/spacer). Com `from`, o eixo
    // "principal" no desktop muda — filhos usam o eixo base (mobile-first).
    $axis = $direction === 'horizontal' ? 'horizontal' : 'vertical';
@endphp

<{{ $as }}
    data-stack
    data-direction="{{ $direction }}"
    data-axis="{{ $axis }}"
    @if ($from) data-from="{{ $from }}" @endif
    {{
        $attributes->class([
            'ui-stack',
            $inline ? 'inline-flex' : 'flex',
            'self-stretch',
            $directionClasses,
            $gapClasses,
            $alignClasses,
            $justifyClasses,
            $childWidthClasses,
            $divideAxisClasses,
            $divideStyleClasses,
            $divideColorClasses,
            'flex-wrap' => $wrap,
            'flex-nowrap' => ! $wrap,
        ])
    }}
>
    {{ $slot }}
</{{ $as }}>
