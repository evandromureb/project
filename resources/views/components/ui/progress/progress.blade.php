@props([
    'value' => 0,
    'max' => 100,
    'color' => 'primary',
    'size' => 'md',
    'type' => 'bar',
    'striped' => false,
    'animated' => false,
    'gradient' => false,
    'indeterminate' => false,
    'grow' => false,
    'showLabel' => false,
    'label' => null,
    'labelPosition' => 'inside',
    'soft' => false,
    'rounded' => 'full',
    'segments' => null,
    'title' => null,
    'meta' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['xs', 'sm', 'md', 'lg', 'xl'], true)) {
        $size = 'md';
    }

    if (! in_array($type, ['bar', 'circle'], true)) {
        $type = 'bar';
    }

    if (! in_array($labelPosition, ['inside', 'outside', 'end'], true)) {
        $labelPosition = 'inside';
    }

    if (! in_array($rounded, ['none', 'sm', 'md', 'full'], true)) {
        $rounded = 'full';
    }

    $max = (float) $max;

    if ($max <= 0) {
        $max = 100;
    }

    $numericValue = max(0, min((float) $value, $max));
    $percent = round(($numericValue / $max) * 100, 2);
    $percentLabel = rtrim(rtrim(number_format($percent, 2, '.', ''), '0'), '.').'%';
    $displayLabel = $label ?? $percentLabel;

    $hasSlotBars = $slot->isNotEmpty();
    $hasSegments = is_array($segments) && count($segments) > 0;
    $isStacked = $hasSlotBars || $hasSegments;
    $showInsideLabel = ($showLabel || filled($label)) && $labelPosition === 'inside' && ! $indeterminate && ! $isStacked;
    $showEndLabel = ($showLabel || filled($label)) && $labelPosition === 'end' && ! $indeterminate;
    $showOutsideLabel = ($showLabel || filled($label)) && $labelPosition === 'outside' && ! $indeterminate;
    $hasHeader = filled($title) || filled($meta);

    $trackHeightClasses = match ($size) {
        'xs' => 'h-1',
        'sm' => 'h-1.5',
        'lg' => 'h-4',
        'xl' => 'h-5',
        default => 'h-2.5',
    };

    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        default => 'rounded-full',
    };

    $trackColorClasses = match (true) {
        $soft && $color === 'primary' => 'bg-primary/15',
        $soft && $color === 'secondary' => 'bg-secondary/15',
        $soft && $color === 'success' => 'bg-success/15',
        $soft && $color === 'warning' => 'bg-warning/15',
        $soft && $color === 'danger' => 'bg-danger/15',
        $soft && $color === 'info' => 'bg-info/15',
        default => 'bg-muted',
    };

    $circleSizeClasses = match ($size) {
        'xs' => 'size-12',
        'sm' => 'size-16',
        'lg' => 'size-28',
        'xl' => 'size-36',
        default => 'size-24',
    };

    $circleStroke = match ($size) {
        'xs' => 6,
        'sm' => 7,
        'lg' => 10,
        'xl' => 12,
        default => 8,
    };

    $circleTextClasses = match ($size) {
        'xs' => 'text-[10px]',
        'sm' => 'text-xs',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        default => 'text-sm',
    };

    $circleStrokeClasses = match ($color) {
        'primary' => 'stroke-primary',
        'secondary' => 'stroke-secondary',
        'success' => 'stroke-success',
        'warning' => 'stroke-warning',
        'danger' => 'stroke-danger',
        'info' => 'stroke-info',
    };

    $labelColorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
    };

    $radius = (100 - $circleStroke) / 2;
    $circumference = 2 * M_PI * $radius;
    $dashOffset = $circumference - (($percent / 100) * $circumference);
@endphp

