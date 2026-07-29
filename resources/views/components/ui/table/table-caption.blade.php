@props([
    'side' => null,
])

@aware([
    'captionSide' => 'top',
])

@php
    $resolvedSide = $side ?? $captionSide;

    if (! in_array($resolvedSide, ['top', 'bottom'], true)) {
        $resolvedSide = 'top';
    }
@endphp

<caption
    data-table-caption
    data-side="{{ $resolvedSide }}"
    {{
        $attributes->class([
            'px-4 py-3 text-sm text-muted-foreground',
            $resolvedSide === 'bottom' ? 'caption-bottom' : 'caption-top',
        ])
    }}
>
    {{ $slot }}
</caption>
