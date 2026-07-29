@props([
    'label' => null,
    'color' => 'secondary',
    'variant' => 'outline',
    'size' => 'md',
    'split' => false,
    'direction' => 'auto',
    'align' => 'auto',
    'dark' => false,
    'autoClose' => true,
    'menuClass' => null,
])

@php
    // true = fecha ao clicar fora OU num item (padrão); 'outside' = só fecha
    // clicando fora (itens tipo checkbox não fecham o menu); 'inside' = só
    // fecha clicando num item (clique fora não fecha); false = manual (só via
    // Escape ou fechamento programático).
    $autoCloseOutside = $autoClose === true || $autoClose === 'outside';
    $autoCloseInside = $autoClose === true || $autoClose === 'inside';

    // "Dark" é intencionalmente uma superfície fixa (não os tokens do tema
    // ativo) — precisa parecer escura mesmo com um tema claro aplicado, igual
    // às prévias de tema no dropdown do usuário (ver layouts/header/user/_user.blade.php).
    $darkClasses = 'border-neutral-700 bg-neutral-900 text-neutral-100';
@endphp

{{--
    A lógica de abrir/fechar e posicionar o menu vive em resources/js/dropdown.js
    (Alpine.data('dropdown', ...)), não inline neste x-data — um objeto grande
    com comparações/arrow functions direto no atributo quebra a navegação via
    wire:navigate. Ver reference/dropdown.md na skill ui-components.

    O menu em si é teleportado para o final do <body> (x-teleport) e
    posicionado com "position: fixed" calculado em JS a partir do retângulo do
    acionador — necessário porque qualquer ancestral com overflow/clip (ex. o
    card do <x-ui.example>, ou .page-content no layout) corta elementos
    "absolute"/"fixed" mesmo com z-index alto.
--}}
<div
    x-data="dropdown(@js($direction), @js($align), @js($autoCloseOutside), @js($autoCloseInside))"
    x-ref="trigger"
    @keydown.escape.window="open = false"
    @click.window="closeIfOutside($event.target)"
    @resize.window="if (open) updatePosition()"
    @scroll.window="if (open) updatePosition()"
    class="inline-block"
>
    @isset($trigger)
        <div @click="toggle()" class="inline-block">
            {{ $trigger }}
        </div>
    @else
        @if ($split)
            <x-ui.button-group>
                <x-ui.button color="{{ $color }}" variant="{{ $variant }}" size="{{ $size }}">
                    {{ $label }}
                </x-ui.button>
                <x-ui.button
                    color="{{ $color }}"
                    variant="{{ $variant }}"
                    size="{{ $size }}"
                    icon="bi-chevron-down"
                    iconOnly
                    aria-label="Abrir menu"
                    @click="toggle()"
                    x-bind:aria-expanded="open ? 'true' : 'false'"
                />
            </x-ui.button-group>
        @else
            <x-ui.button
                color="{{ $color }}"
                variant="{{ $variant }}"
                size="{{ $size }}"
                icon="bi-chevron-down"
                iconPosition="end"
                @click="toggle()"
                x-bind:aria-expanded="open ? 'true' : 'false'"
            >
                {{ $label }}
            </x-ui.button>
        @endif
    @endisset

    <template x-teleport="body">
        <div
            x-ref="menu"
            x-show="open"
            x-cloak
            x-transition
            x-bind:style="menuStyle"
            @click="closeIfInside($event.target)"
            role="menu"
            {{
                $attributes->class([
                    'z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg',
                    $darkClasses => $dark,
                    $menuClass,
                ])
            }}
        >
            {{ $slot }}
        </div>
    </template>
</div>
