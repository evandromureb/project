@props([
    'default' => null,
    'variant' => 'list',
    'color' => 'primary',
    'vertical' => true,
    'navPosition' => 'start',
    'sticky' => true,
    'offset' => 16,
    'smooth' => true,
    'hash' => false,
    'root' => 'self',
    'height' => '24rem',
    'navWidth' => '12rem',
    'label' => 'Navegação da página',
])

@php
    // "variant" e "color" também viram consumíveis por <x-ui.scrollspy.scrollspy-item>
    // via @aware — o consumidor não precisa repeti-los em cada item.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];
    $variants = ['list', 'underline', 'pills', 'soft', 'boxed'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($variant, $variants, true)) {
        $variant = 'list';
    }

    if (! in_array($navPosition, ['start', 'end'], true)) {
        $navPosition = 'start';
    }

    if (! in_array($root, ['self', 'window'], true)) {
        $root = 'self';
    }

    $offset = max(0, (int) $offset);

    $navClasses = match (true) {
        $vertical && $variant === 'list' => 'flex flex-col overflow-hidden rounded-md border border-border bg-card',
        $vertical && $variant === 'boxed' => 'flex flex-col gap-1 rounded-md bg-muted p-1',
        $vertical && in_array($variant, ['pills', 'soft'], true) => 'flex flex-col gap-1',
        $vertical => 'flex flex-col gap-1 border-s border-border ps-3', // underline vertical
        $variant === 'list' => 'flex flex-row overflow-x-auto rounded-md border border-border bg-card',
        $variant === 'boxed' => 'inline-flex flex-wrap gap-1 rounded-md bg-muted p-1',
        $variant === 'pills', $variant === 'soft' => 'inline-flex flex-wrap gap-1',
        default => 'flex flex-wrap gap-4 border-b border-border', // underline horizontal
    };

    $wrapperClasses = match (true) {
        $vertical && $navPosition === 'end' => 'flex flex-row-reverse gap-6',
        $vertical => 'flex flex-row gap-6',
        default => 'flex flex-col gap-4',
    };

    $navWrapperClasses = implode(' ', array_filter([
        $vertical ? 'shrink-0' : 'w-full',
        $sticky ? ($root === 'self' ? 'sticky top-0 self-start' : 'sticky self-start') : '',
    ]));

    $contentClasses = implode(' ', array_filter([
        'min-w-0 flex-1',
        $root === 'self' ? 'overflow-y-auto overscroll-contain scroll-smooth' : '',
    ]));

    $navStyle = $vertical ? "width: {$navWidth};" : null;
    $contentStyle = $root === 'self' ? "height: {$height}; max-height: {$height};" : null;
    $stickyStyle = ($sticky && $root === 'window') ? "top: {$offset}px;" : null;
@endphp

{{--
    A lógica de IntersectionObserver / scrollTo vive em resources/js/scrollspy.js
    (Alpine.data('scrollspy', ...)), não inline neste x-data — comparações e
    arrow functions direto no atributo quebram wire:navigate. Ver
    reference/scrollspy.md na skill ui-components.
--}}
<div
    x-data="scrollspy(@js($default), @js($offset), @js($smooth), @js($hash), @js($root))"
    {{ $attributes->class([$wrapperClasses]) }}
>
    <div
        @class([$navWrapperClasses])
        @if ($navStyle || $stickyStyle) style="{{ trim(($navStyle ?? '').' '.($stickyStyle ?? '')) }}" @endif
    >
        <nav
            x-ref="nav"
            aria-label="{{ $label }}"
            @class([$navClasses, 'w-full'])
        >
            {{ $nav }}
        </nav>
    </div>

    <div
        x-ref="content"
        @class([$contentClasses])
        @if ($contentStyle) style="{{ $contentStyle }}" @endif
    >
        {{ $slot }}
    </div>
</div>
