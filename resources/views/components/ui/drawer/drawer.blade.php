@props([
    'name' => null,
    'title' => null,
    'description' => null,
    'placement' => 'end',
    'size' => 'md',
    'color' => null,
    'variant' => 'default',
    'rounded' => false,
    'backdrop' => true,
    'staticBackdrop' => false,
    'bodyScroll' => false,
    'scrollable' => false,
    'keyboard' => true,
    'closeButton' => true,
    'footerAlign' => 'end',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($placement, ['start', 'end', 'top', 'bottom'], true)) {
        $placement = 'end';
    }

    if (! in_array($size, ['sm', 'md', 'lg', 'xl', 'full'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'solid'], true)) {
        $variant = 'default';
    }

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($footerAlign, ['start', 'end', 'center', 'between', 'stretch'], true)) {
        $footerAlign = 'end';
    }

    $isHorizontal = in_array($placement, ['start', 'end'], true);

    // "start"/"end" dimensionam a largura, "top"/"bottom" a altura — os
    // valores de "size" são os mesmos nomes, mas cada eixo precisa das
    // próprias classes literais (exigência do scanner estático do Tailwind,
    // nada de interpolar breakpoint/tamanho — ver reference/modal.md).
    $sizeClasses = $isHorizontal
        ? match ($size) {
            'sm' => 'w-full max-w-xs',
            'lg' => 'w-full max-w-md',
            'xl' => 'w-full max-w-lg',
            'full' => 'w-full max-w-none',
            default => 'w-full max-w-sm', // md
        }
        : match ($size) {
            'sm' => 'h-40',
            'lg' => 'h-96',
            'xl' => 'h-[32rem]',
            'full' => 'h-full',
            default => 'h-64', // md
        };

    $placementClasses = match ($placement) {
        'start' => 'inset-y-0 left-0 border-r',
        'top' => 'inset-x-0 top-0 border-b',
        'bottom' => 'inset-x-0 bottom-0 border-t',
        default => 'inset-y-0 right-0 border-l', // end
    };

    // Cantos arredondados na borda livre — típico de bottom sheet / painel
    // flutuante; a borda que encosta na viewport permanece reta.
    $roundedClasses = $rounded
        ? match ($placement) {
            'start' => 'rounded-r-2xl',
            'top' => 'rounded-b-2xl',
            'bottom' => 'rounded-t-2xl',
            default => 'rounded-l-2xl', // end
        }
        : null;

    // Só o "transform" anima (sem opacity no painel) — o recuo entra/sai
    // pela borda de origem, como um offcanvas; o backdrop é
    // quem cuida do fade. Ver reference/modal.md sobre não misturar
    // transform de posicionamento com x-transition padrão (aqui não há
    // conflito: o transform É a animação, não um posicionamento fixo).
    [$animationFrom, $animationTo] = match ($placement) {
        'start' => ['-translate-x-full', 'translate-x-0'],
        'top' => ['-translate-y-full', 'translate-y-0'],
        'bottom' => ['translate-y-full', 'translate-y-0'],
        default => ['translate-x-full', 'translate-x-0'], // end
    };

    $hasColoredHeader = $color !== null;

    $headerClasses = match (true) {
        $hasColoredHeader && $variant === 'soft' => match ($color) {
            'primary' => 'border-b border-primary/15 bg-primary/10 text-primary',
            'secondary' => 'border-b border-secondary/15 bg-secondary/10 text-secondary',
            'success' => 'border-b border-success/15 bg-success/10 text-success',
            'warning' => 'border-b border-warning/15 bg-warning/10 text-warning',
            'danger' => 'border-b border-danger/15 bg-danger/10 text-danger',
            'info' => 'border-b border-info/15 bg-info/10 text-info',
        },
        $hasColoredHeader => match ($color) {
            'primary' => 'border-b border-primary bg-primary text-primary-foreground',
            'secondary' => 'border-b border-secondary bg-secondary text-secondary-foreground',
            'success' => 'border-b border-success bg-success text-success-foreground',
            'warning' => 'border-b border-warning bg-warning text-warning-foreground',
            'danger' => 'border-b border-danger bg-danger text-danger-foreground',
            'info' => 'border-b border-info bg-info text-info-foreground',
        },
        $variant === 'soft' => 'border-b border-border bg-muted/50 text-card-foreground',
        default => 'border-b border-border text-card-foreground',
    };

    // Com header colorido (solid ou soft), o título herda a cor do container;
    // no default, força o token de foreground do card.
    $titleClasses = $hasColoredHeader || $variant === 'soft'
        ? 'm-0 text-base font-semibold'
        : 'm-0 text-base font-semibold text-card-foreground';

    $descriptionClasses = match (true) {
        $hasColoredHeader && $variant !== 'soft' => 'm-0 mt-0.5 text-sm opacity-80',
        $hasColoredHeader => 'm-0 mt-0.5 text-sm opacity-75',
        default => 'm-0 mt-0.5 text-sm text-muted-foreground',
    };

    $closeButtonClasses = $hasColoredHeader && $variant !== 'soft'
        ? 'btn-icon -mr-2 shrink-0 text-inherit opacity-80 hover:opacity-100'
        : 'btn-icon -mr-2 shrink-0';

    $footerAlignClasses = match ($footerAlign) {
        'start' => 'justify-start',
        'center' => 'justify-center',
        'between' => 'justify-between',
        'stretch' => 'justify-stretch [&>*]:flex-1',
        default => 'justify-end',
    };

    $showHeader = $title || $description || isset($header) || $closeButton;
