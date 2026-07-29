@props([
    'align' => null,
    'sticky' => false,
    'bordered' => null,
])

@aware([
    'actionsAlign' => 'end',
    'card' => false,
    'dense' => false,
    'variant' => 'vertical',
])

@php
    $resolvedAlign = $align ?? $actionsAlign;
    $aligns = ['start', 'center', 'end', 'between', 'stretch'];

    if (! in_array($resolvedAlign, $aligns, true)) {
        $resolvedAlign = 'end';
    }

    $justifyClass = match ($resolvedAlign) {
        'start' => 'justify-start',
        'center' => 'justify-center',
        'between' => 'justify-between',
        'stretch' => 'justify-stretch [&>*]:flex-1',
        default => 'justify-end',
    };

    $showBorder = $bordered === null ? (bool) $card : (bool) $bordered;
@endphp

<div
    data-form-layout-actions
    {{
        $attributes->class([
            'form-layout-actions flex flex-wrap items-center gap-2',
            $justifyClass,
            $dense ? 'gap-1.5' : 'gap-2',
            $showBorder ? 'border-t border-border pt-4' : null,
            $variant === 'inline' ? 'w-auto shrink-0' : 'w-full',
            $variant === 'grid' || $variant === 'horizontal' ? 'col-span-full' : null,
            $sticky ? 'sticky bottom-0 z-10 -mx-1 bg-card/95 px-1 py-3 backdrop-blur supports-[backdrop-filter]:bg-card/80' : null,
        ])
    }}
>
    @isset($start)
        <div class="me-auto flex flex-wrap items-center gap-2">
            {{ $start }}
        </div>
    @endisset

    {{ $slot }}

    @isset($end)
        <div class="ms-auto flex flex-wrap items-center gap-2">
            {{ $end }}
        </div>
    @endisset
</div>
