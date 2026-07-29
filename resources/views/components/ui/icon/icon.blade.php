@props([
    'name' => null,
    'size' => 'md',
    'color' => null,
    'variant' => 'none',
    'shape' => 'circle',
    'boxSize' => 'md',
    'spin' => false,
    'pulse' => false,
    'flip' => null,
    'rotate' => null,
    'ring' => false,
    'shadow' => false,
    'label' => null,
    'href' => null,
    'badge' => null,
    'badgeColor' => 'danger',
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts/botões do app,
    // nunca cores Tailwind fixas — ver resources/css/themes/*.css.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($badgeColor, $tokenColors, true)) {
        $badgeColor = 'danger';
    }

    if (! in_array($variant, ['none', 'soft', 'solid', 'outline', 'ghost'], true)) {
        $variant = 'none';
    }

    if (! in_array($shape, ['circle', 'square'], true)) {
        $shape = 'circle';
    }

    if (! in_array($boxSize, ['xs', 'sm', 'md', 'lg', 'xl'], true)) {
        $boxSize = 'md';
    }

    if (! in_array($flip, [null, 'horizontal', 'vertical'], true)) {
        $flip = null;
    }

    // "rotate" pode chegar como string do atributo Blade ("90") ou int (:rotate="90").
    $rotate = $rotate !== null ? (int) $rotate : null;

    if (! in_array($rotate, [null, 90, 180, 270], true)) {
        $rotate = null;
    }

    $hasBox = $variant !== 'none';
    // Link sem variant ainda precisa de área clicável — usa as dimensões do box
    // com chrome "ghost" neutro (mesmo padrão descrito em reference/icon.md).
    $forceHitTarget = $href && ! $hasBox;
    $wrapsGlyph = $hasBox || $forceHitTarget || ($badge !== null && $badge !== false && $badge !== '');

    // Sem box, o tamanho controla o próprio glifo (font-size). Com box, o
    // tamanho controla as dimensões do container — o glifo usa "boxSize".
    $glyphSizeClasses = match ($size) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
        '2xl' => 'text-4xl',
        default => 'text-base',
    };

    [$boxDimensionClasses, $boxGlyphClasses] = match ($boxSize) {
        'xs' => ['size-7', 'text-xs'],
        'sm' => ['size-8', 'text-sm'],
        'lg' => ['size-14', 'text-2xl'],
        'xl' => ['size-16', 'text-3xl'],
        default => ['size-11', 'text-xl'],
    };

    $shapeClasses = match (true) {
        $shape === 'circle' => 'rounded-full',
        $boxSize === 'xs' => 'rounded-md',
        $boxSize === 'xl' => 'rounded-2xl',
        $boxSize === 'lg' => 'rounded-2xl',
        default => 'rounded-xl',
    };

    $softClasses = match ($color) {
        'primary' => 'bg-primary/15 text-primary',
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-muted text-foreground',
    };

    $solidClasses = match ($color) {
        'primary' => 'bg-primary text-primary-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground',
        'success' => 'bg-success text-success-foreground',
        'warning' => 'bg-warning text-warning-foreground',
        'danger' => 'bg-danger text-danger-foreground',
        'info' => 'bg-info text-info-foreground',
        default => 'bg-foreground text-background',
    };

    $outlineClasses = match ($color) {
        'primary' => 'border border-primary/40 bg-transparent text-primary',
        'secondary' => 'border border-secondary/40 bg-transparent text-secondary',
        'success' => 'border border-success/40 bg-transparent text-success',
        'warning' => 'border border-warning/40 bg-transparent text-warning',
        'danger' => 'border border-danger/40 bg-transparent text-danger',
        'info' => 'border border-info/40 bg-transparent text-info',
        default => 'border border-border bg-transparent text-foreground',
    };

    $ghostClasses = match ($color) {
        'primary' => 'bg-transparent text-primary hover:bg-primary/10',
        'secondary' => 'bg-transparent text-secondary hover:bg-secondary/10',
        'success' => 'bg-transparent text-success hover:bg-success/10',
        'warning' => 'bg-transparent text-warning hover:bg-warning/10',
        'danger' => 'bg-transparent text-danger hover:bg-danger/10',
        'info' => 'bg-transparent text-info hover:bg-info/10',
        default => 'bg-transparent text-muted-foreground hover:bg-muted hover:text-foreground',
    };

    $ringClasses = match ($color) {
        'primary' => 'ring-1 ring-primary/20',
        'secondary' => 'ring-1 ring-secondary/20',
        'success' => 'ring-1 ring-success/20',
        'warning' => 'ring-1 ring-warning/20',
        'danger' => 'ring-1 ring-danger/20',
        'info' => 'ring-1 ring-info/20',
        default => 'ring-1 ring-border',
    };

    $boxColorClasses = match ($variant) {
        'solid' => $solidClasses,
        'outline' => $outlineClasses,
        'soft' => $softClasses,
        'ghost' => $ghostClasses,
        default => $forceHitTarget ? $ghostClasses : null,
    };

    $bareColorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => null,
    };

    $badgeColorClasses = match ($badgeColor) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'info' => 'bg-info',
        default => 'bg-danger',
    };

    $flipClasses = match ($flip) {
        'horizontal' => '-scale-x-100',
        'vertical' => '-scale-y-100',
        default => null,
    };

    $rotateClasses = match ($rotate) {
        90 => 'rotate-90',
        180 => 'rotate-180',
        270 => '-rotate-90',
        default => null,
    };

    $hasBadge = $badge !== null && $badge !== false && $badge !== '';
    $badgeText = is_string($badge) ? $badge : '';
    $badgeNeedsPadding = is_string($badge) && strlen($badge) > 1;

    $isDecorative = ! $label;
    $tag = $href ? 'a' : ($wrapsGlyph ? 'span' : null);
    $usesBoxSizing = $hasBox || $forceHitTarget;

    $glyphClassesArray = array_values(array_filter([
        'bi',
        $name,
        'leading-none',
        $usesBoxSizing ? $boxGlyphClasses : $glyphSizeClasses,
        $usesBoxSizing ? null : $bareColorClasses,
        $spin ? 'animate-spin' : null,
        $pulse ? 'animate-pulse' : null,
        $flipClasses,
        $rotateClasses,
    ]));

    $glyphClasses = implode(' ', $glyphClassesArray);

    $wrapperClasses = [
        'relative inline-flex shrink-0 items-center justify-center transition-colors' => $wrapsGlyph,
        $boxDimensionClasses => $usesBoxSizing,
        $shapeClasses => $usesBoxSizing,
        $boxColorClasses => $usesBoxSizing,
        $ringClasses => $hasBox && $ring && $variant !== 'outline',
        'shadow-sm' => $hasBox && $shadow,
        'hover:opacity-90' => (bool) $href && $hasBox && $variant === 'solid',
    ];
