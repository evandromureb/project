@props([
    'name' => null,
])

@aware([
    'fade' => true,
])

@php
    $panelId = $name ? 'tab-panel-'.$name : null;
    $tabId = $name ? 'tab-'.$name : null;
@endphp

<div
    @if ($panelId) id="{{ $panelId }}" @endif
    @if ($tabId) aria-labelledby="{{ $tabId }}" @endif
    x-show="active === '{{ $name }}'"
    x-cloak
    @if ($fade)
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
    role="tabpanel"
    tabindex="0"
    {{ $attributes }}
>
    {{ $slot }}
</div>