@endphp

{{--
    Teleportado para o final do <body>, mesmo motivo do <x-ui.modal>: um
    ancestral com overflow/clip cortaria um painel "fixed" — ver
    reference/dropdown.md. Estado vive na store global (resources/js/drawer.js).
--}}
<template x-teleport="body">
    <div
        x-show="$store.drawer.isOpen('{{ $name }}')"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100]"
        role="presentation"
    >
        @if ($backdrop)
            <div
                @if (! $staticBackdrop)
                    @click="$store.drawer.hide('{{ $name }}')"
                @endif
                class="fixed inset-0 bg-black/50"
                aria-hidden="true"
            ></div>
        @endif

        <div
            @if ($bodyScroll)
                x-trap="$store.drawer.isOpen('{{ $name }}')"
            @else
                x-trap.noscroll="$store.drawer.isOpen('{{ $name }}')"
            @endif
            @if ($keyboard)
                @keydown.escape.window="$store.drawer.hide('{{ $name }}')"
            @endif
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="{{ $animationFrom }}"
            x-transition:enter-end="{{ $animationTo }}"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="{{ $animationTo }}"
            x-transition:leave-end="{{ $animationFrom }}"
            role="dialog"
            aria-modal="{{ $backdrop ? 'true' : 'false' }}"
            @if ($title)
                aria-label="{{ $title }}"
            @endif
            {{
                $attributes->class([
                    'fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl',
                    $placementClasses,
                    $sizeClasses,
                    $roundedClasses,
                    'max-h-full' => ! $isHorizontal,
                ])
            }}
        >
            @if ($showHeader)
                <div class="flex items-start justify-between gap-3 px-5 py-4 {{ $headerClasses }}">
                    @isset($header)
                        <div class="min-w-0 flex-1">
                            {{ $header }}
                        </div>
                    @else
                        <div class="min-w-0 flex-1">
                            @if ($title)
                                <h5 class="{{ $titleClasses }}">{{ $title }}</h5>
                            @endif
                            @if ($description)
                                <p class="{{ $descriptionClasses }}">{{ $description }}</p>
                            @endif
                        </div>
                    @endisset

                    @if ($closeButton)
                        <button
                            type="button"
                            @click="$store.drawer.hide('{{ $name }}')"
                            class="{{ $closeButtonClasses }}"
                            aria-label="Fechar"
                        >
                            <i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i>
                        </button>
                    @endif
                </div>
            @endif

            <div class="{{ $scrollable ? 'overflow-y-auto' : '' }} min-h-0 flex-1 p-5">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 {{ $footerAlignClasses }}">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</template>
