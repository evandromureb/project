@props([
    'text' => null,
    'placement' => 'auto',
    'on' => 'hover',
    'color' => 'dark',
    'arrow' => true,
])

@php
    // "dark" é intencionalmente uma superfície fixa (não os tokens do tema
    // ativo) — tooltips clássicos são sempre escuros, mesmo tema claro
    // ativo, mesma exceção do <x-ui.dropdown dark>.
    $bubbleClasses = match ($color) {
        'light' => 'border border-border bg-popover text-popover-foreground',
        'primary' => 'bg-primary text-primary-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground',
        'success' => 'bg-success text-success-foreground',
        'warning' => 'bg-warning text-warning-foreground',
        'danger' => 'bg-danger text-danger-foreground',
        'info' => 'bg-info text-info-foreground',
        default => 'bg-neutral-900 text-neutral-100', // dark
    };

    $arrowClasses = match ($color) {
        'light' => 'border border-border bg-popover',
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
        default => 'bg-neutral-900',
    };
@endphp

{{--
    Teleportado para o final do <body> pelo mesmo motivo do <x-ui.dropdown>:
    qualquer ancestral com overflow/clip corta elementos "fixed" — ver
    reference/dropdown.md. Posição calculada em JS a partir do retângulo do
    acionador, com auto-flip vertical (placement="auto", padrão) igual ao
    dropdown — ver reference/dropdown.md e reference/tooltip.md.
--}}
<span
    x-data="tooltip(@js($placement))"
    x-ref="trigger"
    class="inline-block"
    @if ($on === 'click')
        @click="show ? close() : open()"
    @else
        @mouseenter="open()"
        @mouseleave="close()"
        @focus="open()"
        @blur="close()"
    @endif
>
    {{ $slot }}

    <template x-teleport="body">
        <div
            x-ref="bubble"
            x-show="show"
            x-cloak
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-bind:style="tooltipStyle"
            role="tooltip"
            {{
                $attributes->class([
                    'z-[110] max-w-[220px] rounded-md px-2.5 py-1.5 text-xs font-medium shadow-lg',
                    $bubbleClasses,
                ])
            }}
        >
            @isset($content)
                {{ $content }}
            @else
                {{ $text }}
            @endisset

            @if ($arrow)
                <span
                    class="absolute size-2 rotate-45 {{ $arrowClasses }}"
                    x-bind:class="{
                        '-bottom-1 left-1/2 -translate-x-1/2': resolvedPlacement === 'top',
                        '-top-1 left-1/2 -translate-x-1/2': resolvedPlacement === 'bottom',
                        '-right-1 top-1/2 -translate-y-1/2': resolvedPlacement === 'left',
                        '-left-1 top-1/2 -translate-y-1/2': resolvedPlacement === 'right',
                    }"
                    aria-hidden="true"
                ></span>
            @endif
        </div>
    </template>
</span>
