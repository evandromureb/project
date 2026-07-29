@props([
    'name' => null,
    'title' => null,
    'size' => 'md',
    'fullscreenBelow' => null,
    'centered' => false,
    'scrollable' => false,
    'staticBackdrop' => false,
    'keyboard' => true,
    'animation' => 'fade',
    'position' => 'center',
    'closeButton' => true,
])

@php
    $sizeClasses = match ($size) {
        'sm' => 'max-w-sm',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'fullscreen' => 'h-full w-full max-w-none rounded-none',
        default => 'max-w-lg', // md
    };

    // Reverte para o tamanho "md" padrão a partir do breakpoint informado —
    // não dá para combinar dinamicamente breakpoint + "size" mantendo nomes
    // de classe literais (exigência do scanner estático do Tailwind), então
    // fullscreenBelow sempre "pousa" no tamanho md ao cruzar o breakpoint.
    $fullscreenResponsiveClasses = match ($fullscreenBelow) {
        'sm' => 'h-full w-full max-w-none rounded-none sm:h-auto sm:max-w-lg sm:rounded-md',
        'md' => 'h-full w-full max-w-none rounded-none md:h-auto md:max-w-lg md:rounded-md',
        'lg' => 'h-full w-full max-w-none rounded-none lg:h-auto lg:max-w-lg lg:rounded-md',
        'xl' => 'h-full w-full max-w-none rounded-none xl:h-auto xl:max-w-lg xl:rounded-md',
        default => null,
    };

    $dialogSizeClasses = $fullscreenResponsiveClasses ?? $sizeClasses;

    $positionClasses = match ($position) {
        'top' => 'items-start justify-center pt-16',
        'top-right' => 'items-start justify-end p-6',
        'top-left' => 'items-start justify-start p-6',
        'bottom' => 'items-end justify-center pb-16',
        'bottom-right' => 'items-end justify-end p-6',
        'bottom-left' => 'items-end justify-start p-6',
        default => $centered ? 'items-center justify-center' : 'items-start justify-center pt-16',
    };

    // Estado inicial (opacity-0 + deslocamento) e final (opacity-100 +
    // posição neutra) da animação de entrada/saída do diálogo — a transição
    // em si é sempre a mesma (fade + transform), só os pontos mudam.
    [$animationFrom, $animationTo] = match ($animation) {
        'zoom' => ['opacity-0 scale-75', 'opacity-100 scale-100'],
        'slide-up' => ['opacity-0 translate-y-8', 'opacity-100 translate-y-0'],
        'slide-down' => ['opacity-0 -translate-y-8', 'opacity-100 translate-y-0'],
        'slide-left' => ['opacity-0 -translate-x-8', 'opacity-100 translate-x-0'],
        'slide-right' => ['opacity-0 translate-x-8', 'opacity-100 translate-x-0'],
        default => ['opacity-0 scale-95', 'opacity-100 scale-100'], // fade
    };
@endphp

{{--
    Teleportado para o final do <body> pelo mesmo motivo do <x-ui.dropdown>:
    qualquer ancestral com overflow/clip (o card do <x-ui.example>,
    .page-content no layout) corta elementos "fixed" — ver reference/dropdown.md.
    Estado vive na store global (resources/js/modal.js), mesmo padrão do
    <x-ui.collapse> — o gatilho não precisa ser vizinho do modal no DOM.
--}}
<template x-teleport="body">
    <div
        x-show="$store.modal.isOpen('{{ $name }}')"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[100] flex {{ $positionClasses }} overflow-y-auto p-4"
        role="presentation"
    >
        <div
            @if (! $staticBackdrop)
                @click="$store.modal.hide('{{ $name }}')"
            @endif
            class="fixed inset-0 bg-black/50"
            aria-hidden="true"
        ></div>

        <div
            x-trap.noscroll="$store.modal.isOpen('{{ $name }}')"
            @if ($keyboard)
                @keydown.escape.window="$store.modal.hide('{{ $name }}')"
            @endif
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="{{ $animationFrom }}"
            x-transition:enter-end="{{ $animationTo }}"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="{{ $animationTo }}"
            x-transition:leave-end="{{ $animationFrom }}"
            role="dialog"
            aria-modal="true"
            @if ($title)
                aria-label="{{ $title }}"
            @endif
            {{
                $attributes->class([
                    'relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg',
                    $dialogSizeClasses,
                    'max-h-[calc(100vh_-_2rem)]' => $scrollable,
                ])
            }}
        >
            @if ($title || isset($header) || $closeButton)
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    @isset($header)
                        {{ $header }}
                    @else
                        <h5 class="m-0 text-base font-semibold text-card-foreground">{{ $title }}</h5>
                    @endisset

                    @if ($closeButton)
                        <button
                            type="button"
                            @click="$store.modal.hide('{{ $name }}')"
                            class="btn-icon -mr-2 shrink-0"
                            aria-label="Fechar"
                        >
                            <i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i>
                        </button>
                    @endif
                </div>
            @endif

            <div class="{{ $scrollable ? 'overflow-y-auto' : '' }} p-5">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</template>
