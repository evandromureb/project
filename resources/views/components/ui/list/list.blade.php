@props([
    'variant' => 'default',
    'horizontal' => false,
    'numbered' => false,
    'size' => 'md',
    'tag' => null,
])

@php
    // "variant", "horizontal", "numbered" e "size" também viram consumíveis
    // por <x-ui.list.list-item> via @aware — o consumidor não precisa repeti-los.
    if (! in_array($variant, ['default', 'flush', 'bordered'], true)) {
        $variant = 'default';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    $horizontalBreakpoints = ['sm', 'md', 'lg', 'xl'];

    if ($horizontal === true || $horizontal === 1 || $horizontal === 'true' || $horizontal === '1') {
        $horizontalMode = 'always';
    } elseif (in_array($horizontal, $horizontalBreakpoints, true)) {
        $horizontalMode = $horizontal;
    } else {
        $horizontalMode = false;
    }

    // tag="auto"/null: ol quando numbered, senão ul. Use tag="div" para
    // listas com <a>/<button> (itens acionáveis).
    if ($tag === null || $tag === 'auto') {
        $tag = $numbered ? 'ol' : 'ul';
    }

    if (! in_array($tag, ['ul', 'ol', 'div'], true)) {
        $tag = $numbered ? 'ol' : 'ul';
    }

    $variantClasses = match ($variant) {
        'flush' => 'rounded-none border-0 [&>[data-list-item]]:rounded-none [&>[data-list-item]]:border-x-0 first:[&>[data-list-item]]:border-t-0 last:[&>[data-list-item]]:border-b-0',
        'bordered' => 'overflow-hidden rounded-md border border-border [&>[data-list-item]]:border-x-0 first:[&>[data-list-item]]:border-t-0 last:[&>[data-list-item]]:border-b-0',
        default => 'overflow-hidden rounded-md border border-border',
    };

    // Em horizontal, as bordas laterais substituem as verticais entre itens.
    $horizontalClasses = match ($horizontalMode) {
        'always' => 'flex flex-row [&>[data-list-item]]:border-b-0 [&>[data-list-item]]:border-r last:[&>[data-list-item]]:border-r-0',
        'sm' => 'sm:flex sm:flex-row sm:[&>[data-list-item]]:border-b-0 sm:[&>[data-list-item]]:border-r sm:last:[&>[data-list-item]]:border-r-0',
        'md' => 'md:flex md:flex-row md:[&>[data-list-item]]:border-b-0 md:[&>[data-list-item]]:border-r md:last:[&>[data-list-item]]:border-r-0',
        'lg' => 'lg:flex lg:flex-row lg:[&>[data-list-item]]:border-b-0 lg:[&>[data-list-item]]:border-r lg:last:[&>[data-list-item]]:border-r-0',
        'xl' => 'xl:flex xl:flex-row xl:[&>[data-list-item]]:border-b-0 xl:[&>[data-list-item]]:border-r xl:last:[&>[data-list-item]]:border-r-0',
        default => 'flex flex-col',
    };

    $horizontalAttr = match ($horizontalMode) {
        false => 'false',
        'always' => 'true',
        default => $horizontalMode,
    };
@endphp

<{{ $tag }}
    data-list
    data-variant="{{ $variant }}"
    data-horizontal="{{ $horizontalAttr }}"
    data-size="{{ $size }}"
    {{
        $attributes->class([
            'ui-list w-full',
            $variantClasses,
            $horizontalClasses,
            'ui-list-numbered' => $numbered,
        ])
    }}
>
    {{ $slot }}
</{{ $tag }}>
