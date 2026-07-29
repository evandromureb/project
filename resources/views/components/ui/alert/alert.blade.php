@props([
    'color' => 'primary',
    'variant' => 'soft',
    'title' => null,
    'icon' => null,
    'dismissible' => false,
])

@php
    // Mesma família de tokens usada nos badges/avatares do app, nunca cores Tailwind fixas.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($variant, ['soft', 'solid', 'outline'], true)) {
        $variant = 'soft';
    }

    $defaultIcon = match ($color) {
        'success' => 'bi-check-circle-fill',
        'warning' => 'bi-exclamation-triangle-fill',
        'danger' => 'bi-x-octagon-fill',
        'secondary' => 'bi-bell-fill',
        'info' => 'bi-info-circle-fill',
        default => 'bi-info-circle-fill',
    };

    $iconClass = match (true) {
        $icon === false => null,
        $icon === true => $defaultIcon,
        is_string($icon) => $icon,
        default => null,
    };

    $softClasses = match ($color) {
        'primary' => 'border border-primary/20 border-l-4 border-l-primary bg-primary/10 text-primary',
        'secondary' => 'border border-secondary/20 border-l-4 border-l-secondary bg-secondary/10 text-secondary',
        'success' => 'border border-success/20 border-l-4 border-l-success bg-success/10 text-success',
        'warning' => 'border border-warning/20 border-l-4 border-l-warning bg-warning/10 text-warning',
        'danger' => 'border border-danger/20 border-l-4 border-l-danger bg-danger/10 text-danger',
        'info' => 'border border-info/20 border-l-4 border-l-info bg-info/10 text-info',
    };

    $solidClasses = match ($color) {
        'primary' => 'border border-primary bg-primary text-primary-foreground',
        'secondary' => 'border border-secondary bg-secondary text-secondary-foreground',
        'success' => 'border border-success bg-success text-success-foreground',
        'warning' => 'border border-warning bg-warning text-warning-foreground',
        'danger' => 'border border-danger bg-danger text-danger-foreground',
        'info' => 'border border-info bg-info text-info-foreground',
    };

    $outlineClasses = match ($color) {
        'primary' => 'border border-primary bg-card text-primary',
        'secondary' => 'border border-secondary bg-card text-secondary',
        'success' => 'border border-success bg-card text-success',
        'warning' => 'border border-warning bg-card text-warning',
        'danger' => 'border border-danger bg-card text-danger',
        'info' => 'border border-info bg-card text-info',
    };

    $variantClasses = match ($variant) {
        'solid' => $solidClasses,
        'outline' => $outlineClasses,
        default => $softClasses,
    };

    $hasTitle = (bool) $title;
    $hasBody = $slot->isNotEmpty();
    $hasActions = isset($actions);
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    role="alert"
    {{ $attributes->class([$variantClasses, 'flex items-start gap-3 rounded-md px-4 py-3 text-sm']) }}
>
    @if ($iconClass)
        <i class="bi {{ $iconClass }} mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
    @endif

    <div class="min-w-0 flex-1">
        @if ($hasTitle)
            <p class="mb-0 font-semibold leading-tight {{ $hasBody || $hasActions ? 'mb-1' : '' }}">{{ $title }}</p>
        @endif

        @if ($hasBody)
            <div class="leading-relaxed {{ $hasTitle ? 'text-[13px] opacity-90' : '' }}">
                {{ $slot }}
            </div>
        @endif

        @if ($hasActions)
            <div class="mt-3 flex flex-wrap items-center gap-2">
                {{ $actions }}
            </div>
        @endif
    </div>

    @if ($dismissible)
        <button
            type="button"
            @click="show = false"
            class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current"
            aria-label="Fechar"
        >
            <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
        </button>
    @endif
</div>
