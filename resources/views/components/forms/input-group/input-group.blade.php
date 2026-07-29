@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'rounded' => false,
    'required' => false,
    'disabled' => false,
    'id' => null,
    'name' => null,
    // Modo conveniência: um único controle + addons de texto (sem slot default).
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'prepend' => null,
    'append' => null,
    'icon' => null,
    'iconPosition' => 'start',
    'prefix' => null,
    'suffix' => null,
    'clearable' => false,
    'passwordToggle' => null,
    'loading' => false,
    'readonly' => false,
    'maxlength' => null,
    'counter' => false,
    'autocomplete' => null,
])

@php
    // size/color/state/variant/rounded/disabled sobem para os filhos via @aware.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'filled', 'flush'], true)) {
        $variant = 'default';
    }

    if (! in_array($iconPosition, ['start', 'end'], true)) {
        $iconPosition = 'start';
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

    $resolvedState = match (true) {
        filled($error) => 'danger',
        in_array($state, ['success', 'warning', 'danger', 'info'], true) => $state,
        default => null,
    };

    // Reexporta state resolvido para os filhos (borda/ícone) via @aware.
    $state = $resolvedState;

    $isDisabled = $disabled || $attributes->has('disabled');

    $groupId = $id ?? ($name ? 'input-group-'.$name : 'input-group-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasPrepend = filled($prepend) || isset($prependSlot);
    $hasAppend = filled($append) || isset($appendSlot);
    $isConvenience = $slot->isEmpty();

    $hintId = $hasHint ? $groupId.'-hint' : null;
    $errorId = $hasError ? $groupId.'-error' : null;
    $describedBy = collect([$hintId, $errorId])->filter()->implode(' ');

    $labelSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $focusRingClasses = match ($resolvedState ?? $color) {
        'secondary' => 'focus-within:border-secondary focus-within:ring-secondary',
        'success' => 'focus-within:border-success focus-within:ring-success',
        'warning' => 'focus-within:border-warning focus-within:ring-warning',
        'danger' => 'focus-within:border-danger focus-within:ring-danger',
        'info' => 'focus-within:border-info focus-within:ring-info',
        default => 'focus-within:border-primary focus-within:ring-primary',
    };

    $stateBorderClass = match ($resolvedState) {
        'success' => 'input-group-success',
        'warning' => 'input-group-warning',
        'danger' => 'input-group-danger',
        'info' => 'input-group-info',
        default => '',
    };

    $sizeClass = match ($size) {
        'sm' => 'input-group-sm',
        'lg' => 'input-group-lg',
        default => '',
    };

    $variantClass = match ($variant) {
        'filled' => 'input-group-filled',
        'flush' => 'input-group-flush',
        default => '',
    };

    // O ComponentTagCompiler só aceita {{ $attributes... }} dentro de tags
    // x-* (regex exige o nome $attributes). Props do modo conveniência +
    // wire:model/etc. entram nesse merge.
    $convenienceControlAttributes = array_filter([
        'type' => $type,
        'id' => $groupId,
        'name' => $name,
        'value' => $value,
        'placeholder' => $placeholder,
        'icon' => $icon,
        'icon-position' => $iconPosition,
        'prefix' => $prefix,
        'suffix' => $suffix,
        'clearable' => $clearable,
        'password-toggle' => $passwordToggle,
        'loading' => $loading,
        'readonly' => $readonly,
        'required' => $required,
        'maxlength' => $maxlength,
        'counter' => $counter,
        'autocomplete' => $autocomplete,
        'aria-describedby' => $describedBy !== '' ? $describedBy : null,
        // @aware não vê $state mutado no pai — em conveniência setamos aqui.
        'aria-invalid' => $resolvedState === 'danger' ? 'true' : null,
    ], fn ($v) => $v !== null);
@endphp

<div {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}>
    @if ($hasLabel)
        <label
            @if ($isConvenience) for="{{ $groupId }}" @endif
            class="{{ $labelSizeClasses }} font-medium text-foreground"
        >
            @isset($labelSlot)
                {{ $labelSlot }}
            @else
                {{ $label }}
            @endisset
            @if ($required)
                <span class="text-danger" aria-hidden="true">*</span>
            @endif
        </label>
    @endif

    <div
        role="group"
        @class([
            'input-group',
            $sizeClass,
            $variantClass,
            $stateBorderClass,
            'input-group-rounded' => $rounded,
            'input-group-disabled' => $isDisabled,
            $variant === 'flush' ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
            $focusRingClasses,
        ])
    >
        @if ($isConvenience)
            @if ($hasPrepend)
                <x-forms.input-group.input-group-text>
                    @isset($prependSlot)
                        {{ $prependSlot }}
                    @else
                        {{ $prepend }}
                    @endisset
                </x-forms.input-group.input-group-text>
            @endif

            <x-forms.input-group.input-group-input {{ $attributes->except(['class', 'disabled'])->merge($convenienceControlAttributes) }} />

            @if ($hasAppend)
                <x-forms.input-group.input-group-text>
                    @isset($appendSlot)
                        {{ $appendSlot }}
                    @else
                        {{ $append }}
                    @endisset
                </x-forms.input-group.input-group-text>
            @endif
        @else
            {{ $slot }}
        @endif
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
            @else
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
</div>
