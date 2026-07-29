@props([
    'icon' => null,
    'plain' => false,
])

@aware([
    'size' => 'md',
    'state' => null,
    'variant' => 'default',
    'rounded' => false,
    'disabled' => false,
])

@php
    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    $sizeTextClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $stateTextClasses = match ($state) {
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-muted-foreground',
    };

    $hasIcon = filled($icon);
    $hasContent = $slot->isNotEmpty();
@endphp

<div
    {{
        $attributes->class([
            'input-group-text',
            $sizeTextClass,
            $stateTextClasses,
            'input-group-text-plain' => $plain,
        ])
    }}
>
    @if ($hasIcon)
        <i class="bi {{ $icon }} leading-none" aria-hidden="true"></i>
    @endif

    @if ($hasContent)
        {{ $slot }}
    @endif
</div>
