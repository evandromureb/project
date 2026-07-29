@props([
    'position' => 'top-right',
    'variant' => 'soft',
    'size' => 'md',
    'max' => null,
])

@php
    if (! in_array($position, ['top-right', 'top-left', 'top-center', 'bottom-right', 'bottom-left', 'bottom-center'], true)) {
        $position = 'top-right';
    }

    if (! in_array($variant, ['soft', 'solid', 'outline'], true)) {
        $variant = 'soft';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    $positionClasses = match ($position) {
        'top-left' => 'top-4 left-4 items-start',
        'top-center' => 'top-4 left-1/2 -translate-x-1/2 items-center',
        'bottom-right' => 'bottom-4 right-4 items-end',
        'bottom-left' => 'bottom-4 left-4 items-start',
        'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2 items-center',
        default => 'top-4 right-4 items-end', // top-right
    };

    $widthClasses = match ($size) {
        'sm' => 'max-w-xs',
        'lg' => 'max-w-md',
        default => 'max-w-sm',
    };

    $paddingClasses = match ($size) {
        'sm' => 'gap-2.5 p-3',
        'lg' => 'gap-3.5 p-4',
        default => 'gap-3 p-3.5',
    };

    $titleClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $messageClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $iconWrapClasses = match ($size) {
        'sm' => 'size-7 text-sm',
        'lg' => 'size-10 text-lg',
        default => 'size-8 text-base',
    };

    // Toasts entram deslizando do lado de fora mais próximo — de cima quando
    // o container fica no topo, de baixo quando fica embaixo.
    $enterFromClasses = str_starts_with($position, 'top') ? '-translate-y-2 opacity-0' : 'translate-y-2 opacity-0';
@endphp

{{--
    Teleportado para o final do <body> pelo mesmo motivo do <x-ui.modal>/<x-ui.dropdown>:
    qualquer ancestral com overflow/clip corta elementos "fixed" — ver
    reference/dropdown.md. Estado vive na store global (resources/js/toast.js),
    então qualquer parte do app pode empilhar um toast sem ser vizinha deste
    container no DOM. Coloque este componente uma única vez por posição
    (normalmente no layout principal).

    Classes de tom/variante vêm de $store.toast.*Class(...) — não de objetos
    multilinha no x-bind:class (quebram o HTML e o toast some).

    O wrapper "x-data" aqui é obrigatório, mesmo vazio: o walker inicial do
    Alpine só descobre uma subárvore a partir de um elemento que bate com um
    "root selector" — só "[x-data]" (Alpine) e "[wire\:id]" (registrado pelo
    Livewire) contam. "x-teleport" sozinho NÃO é um root selector; ele só é
    processado quando já está dentro da subárvore de algum root. Todo outro
    componente flutuante desta lib (dropdown/modal/tooltip/popover)
    aninha seu <template x-teleport> dentro de um <div x-data="..."> que já
    existe por outro motivo (o trigger). Este componente não tem trigger
    próprio (lê tudo de $store.toast), e como <x-ui.toast-container> é
    montado direto no layout — fora de qualquer div[wire:id] do Livewire — ele
    fica fora de QUALQUER root, e o Alpine nunca visita esse nó: nenhum erro
    no console, o toast simplesmente nunca aparece. Ver reference/toast.md.
--}}
<div x-data>
<template x-teleport="body">
    <div
        class="pointer-events-none fixed z-[130] flex w-full flex-col gap-2.5 {{ $widthClasses }} {{ $positionClasses }}"
        data-toast-container="{{ $position }}"
        data-toast-variant="{{ $variant }}"
    >
        <template x-for="item in $store.toast.forPosition('{{ $position }}', @js($max))" :key="item.id">
            <div
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="{{ $enterFromClasses }}"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="translate-y-0 opacity-100"
                x-transition:leave-end="opacity-0"
                @mouseenter="$store.toast.pause(item.id)"
                @mouseleave="$store.toast.resume(item.id)"
                role="alert"
                aria-live="polite"
                class="pointer-events-auto w-full overflow-hidden rounded-xl shadow-lg backdrop-blur-sm"
                x-bind:class="$store.toast.shellClass(item, '{{ $variant }}')"
            >
                <div class="flex items-start {{ $paddingClasses }}">
                    <span
                        x-show="item.icon"
                        class="inline-flex shrink-0 items-center justify-center rounded-lg {{ $iconWrapClasses }}"
                        x-bind:class="$store.toast.iconClass(item, '{{ $variant }}')"
                        aria-hidden="true"
                    >
                        <i x-bind:class="'bi ' + item.icon + ' leading-none'" aria-hidden="true"></i>
                    </span>

                    <div class="min-w-0 flex-1 pt-0.5">
                        <p
                            x-show="item.title"
                            x-text="item.title"
                            class="mb-0.5 font-semibold tracking-tight {{ $titleClasses }}"
                        ></p>
                        <p
                            x-show="item.message"
                            x-text="item.message"
                            class="m-0 leading-relaxed {{ $messageClasses }}"
                            x-bind:class="item.title ? 'opacity-80' : 'opacity-90'"
                        ></p>

                        <div x-show="item.actions.length" class="mt-2.5 flex flex-wrap gap-1.5">
                            <template x-for="action in item.actions" :key="action.label">
                                <button
                                    type="button"
                                    @mousedown.prevent
                                    @click="action.onClick && action.onClick(); $store.toast.dismiss(item.id)"
                                    class="rounded-md px-2 py-1 text-xs font-semibold transition-colors"
                                    x-bind:class="$store.toast.actionClass(item, '{{ $variant }}')"
                                    x-text="action.label"
                                ></button>
                            </template>
                        </div>
                    </div>

                    <button
                        type="button"
                        x-show="item.dismissible"
                        @mousedown.prevent
                        @click="$store.toast.dismiss(item.id)"
                        class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:opacity-100"
                        x-bind:class="$store.toast.dismissClass(item, '{{ $variant }}')"
                        aria-label="Fechar notificação"
                    >
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                </div>

                <div
                    x-show="item.duration"
                    class="h-0.5 w-full"
                    x-bind:class="$store.toast.progressTrackClass(item, '{{ $variant }}')"
                >
                    <div
                        class="h-full transition-[width] duration-100 ease-linear"
                        x-bind:style="'width:' + item.progress + '%'"
                        x-bind:class="$store.toast.progressBarClass(item, '{{ $variant }}')"
                    ></div>
                </div>
            </div>
        </template>
    </div>
</template>
</div>
