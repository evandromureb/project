@props([
    'name' => null,
    'target' => 'body',
    'offset' => 0,
    'top' => null,
    'bottom' => null,
    'middle' => false,
    'start' => null,
    'end' => null,
    'center' => false,
    'width' => null,
    'zindex' => '40',
    'reverse' => false,
    'activate' => null,
    'release' => null,
    'releaseDelay' => 0,
    'stickyClass' => null,
    'activeClass' => null,
    'releaseClass' => null,
    'root' => null,
    'height' => '20rem',
    'label' => null,
])

@php
    $middle = (bool) $middle;
    $center = (bool) $center;
    $reverse = (bool) $reverse;
    $offset = max(0, (int) $offset);
    $releaseDelay = max(0, (int) $releaseDelay);

    // root="self" → scroll container interno (demos) com target parent.
    if ($root === 'self') {
        $target = 'self';
    }

    $resolvedActiveClass = $activeClass ?: $stickyClass;
    $hasBeforeSlot = isset($before) && $before->isNotEmpty();
    $hasContentSlot = isset($content) && $content->isNotEmpty();
    $isSelfRoot = $target === 'self' || $root === 'self';

    $config = [
        'name' => $name,
        'target' => $target,
        'offset' => $offset,
        'top' => $top,
        'bottom' => $bottom,
        'middle' => $middle,
        'start' => $start,
        'end' => $end,
        'center' => $center,
        'width' => $width,
        'zindex' => $zindex,
        'reverse' => $reverse,
        'activate' => $activate,
        'release' => $release,
        'releaseDelay' => $releaseDelay,
        'activeClass' => $resolvedActiveClass,
        'releaseClass' => $releaseClass,
    ];

    $rootStyle = $isSelfRoot && $height ? "--ui-sticky-root-height: {$height};" : null;
@endphp

{{--
    A lógica de sticky vive em resources/js/sticky.js (Alpine.data('sticky')),
    não inline neste x-data — comparações e arrow functions direto no atributo
    quebram wire:navigate. Ver reference/sticky.md na skill ui-components.

    API: offset, activate, release, reverse, width e z-index.

    No root="self", a barra sticky precisa ser irmã do conteúdo (filha direta
    do scroll root). Um wrapper só com a altura da barra impede position:sticky
    de grudar — o elemento sticky não pode ultrapassar o pai.
--}}
@if ($isSelfRoot)
    <div
        data-ui-sticky-root
        @class(['ui-sticky-root relative w-full min-w-0 overflow-y-auto overscroll-contain border border-border bg-background'])
        @if ($rootStyle) style="{{ $rootStyle }}" @endif
    >
        @if ($hasBeforeSlot)
            <div class="ui-sticky-before">
                {{ $before }}
            </div>
        @endif

        <div
            x-data="sticky(@js($config))"
            data-ui-sticky
            data-ui-sticky-wrapper
            @if ($name) data-ui-sticky-name="{{ $name }}" @endif
            {{ $attributes->class(['ui-sticky w-full']) }}
            @if ($label) role="banner" aria-label="{{ $label }}" @endif
        >
            {{ $slot }}
        </div>

        @if ($hasContentSlot)
            <div class="ui-sticky-content">
                {{ $content }}
            </div>
        @endif
    </div>
@else
    <div data-ui-sticky-wrapper class="ui-sticky-wrapper w-full">
        <div
            x-data="sticky(@js($config))"
            data-ui-sticky
            @if ($name) data-ui-sticky-name="{{ $name }}" @endif
            {{ $attributes->class(['ui-sticky w-full']) }}
            @if ($label) role="banner" aria-label="{{ $label }}" @endif
        >
            {{ $slot }}
        </div>
    </div>
@endif
