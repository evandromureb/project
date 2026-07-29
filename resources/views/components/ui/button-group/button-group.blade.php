@props([
    'vertical' => false,
    'size' => null,
    'label' => null,
    'block' => false,
    'rounded' => false,
])

@php
    // .btn-group/.btn-group-vertical e .btn-group-sm/.btn-group-lg são classes
    // customizadas em resources/css/layout.css que estilizam os <x-ui.button>
    // filhos (cada um já com classe .btn) via seletor composto — não afetam
    // props dos componentes filhos, só a aparência via CSS.
    $orientationClass = $vertical ? 'btn-group-vertical' : 'btn-group';

    $sizeClass = match ($size) {
        'sm' => 'btn-group-sm',
        'lg' => 'btn-group-lg',
        default => '',
    };
@endphp

<div
    role="group"
    @if ($label) aria-label="{{ $label }}" @endif
    {{
        $attributes->class([
            $orientationClass,
            $sizeClass,
            'btn-group-block' => $block,
            'btn-group-rounded' => $rounded,
        ])
    }}
>
    {{ $slot }}
</div>
