@props([
    'href' => null,
    'icon' => null,
    'active' => false,
    'disabled' => false,
    'truncate' => false,
])

@aware([
    'size' => 'md',
    'color' => 'primary',
    'separator' => 'bi-chevron-right',
    'variant' => 'plain',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($variant, ['plain', 'soft', 'pills'], true)) {
        $variant = 'plain';
    }

    // @aware só enxerga props reais do pai (não variáveis @php computadas),
    // então o split ícone/texto do separador é refeito aqui e em
    // <x-ui.breadcrumb.breadcrumb-collapse> em vez de ser resolvido uma única vez no pai.
    $separatorIcon = str_starts_with($separator, 'bi-') ? $separator : null;
    $separatorText = $separatorIcon ? null : $separator;

    // "active" (página atual) nunca é um link, mesmo se href for passado —
    // é assim que o usuário sabe onde está, sem poder clicar de novo nela.
    $isCurrent = (bool) $active;
    $tag = ($href && ! $isCurrent && ! $disabled) ? 'a' : 'span';

    $hoverColorClasses = match ($color) {
        'primary' => 'hover:text-primary',
        'secondary' => 'hover:text-secondary',
        'success' => 'hover:text-success',
        'warning' => 'hover:text-warning',
        'danger' => 'hover:text-danger',
        'info' => 'hover:text-info',
    };

    $activeSoftClasses = match ($color) {
        'primary' => 'bg-primary/10 text-primary',
        'secondary' => 'bg-secondary/10 text-secondary',
        'success' => 'bg-success/10 text-success',
        'warning' => 'bg-warning/10 text-warning',
        'danger' => 'bg-danger/10 text-danger',
        'info' => 'bg-info/10 text-info',
    };

    $paddingClasses = match ($variant) {
        'pills' => match ($size) {
            'sm' => 'rounded-md px-1.5 py-0.5',
            'lg' => 'rounded-lg px-2.5 py-1',
            default => 'rounded-md px-2 py-0.5',
        },
        default => match ($size) {
            'sm' => 'rounded-md px-1 py-0.5',
            'lg' => 'rounded-md px-1.5 py-0.5',
            default => 'rounded-md px-1.5 py-0.5',
        },
    };

    $contentClasses = match (true) {
        $disabled => "{$paddingClasses} text-muted-foreground/45 cursor-not-allowed",
        $isCurrent && $variant === 'pills' => "{$paddingClasses} {$activeSoftClasses} font-semibold",
        $isCurrent => "{$paddingClasses} text-foreground font-semibold",
        $tag === 'a' && $variant === 'pills' => "{$paddingClasses} text-muted-foreground transition-colors hover:bg-muted hover:text-foreground {$hoverColorClasses}",
        $tag === 'a' => "{$paddingClasses} text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground {$hoverColorClasses}",
        default => "{$paddingClasses} text-muted-foreground",
    };

    $iconSizeClasses = match ($size) {
        'sm' => 'text-[0.7rem]',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $gapClasses = match ($size) {
        'sm' => 'gap-1',
        'lg' => 'gap-2',
        default => 'gap-1.5',
    };

    $itemGapClasses = match ($size) {
        'sm' => 'gap-1',
        'lg' => 'gap-2',
        default => 'gap-1.5',
    };
@endphp

{{--
    O separador só aparece ANTES de cada item, e o próprio item se esconde
    quando é o primeiro <li> da lista (via "first:[&>[data-separator]]:hidden")
    — evita depender de contagem de irmãos ou de Alpine só para isso.
--}}
<li class="flex min-w-0 items-center {{ $itemGapClasses }} first:[&>[data-separator]]:hidden">
    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 {{ $iconSizeClasses }}" aria-hidden="true">
        @if ($separatorIcon)
            <i class="bi {{ $separatorIcon }} leading-none" aria-hidden="true"></i>
        @else
            <span class="font-medium">{{ $separatorText }}</span>
        @endif
    </span>

    <{{ $tag }}
        @if ($tag === 'a')
            href="{{ $href }}"
        @endif
        @if ($isCurrent)
            aria-current="page"
        @endif
        @if ($disabled)
            aria-disabled="true"
            tabindex="-1"
        @endif
        {{ $attributes->class([
            'inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1',
            $gapClasses,
            $contentClasses,
            $truncate ? 'min-w-0' : '',
        ]) }}
    >
        @if ($icon)
            <i class="bi {{ $icon }} shrink-0 leading-none {{ $iconSizeClasses }}" aria-hidden="true"></i>
        @endif

        <span @class(['min-w-0', 'truncate' => $truncate])>{{ $slot }}</span>
    </{{ $tag }}>
</li>
