@props([
    'cols' => 1,
    'gap' => 'md',
    'divided' => false,
])

@php
    $cols = (int) $cols;

    if (! in_array($cols, [1, 2, 3, 4], true)) {
        $cols = 1;
    }

    if (! in_array($gap, ['sm', 'md', 'lg'], true)) {
        $gap = 'md';
    }

    $gapClasses = match ($gap) {
        'sm' => 'gap-3',
        'lg' => 'gap-8',
        default => 'gap-6',
    };

    $gridClasses = match ($cols) {
        2 => 'grid grid-cols-1 sm:grid-cols-2',
        3 => 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3',
        4 => 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4',
        default => 'flex flex-col',
    };

    // Empilhado (1 col): divide-y; em grid, bordas por item ficam por conta do variant do media.
    $dividedClasses = ($divided && $cols === 1)
        ? 'divide-y divide-border [&>*]:py-4 first:[&>*]:pt-0 last:[&>*]:pb-0'
        : null;
@endphp

<div
    data-cols="{{ $cols }}"
    {{
        $attributes->class([
            'w-full',
            $gridClasses,
            $gapClasses,
            $dividedClasses,
        ])
    }}
>
    {{ $slot }}
</div>
