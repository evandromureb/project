@props([
    'orientation' => 'horizontal',
    'variant' => 'solid',
    'color' => null,
    'size' => 'md',
    'spacing' => 'md',
    'label' => null,
    'labelPosition' => 'center',
    'labelVariant' => 'plain',
    'icon' => null,
    'decorative' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($orientation, ['horizontal', 'vertical'], true)) {
        $orientation = 'horizontal';
    }

    if (! in_array($variant, ['solid', 'dashed', 'dotted', 'double', 'gradient'], true)) {
        $variant = 'solid';
    }

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($spacing, ['none', 'sm', 'md', 'lg'], true)) {
        $spacing = 'md';
    }

    if (! in_array($labelPosition, ['start', 'center', 'end'], true)) {
        $labelPosition = 'center';
    }

    if (! in_array($labelVariant, ['plain', 'soft', 'outline', 'solid'], true)) {
        $labelVariant = 'plain';
    }

    $hasSlot = $slot->isNotEmpty();
    $hasLabel = filled($label) || filled($icon) || $hasSlot;
    $isHorizontal = $orientation === 'horizontal';

    // Sem conteúdo = puramente decorativo; com label/ícone/slot = semântico por padrão.
    $isDecorative = $decorative ?? ! $hasLabel;

    $spacingClasses = match (true) {
        $isHorizontal && $spacing === 'none' => 'my-0',
        $isHorizontal && $spacing === 'sm' => 'my-2',
        $isHorizontal && $spacing === 'lg' => 'my-8',
        $isHorizontal => 'my-4',
        $spacing === 'none' => 'mx-0',
        $spacing === 'sm' => 'mx-2',
        $spacing === 'lg' => 'mx-8',
        default => 'mx-4',
    };

    $thickness = match ($size) {
        'sm' => 1,
        'lg' => 3,
        default => 2,
    };

    // Linha neutra (border) ou colorida por token — literais para o scanner.
    $lineColorClasses = match ($color) {
        'primary' => match ($variant) {
            'gradient' => 'from-transparent via-primary to-transparent',
            'double' => 'border-primary',
            default => 'bg-primary border-primary',
        },
        'secondary' => match ($variant) {
            'gradient' => 'from-transparent via-secondary to-transparent',
            'double' => 'border-secondary',
            default => 'bg-secondary border-secondary',
        },
        'success' => match ($variant) {
            'gradient' => 'from-transparent via-success to-transparent',
            'double' => 'border-success',
            default => 'bg-success border-success',
        },
        'warning' => match ($variant) {
            'gradient' => 'from-transparent via-warning to-transparent',
            'double' => 'border-warning',
            default => 'bg-warning border-warning',
        },
        'danger' => match ($variant) {
            'gradient' => 'from-transparent via-danger to-transparent',
            'double' => 'border-danger',
            default => 'bg-danger border-danger',
        },
        'info' => match ($variant) {
            'gradient' => 'from-transparent via-info to-transparent',
            'double' => 'border-info',
            default => 'bg-info border-info',
        },
        default => match ($variant) {
            'gradient' => 'from-transparent via-border to-transparent',
            'double' => 'border-border',
            default => 'bg-border border-border',
        },
    };

    $horizontalLineClasses = match ($variant) {
        'dashed' => match ($thickness) {
            1 => "h-0 w-full border-t border-dashed {$lineColorClasses}",
            3 => "h-0 w-full border-t-[3px] border-dashed {$lineColorClasses}",
            default => "h-0 w-full border-t-2 border-dashed {$lineColorClasses}",
        },
        'dotted' => match ($thickness) {
            1 => "h-0 w-full border-t border-dotted {$lineColorClasses}",
            3 => "h-0 w-full border-t-[3px] border-dotted {$lineColorClasses}",
            default => "h-0 w-full border-t-2 border-dotted {$lineColorClasses}",
        },
        'double' => match ($thickness) {
            1 => "h-0 w-full border-t-2 border-double {$lineColorClasses}",
            3 => "h-0 w-full border-t-4 border-double {$lineColorClasses}",
            default => "h-0 w-full border-t-[3px] border-double {$lineColorClasses}",
        },
        'gradient' => match ($thickness) {
            1 => "h-px w-full bg-gradient-to-r {$lineColorClasses}",
            3 => "h-[3px] w-full bg-gradient-to-r {$lineColorClasses}",
            default => "h-0.5 w-full bg-gradient-to-r {$lineColorClasses}",
        },
        default => match ($thickness) {
            1 => "h-px w-full {$lineColorClasses}",
            3 => "h-[3px] w-full {$lineColorClasses}",
            default => "h-0.5 w-full {$lineColorClasses}",
        },
    };

    $verticalLineClasses = match ($variant) {
        'dashed' => match ($thickness) {
            1 => "h-full w-0 border-l border-dashed {$lineColorClasses}",
            3 => "h-full w-0 border-l-[3px] border-dashed {$lineColorClasses}",
            default => "h-full w-0 border-l-2 border-dashed {$lineColorClasses}",
        },
        'dotted' => match ($thickness) {
            1 => "h-full w-0 border-l border-dotted {$lineColorClasses}",
            3 => "h-full w-0 border-l-[3px] border-dotted {$lineColorClasses}",
            default => "h-full w-0 border-l-2 border-dotted {$lineColorClasses}",
        },
        'double' => match ($thickness) {
            1 => "h-full w-0 border-l-2 border-double {$lineColorClasses}",
            3 => "h-full w-0 border-l-4 border-double {$lineColorClasses}",
            default => "h-full w-0 border-l-[3px] border-double {$lineColorClasses}",
        },
        'gradient' => match ($thickness) {
            1 => "h-full w-px bg-gradient-to-b {$lineColorClasses}",
            3 => "h-full w-[3px] bg-gradient-to-b {$lineColorClasses}",
            default => "h-full w-0.5 bg-gradient-to-b {$lineColorClasses}",
        },
        default => match ($thickness) {
            1 => "h-full w-px {$lineColorClasses}",
            3 => "h-full w-[3px] {$lineColorClasses}",
            default => "h-full w-0.5 {$lineColorClasses}",
        },
    };

    $lineClasses = $isHorizontal ? $horizontalLineClasses : $verticalLineClasses;

    $labelColorKey = $color ?? 'secondary';

    $labelSoftClasses = match ($labelColorKey) {
        'primary' => 'bg-primary/15 text-primary',
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
    };

    $labelSolidClasses = match ($labelColorKey) {
        'primary' => 'bg-primary text-primary-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground',
        'success' => 'bg-success text-success-foreground',
        'warning' => 'bg-warning text-warning-foreground',
        'danger' => 'bg-danger text-danger-foreground',
        'info' => 'bg-info text-info-foreground',
    };

    $labelOutlineClasses = match ($labelColorKey) {
        'primary' => 'border border-primary/30 bg-card text-primary',
        'secondary' => 'border border-secondary/30 bg-card text-secondary',
        'success' => 'border border-success/30 bg-card text-success',
        'warning' => 'border border-warning/30 bg-card text-warning',
        'danger' => 'border border-danger/30 bg-card text-danger',
        'info' => 'border border-info/30 bg-card text-info',
    };

    $labelSizeClasses = match ($size) {
        'sm' => 'text-[0.65rem] gap-1 px-2 py-0.5',
        'lg' => 'text-sm gap-1.5 px-3 py-1',
        default => 'text-xs gap-1.5 px-2.5 py-0.5',
    };

    $plainSizeClasses = match ($size) {
        'sm' => 'text-[0.65rem] gap-1',
        'lg' => 'text-sm gap-1.5',
        default => 'text-xs gap-1.5',
    };

    $iconSizeClasses = match ($size) {
        'sm' => 'text-[0.7rem]',
        'lg' => 'text-sm',
        default => 'text-xs',
    };

    $labelClasses = match ($labelVariant) {
        'soft' => "inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap {$labelSoftClasses} {$labelSizeClasses}",
        'solid' => "inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap {$labelSolidClasses} {$labelSizeClasses}",
        'outline' => "inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap {$labelOutlineClasses} {$labelSizeClasses}",
        default => "inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground {$plainSizeClasses}",
    };

    $verticalMinHeight = match ($size) {
        'sm' => 'min-h-16',
        'lg' => 'min-h-32',
        default => 'min-h-24',
    };

    $showStartLine = $isHorizontal
        ? in_array($labelPosition, ['center', 'end'], true) || ! $hasLabel
        : true;

    $showEndLine = $isHorizontal
        ? in_array($labelPosition, ['center', 'start'], true) || ! $hasLabel
        : true;

    // Em horizontal sem label, uma única linha basta.
    $singleLine = $isHorizontal && ! $hasLabel;
