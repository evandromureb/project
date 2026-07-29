@props([
    'label' => 'Mostrar itens ocultos',
])

@aware([
    'size' => 'md',
    'separator' => 'bi-chevron-right',
    'variant' => 'plain',
])

@php
    if (! in_array($variant, ['plain', 'soft', 'pills'], true)) {
        $variant = 'plain';
    }

    $iconSizeClasses = match ($size) {
        'sm' => 'text-[0.7rem]',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $triggerSizeClasses = match ($size) {
        'sm' => 'size-6 text-xs',
        'lg' => 'size-8 text-sm',
        default => 'size-7 text-sm',
    };

    $itemGapClasses = match ($size) {
        'sm' => 'gap-1',
        'lg' => 'gap-2',
        default => 'gap-1.5',
    };

    // Mesmo split feito em <x-ui.breadcrumb.breadcrumb-item> — ver comentário lá sobre
    // por que @aware não repassa variáveis @php computadas do pai.
    $separatorIcon = str_starts_with($separator, 'bi-') ? $separator : null;
    $separatorText = $separatorIcon ? null : $separator;

    $triggerClasses = match ($variant) {
        'pills' => "{$triggerSizeClasses} rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground",
        default => "{$triggerSizeClasses} rounded-md text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground",
    };
@endphp

{{--
    Item "..." para colapsar um trecho do meio da trilha em quantas migalhas
    forem necessárias — reaproveita <x-ui.dropdown>/<x-ui.dropdown.dropdown-item> em vez
    de inventar outro painel flutuante; o slot padrão vira os itens do menu.
--}}
<li class="flex items-center {{ $itemGapClasses }} first:[&>[data-separator]]:hidden">
    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 {{ $iconSizeClasses }}" aria-hidden="true">
        @if ($separatorIcon)
            <i class="bi {{ $separatorIcon }} leading-none" aria-hidden="true"></i>
        @else
            <span class="font-medium">{{ $separatorText }}</span>
        @endif
    </span>

    <x-ui.dropdown align="start">
        <x-slot:trigger>
            <button
                type="button"
                class="inline-flex items-center justify-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 {{ $triggerClasses }}"
                aria-label="{{ $label }}"
            >
                <i class="bi bi-three-dots leading-none" aria-hidden="true"></i>
            </button>
        </x-slot:trigger>

        {{ $slot }}
    </x-ui.dropdown>
</li>
