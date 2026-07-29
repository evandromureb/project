@props([
    'variant' => 'vertical',
    'columns' => 1,
    'gap' => 'md',
    'labelCols' => 3,
    'controlCols' => null,
    'labelAlign' => 'start',
    'size' => 'md',
    'breakpoint' => 'sm',
    'card' => false,
    'title' => null,
    'description' => null,
    'as' => 'div',
    'disabled' => false,
    'dense' => false,
    'divided' => false,
    'floating' => false,
    // 'auto' = esconde labels no variant inline; bool explícito sobrescreve.
    'hideLabels' => 'auto',
    'actionsAlign' => 'end',
])

@php
    // Props reexportadas para filhos via @aware:
    // variant, size, labelCols, controlCols, labelAlign, breakpoint, floating,
    // hideLabels, dense, divided, gap, columns, actionsAlign, disabled.
    $tokenVariants = ['vertical', 'horizontal', 'inline', 'grid'];
    $gaps = ['none', 'xs', 'sm', 'md', 'lg', 'xl'];
    $aligns = ['start', 'center', 'end'];
    $actionsAligns = ['start', 'center', 'end', 'between', 'stretch'];
    $breakpoints = ['sm', 'md', 'lg', 'xl'];
    $tags = ['div', 'form', 'fieldset', 'section'];

    if (! in_array($variant, $tokenVariants, true)) {
        $variant = 'vertical';
    }

    $columns = (int) $columns;

    if (! in_array($columns, [1, 2, 3, 4], true)) {
        $columns = 1;
    }

    if (is_int($gap) || (is_string($gap) && ctype_digit((string) $gap))) {
        $gapKey = (string) max(0, min(12, (int) $gap));
    } elseif (in_array($gap, $gaps, true)) {
        $gapKey = $gap;
    } else {
        $gapKey = 'md';
    }

    $labelCols = (int) $labelCols;

    if ($labelCols < 1 || $labelCols > 6) {
        $labelCols = 3;
    }

    if ($controlCols === null) {
        $controlCols = 12 - $labelCols;
    } else {
        $controlCols = (int) $controlCols;

        if ($controlCols < 1 || $controlCols > 11) {
            $controlCols = 12 - $labelCols;
        }
    }

    if (! in_array($labelAlign, $aligns, true)) {
        $labelAlign = 'start';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($breakpoint, $breakpoints, true)) {
        $breakpoint = 'sm';
    }

    if (! in_array($as, $tags, true)) {
        $as = 'div';
    }

    if (! in_array($actionsAlign, $actionsAligns, true)) {
        $actionsAlign = 'end';
    }

    // Não mutar hideLabels aqui: @aware dos filhos lê o valor original do stack
    // ('auto' | bool). O field resolve 'auto' → true quando variant=inline.
    $isDisabled = $disabled || $attributes->has('disabled');
    $gap = $gapKey;

    $gapClass = match ($gapKey) {
        'none', '0' => 'gap-0',
        'xs', '1' => 'gap-1',
        'sm', '2' => 'gap-2',
        '3' => 'gap-3',
        'md', '4' => $dense ? 'gap-3' : 'gap-4',
        '5' => 'gap-5',
        'lg', '6' => 'gap-6',
        '7' => 'gap-7',
        '8' => 'gap-8',
        'xl', '10' => 'gap-10',
        '9' => 'gap-9',
        '11' => 'gap-11',
        '12' => 'gap-12',
        default => $dense ? 'gap-3' : 'gap-4',
    };

    $bodyClass = match ($variant) {
        'inline' => 'flex flex-wrap items-end '.$gapClass,
        'grid' => match ($columns) {
            2 => 'grid grid-cols-1 md:grid-cols-2 '.$gapClass,
            3 => 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 '.$gapClass,
            4 => 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 '.$gapClass,
            default => 'grid grid-cols-1 '.$gapClass,
        },
        'horizontal' => 'flex flex-col '.$gapClass,
        default => 'flex flex-col '.$gapClass,
    };

    $hasHeader = filled($title) || filled($description) || isset($header);
    $hasFooter = isset($footer);
@endphp

<{{ $as }}
    data-form-layout
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    @if ($isDisabled) data-disabled="true" aria-disabled="true" @endif
    {{
        $attributes
            ->except(['disabled'])
            ->class([
                'form-layout w-full',
                'pointer-events-none opacity-60' => $isDisabled,
                'card overflow-hidden' => $card,
                'space-y-0' => $card,
            ])
    }}
    @if ($as === 'fieldset' && $isDisabled) disabled @endif
>
    @if ($hasHeader)
        <div @class([
            $card ? 'card-header flex flex-col items-start gap-1' : 'mb-4 flex flex-col gap-1',
        ])>
            @isset($header)
                {{ $header }}
            @else
                @if (filled($title))
                    <h5 @class([$card ? 'card-title mb-0' : 'text-base font-semibold text-foreground'])>
                        {{ $title }}
                    </h5>
                @endif
                @if (filled($description))
                    <p class="mb-0 text-sm text-muted-foreground">{{ $description }}</p>
                @endif
            @endisset
        </div>
    @endif

    <div @class([
        $card ? 'card-body' : null,
        $bodyClass,
        $divided && $variant !== 'inline' ? '[&>[data-form-layout-field]:not(:last-child)]:border-b [&>[data-form-layout-field]:not(:last-child)]:border-border [&>[data-form-layout-field]:not(:last-child)]:pb-4' : null,
        $divided && $variant !== 'inline' ? '[&>[data-form-layout-section]:not(:last-child)]:border-b [&>[data-form-layout-section]:not(:last-child)]:border-border [&>[data-form-layout-section]:not(:last-child)]:pb-4' : null,
    ])>
        {{ $slot }}
    </div>

    @if ($hasFooter)
        <div @class([
            $card ? 'card-footer' : 'mt-4',
        ])>
            {{ $footer }}
        </div>
    @endif
</{{ $as }}>
