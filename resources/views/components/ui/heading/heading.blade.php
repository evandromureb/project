@props([
    'title' => null,
    'level' => 1,
    'size' => null,
    'eyebrow' => null,
    'description' => null,
    'icon' => null,
    'iconColor' => 'primary',
    'iconVariant' => 'soft',
    'iconSize' => 'md',
    'badge' => null,
    'badgeColor' => 'primary',
    'align' => 'between',
    'variant' => 'default',
    'divider' => false,
    'truncate' => true,
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts/botões do app,
    // nunca cores Tailwind fixas — ver resources/css/themes/*.css.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($iconColor, $tokenColors, true)) {
        $iconColor = 'primary';
    }

    if (! in_array($badgeColor, $tokenColors, true)) {
        $badgeColor = 'primary';
    }

    if (! in_array($iconVariant, ['soft', 'solid', 'outline'], true)) {
        $iconVariant = 'soft';
    }

    if (! in_array($iconSize, ['sm', 'md', 'lg'], true)) {
        $iconSize = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'accent', 'bordered'], true)) {
        $variant = 'default';
    }

    if (! in_array($align, ['between', 'start', 'center'], true)) {
        $align = 'between';
    }

    $level = (int) $level;

    if ($level < 1 || $level > 6) {
        $level = 1;
    }

    $tag = 'h' . $level;

    // "size" é opcional — sem ele, o tamanho do texto acompanha o "level"
    // semântico (h1 maior, h6 menor), como nas tags nativas.
    $levelSizeClasses = match ($level) {
        1 => 'text-2xl',
        2 => 'text-xl',
        3 => 'text-lg',
        4 => 'text-base',
        5 => 'text-sm',
        default => 'text-xs',
    };

    $explicitSizeClasses = match ($size) {
        'sm' => 'text-lg',
        'md' => 'text-xl',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
        default => null,
    };

    $titleSizeClasses = $explicitSizeClasses ?? $levelSizeClasses;

    $iconSoftClasses = match ($iconColor) {
        'primary' => 'bg-primary/15 text-primary ring-primary/15',
        'secondary' => 'bg-secondary/15 text-secondary ring-secondary/15',
        'success' => 'bg-success/15 text-success ring-success/15',
        'warning' => 'bg-warning/15 text-warning ring-warning/15',
        'danger' => 'bg-danger/15 text-danger ring-danger/15',
        'info' => 'bg-info/15 text-info ring-info/15',
    };

    $iconSolidClasses = match ($iconColor) {
        'primary' => 'bg-primary text-primary-foreground ring-primary/30',
        'secondary' => 'bg-secondary text-secondary-foreground ring-secondary/30',
        'success' => 'bg-success text-success-foreground ring-success/30',
        'warning' => 'bg-warning text-warning-foreground ring-warning/30',
        'danger' => 'bg-danger text-danger-foreground ring-danger/30',
        'info' => 'bg-info text-info-foreground ring-info/30',
    };

    $iconOutlineClasses = match ($iconColor) {
        'primary' => 'border border-primary/30 bg-card text-primary ring-0',
        'secondary' => 'border border-secondary/30 bg-card text-secondary ring-0',
        'success' => 'border border-success/30 bg-card text-success ring-0',
        'warning' => 'border border-warning/30 bg-card text-warning ring-0',
        'danger' => 'border border-danger/30 bg-card text-danger ring-0',
        'info' => 'border border-info/30 bg-card text-info ring-0',
    };

    $iconColorClasses = match ($iconVariant) {
        'solid' => $iconSolidClasses,
        'outline' => $iconOutlineClasses,
        default => $iconSoftClasses,
    };

    [$iconBoxSize, $iconGlyphSize] = match ($iconSize) {
        'sm' => ['size-9 rounded-lg', 'text-base'],
        'lg' => ['size-14 rounded-2xl', 'text-2xl'],
        default => ['size-11 rounded-xl', 'text-xl'],
    };

    $variantClasses = match ($variant) {
        'soft' => 'rounded-xl bg-muted/50 px-4 py-3.5',
        'accent' => 'rounded-xl border border-border border-l-4 border-l-primary bg-card px-4 py-3.5',
        'bordered' => 'rounded-xl border border-border bg-card px-4 py-3.5 shadow-sm',
        default => null,
    };

    // Acento colorido na borda esquerda quando variant=accent + iconColor informado.
    $accentBorderClasses = ($variant === 'accent')
        ? match ($iconColor) {
            'secondary' => 'border-l-secondary',
            'success' => 'border-l-success',
            'warning' => 'border-l-warning',
            'danger' => 'border-l-danger',
            'info' => 'border-l-info',
            default => 'border-l-primary',
        }
        : null;

    $wrapperClasses = match ($align) {
        'start' => 'flex-col items-start',
        'center' => 'flex-col items-center text-center',
        default => 'flex-col sm:flex-row sm:items-center sm:justify-between',
    };

    $titleBlockAlign = $align === 'center' ? 'items-center' : 'items-center';
    $textAlignClasses = $align === 'center' ? 'text-center' : null;

    $hasIconProp = (bool) $icon;
    $hasIconSlot = isset($iconSlot);
    $hasIcon = $hasIconProp || $hasIconSlot;
    $hasDescription = $description || isset($descriptionSlot);
    $hasMeta = isset($meta);
    $hasBadge = $badge !== null && $badge !== '';
    $hasActions = $slot->isNotEmpty();

    $titleTruncateClass = $truncate ? 'truncate' : 'wrap-break-word';
    $descriptionTruncateClass = $truncate ? 'truncate' : 'wrap-break-word';
