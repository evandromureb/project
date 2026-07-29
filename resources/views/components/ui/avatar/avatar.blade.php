@props([
    'name' => null,
    'initials' => null,
    'icon' => null,
    'src' => null,
    'alt' => null,
    'size' => 'md',
    'circle' => false,
    'color' => null,
    'badge' => null,
    'badgeColor' => 'success',
    'href' => null,
])

@php
    if ($name && ! $initials) {
        $parts = collect(explode(' ', trim($name)))->filter()->values()->all();

        $initials = match (true) {
            count($parts) > 1 => strtoupper(mb_substr($parts[0], 0, 1) . mb_substr($parts[1], 0, 1)),
            count($parts) === 1 => strtoupper(mb_substr($parts[0], 0, 1)),
            default => null,
        };
    }

    $hasContent = $icon || $initials || $slot->isNotEmpty();

    // Sem nome/inicial/ícone/slot, cai para um ícone padrão (evita quadrado vazio)
    if (! $hasContent) {
        $icon = 'bi-person-fill';
    }

    // Mesma família de tokens usada nos badges/ícones do app (bg-{token}/15 text-{token}),
    // nunca cores Tailwind fixas — ver resources/css/themes/*.css.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if ($color === 'auto') {
        $seed = $name ?? $icon ?? $initials ?? (string) $slot;
        $color = $tokenColors[crc32((string) $seed) % count($tokenColors)];
    }

    $sizeClasses = match ($size) {
        'xs' => 'size-6 text-xs',
        'sm' => 'size-8 text-xs',
        'lg' => 'size-12 text-base',
        'xl' => 'size-16 text-lg',
        default => 'size-10 text-sm',
    };

    $colorClasses = match ($color) {
        'primary' => 'bg-primary/15 text-primary',
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-muted text-foreground',
    };

    $badgeColorClasses = match ($badgeColor) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
        default => 'bg-success',
    };

    $shapeClasses = $circle ? 'rounded-full' : 'rounded-md';

    $classes = [
        'relative inline-flex shrink-0 select-none items-center justify-center font-medium',
        $sizeClasses,
        $colorClasses,
        $shapeClasses,
    ];

    $label = $alt ?? $name;
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }} @if ($label) title="{{ $label }}" @endif>
        @if ($src)
            <img src="{{ $src }}" alt="{{ $label }}" class="size-full object-cover {{ $shapeClasses }}">
        @elseif ($icon)
            <i class="bi {{ $icon }}" aria-hidden="true"></i>
        @else
            <span>{{ $initials ?? $slot }}</span>
        @endif

        @if ($badge)
            <span class="absolute right-0 bottom-0 flex size-3 items-center justify-center rounded-full ring-2 ring-card {{ $badgeColorClasses }}" aria-hidden="true">{{ is_string($badge) ? $badge : '' }}</span>
        @endif
    </a>
@else
    <div {{ $attributes->class($classes) }} @if ($label) title="{{ $label }}" @endif>
        @if ($src)
            <img src="{{ $src }}" alt="{{ $label }}" class="size-full object-cover {{ $shapeClasses }}">
        @elseif ($icon)
            <i class="bi {{ $icon }}" aria-hidden="true"></i>
        @else
            <span>{{ $initials ?? $slot }}</span>
        @endif

        @if ($badge)
            <span class="absolute right-0 bottom-0 flex size-3 items-center justify-center rounded-full ring-2 ring-card {{ $badgeColorClasses }}" aria-hidden="true">{{ is_string($badge) ? $badge : '' }}</span>
        @endif
    </div>
@endif
