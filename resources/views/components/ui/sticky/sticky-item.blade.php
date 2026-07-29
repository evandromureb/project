@props([
    'show' => 'always',
])

@php
    // show: always | active | inactive | release
    if (! in_array($show, ['always', 'active', 'inactive', 'release'], true)) {
        $show = 'always';
    }
@endphp

{{--
    Filho opcional de <x-ui.sticky> que aparece/esconde conforme o estado.
    Precisa viver dentro do elemento com x-data="sticky(...)" (slot padrão
    do sticky, não no slot content do root=self).
--}}
@if ($show === 'always')
    <div {{ $attributes->class('ui-sticky-item') }}>
        {{ $slot }}
    </div>
@elseif ($show === 'active')
    <div
        {{ $attributes->class('ui-sticky-item') }}
        x-show="active"
        x-cloak
        data-ui-sticky-item="active"
    >
        {{ $slot }}
    </div>
@elseif ($show === 'inactive')
    <div
        {{ $attributes->class('ui-sticky-item') }}
        x-show="! active"
        x-cloak
        data-ui-sticky-item="inactive"
    >
        {{ $slot }}
    </div>
@else
    <div
        {{ $attributes->class('ui-sticky-item') }}
        x-show="released"
        x-cloak
        data-ui-sticky-item="release"
    >
        {{ $slot }}
    </div>
@endif
