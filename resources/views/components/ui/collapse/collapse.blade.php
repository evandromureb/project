@props([
    'name' => null,
    'show' => false,
    'horizontal' => false,
    'width' => 'max-w-sm',
])

@php
    $panelId = $name ? 'collapse-'.$name : null;
@endphp

@if ($horizontal)
    {{--
        x-collapse (plugin oficial do Alpine) só anima "height" — não existe
        modo horizontal embutido. Aproximamos um collapse de largura com
        overflow-hidden + transição de max-width; o conteúdo interno usa
        w-max para manter sua largura natural enquanto o contêiner encolhe.
    --}}
    <div
        @if ($panelId) id="{{ $panelId }}" @endif
        x-init="$store.collapse.setDefault('{{ $name }}', @js($show))"
        x-bind:class="$store.collapse.isOpen('{{ $name }}') ? '{{ $width }}' : 'max-w-0'"
        {{ $attributes->class('overflow-hidden transition-[max-width] duration-300') }}
    >
        <div class="w-max">
            {{ $slot }}
        </div>
    </div>
@else
    <div
        @if ($panelId) id="{{ $panelId }}" @endif
        x-show="$store.collapse.isOpen('{{ $name }}')"
        x-collapse
        x-cloak
        x-init="$store.collapse.setDefault('{{ $name }}', @js($show))"
        {{ $attributes }}
    >
        {{ $slot }}
    </div>
@endif