@endphp

@if ($isHorizontal)
    <div
        {{
            $attributes->class([
                'ui-separator flex w-full items-center',
                $hasLabel ? 'gap-3' : '',
                $spacingClasses,
            ])
        }}
        role="{{ $isDecorative ? 'none' : 'separator' }}"
        @if ($isDecorative)
            aria-hidden="true"
        @else
            aria-orientation="horizontal"
            @if (filled($label)) aria-label="{{ $label }}" @endif
        @endif
    >
        @if ($singleLine)
            <div class="{{ $lineClasses }}"></div>
        @else
            @if ($showStartLine)
                <div class="min-w-4 flex-1 {{ $lineClasses }}"></div>
            @endif

            @if ($hasLabel)
                <span class="{{ $labelClasses }}">
                    @if ($icon)
                        <i class="bi {{ $icon }} {{ $iconSizeClasses }} leading-none" aria-hidden="true"></i>
                    @endif

                    @if ($hasSlot)
                        {{ $slot }}
                    @elseif (filled($label))
                        {{ $label }}
                    @endif
                </span>
            @endif

            @if ($showEndLine)
                <div class="min-w-4 flex-1 {{ $lineClasses }}"></div>
            @endif
        @endif
    </div>
@else
    <div
        {{
            $attributes->class([
                'ui-separator inline-flex h-full flex-col items-center self-stretch',
                $hasLabel ? 'gap-2' : '',
                $verticalMinHeight,
                $spacingClasses,
            ])
        }}
        role="{{ $isDecorative ? 'none' : 'separator' }}"
        @if ($isDecorative)
            aria-hidden="true"
        @else
            aria-orientation="vertical"
            @if (filled($label)) aria-label="{{ $label }}" @endif
        @endif
    >
        @if (! $hasLabel)
            <div class="{{ $lineClasses }}"></div>
        @else
            @if (in_array($labelPosition, ['center', 'end'], true))
                <div class="min-h-4 w-full flex-1 {{ $lineClasses }}"></div>
            @endif

            <span class="{{ $labelClasses }} {{ $labelVariant === 'plain' ? '[writing-mode:vertical-rl] rotate-180' : '' }}">
                @if ($icon)
                    <i class="bi {{ $icon }} {{ $iconSizeClasses }} leading-none {{ $labelVariant === 'plain' ? 'rotate-90' : '' }}" aria-hidden="true"></i>
                @endif

                @if ($hasSlot)
                    {{ $slot }}
                @elseif (filled($label))
                    {{ $label }}
                @endif
            </span>

            @if (in_array($labelPosition, ['center', 'start'], true))
                <div class="min-h-4 w-full flex-1 {{ $lineClasses }}"></div>
            @endif
        @endif
    </div>
@endif
