@props([
    'animation' => 'glow',
    'size' => 'md',
    'width' => 'full',
    'color' => null,
    'rounded' => 'md',
    'tag' => 'span',
    'lines' => 1,
    'label' => 'Carregando…',
])

@aware([
    'animation' => 'glow',
    'size' => 'md',
    'color' => null,
    'rounded' => 'md',
    'withinGroup' => false,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($animation, ['glow', 'wave', 'none'], true)) {
        $animation = 'glow';
    }

    if (! in_array($size, ['xs', 'sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($rounded, ['none', 'sm', 'md', 'lg', 'full'], true)) {
        $rounded = 'md';
    }

    if (! in_array($tag, ['span', 'div', 'button', 'a'], true)) {
        $tag = 'span';
    }

    $lines = max(1, (int) $lines);
    $withinGroup = (bool) $withinGroup;

    $sizeClasses = match ($size) {
        'xs' => 'min-h-2',
        'sm' => 'min-h-2.5',
        'lg' => 'min-h-5',
        default => 'min-h-3.5',
    };

    $buttonSizeClasses = match ($size) {
        'xs' => 'h-7 min-h-7',
        'sm' => 'h-8 min-h-8',
        'lg' => 'h-11 min-h-11',
        default => 'h-9 min-h-9',
    };

    $widthClasses = match ((string) $width) {
        'full', '100', '12' => 'w-full',
        '3/4', '75', '9' => 'w-3/4',
        '2/3', '8' => 'w-2/3',
        '1/2', '50', '6' => 'w-1/2',
        '1/3', '4' => 'w-1/3',
        '1/4', '25', '3' => 'w-1/4',
        '1/5', '20' => 'w-1/5',
        'auto' => 'w-auto',
        default => 'w-full',
    };

    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $colorClasses = match ($color) {
        'primary' => 'ui-placeholder-solid bg-primary',
        'secondary' => 'ui-placeholder-solid bg-secondary',
        'success' => 'ui-placeholder-solid bg-success',
        'warning' => 'ui-placeholder-solid bg-warning',
        'danger' => 'ui-placeholder-solid bg-danger',
        'info' => 'ui-placeholder-solid bg-info',
        default => null,
    };

    $animationClasses = match ($animation) {
        'wave' => 'ui-placeholder-wave',
        'none' => null,
        default => 'ui-placeholder-glow',
    };

    $isButtonLike = in_array($tag, ['button', 'a'], true);

    $boneClasses = array_values(array_filter([
        'ui-placeholder',
        $isButtonLike ? $buttonSizeClasses : $sizeClasses,
        $widthClasses,
        $roundedClasses,
        $colorClasses,
        $animationClasses,
    ]));

    $lineWidths = ['full', '3/4', 'full', '1/2', '2/3', '3/4'];

    $lineWidthClasses = static function (string $key): string {
        return match ($key) {
            'full' => 'w-full',
            '3/4' => 'w-3/4',
            '2/3' => 'w-2/3',
            '1/2' => 'w-1/2',
            '1/3' => 'w-1/3',
            '1/4' => 'w-1/4',
            default => 'w-full',
        };
    };
@endphp

@if ($lines > 1)
    <div
        {{
            $attributes->class([
                'ui-placeholder-lines flex w-full flex-col gap-2',
            ])
        }}
        @if ($withinGroup)
            aria-hidden="true"
        @else
            role="status"
            aria-busy="true"
            aria-label="{{ $label }}"
        @endif
    >
        @unless ($withinGroup)
            <span class="sr-only">{{ $label }}</span>
        @endunless

        @for ($i = 0; $i < $lines; $i++)
            @php
                $isLast = $i === $lines - 1;
                $lineKey = $isLast ? '3/4' : $lineWidths[$i % count($lineWidths)];
            @endphp
            <span
                class="{{ implode(' ', array_filter([
                    'ui-placeholder',
                    $sizeClasses,
                    $lineWidthClasses($lineKey),
                    $roundedClasses,
                    $colorClasses,
                    $animationClasses,
                ])) }}"
                aria-hidden="true"
            ></span>
        @endfor
    </div>
@else
    <{{ $tag }}
        @if ($tag === 'button') type="button" disabled tabindex="-1" @endif
        @if ($tag === 'a') href="#" tabindex="-1" aria-disabled="true" @endif
        {{ $attributes->class($boneClasses) }}
        @if ($withinGroup)
            aria-hidden="true"
        @else
            role="status"
            aria-busy="true"
            aria-label="{{ $label }}"
        @endif
    >@if ($slot->isNotEmpty()){{ $slot }}@endif</{{ $tag }}>
@endif
