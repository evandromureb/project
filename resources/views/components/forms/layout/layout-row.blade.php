@props([
    'columns' => 2,
    'gap' => null,
    'align' => 'start',
])

@aware([
    'gap' => 'md',
    'dense' => false,
    'breakpoint' => 'sm',
])

@php
    $columns = (int) $columns;

    if (! in_array($columns, [1, 2, 3, 4, 5, 6], true)) {
        $columns = 2;
    }

    $gapKey = $gap ?? 'md';

    if (is_int($gapKey) || (is_string($gapKey) && ctype_digit((string) $gapKey))) {
        $gapKey = (string) max(0, min(12, (int) $gapKey));
    }

    $gapClass = match ((string) $gapKey) {
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

    $alignClass = match ($align) {
        'center' => 'items-center',
        'end' => 'items-end',
        'stretch' => 'items-stretch',
        'baseline' => 'items-baseline',
        default => 'items-start',
    };

    $gridClass = match ($columns) {
        1 => 'grid grid-cols-1',
        3 => 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3',
        4 => 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4',
        5 => 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5',
        6 => 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6',
        default => 'grid grid-cols-1 md:grid-cols-2',
    };
@endphp

<div
    data-form-layout-row
    {{
        $attributes->class([
            'form-layout-row w-full min-w-0',
            $gridClass,
            $gapClass,
            $alignClass,
            'col-span-full',
        ])
    }}
>
    {{ $slot }}
</div>
