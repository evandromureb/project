@props([
    'title' => null,
    'level' => 5,
    'description' => null,
    'position' => 'start',
    'align' => 'start',
    'gap' => 'md',
    'variant' => 'default',
    'src' => null,
    'alt' => null,
    'rounded' => 'md',
    'mediaSize' => 'md',
    'icon' => null,
    'iconColor' => 'primary',
    'iconVariant' => 'soft',
    'href' => null,
    'muted' => true,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($position, ['start', 'end'], true)) {
        $position = 'start';
    }

    if (! in_array($align, ['start', 'center', 'end'], true)) {
        $align = 'start';
    }

    if (! in_array($gap, ['sm', 'md', 'lg'], true)) {
        $gap = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'bordered', 'accent'], true)) {
        $variant = 'default';
    }

    if (! in_array($rounded, ['none', 'sm', 'md', 'lg', 'full'], true)) {
        $rounded = 'md';
    }

    if (! in_array($mediaSize, ['sm', 'md', 'lg', 'xl'], true)) {
        $mediaSize = 'md';
    }

    if (! in_array($iconColor, $tokenColors, true)) {
        $iconColor = 'primary';
    }

    if (! in_array($iconVariant, ['soft', 'solid', 'outline'], true)) {
        $iconVariant = 'soft';
    }

    $level = (int) $level;

    if ($level < 1 || $level > 6) {
        $level = 5;
    }

    $titleTag = 'h'.$level;

    $alignClasses = match ($align) {
        'center' => 'items-center',
        'end' => 'items-end',
        default => 'items-start',
    };

    $gapClasses = match ($gap) {
        'sm' => 'gap-2',
        'lg' => 'gap-5',
        default => 'gap-3',
    };

    $nestedGapClasses = match ($gap) {
        'sm' => '[&>[data-media-root]]:mt-2',
        'lg' => '[&>[data-media-root]]:mt-5',
        default => '[&>[data-media-root]]:mt-3',
    };

    $variantClasses = match ($variant) {
        'soft' => 'rounded-xl bg-muted/50 p-3.5',
        'bordered' => 'rounded-xl border border-border bg-card p-3.5 shadow-sm',
        'accent' => 'rounded-xl border border-border border-l-4 bg-card p-3.5',
        default => null,
    };

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

    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $imageSizeClasses = match ($mediaSize) {
        'sm' => 'size-10',
        'lg' => 'size-16',
        'xl' => 'size-20',
        default => 'size-12',
    };

    [$iconBoxSize, $iconGlyphSize] = match ($mediaSize) {
        'sm' => ['size-9 rounded-lg', 'text-base'],
        'lg' => ['size-14 rounded-2xl', 'text-2xl'],
        'xl' => ['size-16 rounded-2xl', 'text-3xl'],
        default => ['size-11 rounded-xl', 'text-xl'],
    };

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

    $hasMediaSlot = isset($media) && $media->isNotEmpty();
    $hasBuiltInMedia = (bool) ($src || $icon);
    $hasMedia = $hasMediaSlot || $hasBuiltInMedia;
    $hasDescription = filled($description) || (isset($descriptionSlot) && $descriptionSlot->isNotEmpty());
    $hasBody = $slot->isNotEmpty();
    $hasActions = isset($actions) && $actions->isNotEmpty();
    $hasMeta = isset($meta) && $meta->isNotEmpty();
    $hasTitle = filled($title);

    $titleClasses = 'm-0 text-sm font-semibold leading-snug text-foreground';
    $bodyTextClasses = $muted ? 'text-sm leading-relaxed text-muted-foreground' : 'text-sm leading-relaxed text-foreground';
@endphp

<div
    data-media-root
    data-position="{{ $position }}"
    data-align="{{ $align }}"
    {{
        $attributes->class([
            'flex w-full min-w-0',
            $alignClasses,
            $gapClasses,
            $position === 'end' ? 'flex-row-reverse' : 'flex-row',
            $variantClasses,
            $accentBorderClasses,
        ])
    }}
>
    @if ($hasMedia)
        <div class="shrink-0" data-media>
            @if ($hasMediaSlot)
                {{ $media }}
            @elseif ($src)
                <img
                    src="{{ $src }}"
                    alt="{{ $alt ?? '' }}"
                    class="{{ $imageSizeClasses }} {{ $roundedClasses }} object-cover"
                />
            @elseif ($icon)
                <span
                    class="{{ $iconColorClasses }} {{ $iconBoxSize }} flex shrink-0 items-center justify-center ring-1"
                    aria-hidden="true"
                >
                    <i class="bi {{ $icon }} {{ $iconGlyphSize }} leading-none"></i>
                </span>
            @endif
        </div>
    @endif

    <div class="min-w-0 flex-1" data-body>
        @if ($hasTitle)
            <{{ $titleTag }} class="{{ $titleClasses }}">
                @if ($href)
                    <a
                        href="{{ $href }}"
                        class="text-inherit underline-offset-4 transition-colors duration-150 hover:text-primary hover:underline"
                    >{{ $title }}</a>
                @else
                    {{ $title }}
                @endif
            </{{ $titleTag }}>
        @endif

        @if ($hasDescription)
            <div @class([$bodyTextClasses, 'mt-1' => $hasTitle])>
                @isset($descriptionSlot)
                    {{ $descriptionSlot }}
                @else
                    {{ $description }}
                @endisset
            </div>
        @endif

        @if ($hasBody)
            <div
                @class([
                    $bodyTextClasses,
                    $nestedGapClasses,
                    'mt-1' => $hasTitle || $hasDescription,
                ])
            >
                {{ $slot }}
            </div>
        @endif

        @if ($hasMeta)
            <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
                {{ $meta }}
            </div>
        @endif

        @if ($hasActions)
            <div class="mt-3 flex flex-wrap items-center gap-2">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
