@props([
    'orientation' => 'vertical',
    'height' => '16rem',
    'maxHeight' => null,
    'maxWidth' => null,
    'scrollbar' => 'thin',
    'color' => 'muted',
    'fade' => true,
    'shadow' => false,
    'smooth' => true,
    'overscroll' => 'contain',
    'rounded' => 'md',
    'bordered' => true,
    'padding' => 'md',
    'offset' => 8,
    'showButtons' => false,
    'label' => 'Área de rolagem',
])

@php
    if (! in_array($orientation, ['vertical', 'horizontal', 'both'], true)) {
        $orientation = 'vertical';
    }

    if (! in_array($scrollbar, ['auto', 'thin', 'hidden'], true)) {
        $scrollbar = 'thin';
    }

    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'muted', 'foreground'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'muted';
    }

    if (! in_array($overscroll, ['auto', 'contain', 'none'], true)) {
        $overscroll = 'contain';
    }

    if (! in_array($rounded, ['none', 'sm', 'md', 'lg', 'xl', 'full'], true)) {
        $rounded = 'md';
    }

    if (! in_array($padding, ['none', 'sm', 'md', 'lg'], true)) {
        $padding = 'md';
    }

    $fade = (bool) $fade;
    $shadow = (bool) $shadow;
    $smooth = (bool) $smooth;
    $bordered = (bool) $bordered;
    $showButtons = (bool) $showButtons;
    $offset = max(0, (int) $offset);

    $hasHeader = isset($header) && $header->isNotEmpty();
    $hasFooter = isset($footer) && $footer->isNotEmpty();

    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $paddingClasses = match ($padding) {
        'none' => 'p-0',
        'sm' => 'p-2',
        'lg' => 'p-5',
        default => 'p-4',
    };

    $chromePaddingClasses = match ($padding) {
        'none' => 'px-0 py-2',
        'sm' => 'px-2 py-2',
        'lg' => 'px-5 py-3',
        default => 'px-4 py-2.5',
    };

    $overflowClasses = match ($orientation) {
        'horizontal' => 'overflow-x-auto overflow-y-hidden',
        'both' => 'overflow-auto',
        default => 'overflow-y-auto overflow-x-hidden',
    };

    $overscrollClasses = match ($overscroll) {
        'none' => 'overscroll-none',
        'auto' => 'overscroll-auto',
        default => 'overscroll-contain',
    };

    $thumbColor = match ($color) {
        'primary' => 'var(--primary)',
        'secondary' => 'var(--secondary)',
        'success' => 'var(--success)',
        'warning' => 'var(--warning)',
        'danger' => 'var(--danger)',
        'info' => 'var(--info)',
        'foreground' => 'var(--foreground)',
        default => 'var(--muted-foreground)',
    };

    $shellStyle = implode('; ', array_filter([
        $height ? '--ui-scroll-height: '.$height : null,
        $maxHeight ? '--ui-scroll-max-height: '.$maxHeight : null,
        $maxWidth ? '--ui-scroll-max-width: '.$maxWidth : null,
        '--ui-scroll-thumb: '.$thumbColor,
    ]));

    $config = [
        'orientation' => $orientation,
        'smooth' => $smooth,
        'offset' => $offset,
    ];

    $isHorizontal = $orientation === 'horizontal';
    $startIcon = $isHorizontal ? 'bi-chevron-left' : 'bi-chevron-up';
    $endIcon = $isHorizontal ? 'bi-chevron-right' : 'bi-chevron-down';
    $startLabel = $isHorizontal ? 'Rolar para o início' : 'Rolar para o topo';
    $endLabel = $isHorizontal ? 'Rolar para o fim' : 'Rolar para o final';
@endphp

{{--
    A lógica de overflow / fades / API vive em resources/js/scroll.js
    (Alpine.data('scrollArea')), não inline neste x-data — comparações e
    arrow functions direto no atributo quebram wire:navigate. Ver
    reference/scroll.md na skill ui-components.
--}}
<div
    x-data="scrollArea(@js($config))"
    {{
        $attributes->class([
            'ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground',
            $roundedClasses,
            'border border-border' => $bordered,
            'ui-scroll-horizontal' => $isHorizontal,
            'ui-scroll-both' => $orientation === 'both',
        ])
    }}
    style="{{ $shellStyle }}"
    role="region"
    aria-label="{{ $label }}"
>
    @if ($hasHeader)
        <div @class([
            'ui-scroll-header shrink-0 border-b border-border bg-card/95 backdrop-blur-sm',
            $chromePaddingClasses,
        ])>
            {{ $header }}
        </div>
    @endif

    <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
        <div
            x-ref="viewport"
            @class([
                'ui-scroll-viewport h-full min-h-0 min-w-0',
                $overflowClasses,
                $overscrollClasses,
                $paddingClasses,
                'scroll-smooth' => $smooth,
                'ui-scroll-bar-auto' => $scrollbar === 'auto',
                'ui-scroll-bar-thin' => $scrollbar === 'thin',
                'ui-scroll-bar-hidden' => $scrollbar === 'hidden',
            ])
            tabindex="0"
            x-on:scroll="onScroll()"
        >
            <div x-ref="content" class="ui-scroll-content">
                {{ $slot }}
            </div>
        </div>

        @if ($fade)
            <div
                class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]"
                x-show="showStartFade()"
                x-cloak
                aria-hidden="true"
            ></div>
            <div
                class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]"
                x-show="showEndFade()"
                x-cloak
                aria-hidden="true"
            ></div>
        @endif

        @if ($shadow)
            <div
                class="ui-scroll-shadow ui-scroll-shadow-start pointer-events-none absolute z-[1]"
                x-show="showStartFade()"
                x-cloak
                aria-hidden="true"
            ></div>
            <div
                class="ui-scroll-shadow ui-scroll-shadow-end pointer-events-none absolute z-[1]"
                x-show="showEndFade()"
                x-cloak
                aria-hidden="true"
            ></div>
        @endif

        @if ($showButtons)
            <button
                type="button"
                class="ui-scroll-btn ui-scroll-btn-start absolute z-[2] inline-flex size-8 items-center justify-center rounded-full border border-border bg-card text-foreground shadow-sm transition hover:bg-muted focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40"
                x-show="showStartButton()"
                x-cloak
                x-on:click="scrollToStart()"
                aria-label="{{ $startLabel }}"
            >
                <i class="bi {{ $startIcon }} text-sm leading-none" aria-hidden="true"></i>
            </button>
            <button
                type="button"
                class="ui-scroll-btn ui-scroll-btn-end absolute z-[2] inline-flex size-8 items-center justify-center rounded-full border border-border bg-card text-foreground shadow-sm transition hover:bg-muted focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40"
                x-show="showEndButton()"
                x-cloak
                x-on:click="scrollToEnd()"
                aria-label="{{ $endLabel }}"
            >
                <i class="bi {{ $endIcon }} text-sm leading-none" aria-hidden="true"></i>
            </button>
        @endif
    </div>

    @if ($hasFooter)
        <div @class([
            'ui-scroll-footer shrink-0 border-t border-border bg-card/95 backdrop-blur-sm',
            $chromePaddingClasses,
        ])>
            {{ $footer }}
        </div>
    @endif
</div>
