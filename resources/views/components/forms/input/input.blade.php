@props([
    'type' => 'text',
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
    'passwordToggle' => null,
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
    'maxlength' => null,
    'counter' => false,
    'autocomplete' => null,
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts/botões do app,
    // nunca cores Tailwind fixas — ver resources/css/themes/*.css.
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

    $allowedTypes = [
        'text', 'email', 'password', 'search', 'tel', 'url', 'number',
        'date', 'datetime-local', 'month', 'week', 'time', 'color', 'file',
    ];

    if (! in_array($type, $allowedTypes, true)) {
        $type = 'text';
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

    $passwordToggle = $passwordToggle ?? ($type === 'password');

    if ($autocomplete === null) {
        $autocomplete = match ($type) {
            'password' => 'current-password',
            'email' => 'email',
            'tel' => 'tel',
            'url' => 'url',
            'search' => 'off',
            default => null,
        };
    }

    if ($autocomplete === null) {
        $nameToken = strtolower((string) preg_replace('/[^a-z0-9]+/i', '_', (string) ($name ?? '')));
        $idToken = strtolower((string) preg_replace('/[^a-z0-9]+/i', '_', (string) ($id ?? '')));
        $autofillHint = trim($nameToken.' '.$idToken);

        $autocomplete = match (true) {
            $autofillHint === '' => null,
            str_contains($autofillHint, 'new_password'),
            str_contains($autofillHint, 'password_confirmation'),
            str_contains($autofillHint, 'password_plain'),
            str_contains($autofillHint, 'confirm_password') => 'new-password',
            str_contains($autofillHint, 'password') => 'current-password',
            str_contains($autofillHint, 'email') => 'email',
            str_contains($autofillHint, 'username'),
            $nameToken === 'user',
            $nameToken === 'login' => 'username',
            $nameToken === 'name',
            $nameToken === 'full_name',
            $nameToken === 'nome',
            str_ends_with($nameToken, '_name') => 'name',
            str_contains($autofillHint, 'phone'),
            str_contains($autofillHint, 'tel'),
            str_contains($autofillHint, 'fone') => 'tel',
            $nameToken === 'url',
            $nameToken === 'website',
            $nameToken === 'site',
            str_contains($nameToken, 'website'),
            str_ends_with($nameToken, '_url') => 'url',
            filled($name) => 'off',
            default => null,
        };
    }

    $inputId = $id ?? ($name ? 'input-'.$name : 'input-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasPrefix = filled($prefix) || isset($prefixSlot);
    $hasSuffix = filled($suffix) || isset($suffixSlot);
    $hasAddonStart = isset($addonStart);
    $hasAddonEnd = isset($addonEnd);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showPasswordToggle = (bool) $passwordToggle && $type === 'password';
    $showCounter = (bool) $counter || filled($maxlength);
    // Floating sempre usa Alpine (labelFloated); demais features também.
    $needsAlpine = $floating || $showPasswordToggle || $clearable || $showCounter;

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $counterId = $showCounter ? $inputId.'-counter' : null;

    $describedBy = collect([$hintId, $errorId, $counterId])->filter()->implode(' ');

    // Altura única compartilhada entre controle e addons (evita degrau na borda).
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
        // Com addon, o ring no grupo inteiro fica no wrapper; no controle isolado, aqui.
        ($variant === 'flush' || $hasAddonStart || $hasAddonEnd) ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        ($hasAddonStart || $hasAddonEnd) ? null : $focusRingClasses,
        $sizeControlClasses,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-text',
        // Sem sombra própria quando cola em addon (evita “degrau” visual).
        ($hasAddonStart || $hasAddonEnd) && $variant === 'default' ? 'shadow-none' : null,
    ])->filter()->implode(' ');

    $addonShellClasses = collect([
        'box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground',
        $controlHeightClass,
        $sizeAddonClasses,
        '[&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none',
        '[&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none',
    ])->implode(' ');

    // Floating: input em fluxo normal (não absolute) com padding-top para o
    // valor ficar abaixo do label. Label absoluto controlado pelo Alpine.
    $inputClasses = collect([
        'min-w-0 flex-1 bg-transparent text-foreground outline-none',
        'placeholder:text-muted-foreground disabled:cursor-not-allowed',
        'read-only:cursor-default',
        $floating ? 'peer h-full w-full placeholder-transparent pt-4 pb-1' : 'h-full w-full',
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
        'value' => $value ?? '',
        'maxLength' => $maxlength !== null ? (int) $maxlength : null,
        'floating' => (bool) $floating,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];
@endphp

<div
    @if ($needsAlpine)
        x-data="formInput(@js($type), @js($alpineConfig))"
    @endif
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

    <div @class([
        'flex w-full items-stretch',
        // Ring no grupo quando há addon — alinha o foco com texto + botão.
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
                    @if ($needsAlpine)
                        x-bind:type="inputType"
                        @focus="onFocus()"
                        @blur="onBlur()"
                        @input="onInput($event)"
                    @else
                        type="{{ $type }}"
                    @endif
                    id="{{ $inputId }}"
                    @if ($name) name="{{ $name }}" @endif
                    @if ($value !== null) value="{{ $value }}" @endif
                    @if ($placeholder !== null || $floating)
                        placeholder="{{ $floating ? ' ' : $placeholder }}"
                    @endif
                    @if ($autocomplete !== null) autocomplete="{{ $autocomplete }}" @endif
                    @if ($maxlength !== null) maxlength="{{ $maxlength }}" @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    @disabled($isDisabled)
                    @if ($isReadonly) readonly @endif
                    @if ($required) required @endif
                    {{
                        $attributes
                            ->except(['class', 'disabled', 'readonly', 'autocomplete'])
                            ->class([$inputClasses])
                    }}
                >

                @if ($floating && $hasLabel)
                    {{-- Posição só via floatingLabelClasses (objeto Alpine).
                         Não misturar top/translate no class estático — o bind
                         por string NÃO remove classes do atributo class. --}}
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

            @if ($showPasswordToggle)
                <button
                    type="button"
                    @click="togglePassword()"
                    @disabled($isDisabled)
                    class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                    x-bind:aria-label="showPassword ? 'Ocultar senha' : 'Mostrar senha'"
                >
                    <i
                        class="bi text-sm leading-none"
                        x-bind:class="showPassword ? 'bi-eye-slash' : 'bi-eye'"
                        aria-hidden="true"
                    ></i>
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
                    @if ($needsAlpine)
                        x-text="maxLength ? (length + '/' + maxLength) : length"
                    @endif
                >@unless ($needsAlpine){{ strlen((string) ($value ?? '')) }}@if ($maxlength !== null)/{{ $maxlength }}@endif@endunless</p>
            @endif
        </div>
    @endif
</div>
