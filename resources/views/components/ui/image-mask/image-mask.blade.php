@props([
    'src' => null,
    'alt' => null,
    'shape' => 'circle',
    'size' => 'md',
    'half' => null,
    'color' => null,
    'fit' => 'cover',
    'href' => null,
    'loading' => 'lazy',
])

@php
    $shapes = [
        'squircle',
        'heart',
        'hexagon',
        'hexagon-2',
        'decagon',
        'pentagon',
        'diamond',
        'square',
        'circle',
        'star',
        'star-2',
        'triangle',
        'triangle-2',
        'triangle-3',
        'triangle-4',
    ];

    if (! in_array($shape, $shapes, true)) {
        $shape = 'circle';
    }

    $half = match ((string) ($half ?? '')) {
        '1', 'half-1', 'start', 'left' => '1',
        '2', 'half-2', 'end', 'right' => '2',
        default => null,
    };

    if (! in_array($size, ['xs', 'sm', 'md', 'lg', 'xl', '2xl'], true)) {
        $size = 'md';
    }

    if (! in_array($fit, ['cover', 'contain', 'fill', 'none', 'scale-down'], true)) {
        $fit = 'cover';
    }

    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'muted'];

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    $sizeClasses = match ($size) {
        'xs' => 'size-10',
        'sm' => 'size-14',
        'lg' => 'size-24',
        'xl' => 'size-32',
        '2xl' => 'size-40',
        default => 'size-20',
    };

    $fitClasses = match ($fit) {
        'contain' => 'object-contain',
        'fill' => 'object-fill',
        'none' => 'object-none',
        'scale-down' => 'object-scale-down',
        default => 'object-cover',
    };

    $colorClasses = match ($color) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
        'muted' => 'bg-muted',
        default => null,
    };

    $halfClasses = match ($half) {
        '1' => 'ui-image-mask-half-1',
        '2' => 'ui-image-mask-half-2',
        default => null,
    };

    $isImage = filled($src);

    $classes = array_values(array_filter([
        'ui-image-mask',
        'ui-image-mask-'.$shape,
        $halfClasses,
        $sizeClasses,
        $isImage ? $fitClasses : null,
        (! $isImage && $colorClasses) ? $colorClasses : null,
    ]));
@endphp

@if ($href)
    <a href="{{ $href }}" class="inline-block">
@endif

@if ($isImage)
    <img
        src="{{ $src }}"
        alt="{{ $alt ?? '' }}"
        loading="{{ $loading }}"
        {{ $attributes->class($classes) }}
    >
@else
    <div {{ $attributes->class($classes) }}>
        {{ $slot }}
    </div>
@endif

@if ($href)
    </a>
@endif