@if ($type === 'circle')
    <div
        {{
            $attributes->class([
                'ui-progress relative inline-flex items-center justify-center',
                $circleSizeClasses,
            ])
        }}
        role="progressbar"
        @if (! $indeterminate) aria-valuenow="{{ $numericValue }}" @endif
        aria-valuemin="0"
        aria-valuemax="{{ $max }}"
        @if ($indeterminate) aria-busy="true" @endif
        aria-label="{{ $title ?? (is_string($displayLabel) ? $displayLabel : 'Progresso') }}"
    >
        <svg class="size-full -rotate-90" viewBox="0 0 100 100" aria-hidden="true">
            <circle
                class="ui-progress-circle-track fill-none"
                cx="50"
                cy="50"
                r="{{ $radius }}"
                stroke-width="{{ $circleStroke }}"
            />
            <circle
                @class([
                    'fill-none',
                    $circleStrokeClasses,
                    'transition-[stroke-dashoffset] duration-500' => $grow && ! $indeterminate,
                    'origin-center animate-spin' => $indeterminate,
                ])
                cx="50"
                cy="50"
                r="{{ $radius }}"
                stroke-width="{{ $circleStroke }}"
                stroke-linecap="round"
                stroke-dasharray="{{ $circumference }}"
                stroke-dashoffset="{{ $indeterminate ? $circumference * 0.75 : $dashOffset }}"
            />
        </svg>

        @if ($showLabel || filled($label))
            <span @class([
                'absolute inset-0 flex items-center justify-center font-semibold',
                $circleTextClasses,
                $labelColorClasses,
            ])>
                {{ $indeterminate ? '…' : $displayLabel }}
            </span>
        @endif
    </div>
@else
    <div {{ $attributes->class(['ui-progress w-full']) }}>
        @if ($hasHeader)
            <div class="mb-2 flex items-center justify-between gap-3">
                <p class="mb-0 text-sm font-medium text-foreground">
                    @if ($showLabel || filled($label))
                        <span class="font-semibold {{ $labelColorClasses }}">{{ $displayLabel }}</span>
                    @endif
                    {{ $title }}
                </p>

                @if (filled($meta))
                    <p class="mb-0 shrink-0 text-sm text-muted-foreground">{{ $meta }}</p>
                @endif
            </div>
        @elseif ($showOutsideLabel)
            <div class="mb-1.5 flex items-center justify-between gap-3">
                <span class="text-sm font-medium {{ $labelColorClasses }}">{{ $displayLabel }}</span>
            </div>
        @endif

        <div @class([
            'flex w-full items-center gap-3' => $showEndLabel && ! $hasHeader,
        ])>
            <div
                @class([
                    'relative w-full overflow-hidden',
                    $trackHeightClasses,
                    $roundedClasses,
                    $trackColorClasses,
                    'ui-progress-grow' => $grow && ! $indeterminate,
                    'ui-progress-indeterminate' => $indeterminate,
                    'flex' => $isStacked,
                ])
                @if ($indeterminate)
                    role="progressbar"
                    aria-busy="true"
                    aria-valuemin="0"
                    aria-valuemax="{{ $max }}"
                    aria-label="{{ $title ?? 'Carregando' }}"
                @elseif ($isStacked)
                    role="group"
                    aria-label="{{ $title ?? 'Progresso' }}"
                @endif
            >
                @if ($hasSlotBars)
                    {{ $slot }}
                @elseif ($hasSegments)
                    @foreach ($segments as $segment)
                        <x-ui.progress.progress-bar
                            :value="$segment['value'] ?? 0"
                            :max="$max"
                            :color="$segment['color'] ?? $color"
                            :size="$size"
                            :label="$segment['label'] ?? null"
                            :show-label="$segment['showLabel'] ?? false"
                            :striped="$segment['striped'] ?? $striped"
                            :animated="$segment['animated'] ?? $animated"
                            :gradient="$segment['gradient'] ?? $gradient"
                        />
                    @endforeach
                @elseif ($indeterminate)
                    <div class="ui-progress-bar h-full {{ match ($color) {
                        'primary' => 'bg-primary',
                        'secondary' => 'bg-secondary',
                        'success' => 'bg-success',
                        'warning' => 'bg-warning',
                        'danger' => 'bg-danger',
                        'info' => 'bg-info',
                    } }} {{ $striped || $animated ? 'ui-progress-bar-striped' : '' }} {{ $animated ? 'ui-progress-bar-animated' : '' }}" aria-hidden="true"></div>
                @else
                    <x-ui.progress.progress-bar
                        :value="$numericValue"
                        :max="$max"
                        :color="$color"
                        :size="$size"
                        :striped="$striped"
                        :animated="$animated"
                        :gradient="$gradient"
                        :show-label="$showInsideLabel"
                        :label="$showInsideLabel ? $displayLabel : null"
                    />
                @endif
            </div>

            @if ($showEndLabel && ! $hasHeader)
                <span class="shrink-0 text-sm font-medium tabular-nums {{ $labelColorClasses }}">{{ $displayLabel }}</span>
            @endif
        </div>
    </div>
@endif
