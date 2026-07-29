@props([
    'mode' => 'input',
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => 'bi-link-45deg',
    'iconPosition' => 'start',
    'prefix' => null,
    'suffix' => null,
    'editable' => false,
    'masked' => false,
    'trim' => true,
    'selectOnFocus' => true,
    'selectOnCopy' => true,
    'clickToCopy' => false,
    'timeout' => 1600,
    'copyValue' => null,
    'button' => 'icon',
    'buttonLabel' => 'Copiar',
    'copiedLabel' => 'Copiado!',
    'errorLabel' => 'Falha ao copiar',
    'revealLabel' => 'Mostrar',
    'hideLabel' => 'Ocultar',
    'language' => null,
    'rows' => 3,
    'monospace' => null,
    'clearable' => false,
    'floating' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => null,
    'loading' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
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

    if (! in_array($mode, ['input', 'textarea', 'code', 'button'], true)) {
        $mode = 'input';
    }

    if (! in_array($button, ['icon', 'label', 'both'], true)) {
        $button = 'icon';
    }

    $slotValue = isset($slot) && $slot->isNotEmpty() ? trim((string) $slot) : '';
    $resolvedValue = filled($value) ? (string) $value : $slotValue;
    $resolvedCopyValue = $copyValue !== null ? (string) $copyValue : null;
    $isEditable = (bool) $editable;
    $isReadonly = $readonly === null ? ! $isEditable : (bool) $readonly;
    $useMonospace = $monospace ?? in_array($mode, ['code', 'textarea'], true);
    $rows = max(2, (int) $rows);
    $timeout = max(400, (int) $timeout);

    if ($placeholder === null) {
        $placeholder = match ($mode) {
            'button' => null,
            'code' => 'Cole o código aqui…',
            'textarea' => 'Texto para copiar…',
            default => 'Valor para copiar…',
        };
    }

    // `@props` trata `:icon="null"` como “não informado” e reaplica o default.
    // Para ocultar: icon="" ou icon="none".
    if ($icon === false || $icon === '' || $icon === 'none' || $icon === 'false') {
        $icon = null;
    } elseif ($icon === 'bi-link-45deg' && $mode === 'code') {
        $icon = 'bi-code-slash';
    } elseif ($icon === 'bi-link-45deg' && $mode === 'button') {
        $icon = 'bi-clipboard';
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

    $inputId = $id ?? ($name ? 'clipboard-'.$name : 'clipboard-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasPrefix = filled($prefix) || isset($prefixSlot);
    $hasSuffix = filled($suffix) || isset($suffixSlot);
    $hasAddonStart = isset($addonStart);
    $hasAddonEnd = isset($addonEnd);
    $hasIconStart = filled($icon) && $iconPosition === 'start' && $mode !== 'button';
    $hasIconEnd = filled($icon) && $iconPosition === 'end' && $mode !== 'button';
    $showLanguage = $mode === 'code' && filled($language);

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonlyAttr = $isReadonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $statusId = $inputId.'-status';
    $describedBy = collect([$hintId, $errorId, $statusId])->filter()->implode(' ');

    $controlHeightClass = match (true) {
        in_array($mode, ['textarea', 'code'], true) && $size === 'sm' => 'min-h-20',
        in_array($mode, ['textarea', 'code'], true) && $size === 'lg' => 'min-h-32',
        in_array($mode, ['textarea', 'code'], true) => 'min-h-24',
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
    $codeRadiusClasses = $rounded ? 'rounded-2xl' : 'rounded-lg';

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

    $buttonToneClasses = match ($color) {
        'secondary' => 'text-secondary hover:bg-secondary/10',
        'success' => 'text-success hover:bg-success/10',
        'warning' => 'text-warning hover:bg-warning/10',
        'danger' => 'text-danger hover:bg-danger/10',
        'info' => 'text-info hover:bg-info/10',
        default => 'text-primary hover:bg-primary/10',
    };

    $controlClasses = collect([
        'group/clipboard relative flex w-full transition-colors',
        in_array($mode, ['textarea', 'code'], true) ? 'items-stretch' : 'items-center',
        'gap-2',
        $variant === 'flush' ? null : ($mode === 'code' ? $codeRadiusClasses : $radiusClasses),
        $variantShellClasses,
        $stateBorderClasses,
        ($variant === 'flush' || $hasAddonStart || $hasAddonEnd) ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        ($hasAddonStart || $hasAddonEnd) ? null : $focusRingClasses,
        $controlHeightClass,
        $controlTextClass,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : ($clickToCopy ? 'cursor-pointer' : 'cursor-text'),
        ($hasAddonStart || $hasAddonEnd) && $variant === 'default' ? 'shadow-none' : null,
        $mode === 'code' ? 'flex-col gap-0 p-0' : null,
    ])->filter()->implode(' ');

    $addonShellClasses = collect([
        'box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground',
        in_array($mode, ['textarea', 'code'], true) ? 'self-stretch' : $controlHeightClass,
        $sizeAddonClasses,
    ])->implode(' ');

    $fieldClasses = collect([
        'min-w-0 flex-1 bg-transparent text-foreground outline-none',
        'placeholder:text-muted-foreground disabled:cursor-not-allowed',
        'read-only:cursor-default',
        $useMonospace ? 'font-mono text-[0.8125rem] tracking-tight' : null,
        $floating && $mode === 'input' ? 'peer h-full w-full placeholder-transparent pt-4 pb-1' : 'h-full w-full',
        in_array($mode, ['textarea', 'code'], true) ? 'resize-y py-2' : null,
        $mode === 'code' ? 'px-3' : null,
    ])->filter()->implode(' ');

    $actionButtonClasses = collect([
        'relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors',
        'disabled:pointer-events-none disabled:opacity-40',
        $buttonToneClasses,
    ])->implode(' ');

    $standaloneButtonClasses = collect([
        'inline-flex items-center justify-center gap-2 font-medium transition-colors',
        $rounded ? 'rounded-full' : 'rounded-lg',
        'border bg-card shadow-sm',
        $stateBorderClasses,
        $controlTextClass,
        match ($size) {
            'sm' => 'h-8 px-2.5',
            'lg' => 'h-11 px-4',
            default => 'h-9.5 px-3',
        },
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer hover:bg-muted',
        $buttonToneClasses,
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

    $alpineConfig = [
        'value' => $resolvedValue,
        'copyValue' => $resolvedCopyValue,
        'mode' => $mode,
        'editable' => $isEditable,
        'masked' => (bool) $masked,
        'trim' => (bool) $trim,
        'selectOnFocus' => (bool) $selectOnFocus,
        'selectOnCopy' => (bool) $selectOnCopy,
        'clickToCopy' => (bool) $clickToCopy,
        'timeout' => $timeout,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonlyAttr,
        'floating' => (bool) $floating && $mode === 'input',
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
        'copiedLabel' => (string) $copiedLabel,
        'copyLabel' => (string) $buttonLabel,
        'errorLabel' => (string) $errorLabel,
    ];

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $fieldAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-on:clipboard')
        ->whereDoesntStartWith('@clipboard');

    $eventAttributes = $attributes->filter(
        fn (mixed $value, string $key): bool => str_starts_with($key, 'x-on:clipboard') || str_starts_with($key, '@clipboard')
    );
@endphp

<div
    x-data="formClipboard(@js($alpineConfig))"
    x-modelable="text"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $modelAttributes }}
    {{ $eventAttributes }}
>
    @if ($hasLabel && ! ($floating && $mode === 'input') && $mode !== 'button')
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
    @elseif ($hasLabel && $mode === 'button')
        <span class="{{ $labelSizeClasses }} font-medium text-foreground">
            @isset($labelSlot)
                {{ $labelSlot }}
            @else
                {{ $label }}
            @endisset
        </span>
    @endif

    @if (filled($name))
        <input
            type="hidden"
            x-ref="model"
            name="{{ $name }}"
            value="{{ $resolvedValue }}"
            @disabled($isDisabled)
        >
    @endif

    @if ($mode === 'button')
        <button
            type="button"
            id="{{ $inputId }}"
            @click="copy()"
            x-bind:disabled="! canCopy"
            @class([$standaloneButtonClasses])
            x-bind:aria-label="statusLabel"
            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
        >
            <i
                class="bi leading-none {{ $sizeIconClasses }}"
                x-bind:class="{
                    'bi-clipboard-check text-success': copied,
                    'bi-exclamation-circle text-danger': failed,
                    'bi-clipboard': ! copied && ! failed,
                }"
                aria-hidden="true"
            ></i>
            @if ($button !== 'icon')
                <span x-text="statusLabel">{{ $buttonLabel }}</span>
            @elseif (filled($resolvedValue))
                <span class="max-w-[14rem] truncate font-normal text-foreground" x-text="displayValue">{{ $resolvedValue }}</span>
            @endif
        </button>
    @else
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

            <div
                @class([
                    $controlClasses,
                    'rounded-l-none' => $hasAddonStart && $variant !== 'flush',
                    'rounded-r-none' => $hasAddonEnd && $variant !== 'flush',
                    ($hasAddonStart || $hasAddonEnd) ? 'min-w-0 flex-1' : 'w-full',
                ])
                @click="onClickSurface()"
            >
                @if ($mode === 'code')
                    <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-1.5">
                        <div class="flex min-w-0 items-center gap-2">
                            @if ($hasIconStart)
                                <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }} {{ $stateTextClasses }}" aria-hidden="true"></i>
                            @endif
                            @if ($showLanguage)
                                <span class="truncate text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">{{ $language }}</span>
                            @elseif ($hasLabel && $floating)
                                <span class="truncate text-xs font-medium text-muted-foreground">{{ $label }}</span>
                            @endif
                        </div>

                        <div class="flex items-center gap-1">
                            @if ($masked)
                                <button
                                    type="button"
                                    class="{{ $actionButtonClasses }}"
                                    @click.stop="toggleReveal()"
                                    x-bind:aria-label="revealed ? @js($hideLabel) : @js($revealLabel)"
                                >
                                    <i
                                        class="bi leading-none"
                                        x-bind:class="revealed ? 'bi-eye-slash' : 'bi-eye'"
                                        aria-hidden="true"
                                    ></i>
                                </button>
                            @endif

                            <button
                                type="button"
                                class="{{ $actionButtonClasses }}"
                                @click.stop="copy()"
                                x-bind:disabled="! canCopy"
                                x-bind:aria-label="statusLabel"
                            >
                                <i
                                    class="bi leading-none"
                                    x-bind:class="{
                                        'bi-clipboard-check text-success': copied,
                                        'bi-exclamation-circle text-danger': failed,
                                        'bi-clipboard': ! copied && ! failed,
                                    }"
                                    aria-hidden="true"
                                ></i>
                                @if ($button !== 'icon')
                                    <span class="text-xs" x-text="statusLabel">{{ $buttonLabel }}</span>
                                @endif
                            </button>
                        </div>
                    </div>
                @endif

                @if ($hasIconStart && $mode !== 'code')
                    <span
                        @class([
                            'relative z-10 inline-flex shrink-0 items-center justify-center',
                            $stateTextClasses,
                            $mode === 'input' ? null : 'self-start mt-2.5',
                        ])
                        aria-hidden="true"
                    >
                        <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                    </span>
                @endif

                @if ($hasPrefix && $mode === 'input')
                    <span class="relative z-10 inline-flex shrink-0 select-none items-center {{ $sizeIconClasses }} text-muted-foreground">
                        @isset($prefixSlot)
                            {{ $prefixSlot }}
                        @else
                            {{ $prefix }}
                        @endisset
                    </span>
                @endif

                <div @class(['relative min-w-0 flex-1', 'h-full' => $mode === 'input' || $floating])>
                    @if (in_array($mode, ['textarea', 'code'], true))
                        <textarea
                            x-ref="field"
                            id="{{ $inputId }}"
                            rows="{{ $rows }}"
                            x-bind:value="masked && ! revealed ? displayValue : text"
                            @focus="onFocus()"
                            @blur="onBlur()"
                            @input="onInput($event)"
                            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                            @if ($hasError) aria-invalid="true" @endif
                            @required($required)
                            @disabled($isDisabled)
                            x-bind:readonly="! canEdit || (masked && ! revealed)"
                            class="{{ $fieldClasses }}"
                            {{ $fieldAttributes }}
                        ></textarea>
                    @else
                        <input
                            x-ref="field"
                            id="{{ $inputId }}"
                            x-bind:type="fieldType"
                            x-bind:value="text"
                            @focus="onFocus()"
                            @blur="onBlur()"
                            @input="onInput($event)"
                            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
                            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                            @if ($hasError) aria-invalid="true" @endif
                            @required($required)
                            @disabled($isDisabled)
                            x-bind:readonly="! canEdit"
                            autocomplete="off"
                            spellcheck="false"
                            class="{{ $fieldClasses }}"
                            x-bind:class="fieldMaskClass"
                            {{ $fieldAttributes }}
                        >
                    @endif

                    @if ($floating && $hasLabel && $mode === 'input')
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

                @if ($hasSuffix && $mode === 'input')
                    <span class="relative z-10 inline-flex shrink-0 select-none items-center {{ $sizeIconClasses }} text-muted-foreground">
                        @isset($suffixSlot)
                            {{ $suffixSlot }}
                        @else
                            {{ $suffix }}
                        @endisset
                    </span>
                @endif

                @if ($mode !== 'code')
                    <div @class([
                        'relative z-10 flex shrink-0 items-center gap-0.5',
                        $mode === 'input' ? null : 'self-start mt-1.5',
                    ])>
                        @if ($loading)
                            <span class="size-4 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}" aria-hidden="true"></span>
                        @endif

                        @if ($clearable && $isEditable)
                            <button
                                type="button"
                                x-show="hasValue && canEdit"
                                x-cloak
                                @click.stop="clear()"
                                class="{{ $actionButtonClasses }} text-muted-foreground hover:text-foreground"
                                aria-label="Limpar"
                            >
                                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                            </button>
                        @endif

                        @if ($masked)
                            <button
                                type="button"
                                class="{{ $actionButtonClasses }} text-muted-foreground hover:text-foreground"
                                @click.stop="toggleReveal()"
                                x-bind:aria-label="revealed ? @js($hideLabel) : @js($revealLabel)"
                            >
                                <i
                                    class="bi leading-none"
                                    x-bind:class="revealed ? 'bi-eye-slash' : 'bi-eye'"
                                    aria-hidden="true"
                                ></i>
                            </button>
                        @endif

                        <button
                            type="button"
                            class="{{ $actionButtonClasses }}"
                            @click.stop="copy()"
                            x-bind:disabled="! canCopy"
                            x-bind:aria-label="statusLabel"
                        >
                            <i
                                class="bi leading-none"
                                x-bind:class="{
                                    'bi-clipboard-check text-success': copied,
                                    'bi-exclamation-circle text-danger': failed,
                                    'bi-clipboard': ! copied && ! failed,
                                }"
                                aria-hidden="true"
                            ></i>
                            @if ($button !== 'icon')
                                <span class="text-xs" x-text="statusLabel">{{ $buttonLabel }}</span>
                            @endif
                        </button>
                    </div>
                @endif

                @if ($hasIconEnd && $mode !== 'code')
                    <span
                        @class([
                            'relative z-10 inline-flex shrink-0 items-center justify-center',
                            $stateTextClasses,
                            $mode === 'input' ? null : 'self-start mt-2.5',
                        ])
                        aria-hidden="true"
                    >
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
    @endif

    <p
        id="{{ $statusId }}"
        class="sr-only"
        aria-live="polite"
        x-text="copied ? copiedLabel : (failed ? errorLabel : '')"
    ></p>

    @if ($hasHint && ! $hasError)
        <p id="{{ $hintId }}" class="text-xs text-muted-foreground">
            @isset($hintSlot)
                {{ $hintSlot }}
            @else
                {{ $hint }}
            @endisset
        </p>
    @endif

    @if ($hasError)
        <p id="{{ $errorId }}" role="alert" class="text-xs text-danger">
            @isset($errorSlot)
                {{ $errorSlot }}
            @else
                {{ $error }}
            @endisset
        </p>
    @endif
</div>
