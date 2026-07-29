@props([
    'active' => false,
    'selected' => false,
    'disabled' => false,
    'color' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    $colorClasses = match ($color) {
        'primary' => 'bg-primary/10 text-primary [&_[data-table-cell]]:text-primary',
        'secondary' => 'bg-secondary/10 text-secondary [&_[data-table-cell]]:text-secondary',
        'success' => 'bg-success/10 text-success [&_[data-table-cell]]:text-success',
        'warning' => 'bg-warning/10 text-warning [&_[data-table-cell]]:text-warning',
        'danger' => 'bg-danger/10 text-danger [&_[data-table-cell]]:text-danger',
        'info' => 'bg-info/10 text-info [&_[data-table-cell]]:text-info',
        default => '',
    };

    $activeClasses = ($active || $selected)
        ? 'bg-primary/10 [&_[data-table-cell]]:relative'
        : '';

    $disabledClasses = $disabled
        ? 'pointer-events-none opacity-50'
        : '';
@endphp

<tr
    data-table-row
    @if ($active || $selected) aria-selected="true" data-active="true" @endif
    @if ($disabled) aria-disabled="true" data-disabled="true" @endif
    @if ($color) data-color="{{ $color }}" @endif
    {{
        $attributes->class([
            'ui-table-row border-b border-border transition-colors',
            $colorClasses,
            $activeClasses,
            $disabledClasses,
        ])
    }}
>
    {{ $slot }}
</tr>
