@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => 'bi-lock',
    'iconPosition' => 'start',
    'prefix' => null,
    'suffix' => null,
    'clearable' => false,
    'toggle' => true,
    'toggleMode' => 'click',
    'mode' => 'current',
    'strength' => null,
    'rules' => null,
    'capsLock' => true,
    'generate' => null,
    'copyable' => false,
    'minLength' => 8,
    'requireUpper' => true,
    'requireLower' => true,
    'requireNumber' => true,
    'requireSymbol' => true,
    'generatorLength' => 16,
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
    'autocomplete' => null,
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

    if (! in_array($mode, ['current', 'new'], true)) {
        $mode = 'current';
    }

    if (! in_array($toggleMode, ['click', 'hold'], true)) {
        $toggleMode = 'click';
    }

    $isNewPassword = $mode === 'new';
    $showStrength = $strength ?? $isNewPassword;
    $showRules = $rules ?? $isNewPassword;
    $showGenerate = $generate ?? $isNewPassword;
    $showToggle = (bool) $toggle;
    $showCapsLock = (bool) $capsLock;
    $showCopy = (bool) $copyable;
    $minLength = max(1, (int) $minLength);
    $generatorLength = max($minLength, (int) $generatorLength);

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
        $autocomplete = $isNewPassword ? 'new-password' : 'current-password';
    }

    if ($placeholder === null) {
        $placeholder = $isNewPassword ? 'Crie uma senha' : 'Digite sua senha';
    }

    $inputId = $id ?? ($name ? 'input-password-'.$name : 'input-password-'.str()->uuid());

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
    $strengthId = $showStrength ? $inputId.'-strength' : null;
    $rulesId = $showRules ? $inputId.'-rules' : null;
    $capsId = $showCapsLock ? $inputId.'-caps' : null;

    $describedBy = collect([$hintId, $errorId, $strengthId, $rulesId, $capsId])->filter()->implode(' ');

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
    ])->filter()->implode(' ');

    $actionButtonClasses = 'relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none';

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
        'floating' => (bool) $floating,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
        'minLength' => $minLength,
        'requireUpper' => (bool) $requireUpper,
        'requireLower' => (bool) $requireLower,
        'requireNumber' => (bool) $requireNumber,
        'requireSymbol' => (bool) $requireSymbol,
        'generatorLength' => $generatorLength,
        'toggleMode' => $toggleMode,
    ];
@endphp

<div
    x-data="formInputPassword(@js($alpineConfig))"
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
                    x-bind:type="inputType"
                    @focus="onFocus()"
                    @blur="onBlur()"
                    @input="onInput($event)"
                    @keydown="onKey($event)"
                    @keyup="onKey($event)"
                    id="{{ $inputId }}"
                    @if ($name) name="{{ $name }}" @endif
                    @if ($value !== null) value="{{ $value }}" @endif
                    @if ($placeholder !== null || $floating)
                        placeholder="{{ $floating ? ' ' : $placeholder }}"
                    @endif
                    @if ($autocomplete !== null) autocomplete="{{ $autocomplete }}" @endif
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

            @if ($showGenerate)
                <button
                    type="button"
                    @click="generate()"
                    @disabled($isDisabled || $isReadonly)
                    class="{{ $actionButtonClasses }}"
                    aria-label="Gerar senha"
                    title="Gerar senha"
                >
                    <i class="bi bi-magic text-sm leading-none" aria-hidden="true"></i>
                </button>
            @endif

            @if ($showCopy)
                <button
                    type="button"
                    x-show="hasValue"
                    x-cloak
                    @click="copy()"
                    @disabled($isDisabled)
                    class="{{ $actionButtonClasses }}"
                    x-bind:aria-label="copied ? 'Copiado' : 'Copiar senha'"
                    x-bind:title="copied ? 'Copiado' : 'Copiar senha'"
                >
                    <i
                        class="bi text-sm leading-none"
                        x-bind:class="copied ? 'bi-clipboard-check text-success' : 'bi-clipboard'"
                        aria-hidden="true"
                    ></i>
                </button>
            @endif

            @if ($showToggle)
                <button
                    type="button"
                    @if ($toggleMode === 'hold')
                        @mousedown.prevent="startReveal()"
                        @mouseup="endReveal()"
                        @mouseleave="endReveal()"
                        @touchstart.prevent="startReveal()"
                        @touchend="endReveal()"
                        @touchcancel="endReveal()"
                        @keydown.space.prevent="startReveal()"
                        @keyup.space.prevent="endReveal()"
                    @else
                        @click="togglePassword()"
                    @endif
                    @disabled($isDisabled)
                    class="{{ $actionButtonClasses }}"
                    x-bind:aria-label="isRevealed ? 'Ocultar senha' : 'Mostrar senha'"
                    x-bind:aria-pressed="isRevealed.toString()"
                    @if ($toggleMode === 'hold')
                        title="Segure para revelar"
                    @endif
                >
                    <i
                        class="bi text-sm leading-none"
                        x-bind:class="isRevealed ? 'bi-eye-slash' : 'bi-eye'"
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

    @if ($showCapsLock)
        <p
            id="{{ $capsId }}"
            class="mb-0 flex items-center gap-1.5 text-xs text-warning"
            x-show="capsLockOn"
            x-cloak
            role="status"
        >
            <i class="bi bi-capslock-fill leading-none" aria-hidden="true"></i>
            Caps Lock ativado
        </p>
    @endif

    @if ($showStrength)
        <div id="{{ $strengthId }}" class="flex flex-col gap-1.5" aria-live="polite">
            <div class="flex items-center justify-between gap-3">
                <span class="text-xs text-muted-foreground">Força da senha</span>
                <span class="text-xs font-medium" x-bind:class="strengthMeta.textClass" x-text="strengthMeta.label"></span>
            </div>
            <div class="h-1.5 w-full overflow-hidden rounded-full bg-muted" aria-hidden="true">
                <div
                    class="h-full rounded-full transition-all duration-200 ease-out"
                    x-bind:class="strengthMeta.barClass"
                    x-bind:style="{ width: strengthMeta.width }"
                ></div>
            </div>
        </div>
    @endif

    @if ($showRules)
        <ul id="{{ $rulesId }}" class="mb-0 flex list-none flex-col gap-1 p-0" aria-label="Requisitos da senha">
            <template x-for="rule in rules" x-bind:key="rule.key">
                <li class="flex items-center gap-1.5 text-xs" x-bind:class="rule.ok ? 'text-success' : 'text-muted-foreground'">
                    <i
                        class="bi leading-none"
                        x-bind:class="rule.ok ? 'bi-check-circle-fill' : 'bi-circle'"
                        aria-hidden="true"
                    ></i>
                    <span x-text="rule.label"></span>
                </li>
            </template>
        </ul>
    @endif

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
