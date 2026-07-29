@props([
    'text' => null,
    'shape' => 'ribbon',
    'position' => 'left',
    'color' => 'primary',
    'variant' => 'solid',
    'icon' => null,
    'size' => 'md',
    'hover' => false,
])

@php
    // Mesma família de tokens usada nos demais componentes — nunca cores
    // Tailwind fixas.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];
    $shapes = ['ribbon', 'round', 'box', 'diagonal', 'corner'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($shape, $shapes, true)) {
        $shape = 'ribbon';
    }

    if (! in_array($variant, ['solid', 'soft'], true)) {
        $variant = 'solid';
    }

    if (! in_array($position, ['left', 'right'], true)) {
        $position = 'left';
    }

    if (! in_array($size, ['sm', 'md'], true)) {
        $size = 'md';
    }

    $solidClasses = match ($color) {
        'primary' => 'bg-primary text-primary-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground',
        'success' => 'bg-success text-success-foreground',
        'warning' => 'bg-warning text-warning-foreground',
        'danger' => 'bg-danger text-danger-foreground',
        'info' => 'bg-info text-info-foreground',
    };

    $softClasses = match ($color) {
        'primary' => 'border border-primary/25 bg-primary/15 text-primary',
        'secondary' => 'border border-secondary/25 bg-secondary/15 text-secondary',
        'success' => 'border border-success/25 bg-success/15 text-success',
        'warning' => 'border border-warning/25 bg-warning/15 text-warning',
        'danger' => 'border border-danger/25 bg-danger/15 text-danger',
        'info' => 'border border-info/25 bg-info/15 text-info',
    };

    $colorClasses = $variant === 'soft' ? $softClasses : $solidClasses;

    $isSm = $size === 'sm';
    $textSizeClasses = $isSm ? 'text-[10px]' : 'text-[11px]';
    $iconSizeClasses = $isSm ? 'text-[10px]' : 'text-xs';
    $hoverClasses = $hover ? 'opacity-60 transition-opacity duration-200 group-hover:opacity-100' : '';

    // Cada shape × position devolve uma string literal completa (scanner do Tailwind).
    $shapeClasses = match (true) {
        // Round: selo compacto no canto, ligeiramente para fora
        $shape === 'round' && $position === 'right' && $isSm => 'absolute -top-2 -right-2 flex size-9 items-center justify-center rounded-full shadow-sm',
        $shape === 'round' && $position === 'right' => 'absolute -top-2.5 -right-2.5 flex size-11 items-center justify-center rounded-full shadow-sm',
        $shape === 'round' && $isSm => 'absolute -top-2 -left-2 flex size-9 items-center justify-center rounded-full shadow-sm',
        $shape === 'round' => 'absolute -top-2.5 -left-2.5 flex size-11 items-center justify-center rounded-full shadow-sm',

        // Box: etiqueta fina na borda superior
        $shape === 'box' && $position === 'right' && $isSm => 'absolute top-2.5 right-0 inline-flex items-center gap-1 rounded-l-md px-2 py-0.5 shadow-sm',
        $shape === 'box' && $position === 'right' => 'absolute top-3 right-0 inline-flex items-center gap-1 rounded-l-md px-2.5 py-1 shadow-sm',
        $shape === 'box' && $isSm => 'absolute top-2.5 left-0 inline-flex items-center gap-1 rounded-r-md px-2 py-0.5 shadow-sm',
        $shape === 'box' => 'absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm',

        // Diagonal: faixa mais estreita no canto
        $shape === 'diagonal' && $position === 'right' && $isSm => 'absolute top-2.5 -right-7 w-28 rotate-45 py-0.5 text-center shadow-sm',
        $shape === 'diagonal' && $position === 'right' => 'absolute top-3.5 -right-8 w-32 rotate-45 py-0.5 text-center shadow-sm',
        $shape === 'diagonal' && $isSm => 'absolute top-2.5 -left-7 w-28 -rotate-45 py-0.5 text-center shadow-sm',
        $shape === 'diagonal' => 'absolute top-3.5 -left-8 w-32 -rotate-45 py-0.5 text-center shadow-sm',

        // Corner: triângulo pequeno só com ícone
        $shape === 'corner' && $position === 'right' && $isSm => 'absolute top-0 right-0 flex size-10 items-start justify-end pt-1 pr-1 [clip-path:polygon(100%_0,100%_100%,0_0)]',
        $shape === 'corner' && $position === 'right' => 'absolute top-0 right-0 flex size-12 items-start justify-end pt-1.5 pr-1.5 [clip-path:polygon(100%_0,100%_100%,0_0)]',
        $shape === 'corner' && $isSm => 'absolute top-0 left-0 flex size-10 items-start justify-start pt-1 pl-1 [clip-path:polygon(0_0,100%_0,0_100%)]',
        $shape === 'corner' => 'absolute top-0 left-0 flex size-12 items-start justify-start pt-1.5 pl-1.5 [clip-path:polygon(0_0,100%_0,0_100%)]',

        // Ribbon (bandeira): texto vertical numa faixa estreita
        $position === 'right' && $isSm => 'absolute top-0 right-2.5 inline-flex items-center justify-center gap-1 px-1 py-2 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-6px),50%_100%,0_calc(100%-6px))] [writing-mode:vertical-rl]',
        $position === 'right' => 'absolute top-0 right-3 inline-flex items-center justify-center gap-1 px-1.5 py-2.5 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-8px),50%_100%,0_calc(100%-8px))] [writing-mode:vertical-rl]',
        $isSm => 'absolute top-0 left-2.5 inline-flex items-center justify-center gap-1 px-1 py-2 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-6px),50%_100%,0_calc(100%-6px))] [writing-mode:vertical-rl] [transform:rotate(180deg)]',
        default => 'absolute top-0 left-3 inline-flex items-center justify-center gap-1 px-1.5 py-2.5 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-8px),50%_100%,0_calc(100%-8px))] [writing-mode:vertical-rl] [transform:rotate(180deg)]',
    };

    $label = $text ?? $slot;
    $hasLabel = filled($text) || $slot->isNotEmpty();
@endphp

<div
    {{
        $attributes->class([
            'pointer-events-none z-10 font-semibold tracking-wide uppercase',
            $colorClasses,
            $shapeClasses,
            $textSizeClasses,
            $hoverClasses,
        ])
    }}
>
    @if ($icon)
        <i class="bi {{ $icon }} shrink-0 leading-none {{ $iconSizeClasses }}" aria-hidden="true"></i>
    @endif

    @if ($hasLabel && $shape !== 'corner')
        <span class="leading-none">{{ $label }}</span>
    @endif
</div>
