@props([
    'length' => 6,
    'mode' => 'numeric',
    'group' => null,
    'separator' => '–',
    'masked' => false,
    'placeholder' => '·',
    'autofocus' => false,
    'selectOnFocus' => true,
    'blurOnComplete' => false,
    'clearable' => false,
    'resend' => false,
    'resendSeconds' => 60,
    'resendLabel' => 'Reenviar código',
    'center' => false,
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'autocomplete' => 'one-time-code',
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

    if (! in_array($mode, ['numeric', 'alpha', 'alphanumeric'], true)) {
        $mode = 'numeric';
    }

    $length = max(1, min(12, (int) $length));
    $groupSize = $group !== null && $group !== false && $group !== ''
        ? max(1, (int) $group)
        : null;
    $resendSeconds = max(0, (int) $resendSeconds);
    $showResend = (bool) $resend;
    $showClear = (bool) $clearable;
    $placeholderChar = filled($placeholder) ? mb_substr((string) $placeholder, 0, 1) : '';

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

    $inputId = $id ?? ($name ? 'input-otp-'.$name : 'input-otp-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasResendSlot = isset($resendSlot);

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $describedBy = collect([$hintId, $errorId])->filter()->implode(' ');

    $labelSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $cellSizeClasses = match ($size) {
        'sm' => 'h-9 w-9 text-sm',
        'lg' => 'h-14 w-12 text-xl sm:w-14',
        default => 'h-11 w-10 text-base sm:w-11',
    };

    $gapClasses = match ($size) {
        'sm' => 'gap-1.5',
        'lg' => 'gap-2.5',
        default => 'gap-2',
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';

    $focusRingClasses = match ($focusColor) {
        'secondary' => 'focus:border-secondary focus:ring-secondary',
        'success' => 'focus:border-success focus:ring-success',
        'warning' => 'focus:border-warning focus:ring-warning',
        'danger' => 'focus:border-danger focus:ring-danger',
        'info' => 'focus:border-info focus:ring-info',
        default => 'focus:border-primary focus:ring-primary',
    };

    $stateBorderClasses = match ($resolvedState) {
        'success' => 'border-success',
        'warning' => 'border-warning',
        'danger' => 'border-danger',
        'info' => 'border-info',
        default => 'border-border',
    };

    $variantCellClasses = match ($variant) {
        'filled' => 'border border-transparent bg-muted shadow-none',
        'flush' => 'rounded-none border-0 border-b-2 border-border bg-transparent shadow-none focus:ring-0',
        default => 'border bg-card shadow-sm',
    };

    $cellClasses = collect([
        'box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors',
        'placeholder:text-muted-foreground/50 disabled:cursor-not-allowed',
        'read-only:cursor-default',
        '[-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none',
        $variant === 'flush' ? null : $radiusClasses,
        $variantCellClasses,
        $stateBorderClasses,
        $variant === 'flush' ? null : 'focus:ring-2 focus:ring-offset-1',
        $focusRingClasses,
        $cellSizeClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : null,
        // Máscara visual sem type=password (evita heurísticas do Password Manager).
        $masked ? '[-webkit-text-security:disc] [text-security:disc]' : null,
    ])->filter()->implode(' ');

    $separatorClasses = match ($size) {
        'sm' => 'text-sm',
        'lg' => 'text-xl',
        default => 'text-base',
    };

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $eventAttributes = $attributes->filter(
        fn (mixed $value, string $key): bool => str_starts_with($key, 'x-on:otp') || str_starts_with($key, '@otp')
    );
    $rootAttributes = $attributes
        ->except(['class', 'disabled', 'readonly', 'autocomplete'])
        ->whereDoesntStartWith('wire:model')
        ->filter(
            fn (mixed $value, string $key): bool => ! str_starts_with($key, 'x-on:otp') && ! str_starts_with($key, '@otp')
        );

    $initialValue = filled($value) ? (string) $value : '';

    $alpineConfig = [
        'length' => $length,
        'mode' => $mode,
        'value' => $initialValue,
        'masked' => (bool) $masked,
        'selectOnFocus' => (bool) $selectOnFocus,
        'blurOnComplete' => (bool) $blurOnComplete,
        'autofocus' => (bool) $autofocus,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'resend' => $showResend,
        'resendSeconds' => $resendSeconds,
    ];

    $indexes = range(0, $length - 1);
@endphp

<div
    x-data="formInputOtp(@js($alpineConfig))"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $eventAttributes }}
>
    @if ($hasLabel)
        <div @class(['flex items-center justify-between gap-3', $center ? 'flex-col sm:flex-row' : null])>
            <label for="{{ $inputId }}-0" class="{{ $labelSizeClasses }} font-medium text-foreground">
                @isset($labelSlot)
                    {{ $labelSlot }}
                @else
                    {{ $label }}
                @endisset
                @if ($required)
                    <span class="text-danger" aria-hidden="true">*</span>
                @endif
            </label>

            @if ($showClear)
                <button
                    type="button"
                    class="inline-flex items-center gap-1 text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                    x-bind:disabled="filledCount === 0 || {{ $isDisabled || $isReadonly ? 'true' : 'false' }}"
                    @click="clear()"
                >
                    <i class="bi bi-x-circle leading-none" aria-hidden="true"></i>
                    Limpar
                </button>
            @endif
        </div>
    @elseif ($showClear)
        <div @class(['flex', $center ? 'justify-center' : 'justify-end'])>
            <button
                type="button"
                class="inline-flex items-center gap-1 text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                x-bind:disabled="filledCount === 0 || {{ $isDisabled || $isReadonly ? 'true' : 'false' }}"
                @click="clear()"
            >
                <i class="bi bi-x-circle leading-none" aria-hidden="true"></i>
                Limpar
            </button>
        </div>
    @endif

    @php
        $modelPattern = match ($mode) {
            'alpha' => '[A-Za-z]{'.$length.'}',
            'alphanumeric' => '[A-Za-z0-9]{'.$length.'}',
            default => '[0-9]{'.$length.'}',
        };
    @endphp

    <input
        type="hidden"
        x-ref="model"
        @if ($name) name="{{ $name }}" @endif
        value="{{ $initialValue }}"
        @if ($required)
            required
            minlength="{{ $length }}"
            maxlength="{{ $length }}"
            pattern="{{ $modelPattern }}"
        @endif
        @disabled($isDisabled)
        {{ $modelAttributes }}
        {{ $rootAttributes->only(['form']) }}
    >

    <div
        role="group"
        aria-label="{{ $hasLabel ? trim(strip_tags((string) ($label ?? 'Código OTP'))) : 'Código OTP' }}"
        @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
        @class([
            'relative flex flex-wrap items-center',
            $gapClasses,
            $center ? 'justify-center' : 'justify-start',
        ])
    >
        @foreach ($indexes as $index)
            @if ($groupSize && $index > 0 && $index % $groupSize === 0 && filled($separator))
                <span
                    class="select-none px-0.5 font-medium text-muted-foreground {{ $separatorClasses }}"
                    aria-hidden="true"
                >{{ $separator }}</span>
            @endif

            <input
                x-ref="cell{{ $index }}"
                id="{{ $inputId }}-{{ $index }}"
                x-bind:type="inputType"
                x-bind:inputmode="inputMode"
                pattern="{{ $mode === 'numeric' ? '[0-9]*' : ($mode === 'alpha' ? '[A-Za-z]*' : '[A-Za-z0-9]*') }}"
                maxlength="1"
                autocomplete="{{ $index === 0 ? $autocomplete : 'off' }}"
                @if ($placeholderChar !== '') placeholder="{{ $placeholderChar }}" @endif
                aria-label="Dígito {{ $index + 1 }} de {{ $length }}"
                @if ($hasError) aria-invalid="true" @endif
                @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                @disabled($isDisabled)
                @readonly($isReadonly)
                class="{{ $cellClasses }}"
                x-bind:value="digits[{{ $index }}] ?? ''"
                @focus="onFocus({{ $index }})"
                @blur="onBlur()"
                @input="onInput({{ $index }}, $event)"
                @keydown="onKeydown({{ $index }}, $event)"
                @paste="onPaste({{ $index }}, $event)"
            >
        @endforeach

        @if ($loading)
            <span class="ms-1 inline-flex items-center text-muted-foreground" aria-hidden="true">
                <x-ui.spinner size="sm" />
            </span>
        @endif
    </div>

    @if ($showResend || $hasResendSlot)
        <div @class([
            'flex flex-wrap items-center gap-2 text-xs',
            $center ? 'justify-center' : 'justify-start',
        ])>
            @isset($resendSlot)
                {{ $resendSlot }}
            @else
                <button
                    type="button"
                    class="font-medium text-primary transition-colors hover:underline disabled:pointer-events-none disabled:no-underline disabled:opacity-50"
                    x-bind:disabled="! canResend"
                    @click="requestResend()"
                >
                    <span x-show="canResend">{{ $resendLabel }}</span>
                    <span x-show="! canResend" x-cloak>
                        Reenviar em <span x-text="resendCountdown"></span>s
                    </span>
                </button>
            @endisset
        </div>
    @endif

    @if ($hasHint && ! $hasError)
        <p id="{{ $hintId }}" @class(['text-xs text-muted-foreground', $center ? 'text-center' : null])>
            @isset($hintSlot)
                {{ $hintSlot }}
            @else
                {{ $hint }}
            @endisset
        </p>
    @endif

    @if ($hasError)
        <p id="{{ $errorId }}" role="alert" @class(['text-xs text-danger', $center ? 'text-center' : null])>
            @isset($errorSlot)
                {{ $errorSlot }}
            @else
                {{ $error }}
            @endisset
        </p>
    @endif
</div>
