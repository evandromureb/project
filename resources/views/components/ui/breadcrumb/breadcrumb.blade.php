@props([
    'separator' => 'bi-chevron-right',
    'size' => 'md',
    'color' => 'primary',
    'variant' => 'plain',
    'label' => 'breadcrumb',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['plain', 'soft', 'pills'], true)) {
        $variant = 'plain';
    }

    $sizeClasses = match ($size) {
        'sm' => 'text-xs gap-1',
        'lg' => 'text-base gap-2',
        default => 'text-sm gap-1.5',
    };

    $shellClasses = match ($variant) {
        'soft' => 'rounded-lg border border-border/60 bg-muted/40 px-3 py-2',
        'pills' => 'rounded-lg',
        default => '',
    };
@endphp

<nav aria-label="{{ $label }}" {{ $attributes->class(['w-full', $shellClasses]) }}>
    <ol class="flex flex-wrap items-center {{ $sizeClasses }}">
        {{ $slot }}
    </ol>
</nav>
