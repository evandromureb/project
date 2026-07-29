@props([
    'default' => null,
    'variant' => 'underline',
    'color' => 'primary',
    'vertical' => false,
    'justified' => false,
    'fade' => true,
])

@php
    // "variant" e "color" também viram consumíveis por <x-ui.tabs.tab-item> /
    // <x-ui.tabs.tab-panel> via @aware — o consumidor não precisa repeti-los em
    // cada item.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];
    $variants = ['underline', 'pills', 'boxed', 'soft'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($variant, $variants, true)) {
        $variant = 'underline';
    }

    $navClasses = match (true) {
        $vertical && in_array($variant, ['pills', 'boxed', 'soft'], true) => 'flex flex-col gap-1' . ($variant === 'boxed' ? ' rounded-md bg-muted p-1' : ''),
        $vertical => 'flex flex-col gap-1 border-r border-border pr-4',
        $variant === 'pills', $variant === 'soft' => 'inline-flex flex-wrap gap-1',
        $variant === 'boxed' => 'inline-flex flex-wrap gap-1 rounded-md bg-muted p-1',
        default => 'flex flex-wrap gap-4 border-b border-border', // underline
    };

    if ($justified && ! $vertical) {
        $navClasses .= ' w-full [&>*]:flex-1 [&>*]:justify-center';
    }
@endphp

<div
    x-data="tabs(@js($default))"
    {{ $attributes->class($vertical ? 'flex gap-6' : '') }}
>
    <div
        x-ref="nav"
        role="tablist"
        @if ($vertical) aria-orientation="vertical" @endif
        @keydown.right.prevent="focusTab(1)"
        @keydown.down.prevent="focusTab(1)"
        @keydown.left.prevent="focusTab(-1)"
        @keydown.up.prevent="focusTab(-1)"
        @keydown.home.prevent="focusFirst()"
        @keydown.end.prevent="focusLast()"
        class="{{ $navClasses }}"
    >
        {{ $nav }}
    </div>

    <div class="{{ $vertical ? 'min-w-0 flex-1' : 'mt-4' }}">
        {{ $slot }}
    </div>
</div>
