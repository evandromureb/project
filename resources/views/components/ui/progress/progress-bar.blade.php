@props([
    'value' => 0,
    'max' => 100,
    'color' => 'primary',
    'striped' => false,
    'animated' => false,
    'gradient' => false,
    'showLabel' => false,
    'label' => null,
    'size' => 'md',
])

@aware([
    'max' => 100,
    'color' => 'primary',
    'striped' => false,
    'animated' => false,
    'gradient' => false,
    'showLabel' => false,
    'size' => 'md',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['xs', 'sm', 'md', 'lg', 'xl'], true)) {
        $size = 'md';
    }

    $max = (float) $max;

    if ($max <= 0) {
        $max = 100;
    }

    $numericValue = max(0, min((float) $value, $max));
    $percent = round(($numericValue / $max) * 100, 2);
    $percentLabel = rtrim(rtrim(number_format($percent, 2, '.', ''), '0'), '.').'%';
    $displayLabel = $label ?? $percentLabel;
    $shouldShowLabel = $showLabel || filled($label) || $slot->isNotEmpty();

    $barColorClasses = match ($color) {
        'primary' => $gradient
            ? 'bg-gradient-to-r from-primary to-primary/70 text-primary-foreground'
            : 'bg-primary text-primary-foreground',
        'secondary' => $gradient
            ? 'bg-gradient-to-r from-secondary to-secondary/70 text-secondary-foreground'
            : 'bg-secondary text-secondary-foreground',
        'success' => $gradient
            ? 'bg-gradient-to-r from-success to-success/70 text-success-foreground'
            : 'bg-success text-success-foreground',
        'warning' => $gradient
            ? 'bg-gradient-to-r from-warning to-warning/70 text-warning-foreground'
            : 'bg-warning text-warning-foreground',
        'danger' => $gradient
            ? 'bg-gradient-to-r from-danger to-danger/70 text-danger-foreground'
            : 'bg-danger text-danger-foreground',
        'info' => $gradient
            ? 'bg-gradient-to-r from-info to-info/70 text-info-foreground'
            : 'bg-info text-info-foreground',
    };

    $labelSizeClasses = match ($size) {
        'xs', 'sm' => 'text-[9px]',
        'lg', 'xl' => 'text-xs',
        default => 'text-[10px]',
    };
@endphp

<div
    {{
        $attributes->class([
            'ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap',
            $barColorClasses,
            'ui-progress-bar-striped' => $striped || $animated,
            'ui-progress-bar-animated' => $animated,
            $labelSizeClasses => $shouldShowLabel,
        ])
    }}
    style="width: {{ $percent }}%"
    role="progressbar"
    aria-valuenow="{{ $numericValue }}"
    aria-valuemin="0"
    aria-valuemax="{{ $max }}"
    @if ($shouldShowLabel) aria-valuetext="{{ is_string($displayLabel) ? $displayLabel : $percentLabel }}" @endif
>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @elseif ($shouldShowLabel)
        <span class="px-1">{{ $displayLabel }}</span>
    @endif
</div>
