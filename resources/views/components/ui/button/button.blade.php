@props([
    'color' => 'primary',
    'variant' => 'solid',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'start',
    'iconOnly' => false,
    'loading' => false,
    'block' => false,
    'rounded' => false,
    'href' => null,
    'type' => 'button',
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts do app.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    // .btn-{color}, .btn-soft/outline/ghost/link-{color} são classes
    // customizadas definidas em resources/css/layout.css (@layer components),
    // não utilities geradas pelo Tailwind — a interpolação aqui é segura porque
    // não depende do scanner do Tailwind encontrar o nome literal no código.
    $variantClass = match ($variant) {
        'soft' => "btn-soft-{$color}",
        'outline' => "btn-outline-{$color}",
        'ghost' => "btn-ghost-{$color}",
        'link' => "btn-link-{$color}",
        default => "btn-{$color}",
    };

    $sizeClass = match ($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    $iconOnlyClass = match ($size) {
        'sm' => 'size-8 p-0',
        'lg' => 'size-12 p-0',
        default => 'size-10 p-0',
    };

    $isDisabled = $loading || $attributes->has('disabled');
    $tag = $href ? 'a' : 'button';
    $hasLabel = $slot->isNotEmpty();
@endphp

<{{ $tag }}
    @if ($tag === 'a')
        href="{{ $isDisabled ? '#' : $href }}"
        @if ($isDisabled) aria-disabled="true" tabindex="-1" @endif
    @else
        type="{{ $type }}"
        @disabled($isDisabled)
    @endif
    {{
        $attributes->except('disabled')->class([
            'btn',
            $variantClass,
            $sizeClass,
            $iconOnlyClass => $iconOnly,
            'w-full' => $block,
            'btn-rounded' => $rounded,
            'pointer-events-none opacity-50' => $isDisabled && $tag === 'a',
        ])
    }}
>
    @if ($loading)
        <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
    @elseif ($icon && $iconPosition !== 'end')
        <i class="bi {{ $icon }} shrink-0 leading-none" aria-hidden="true"></i>
    @endif

    @if ($hasLabel)
        <span class="{{ $iconOnly ? 'sr-only' : '' }}">{{ $slot }}</span>
    @endif

    @if (! $loading && $icon && $iconPosition === 'end')
        <i class="bi {{ $icon }} shrink-0 leading-none" aria-hidden="true"></i>
    @endif
</{{ $tag }}>
