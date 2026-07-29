@props([
    'mask' => null,
    'preset' => null,
    'valueMode' => 'unmasked',
    'lazy' => true,
    'guide' => false,
    'placeholderChar' => '_',
    'reverse' => false,
    'decimals' => 2,
    'thousandSeparator' => '.',
    'decimalSeparator' => ',',
    'clearIncomplete' => false,
    'maxRawLength' => null,
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
    'counter' => false,
    'autocomplete' => null,
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

    if (! in_array($valueMode, ['masked', 'unmasked'], true)) {
        $valueMode = 'unmasked';
    }

    $presets = [
        'cpf' => ['masks' => ['999.999.999-99'], 'inputmode' => 'numeric', 'placeholder' => '000.000.000-00', 'icon' => 'bi-person-vcard'],
        'cnpj' => ['masks' => ['99.999.999/9999-99'], 'inputmode' => 'numeric', 'placeholder' => '00.000.000/0000-00', 'icon' => 'bi-building'],
        'cep' => ['masks' => ['99999-999'], 'inputmode' => 'numeric', 'placeholder' => '00000-000', 'icon' => 'bi-mailbox'],
        'phone' => ['masks' => ['(99) 9999-9999'], 'inputmode' => 'tel', 'placeholder' => '(00) 0000-0000', 'icon' => 'bi-telephone'],
        'cellphone' => ['masks' => ['(99) 99999-9999'], 'inputmode' => 'tel', 'placeholder' => '(00) 00000-0000', 'icon' => 'bi-phone'],
        'phone-br' => ['masks' => ['(99) 9999-9999', '(99) 99999-9999'], 'inputmode' => 'tel', 'placeholder' => '(00) 00000-0000', 'icon' => 'bi-telephone'],
        'date' => ['masks' => ['99/99/9999'], 'inputmode' => 'numeric', 'placeholder' => 'dd/mm/aaaa', 'icon' => 'bi-calendar-date'],
        'time' => ['masks' => ['99:99'], 'inputmode' => 'numeric', 'placeholder' => 'hh:mm', 'icon' => 'bi-clock'],
        'datetime' => ['masks' => ['99/99/9999 99:99'], 'inputmode' => 'numeric', 'placeholder' => 'dd/mm/aaaa hh:mm', 'icon' => 'bi-calendar-event'],
        'month' => ['masks' => ['99/9999'], 'inputmode' => 'numeric', 'placeholder' => 'mm/aaaa', 'icon' => 'bi-calendar-month'],
        'credit-card' => ['masks' => ['9999 9999 9999 9999'], 'inputmode' => 'numeric', 'placeholder' => '0000 0000 0000 0000', 'icon' => 'bi-credit-card'],
        'cvv' => ['masks' => ['999'], 'inputmode' => 'numeric', 'placeholder' => '000', 'icon' => 'bi-shield-lock'],
        'ip' => ['masks' => ['999.999.999.999'], 'inputmode' => 'decimal', 'placeholder' => '0.0.0.0', 'icon' => 'bi-hdd-network'],
        'money' => ['masks' => [], 'mode' => 'money', 'reverse' => true, 'inputmode' => 'decimal', 'placeholder' => '0,00', 'icon' => 'bi-currency-dollar', 'prefix' => 'R$'],
        'percent' => ['masks' => [], 'mode' => 'money', 'reverse' => true, 'inputmode' => 'decimal', 'placeholder' => '0,00', 'suffix' => '%', 'decimals' => 2],
        'hex-color' => ['masks' => ['\\#******'], 'placeholder' => '#000000', 'icon' => 'bi-palette'],
        'plate-br' => ['masks' => ['AAA-9*99'], 'placeholder' => 'ABC-1D23', 'icon' => 'bi-car-front'],
    ];

    $presetKey = is_string($preset) ? strtolower($preset) : null;
    $presetConfig = $presetKey && isset($presets[$presetKey]) ? $presets[$presetKey] : null;

    $resolvedMasks = [];

    if (is_array($mask)) {
        $resolvedMasks = array_values(array_filter(array_map('strval', $mask)));
    } elseif (filled($mask)) {
        $resolvedMasks = [(string) $mask];
    } elseif ($presetConfig !== null) {
        $resolvedMasks = $presetConfig['masks'];
    }

    $mode = 'pattern';

    if (($presetConfig['mode'] ?? null) === 'money'
        || $reverse
        || in_array($presetKey, ['money', 'percent'], true)
    ) {
        $mode = 'money';
        $reverse = true;
    }

    if ($mode === 'pattern' && $resolvedMasks === []) {
        $resolvedMasks = ['**********'];
    }

    if ($placeholder === null && isset($presetConfig['placeholder'])) {
        $placeholder = $presetConfig['placeholder'];
    }

    if ($icon === null && isset($presetConfig['icon'])) {
        $icon = $presetConfig['icon'];
    }

    if ($prefix === null && isset($presetConfig['prefix'])) {
        $prefix = $presetConfig['prefix'];
    }

    if ($suffix === null && isset($presetConfig['suffix'])) {
        $suffix = $presetConfig['suffix'];
    }

    if ($inputmode === null && isset($presetConfig['inputmode'])) {
        $inputmode = $presetConfig['inputmode'];
    }

    if (isset($presetConfig['decimals'])) {
        $decimals = (int) $presetConfig['decimals'];
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

    $focusColor = $resolvedState ?? $color;

    if ($autocomplete === null) {
        $autocomplete = match ($presetKey) {
            'phone', 'cellphone', 'phone-br' => 'tel',
            'cep' => 'postal-code',
            'credit-card' => 'cc-number',
            'cvv' => 'cc-csc',
            'date' => 'bday',
            default => filled($name) ? 'off' : null,
        };
    }

    $inputId = $id ?? ($name ? 'input-mask-'.$name : 'input-mask-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasPrefix = filled($prefix) || isset($prefixSlot);
    $hasSuffix = filled($suffix) || isset($suffixSlot);
    $hasAddonStart = isset($addonStart);
    $hasAddonEnd = isset($addonEnd);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showCounter = (bool) $counter;

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');
    $useHiddenModel = $valueMode === 'unmasked';

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $counterId = $showCounter ? $inputId.'-counter' : null;
    $describedBy = collect([$hintId, $errorId, $counterId])->filter()->implode(' ');

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

    $controlClasses = collect([
        'group/input relative flex w-full items-center gap-2 transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        ($variant === 'flush' || $hasAddonStart || $hasAddonEnd) ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        ($hasAddonStart || $hasAddonEnd) ? null : $focusRingClasses,
        $sizeControlClasses,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-text',
        ($hasAddonStart || $hasAddonEnd) && $variant === 'default' ? 'shadow-none' : null,
    ])->filter()->implode(' ');

    $addonShellClasses = collect([
        'box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground',
        $controlHeightClass,
        $sizeAddonClasses,
        '[&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none',
        '[&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none',
    ])->implode(' ');

    $inputClasses = collect([
        'min-w-0 flex-1 bg-transparent text-foreground outline-none',
        'placeholder:text-muted-foreground disabled:cursor-not-allowed',
        'read-only:cursor-default',
        $floating ? 'peer h-full w-full placeholder-transparent pt-4 pb-1' : 'h-full w-full',
        $mode === 'money' ? 'text-end tabular-nums' : null,
    ])->filter()->implode(' ');

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
        ->except(['class', 'disabled', 'readonly', 'autocomplete', 'inputmode'])
        ->whereDoesntStartWith('wire:model');

    $alpineConfig = [
        'masks' => $resolvedMasks,
        'mode' => $mode,
        'reverse' => (bool) $reverse,
        'lazy' => (bool) $lazy,
        'guide' => (bool) $guide,
        'placeholderChar' => (string) $placeholderChar,
        'valueMode' => $valueMode,
        'decimals' => (int) $decimals,
        'thousandSeparator' => (string) $thousandSeparator,
        'decimalSeparator' => (string) $decimalSeparator,
        'clearIncomplete' => (bool) $clearIncomplete,
        'maxRawLength' => $maxRawLength !== null ? (int) $maxRawLength : null,
        'value' => $value ?? '',
        'maxLength' => null,
        'floating' => (bool) $floating,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];
@endphp

<div
    x-data="formInputMask(@js($alpineConfig))"
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
            value="{{ $value ?? '' }}"
            @disabled($isDisabled)
            {{ $modelAttributes }}
        >
    @endif

    <div @class([
        'flex w-full items-stretch',
        $hasAddonStart || $hasAddonEnd ? 'rounded-lg focus-within:ring-2 focus-within:ring-offset-1 '.$focusRingClasses : null,
    ])>
        @if ($hasAddonStart)
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
            'rounded-l-none' => $hasAddonStart && $variant !== 'flush',
            'rounded-r-none' => $hasAddonEnd && $variant !== 'flush',
            $hasAddonStart || $hasAddonEnd ? 'min-w-0 flex-1' : 'w-full',
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
                    id="{{ $inputId }}"
                    @if (! $useHiddenModel && $name) name="{{ $name }}" @endif
                    @if ($value !== null) value="{{ $value }}" @endif
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
                    class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                    aria-label="Limpar"
                >
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            @endif

            @if ($hasIconEnd)
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif
        </div>

        @if ($hasAddonEnd)
            <div {{ $addonEnd->attributes->class([
                $addonShellClasses,
                'border border-l-0',
                $rounded ? 'rounded-r-full' : 'rounded-r-lg',
            ]) }}>
                {{ $addonEnd }}
            </div>
        @endif
    </div>

    @if ($hasError || $hasHint || $showCounter)
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1">
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

            @if ($showCounter)
                <p
                    id="{{ $counterId }}"
                    class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground"
                    x-text="raw.length"
                ></p>
            @endif
        </div>
    @endif
</div>
