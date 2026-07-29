@props([
    'icon' => null,
    'active' => false,
    'disabled' => false,
    'danger' => false,
    'color' => null,
    'href' => null,
    'keepOpen' => false,
])

@php
    // "danger" é um atalho retrocompatível para color="danger".
    if ($danger && ! $color) {
        $color = 'danger';
    }

    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    $tag = $href && ! $disabled ? 'a' : 'button';

    $colorClasses = match (true) {
        $disabled => 'cursor-not-allowed text-muted-foreground opacity-50',
        $color === 'primary' => 'text-primary hover:bg-primary/10',
        $color === 'secondary' => 'text-secondary hover:bg-secondary/10',
        $color === 'success' => 'text-success hover:bg-success/10',
        $color === 'warning' => 'text-warning hover:bg-warning/10',
        $color === 'danger' => 'text-danger hover:bg-danger/10',
        $color === 'info' => 'text-info hover:bg-info/10',
        $active => 'bg-primary/10 text-primary',
        default => 'text-popover-foreground hover:bg-header-hover',
    };
@endphp

<{{ $tag }}
    @if ($tag === 'a')
        href="{{ $href }}"
    @else
        type="button"
    @endif
    @disabled($disabled)
    @if ($keepOpen)
        data-keep-open
    @endif
    role="menuitem"
    {{
        $attributes->class([
            'flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors',
            $colorClasses,
        ])
    }}
>
    @if ($icon)
        <i class="bi {{ $icon }} shrink-0 text-base leading-none" aria-hidden="true"></i>
    @endif

    <span class="min-w-0 flex-1 truncate">{{ $slot }}</span>
</{{ $tag }}>