@endphp

@if ($tag === 'a')
    <a
        href="{{ $href }}"
        {{ $attributes->class($wrapperClasses) }}
        @if ($label) aria-label="{{ $label }}" @endif
    >
        <i class="{{ $glyphClasses }}" @if ($isDecorative) aria-hidden="true" @endif></i>

        @if ($hasBadge)
            <span
                @class([
                    'absolute -top-1 -right-1 flex items-center justify-center rounded-full text-[9px] font-semibold leading-none text-white ring-2 ring-card',
                    $badgeColorClasses,
                    'size-3.5' => ! $badgeNeedsPadding,
                    'min-h-4 min-w-4 px-1' => $badgeNeedsPadding,
                ])
                aria-hidden="true"
            >{{ $badgeText }}</span>
        @endif
    </a>
@elseif ($tag === 'span')
    <span
        {{ $attributes->class($wrapperClasses) }}
        role="{{ $label ? 'img' : null }}"
        @if ($label) aria-label="{{ $label }}" @endif
    >
        <i class="{{ $glyphClasses }}" @if ($isDecorative) aria-hidden="true" @endif></i>

        @if ($hasBadge)
            <span
                @class([
                    'absolute -top-1 -right-1 flex items-center justify-center rounded-full text-[9px] font-semibold leading-none text-white ring-2 ring-card',
                    $badgeColorClasses,
                    'size-3.5' => ! $badgeNeedsPadding,
                    'min-h-4 min-w-4 px-1' => $badgeNeedsPadding,
                ])
                aria-hidden="true"
            >{{ $badgeText }}</span>
        @endif
    </span>
@else
    <i
        {{ $attributes->class($glyphClassesArray) }}
        role="{{ $label ? 'img' : null }}"
        @if ($label)
            aria-label="{{ $label }}"
        @else
            aria-hidden="true"
        @endif
    ></i>
@endif
