@props([
    'name' => null,
    'title' => null,
    'icon' => null,
    'badge' => null,
    'disabled' => false,
])

@aware([
    'color' => 'primary',
    'indicator' => 'chevron',
    'indicatorPosition' => 'end',
    'bordered' => false,
    'filled' => false,
])

@php
    $headerActiveClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
    };

    $fillClasses = match ($color) {
        'primary' => 'bg-primary/10',
        'secondary' => 'bg-secondary/10',
        'success' => 'bg-success/10',
        'warning' => 'bg-warning/10',
        'danger' => 'bg-danger/10',
        'info' => 'bg-info/10',
    };

    $wrapperClasses = $bordered ? 'overflow-hidden rounded-md border border-border' : '';
@endphp

<div class="{{ $wrapperClasses }}">
    <h3 class="m-0">
        <button
            type="button"
            data-accordion-name="{{ $name }}"
            @disabled($disabled)
            @click="toggle('{{ $name }}')"
            x-bind:aria-expanded="isOpen('{{ $name }}') ? 'true' : 'false'"
            aria-controls="accordion-panel-{{ $name }}"
            x-bind:class="isOpen('{{ $name }}') ? '{{ $filled ? $fillClasses : '' }}' : ''"
            {{
                $attributes->class([
                    'flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary',
                    'cursor-not-allowed opacity-50' => $disabled,
                    'hover:bg-muted' => ! $disabled,
                ])
            }}
        >
            @if ($indicatorPosition === 'start')
                @if ($indicator === 'plus')
                    <i
                        class="bi shrink-0 text-base leading-none text-muted-foreground"
                        x-bind:class="isOpen('{{ $name }}') ? 'bi-dash-lg' : 'bi-plus-lg'"
                        aria-hidden="true"
                    ></i>
                @else
                    <i
                        class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200"
                        x-bind:class="isOpen('{{ $name }}') ? 'rotate-180' : ''"
                        aria-hidden="true"
                    ></i>
                @endif
            @endif

            @if ($icon)
                <i class="bi {{ $icon }} shrink-0 text-base leading-none text-muted-foreground" aria-hidden="true"></i>
            @endif

            <span
                class="min-w-0 flex-1 text-foreground"
                x-bind:class="isOpen('{{ $name }}') ? '{{ $headerActiveClasses }}' : ''"
            >{{ $title }}</span>

            @if ($badge)
                <x-ui.badge size="sm" pill variant="soft" :color="$color">{{ $badge }}</x-ui.badge>
            @endif

            @if ($indicatorPosition === 'end')
                @if ($indicator === 'plus')
                    <i
                        class="bi shrink-0 text-base leading-none text-muted-foreground"
                        x-bind:class="isOpen('{{ $name }}') ? 'bi-dash-lg' : 'bi-plus-lg'"
                        aria-hidden="true"
                    ></i>
                @else
                    <i
                        class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200"
                        x-bind:class="isOpen('{{ $name }}') ? 'rotate-180' : ''"
                        aria-hidden="true"
                    ></i>
                @endif
            @endif
        </button>
    </h3>

    <div
        id="accordion-panel-{{ $name }}"
        x-show="isOpen('{{ $name }}')"
        x-collapse
        x-cloak
        role="region"
        x-bind:class="isOpen('{{ $name }}') ? '{{ $filled ? $fillClasses : '' }}' : ''"
    >
        <div class="px-4 pb-4 text-sm text-muted-foreground">
            {{ $slot }}
        </div>
    </div>
</div>