@endphp

<div
    {{
        $attributes->class([
            'flex min-w-0 gap-4',
            $wrapperClasses,
            $variantClasses,
            $accentBorderClasses,
            'border-b border-border pb-4' => $divider && $variant === 'default',
        ])
    }}
>
    <div class="flex min-w-0 gap-3.5 {{ $titleBlockAlign }} {{ $align === 'center' ? 'flex-col' : '' }}">
        @if ($hasIcon)
            @if ($hasIconSlot)
                <span class="flex shrink-0 items-center justify-center" aria-hidden="true">
                    {{ $iconSlot }}
                </span>
            @else
                <span
                    class="{{ $iconColorClasses }} {{ $iconBoxSize }} flex shrink-0 items-center justify-center ring-1"
                    aria-hidden="true"
                >
                    <i class="bi {{ $icon }} {{ $iconGlyphSize }} leading-none"></i>
                </span>
            @endif
        @endif

        <div class="min-w-0 {{ $textAlignClasses }}">
            @if ($eyebrow)
                <p class="mb-0.5 text-xs font-semibold tracking-wide text-muted-foreground uppercase {{ $truncate ? 'truncate' : '' }}">
                    {{ $eyebrow }}
                </p>
            @endif

            <div class="flex flex-wrap items-center gap-2 {{ $align === 'center' ? 'justify-center' : '' }}">
                <{{ $tag }} class="{{ $titleSizeClasses }} {{ $titleTruncateClass }} leading-tight font-semibold tracking-tight text-foreground">
                    {{ $title }}
                </{{ $tag }}>

                @if ($hasBadge)
                    <x-ui.badge :color="$badgeColor" variant="soft" size="sm" pill>{{ $badge }}</x-ui.badge>
                @endif

                @isset($badgeSlot)
                    {{ $badgeSlot }}
                @endisset
            </div>

            @if ($hasDescription)
                <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground {{ $descriptionTruncateClass }}">
                    @isset($descriptionSlot)
                        {{ $descriptionSlot }}
                    @else
                        {{ $description }}
                    @endisset
                </p>
            @endif

            @if ($hasMeta)
                <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-muted-foreground {{ $align === 'center' ? 'justify-center' : '' }}">
                    {{ $meta }}
                </div>
            @endif
        </div>
    </div>

    @if ($hasActions)
        <div class="flex shrink-0 flex-wrap items-center gap-2 {{ $align === 'center' ? 'justify-center' : '' }}">
            {{ $slot }}
        </div>
    @endif
</div>
