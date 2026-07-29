@props([
    'as' => 'div',
    'push' => false,
    'grow' => false,
    'shrink' => true,
    'align' => null,
    'spacer' => false,
    'fill' => false,
])

@aware([
    'direction' => 'vertical',
    'from' => null,
])

@php
    $aligns = ['start', 'center', 'end', 'stretch', 'baseline', 'auto'];
    $tags = ['div', 'li', 'span', 'section', 'article', 'aside', 'header', 'footer', 'form'];

    if ($align !== null && ! in_array($align, $aligns, true)) {
        $align = null;
    }

    if (! in_array($as, $tags, true)) {
        $as = 'div';
    }

    $axis = $direction === 'horizontal' ? 'horizontal' : 'vertical';

    // push = margin-auto no eixo principal (ms-auto no hstack / mt-auto no vstack).
    // Com `from`, aplica o push no eixo base e troca no breakpoint.
    $pushClasses = match (true) {
        ! $push => '',
        $axis === 'horizontal' && $from === 'sm' => 'ms-auto sm:ms-0 sm:mt-auto',
        $axis === 'horizontal' && $from === 'md' => 'ms-auto md:ms-0 md:mt-auto',
        $axis === 'horizontal' && $from === 'lg' => 'ms-auto lg:ms-0 lg:mt-auto',
        $axis === 'horizontal' && $from === 'xl' => 'ms-auto xl:ms-0 xl:mt-auto',
        $axis === 'horizontal' => 'ms-auto',
        $from === 'sm' => 'mt-auto sm:mt-0 sm:ms-auto',
        $from === 'md' => 'mt-auto md:mt-0 md:ms-auto',
        $from === 'lg' => 'mt-auto lg:mt-0 lg:ms-auto',
        $from === 'xl' => 'mt-auto xl:mt-0 xl:ms-auto',
        default => 'mt-auto',
    };

    $alignClasses = match ($align) {
        'start' => 'self-start',
        'center' => 'self-center',
        'end' => 'self-end',
        'stretch' => 'self-stretch',
        'baseline' => 'self-baseline',
        'auto' => 'self-auto',
        default => '',
    };

    // spacer: ocupa o espaço livre (flex-1) — substitui o truque do ms-auto
    // quando você quer empurrar vários itens de um lado.
    if ($spacer) {
        $as = 'div';
    }
@endphp

<{{ $as }}
    @if ($spacer)
        data-stack-spacer
        aria-hidden="true"
    @else
        data-stack-item
    @endif
    {{
        $attributes->class([
            'ui-stack-item',
            $pushClasses,
            $alignClasses,
            'grow' => $grow || $spacer,
            'shrink-0' => ! $shrink && ! $spacer,
            'shrink' => $shrink && ! $spacer,
            'w-full' => $fill && ! $spacer,
            'min-h-0 min-w-0' => $spacer,
        ])
    }}
>
    @unless ($spacer)
        {{ $slot }}
    @endunless
</{{ $as }}>
