@props([
    'color' => 'primary',
    'variant' => 'soft',
    'size' => 'md',
    'pill' => false,
    'square' => false,
    'icon' => null,
    'dot' => false,
    'removable' => false,
    'href' => null,
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts/botões do app,
    // nunca cores Tailwind fixas — ver resources/css/themes/*.css.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    $softClasses = match ($color) {
        'primary' => 'bg-primary/15 text-primary',
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
    };

    $solidClasses = match ($color) {
        'primary' => 'bg-primary text-primary-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground',
        'success' => 'bg-success text-success-foreground',
        'warning' => 'bg-warning text-warning-foreground',
        'danger' => 'bg-danger text-danger-foreground',
        'info' => 'bg-info text-info-foreground',
    };

    $outlineClasses = match ($color) {
        'primary' => 'border border-primary bg-transparent text-primary',
        'secondary' => 'border border-secondary bg-transparent text-secondary',
        'success' => 'border border-success bg-transparent text-success',
        'warning' => 'border border-warning bg-transparent text-warning',
        'danger' => 'border border-danger bg-transparent text-danger',
        'info' => 'border border-info bg-transparent text-info',
    };

    // "Soft border": mesmo fundo suave do "soft", mas com borda visível na mesma cor
    // (diferente do "outline", que não tem preenchimento).
    $softBorderClasses = match ($color) {
        'primary' => 'border border-primary/50 bg-primary/15 text-primary',
        'secondary' => 'border border-secondary/50 bg-secondary/15 text-secondary',
        'success' => 'border border-success/50 bg-success/15 text-success',
        'warning' => 'border border-warning/50 bg-warning/15 text-warning',
        'danger' => 'border border-danger/50 bg-danger/15 text-danger',
        'info' => 'border border-info/50 bg-info/15 text-info',
    };

    $variantClasses = match ($variant) {
        'solid' => $solidClasses,
        'outline' => $outlineClasses,
        'soft-border' => $softBorderClasses,
        default => $softClasses,
    };

    $dotColorClasses = match ($color) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
    };

    $sizeClasses = match ($size) {
        'sm' => 'gap-1 px-2 py-0.5 text-[11px]',
        'lg' => 'gap-2 px-3 py-1.5 text-sm',
        default => 'gap-1.5 px-2.5 py-1 text-xs',
    };

    $shapeClasses = match (true) {
        $square => 'rounded-none',
        $pill => 'rounded-full',
        default => 'rounded-md',
    };

    // <button> (fechar) dentro de <a> é aninhamento de conteúdo interativo
    // inválido em HTML — ignora "removable" quando o badge também é um link.
    $removable = $removable && ! $href;
    $tag = $href ? 'a' : 'span';
    $hasLabel = $slot->isNotEmpty();
@endphp

<{{ $tag }}
    @if ($tag === 'a')
        href="{{ $href }}"
    @endif
    @if ($removable)
        x-data="{ show: true }"
        x-show="show"
        x-transition
    @endif
    {{
        $attributes->class([
            'inline-flex items-center font-medium leading-none',
            $variantClasses,
            $sizeClasses,
            $shapeClasses,
        ])
    }}
>
    @if ($icon)
        <i class="bi {{ $icon }} shrink-0 leading-none" aria-hidden="true"></i>
    @elseif ($dot)
        <span class="size-1.5 shrink-0 rounded-full {{ $dotColorClasses }}" aria-hidden="true"></span>
    @endif

    @if ($hasLabel)
        <span>{{ $slot }}</span>
    @endif

    @if ($removable)
        <button
            type="button"
            @click="show = false"
            class="-mr-1 ml-0.5 shrink-0 rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100"
            aria-label="Remover"
        >
            <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
        </button>
    @endif
</{{ $tag }}>
