@php
    $isSelected = $multiple
        ? in_array($option['value'], $initialValue, true)
        : (string) $initialValue === $option['value'];
@endphp
<button
    type="button"
    role="option"
    data-select-option
    data-value="{{ $option['value'] }}"
    @disabled($option['disabled'])
    aria-selected="{{ $isSelected ? 'true' : 'false' }}"
    @class([
        'flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70 disabled:cursor-not-allowed disabled:opacity-50',
        'bg-primary/10' => $isSelected,
    ])
>
    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center">
        <i
            class="bi bi-check-lg text-sm leading-none text-primary"
            data-select-option-check
            @style(['display:none' => ! $isSelected])
            aria-hidden="true"
        ></i>
    </span>

    @if ($option['icon'])
        <i class="bi {{ $option['icon'] }} mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i>
    @endif

    <span class="min-w-0 flex-1">
        <span class="block truncate font-medium" data-select-option-label>{{ $option['label'] }}</span>
        @if ($option['description'])
            <span class="mt-0.5 block truncate text-xs text-muted-foreground" data-select-option-description>{{ $option['description'] }}</span>
        @endif
    </span>
</button>
