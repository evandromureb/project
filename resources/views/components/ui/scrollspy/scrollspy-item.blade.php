@props([
    'target' => null,
    'icon' => null,
    'badge' => null,
    'nested' => false,
    'disabled' => false,
])

@aware([
    'variant' => 'list',
    'color' => 'primary',
    'vertical' => true,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];
    $variants = ['list', 'underline', 'pills', 'soft', 'boxed'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    // @aware recebe o valor cru da prop do pai (antes do fallback do pai) —
    // revalida aqui para "weird" não cair no default do match (underline).
    if (! in_array($variant, $variants, true)) {
        $variant = 'list';
    }

    $activeClasses = match ($variant) {
        'pills' => match ($color) {
            'primary' => 'bg-primary text-primary-foreground shadow-sm',
            'secondary' => 'bg-secondary text-secondary-foreground shadow-sm',
            'success' => 'bg-success text-success-foreground shadow-sm',
            'warning' => 'bg-warning text-warning-foreground shadow-sm',
            'danger' => 'bg-danger text-danger-foreground shadow-sm',
            'info' => 'bg-info text-info-foreground shadow-sm',
        },
        'soft' => match ($color) {
            'primary' => 'bg-primary/15 text-primary',
            'secondary' => 'bg-secondary/15 text-secondary',
            'success' => 'bg-success/15 text-success',
            'warning' => 'bg-warning/15 text-warning',
            'danger' => 'bg-danger/15 text-danger',
            'info' => 'bg-info/15 text-info',
        },
        'boxed' => match ($color) {
            'primary' => 'bg-card text-primary shadow-sm',
            'secondary' => 'bg-card text-secondary shadow-sm',
            'success' => 'bg-card text-success shadow-sm',
            'warning' => 'bg-card text-warning shadow-sm',
            'danger' => 'bg-card text-danger shadow-sm',
            'info' => 'bg-card text-info shadow-sm',
        },
        'list' => match ($color) {
            'primary' => 'z-[1] border-primary bg-primary text-primary-foreground',
            'secondary' => 'z-[1] border-secondary bg-secondary text-secondary-foreground',
            'success' => 'z-[1] border-success bg-success text-success-foreground',
            'warning' => 'z-[1] border-warning bg-warning text-warning-foreground',
            'danger' => 'z-[1] border-danger bg-danger text-danger-foreground',
            'info' => 'z-[1] border-info bg-info text-info-foreground',
        },
        default => match ($color) { // underline
            'primary' => 'border-primary text-primary',
            'secondary' => 'border-secondary text-secondary',
            'success' => 'border-success text-success',
            'warning' => 'border-warning text-warning',
            'danger' => 'border-danger text-danger',
            'info' => 'border-info text-info',
        },
    };

    $baseClasses = match ($variant) {
        'list' => $vertical
            ? 'w-full border-b border-border px-3.5 py-2.5 last:border-b-0'
            : 'shrink-0 border-r border-border px-3.5 py-2.5 last:border-r-0',
        'pills', 'boxed', 'soft' => 'rounded-md px-3 py-1.5',
        default => $vertical
            ? '-ms-px border-s-2 border-transparent px-3 py-1.5'
            : '-mb-px border-b-2 border-transparent px-1 pb-2.5',
    };

    $inactiveClasses = match ($variant) {
        'list' => 'bg-card text-foreground hover:bg-muted/70',
        'pills', 'boxed', 'soft' => 'text-muted-foreground hover:bg-muted hover:text-foreground',
        default => 'text-muted-foreground hover:text-foreground',
    };

    $nestedClasses = $nested
        ? ($variant === 'list' ? 'ps-7 text-[0.8125rem]' : 'ps-5 text-[0.8125rem]')
        : '';
@endphp

<a
    href="#{{ $target }}"
    data-scrollspy-target="{{ $target }}"
    @if ($disabled)
        aria-disabled="true"
        tabindex="-1"
    @else
        @click.prevent="scrollTo(@js($target))"
    @endif
    x-bind:aria-current="active === @js($target) ? 'location' : null"
    x-bind:class="active === @js($target) ? @js($activeClasses) : @js($inactiveClasses)"
    {{
        $attributes->class([
            'inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap no-underline transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary',
            $baseClasses,
            $nestedClasses,
            'cursor-not-allowed opacity-50 pointer-events-none' => $disabled,
        ])
    }}
>
    @if ($icon)
        <i class="bi {{ $icon }} shrink-0 leading-none" aria-hidden="true"></i>
    @endif

    <span class="min-w-0 truncate">{{ $slot }}</span>

    @if ($badge !== null && $badge !== '')
        <x-ui.badge size="sm" pill :color="$color" variant="soft" class="ms-auto">{{ $badge }}</x-ui.badge>
    @endif
</a>
