@props([
    'variant' => 'ring',
    'size' => 'md',
    'color' => 'primary',
    'speed' => 'normal',
    'thickness' => null,
    'label' => 'Carregando…',
    'labelPosition' => 'sr-only',
    'overlay' => false,
])

@php
    $variants = [
        'ring',
        'ring-2',
        'tailspin',
        'line',
        'dots',
        'dot-pulse',
        'dot-wave',
        'bars',
        'bounce',
        'orbit',
        'grid',
        'pulse',
        'ripples',
        'hourglass',
        'zoomies',
        'mirage',
        'square',
        'hatch',
    ];

    if (! in_array($variant, $variants, true)) {
        $variant = 'ring';
    }

    if (! in_array($size, ['xs', 'sm', 'md', 'lg', 'xl'], true)) {
        $size = 'md';
    }

    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'muted', 'current', 'foreground'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($speed, ['slow', 'normal', 'fast'], true)) {
        $speed = 'normal';
    }

    if (! in_array($labelPosition, ['sr-only', 'bottom', 'end', 'none'], true)) {
        $labelPosition = 'sr-only';
    }

    $sizePx = match ($size) {
        'xs' => 16,
        'sm' => 20,
        'lg' => 48,
        'xl' => 64,
        default => 32,
    };

    $speedSec = match ($speed) {
        'slow' => '1.8s',
        'fast' => '0.7s',
        default => '1.2s',
    };

    $defaultThickness = match ($size) {
        'xs' => 2,
        'sm' => 2.5,
        'lg' => 4,
        'xl' => 5,
        default => 3.5,
    };

    $stroke = $thickness !== null ? (float) $thickness : $defaultThickness;

    $colorValue = match ($color) {
        'primary' => 'var(--primary)',
        'secondary' => 'var(--secondary)',
        'success' => 'var(--success)',
        'warning' => 'var(--warning)',
        'danger' => 'var(--danger)',
        'info' => 'var(--info)',
        'muted' => 'var(--muted-foreground)',
        'foreground' => 'var(--foreground)',
        default => 'currentColor',
    };

    $labelColorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        'muted' => 'text-muted-foreground',
        'foreground' => 'text-foreground',
        default => 'text-current',
    };

    $showLabel = $labelPosition !== 'none' && filled($label);
    $isInlineLabel = in_array($labelPosition, ['bottom', 'end'], true);

    $style = implode('; ', [
        '--ui-spinner-size: '.$sizePx.'px',
        '--ui-spinner-color: '.$colorValue,
        '--ui-spinner-speed: '.$speedSec,
        '--ui-spinner-stroke: '.$stroke.'px',
    ]);

    $dotCount = match ($variant) {
        'dots' => 8,
        'orbit' => 1,
        'dot-pulse', 'bounce' => 3,
        'dot-wave' => 5,
        'bars' => 4,
        'grid' => 9,
        'mirage' => 3,
        'line' => 12,
        'ripples' => 3,
        default => 0,
    };
@endphp

@if ($overlay)
    <div
        {{ $attributes->class(['ui-spinner-overlay fixed inset-0 z-50 flex items-center justify-center bg-background/70 backdrop-blur-[1px]']) }}
        role="status"
        aria-live="polite"
        aria-busy="true"
    >
@endif

<div
    @if (! $overlay)
        {{ $attributes->class([
            'ui-spinner inline-flex',
            'flex-col items-center gap-2' => $labelPosition === 'bottom',
            'flex-row items-center gap-2.5' => $labelPosition === 'end',
            'items-center' => $labelPosition !== 'bottom' && $labelPosition !== 'end',
        ]) }}
        role="status"
        aria-live="polite"
        aria-busy="true"
    @else
        class="ui-spinner inline-flex {{ $labelPosition === 'bottom' ? 'flex-col items-center gap-2' : ($labelPosition === 'end' ? 'flex-row items-center gap-2.5' : 'items-center') }}"
    @endif
    style="{{ $style }}"
>
    <span class="ui-spinner-visual ui-spinner-{{ $variant }}" aria-hidden="true">
        @if ($variant === 'ring')
            <svg class="ui-spinner-ring-svg" viewBox="0 0 50 50">
                <circle class="ui-spinner-ring-track" cx="25" cy="25" r="20" fill="none" />
                <circle class="ui-spinner-ring-car" cx="25" cy="25" r="20" fill="none" />
            </svg>
        @elseif ($variant === 'ring-2')
            <span class="ui-spinner-ring2-outer"></span>
            <span class="ui-spinner-ring2-inner"></span>
        @elseif ($variant === 'tailspin')
            <span class="ui-spinner-tailspin-disc"></span>
        @elseif ($variant === 'square')
            <span class="ui-spinner-square-shape"></span>
        @elseif ($variant === 'hourglass')
            <span class="ui-spinner-hourglass-shape"></span>
        @elseif ($variant === 'zoomies')
            <span class="ui-spinner-zoomies-track">
                <span class="ui-spinner-zoomies-bar"></span>
            </span>
        @elseif ($variant === 'hatch')
            <span class="ui-spinner-hatch-box"></span>
        @elseif ($variant === 'pulse')
            <span class="ui-spinner-pulse-core"></span>
            <span class="ui-spinner-pulse-ring"></span>
        @elseif (in_array($variant, ['dots', 'orbit', 'dot-pulse', 'dot-wave', 'bars', 'bounce', 'grid', 'mirage', 'line', 'ripples'], true))
            @for ($i = 0; $i < $dotCount; $i++)
                <span class="ui-spinner-part" style="--i: {{ $i }}"></span>
            @endfor
        @endif
    </span>

    @if ($showLabel)
        <span @class([
            'sr-only' => $labelPosition === 'sr-only',
            'text-sm font-medium '.$labelColorClasses => $isInlineLabel,
        ])>
            {{ $label }}
        </span>
    @endif
</div>

@if ($overlay)
    </div>
@endif
