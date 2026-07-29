@props([
    'mode' => 'decimal',
    'min' => null,
    'max' => null,
    'step' => null,
    'decimals' => null,
    'thousandSeparator' => null,
    'decimalSeparator' => null,
    'controls' => true,
    'controlsPosition' => 'end',
    'allowNegative' => null,
    'clamp' => true,
    'wheel' => false,
    'selectOnFocus' => true,
    'formatOnBlur' => true,
    'valueMode' => 'number',
    'nullable' => true,
    'emptyValue' => '',
    'align' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => null,
    'iconPosition' => 'start',
    'prefix' => null,
    'suffix' => null,
    'clearable' => false,
    'floating' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'autocomplete' => 'off',
    'inputmode' => null,
])

@php
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

    if (! in_array($mode, ['integer', 'decimal', 'currency', 'percent'], true)) {
        $mode = 'decimal';
    }

    if (! in_array($controlsPosition, ['end', 'side'], true)) {
        $controlsPosition = 'end';
    }

    if (! in_array($valueMode, ['number', 'formatted'], true)) {
        $valueMode = 'number';
    }

    if ($align !== null && ! in_array($align, ['start', 'end', 'center'], true)) {
        $align = null;
    }

    $modeDefaults = match ($mode) {
        'integer' => [
            'decimals' => 0,
            'step' => 1,
            'allowNegative' => true,
            'inputmode' => 'numeric',
            'placeholder' => '0',
            'icon' => 'bi-hash',
            'align' => 'end',
            'prefix' => null,
            'suffix' => null,
        ],
        'currency' => [
            'decimals' => 2,
            'step' => 0.01,
            'allowNegative' => false,
            'inputmode' => 'decimal',
            'placeholder' => '0,00',
            'icon' => 'bi-currency-dollar',
            'align' => 'end',
            'prefix' => 'R$',
            'suffix' => null,
        ],
        'percent' => [
            'decimals' => 2,
            'step' => 0.01,
            'allowNegative' => false,
            'inputmode' => 'decimal',
            'placeholder' => '0,00',
            'icon' => 'bi-percent',
            'align' => 'end',
            'prefix' => null,
            'suffix' => '%',
            'min' => 0,
            'max' => 100,
        ],
        default => [
            'decimals' => 2,
            'step' => 0.01,
            'allowNegative' => true,
            'inputmode' => 'decimal',
            'placeholder' => '0,00',
            'icon' => 'bi-123',
            'align' => 'end',
            'prefix' => null,
            'suffix' => null,
        ],
    };

    $decimals = $decimals ?? $modeDefaults['decimals'];
    $step = $step ?? $modeDefaults['step'];
    $allowNegative = $allowNegative ?? $modeDefaults['allowNegative'];
    $inputmode = $inputmode ?? $modeDefaults['inputmode'];
    $align = $align ?? $modeDefaults['align'];
    $thousandSeparator = $thousandSeparator ?? '.';
    $decimalSeparator = $decimalSeparator ?? ',';

    if ($placeholder === null) {
        $placeholder = $modeDefaults['placeholder'];
    }

    if ($icon === null) {
        $icon = $modeDefaults['icon'];
    }

    if ($prefix === null && filled($modeDefaults['prefix'] ?? null)) {
        $prefix = $modeDefaults['prefix'];
    }

    if ($suffix === null && filled($modeDefaults['suffix'] ?? null)) {
        $suffix = $modeDefaults['suffix'];
    }

    if ($min === null && array_key_exists('min', $modeDefaults)) {
        $min = $modeDefaults['min'];
    }

    if ($max === null && array_key_exists('max', $modeDefaults)) {
        $max = $modeDefaults['max'];
    }

    $decimals = max(0, min(20, (int) $decimals));
    $step = is_numeric($step) ? (float) $step : (float) $modeDefaults['step'];

    if ($decimals === 0 && $mode === 'integer') {
        $step = max(1, (int) $step);
    }

    $showControls = (bool) $controls;
    $useHiddenModel = $valueMode === 'number';

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

    $focusColor = $resolvedState ?? $color;

    $inputId = $id ?? ($name ? 'input-number-'.$name : 'input-number-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasPrefix = filled($prefix) || isset($prefixSlot);
    $hasSuffix = filled($suffix) || isset($suffixSlot);
    $hasAddonStart = isset($addonStart);
    $hasAddonEnd = isset($addonEnd);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $describedBy = collect([$hintId, $errorId])->filter()->implode(' ');

    $controlHeightClass = match (true) {
        $floating && $size === 'sm' => 'h-11',
        $floating && $size === 'lg' => 'h-14',
        $floating => 'h-12',
        $size === 'sm' => 'h-8',
        $size === 'lg' => 'h-11',
        default => 'h-9.5',
    };

    $controlTextClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $sizeControlClasses = $controlHeightClass.' '.$controlTextClass;

    $sizeInputPadClasses = match ($size) {
        'sm' => 'px-2.5',
        'lg' => 'px-3.5',
        default => 'px-3',
    };

    $sizeAddonClasses = match ($size) {
        'sm' => 'px-2.5 text-xs',
        'lg' => 'px-3.5 text-base',
        default => 'px-3 text-sm',
    };

    $sizeIconClasses = match ($size) {
        'sm' => 'text-sm',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $labelSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';

    $focusRingClasses = match ($focusColor) {
        'secondary' => 'focus-within:border-secondary focus-within:ring-secondary',
        'success' => 'focus-within:border-success focus-within:ring-success',
        'warning' => 'focus-within:border-warning focus-within:ring-warning',
        'danger' => 'focus-within:border-danger focus-within:ring-danger',
        'info' => 'focus-within:border-info focus-within:ring-info',
        default => 'focus-within:border-primary focus-within:ring-primary',
    };

    $stateBorderClasses = match ($resolvedState) {
        'success' => 'border-success',
        'warning' => 'border-warning',
        'danger' => 'border-danger',
        'info' => 'border-info',
        default => 'border-border',
    };

    $stateTextClasses = match ($resolvedState) {
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-muted-foreground',
    };

    $variantShellClasses = match ($variant) {
        'filled' => 'border border-transparent bg-muted shadow-none',
        'flush' => 'rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2',
        default => 'border bg-card shadow-sm',
    };

    $alignClass = match ($align) {
        'start' => 'text-start',
        'center' => 'text-center',
        default => 'text-end',
    };

    $sideControls = $showControls && $controlsPosition === 'side';
    $endControls = $showControls && $controlsPosition === 'end';

    $controlClasses = collect([
        'group/input relative flex w-full items-center gap-2 transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        ($variant === 'flush' || $hasAddonStart || $hasAddonEnd || $sideControls) ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        ($hasAddonStart || $hasAddonEnd || $sideControls) ? null : $focusRingClasses,
        $sizeControlClasses,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-text',
        ($hasAddonStart || $hasAddonEnd || $sideControls) && $variant === 'default' ? 'shadow-none' : null,
        $endControls ? 'pe-1' : null,
    ])->filter()->implode(' ');

    $addonShellClasses = collect([
        'box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground',
        $controlHeightClass,
        $sizeAddonClasses,
        '[&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none',
        '[&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none',
    ])->implode(' ');

    $inputClasses = collect([
        'min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums',
        'placeholder:text-muted-foreground disabled:cursor-not-allowed',
        'read-only:cursor-default',
        $alignClass,
        $floating ? 'peer h-full w-full placeholder-transparent pt-4 pb-1' : 'h-full w-full',
    ])->filter()->implode(' ');

    $actionButtonClasses = 'relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40';

    $stepButtonClasses = 'flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40';

    $floatingLabelRest = match ($size) {
        'sm' => 'top-1/2 -translate-y-1/2 text-xs',
        'lg' => 'top-1/2 -translate-y-1/2 text-base',
        default => 'top-1/2 -translate-y-1/2 text-sm',
    };

    $floatingLabelActive = match ($size) {
        'sm' => 'top-1 translate-y-0 text-[10px]',
        'lg' => 'top-2 translate-y-0 text-xs',
        default => 'top-1.5 translate-y-0 text-xs',
    };

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $inputAttributes = $attributes
        ->except(['class', 'disabled', 'readonly', 'autocomplete', 'inputmode', 'min', 'max', 'step'])
        ->whereDoesntStartWith('wire:model');

    $alpineConfig = [
        'value' => $value,
        'min' => $min,
        'max' => $max,
        'step' => $step,
        'decimals' => $decimals,
        'thousandSeparator' => (string) $thousandSeparator,
        'decimalSeparator' => (string) $decimalSeparator,
        'allowNegative' => (bool) $allowNegative,
        'clamp' => (bool) $clamp,
        'wheel' => (bool) $wheel,
        'selectOnFocus' => (bool) $selectOnFocus,
        'formatOnBlur' => (bool) $formatOnBlur,
        'valueMode' => $valueMode,
        'nullable' => (bool) $nullable,
        'emptyValue' => $emptyValue,
        'floating' => (bool) $floating,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];
@endphp

<div
    x-data="formInputNumber(@js($alpineConfig))"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
>
    @if ($hasLabel && ! $floating)
        <label for="{{ $inputId }}" class="{{ $labelSizeClasses }} font-medium text-foreground">
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

    @if ($useHiddenModel)
        <input
            type="hidden"
            x-ref="model"
            @if ($name) name="{{ $name }}" @endif
            value="{{ $value ?? $emptyValue }}"
            @disabled($isDisabled)
            {{ $modelAttributes }}
        >
    @endif

    <div @class([
        'flex w-full items-stretch',
        $hasAddonStart || $hasAddonEnd || $sideControls ? 'rounded-lg focus-within:ring-2 focus-within:ring-offset-1 '.$focusRingClasses : null,
    ])>
        @if ($sideControls)
            <button
                type="button"
                @click="decrement()"
                x-bind:disabled="! canDecrement || {{ $isDisabled || $isReadonly ? 'true' : 'false' }}"
                @class([
                    $addonShellClasses,
                    'border border-r-0 justify-center px-0',
                    $rounded ? 'rounded-l-full' : 'rounded-l-lg',
                    'cursor-pointer bg-muted',
                ])
                aria-label="Diminuir"
                tabindex="-1"
            >
                <i class="bi bi-dash-lg text-sm leading-none" aria-hidden="true"></i>
            </button>
        @elseif ($hasAddonStart)
            <div {{ $addonStart->attributes->class([
                $addonShellClasses,
                'border border-r-0',
                $rounded ? 'rounded-l-full' : 'rounded-l-lg',
            ]) }}>
                {{ $addonStart }}
            </div>
        @endif

        <div @class([
            $controlClasses,
            'rounded-l-none' => ($hasAddonStart || $sideControls) && $variant !== 'flush',
            'rounded-r-none' => ($hasAddonEnd || $sideControls) && $variant !== 'flush',
            ($hasAddonStart || $hasAddonEnd || $sideControls) ? 'min-w-0 flex-1' : 'w-full',
        ])>
            @if ($hasIconStart)
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            @if ($hasPrefix)
                <span class="relative z-10 shrink-0 select-none {{ $sizeIconClasses }} text-muted-foreground">
                    @isset($prefixSlot)
                        {{ $prefixSlot }}
                    @else
                        {{ $prefix }}
                    @endisset
                </span>
            @endif

            <div @class(['relative min-w-0 flex-1', 'h-full' => $floating])>
                <input
                    x-ref="input"
                    type="text"
                    role="spinbutton"
                    id="{{ $inputId }}"
                    value="{{ $value ?? '' }}"
                    x-bind:aria-valuenow="number === null ? false : number"
                    @if ($min !== null) aria-valuemin="{{ $min }}" @endif
                    @if ($max !== null) aria-valuemax="{{ $max }}" @endif
                    @if (! $useHiddenModel && $name) name="{{ $name }}" @endif
                    @if ($placeholder !== null || $floating)
                        placeholder="{{ $floating ? ' ' : $placeholder }}"
                    @endif
                    @if ($autocomplete !== null) autocomplete="{{ $autocomplete }}" @endif
                    @if ($inputmode !== null) inputmode="{{ $inputmode }}" @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    @disabled($isDisabled)
                    @if ($isReadonly) readonly @endif
                    @if ($required) required @endif
                    @focus="onFocus()"
                    @blur="onBlur()"
                    @input="onInput($event)"
                    @paste="onPaste($event)"
                    @keydown="onKeydown($event)"
                    @wheel="onWheel($event)"
                    @unless ($useHiddenModel)
                        {{ $modelAttributes }}
                    @endunless
                    {{ $inputAttributes->class([$inputClasses]) }}
                >

                @if ($floating && $hasLabel)
                    <label
                        for="{{ $inputId }}"
                        class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out"
                        x-bind:class="floatingLabelClasses"
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
            </div>

            @if ($hasSuffix)
                <span class="relative z-10 shrink-0 select-none {{ $sizeIconClasses }} text-muted-foreground">
                    @isset($suffixSlot)
                        {{ $suffixSlot }}
                    @else
                        {{ $suffix }}
                    @endisset
                </span>
            @endif

            @if ($loading)
                <span
                    class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}"
                    aria-hidden="true"
                ></span>
            @elseif ($clearable)
                <button
                    type="button"
                    x-show="hasValue"
                    x-cloak
                    @click="clear()"
                    @disabled($isDisabled || $isReadonly)
                    class="{{ $actionButtonClasses }} rounded-full"
                    aria-label="Limpar"
                >
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            @endif

            @if ($endControls)
                <div
                    class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border"
                >
                    <button
                        type="button"
                        @click="increment()"
                        x-bind:disabled="! canIncrement || {{ $isDisabled || $isReadonly ? 'true' : 'false' }}"
                        class="{{ $stepButtonClasses }} border-b border-border"
                        aria-label="Aumentar"
                        tabindex="-1"
                    >
                        <i class="bi bi-chevron-up text-[10px] leading-none" aria-hidden="true"></i>
                    </button>
                    <button
                        type="button"
                        @click="decrement()"
                        x-bind:disabled="! canDecrement || {{ $isDisabled || $isReadonly ? 'true' : 'false' }}"
                        class="{{ $stepButtonClasses }}"
                        aria-label="Diminuir"
                        tabindex="-1"
                    >
                        <i class="bi bi-chevron-down text-[10px] leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            @endif

            @if ($hasIconEnd)
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif
        </div>

        @if ($sideControls)
            <button
                type="button"
                @click="increment()"
                x-bind:disabled="! canIncrement || {{ $isDisabled || $isReadonly ? 'true' : 'false' }}"
                @class([
                    $addonShellClasses,
                    'border border-l-0 justify-center px-0',
                    $rounded ? 'rounded-r-full' : 'rounded-r-lg',
                    'cursor-pointer bg-muted',
                ])
                aria-label="Aumentar"
                tabindex="-1"
            >
                <i class="bi bi-plus-lg text-sm leading-none" aria-hidden="true"></i>
            </button>
        @elseif ($hasAddonEnd)
            <div {{ $addonEnd->attributes->class([
                $addonShellClasses,
                'border border-l-0',
                $rounded ? 'rounded-r-full' : 'rounded-r-lg',
            ]) }}>
                {{ $addonEnd }}
            </div>
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
</div>
