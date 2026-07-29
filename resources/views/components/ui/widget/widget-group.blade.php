@props([
    'columns' => 3,
    'gap' => 'md',
])

@php
    $columns = (int) $columns;

    if ($columns < 1 || $columns > 6) {
        $columns = 3;
    }

    if (! in_array($gap, ['sm', 'md', 'lg'], true)) {
        $gap = 'md';
    }

    $gapClasses = match ($gap) {
        'sm' => 'gap-3',
        'lg' => 'gap-6',
        default => 'gap-4',
    };

    $columnClasses = match ($columns) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 sm:grid-cols-2',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
        5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-5',
        6 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6',
        default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    };
@endphp

<div
    {{
        $attributes->class([
            'ui-widget-group grid',
            $columnClasses,
            $gapClasses,
        ])
    }}
>
    {{ $slot }}
</div>
