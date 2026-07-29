@props([
    'label' => null,
    'bg' => null,
    'foreground' => null,
    'var' => null,
])

@php
    // Se existir um token "-foreground" correspondente (as 6 cores semânticas
    // sempre têm), o rótulo entra dentro do bloco colorido com contraste
    // garantido. Tokens neutros/de superfície (sem "-foreground" dedicado)
    // só mostram uma tira de cor — texto sobre eles poderia ter contraste
    // ruim dependendo do tema ativo.
    $hasForeground = (bool) $foreground;
@endphp

<div class="overflow-hidden rounded-md border border-border bg-card">
    @if ($hasForeground)
        <div class="{{ $bg }} {{ $foreground }} flex h-16 items-center justify-center text-sm font-medium">
            {{ $label }}
        </div>
    @else
        <div class="{{ $bg }} h-12 border-b border-border"></div>
    @endif

    <div class="flex items-center justify-between gap-2 px-3 py-2">
        <span class="text-xs font-medium text-card-foreground">{{ $label }}</span>

        @if ($var)
            <code class="text-[11px] text-muted-foreground">{{ $var }}</code>
        @endif
    </div>
</div>
