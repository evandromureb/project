@props([
    'href' => '#',
    'color' => 'primary',
    'underline' => 'hover',
    'icon' => null,
    'iconPosition' => 'start',
    'arrow' => false,
    'external' => false,
    'disabled' => false,
    'size' => 'md',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'muted'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($underline, ['none', 'hover', 'always'], true)) {
        $underline = 'hover';
    }

    // "muted" é o único que muda de cor no hover (efeito "revelar") — as
    // demais cores semânticas já são o link "ativo" por padrão; o affordance
    // de hover vem do sublinhado, não de uma troca de cor.
    $colorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-muted-foreground hover:text-foreground', // muted
    };

    $underlineClasses = match ($underline) {
        'none' => 'no-underline',
        'always' => 'underline',
        default => 'no-underline hover:underline', // hover
    };

    $sizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    // "external" força nova aba com rel seguro e, sem ícone/seta explícitos,
    // acrescenta o ícone padrão de link externo.
    $trailingIcon = match (true) {
        $arrow => null, // a seta animada (abaixo) já cobre o final
        $icon && $iconPosition === 'end' => $icon,
        $external && ! $icon => 'bi-box-arrow-up-right',
        default => null,
    };

    $leadingIcon = ($icon && $iconPosition === 'start') ? $icon : null;

    $tag = $disabled ? 'span' : 'a';
@endphp

<{{ $tag }}
    @if ($tag === 'a')
        href="{{ $href }}"
        @if ($external)
            target="_blank"
            rel="noopener noreferrer"
        @endif
    @else
        aria-disabled="true"
        tabindex="-1"
    @endif
    {{
        $attributes->class([
            'group inline-flex items-center gap-1.5 font-medium transition-colors duration-150',
            $colorClasses,
            $underlineClasses,
            $sizeClasses,
            'pointer-events-none cursor-not-allowed opacity-50' => $disabled,
        ])
    }}
>
    @if ($leadingIcon)
        <i class="bi {{ $leadingIcon }} shrink-0 leading-none" aria-hidden="true"></i>
    @endif

    {{ $slot }}

    @if ($arrow)
        <i class="bi bi-arrow-right shrink-0 leading-none transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true"></i>
    @elseif ($trailingIcon)
        <i class="bi {{ $trailingIcon }} shrink-0 leading-none" aria-hidden="true"></i>
    @endif
</{{ $tag }}>
