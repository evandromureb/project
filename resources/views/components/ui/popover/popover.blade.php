@props([
    'title' => null,
    'placement' => 'auto',
    'on' => 'click',
    'color' => null,
    'closeButton' => true,
    'arrow' => true,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    $hasColoredHeader = ($title || $closeButton) && $color !== null && in_array($color, $tokenColors, true);

    $headerClasses = $hasColoredHeader
        ? match ($color) {
            'primary' => 'bg-primary text-primary-foreground',
            'secondary' => 'bg-secondary text-secondary-foreground',
            'success' => 'bg-success text-success-foreground',
            'warning' => 'bg-warning text-warning-foreground',
            'danger' => 'bg-danger text-danger-foreground',
            'info' => 'bg-info text-info-foreground',
        }
        : 'text-popover-foreground';

    // A seta fica na borda superior do painel quando ele abre para BAIXO
    // (resolvedPlacement "bottom") — ali ela encosta no header, então precisa
    // da mesma cor dele (sem a borda cinza, pra não destoar); nas demais
    // bordas ela encosta no corpo (bg-popover + borda, como antes).
    $topArrowFillClasses = $hasColoredHeader
        ? match ($color) {
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'success' => 'bg-success',
            'warning' => 'bg-warning',
            'danger' => 'bg-danger',
            'info' => 'bg-info',
        }
        : 'bg-popover';

    $topArrowBorderClasses = $hasColoredHeader ? '' : 'border border-border border-r-0 border-b-0';
@endphp

{{--
    Mesma técnica de posicionamento do <x-ui.tooltip>/<x-ui.dropdown>: teleporte
    para <body> (evita ancestrais com overflow cortando o painel) + posição
    "fixed" calculada em JS com auto-flip vertical. Ver reference/dropdown.md.
--}}
<div
    x-data="popover(@js($placement))"
    x-ref="trigger"
    @click.window="closeIfOutside($event.target)"
    @keydown.escape.window="close()"
    class="inline-block"
>
    <div
        @if ($on === 'hover')
            @mouseenter="openPopover()"
            @mouseleave="close()"
        @else
            @click="toggle()"
        @endif
        class="inline-block"
    >
        {{ $trigger }}
    </div>

    <template x-teleport="body">
        <div
            x-ref="panel"
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-bind:style="popoverStyle"
            role="dialog"
            {{
                $attributes->class([
                    'z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg',
                ])
            }}
        >
            @if ($title || $closeButton)
                <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 {{ $headerClasses }}">
                    <h6 class="m-0 text-sm font-semibold">{{ $title }}</h6>

                    @if ($closeButton)
                        <button
                            type="button"
                            @click="close()"
                            class="btn-icon -mr-1 size-6 shrink-0"
                            aria-label="Fechar"
                        >
                            <i class="bi bi-x text-sm leading-none" aria-hidden="true"></i>
                        </button>
                    @endif
                </div>
            @endif

            <div class="px-4 py-3 text-sm">
                {{ $slot }}
            </div>

            @if ($arrow)
                <span
                    class="absolute size-3 rotate-45"
                    x-bind:class="{
                        'bg-popover border border-border -bottom-1.5 left-1/2 -translate-x-1/2 border-t-0 border-l-0': resolvedPlacement === 'top',
                        '{{ $topArrowFillClasses }} {{ $topArrowBorderClasses }} -top-1.5 left-1/2 -translate-x-1/2': resolvedPlacement === 'bottom',
                        'bg-popover border border-border -right-1.5 top-1/2 -translate-y-1/2 border-b-0 border-l-0': resolvedPlacement === 'left',
                        'bg-popover border border-border -left-1.5 top-1/2 -translate-y-1/2 border-t-0 border-r-0': resolvedPlacement === 'right',
                    }"
                    aria-hidden="true"
                ></span>
            @endif
        </div>
    </template>
</div>
