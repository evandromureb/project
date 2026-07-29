@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'description' => null,
    'size' => 'md',
    'color' => 'primary',
    'variant' => 'default',
    'direction' => 'vertical',
    'required' => false,
    'disabled' => false,
    'reverse' => true,
    'id' => null,
    'name' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'outlined', 'card'], true)) {
        $variant = 'default';
    }

    if (! in_array($direction, ['vertical', 'horizontal'], true)) {
        $direction = 'vertical';
    }

    $errorBag = null;

    if (isset($errors) && $errors instanceof \Illuminate\Support\ViewErrorBag) {
        $errorBag = $errors;
    } elseif (view()->shared('errors') instanceof \Illuminate\Support\ViewErrorBag) {
        $errorBag = view()->shared('errors');
    }

    if ($error === null && filled($name) && $errorBag?->has($name)) {
        $error = $errorBag->first($name);
    }

    $isDisabled = $disabled || $attributes->has('disabled');

    $groupId = $id ?? ($name ? 'switch-group-'.$name : 'switch-group-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasDescription = filled($description) || isset($descriptionSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);

    $hintId = $hasHint ? $groupId.'-hint' : null;
    $errorId = $hasError ? $groupId.'-error' : null;
    $descriptionId = $hasDescription ? $groupId.'-description' : null;
    $describedBy = collect([$descriptionId, $hintId, $errorId])->filter()->implode(' ');

    $labelSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $listClasses = match (true) {
        $variant === 'card' && $direction === 'horizontal' => 'grid grid-cols-1 gap-3 sm:grid-cols-2',
        $direction === 'horizontal' => 'flex flex-wrap gap-x-6 gap-y-3',
        $variant === 'card' => 'flex flex-col gap-3',
        default => 'flex flex-col gap-3',
    };
@endphp

<fieldset
    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
    @if ($hasError) aria-invalid="true" @endif
    @disabled($isDisabled)
    {{ $attributes->except(['disabled'])->class(['flex w-full min-w-0 flex-col gap-2 border-0 p-0']) }}
>
    @if ($hasLabel)
        <legend id="{{ $groupId }}-label" class="float-none w-auto {{ $labelSizeClass }} p-0 font-medium text-foreground">
            @isset($labelSlot)
                {{ $labelSlot }}
            @else
                {{ $label }}
            @endisset
            @if ($required)
                <span class="text-danger" aria-hidden="true">*</span>
            @endif
        </legend>
    @endif

    @if ($hasDescription)
        <p id="{{ $descriptionId }}" class="mb-0 text-xs text-muted-foreground">
            @isset($descriptionSlot)
                {{ $descriptionSlot }}
            @else
                {{ $description }}
            @endisset
        </p>
    @endif

    <div
        role="group"
        @class([$listClasses])
        @if ($hasLabel) aria-labelledby="{{ $groupId }}-label" @endif
    >
        {{ $slot }}
    </div>

    @if ($hasError || $hasHint)
        <div class="min-w-0">
            @if ($hasError)
                <p id="{{ $errorId }}" class="mb-0 text-xs text-danger" role="alert">
                    @isset($errorSlot)
                        {{ $errorSlot }}
                    @else
                        {{ $error }}
                    @endisset
                </p>
            @elseif ($hasHint)
                <p id="{{ $hintId }}" class="mb-0 text-xs text-muted-foreground">
                    @isset($hintSlot)
                        {{ $hintSlot }}
                    @else
                        {{ $hint }}
                    @endisset
                </p>
            @endif
        </div>
    @endif
</fieldset>
