@props([
    'name' => null,
    'icon' => null,
    'badge' => null,
    'disabled' => false,
])

@aware([
    'variant' => 'underline',
    'color' => 'primary',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
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
        'pills', 'boxed', 'soft' => 'rounded-md px-3 py-1.5',
        default => '-mb-px border-b-2 border-transparent px-1 pb-2.5',
    };

    $inactiveClasses = match ($variant) {
        'pills', 'boxed', 'soft' => 'text-muted-foreground hover:bg-muted hover:text-foreground',
        default => 'text-muted-foreground hover:text-foreground',
    };

    $panelId = $name ? 'tab-panel-'.$name : null;
    $tabId = $name ? 'tab-'.$name : null;
@endphp

<button
    type="button"
    @if ($tabId) id="{{ $tabId }}" @endif
    @if ($panelId) aria-controls="{{ $panelId }}" @endif
    data-tab-name="{{ $name }}"
    role="tab"
    @disabled($disabled)
    @click="select('{{ $name }}')"
    x-bind:aria-selected="active === '{{ $name }}' ? 'true' : 'false'"
    x-bind:tabindex="active === '{{ $name }}' ? '0' : '-1'"
    x-bind:class="active === '{{ $name }}' ? '{{ $activeClasses }}' : '{{ $inactiveClasses }}'"
    {{
        $attributes->class([
            'inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary',
            $baseClasses,
            'cursor-not-allowed opacity-50' => $disabled,
        ])
    }}
>
    @if ($icon)
        <i class="bi {{ $icon }} shrink-0 leading-none" aria-hidden="true"></i>
    @endif

    <span>{{ $slot }}</span>

    @if ($badge !== null && $badge !== '')
        <x-ui.badge size="sm" pill :color="$color" variant="soft">{{ $badge }}</x-ui.badge>
    @endif
</button>
