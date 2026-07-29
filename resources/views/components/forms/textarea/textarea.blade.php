@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'floating' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'clearable' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'rows' => 3,
    'minRows' => null,
    'maxRows' => null,
    'autoGrow' => false,
    'resize' => 'vertical',
    'maxlength' => null,
    'minlength' => null,
    'counter' => false,
    'wordCounter' => false,
    'autocomplete' => null,
    'spellcheck' => null,
    'wrap' => null,
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

    if (! in_array($resize, ['none', 'vertical', 'horizontal', 'both'], true)) {
        $resize = 'vertical';
    }

    $rows = max(1, (int) $rows);
    $resolvedMinRows = max(1, (int) ($minRows ?? $rows));
    $resolvedMaxRows = $maxRows !== null ? max($resolvedMinRows, (int) $maxRows) : null;

    // Auto-grow controla a altura — resize manual conflitaria.
    if ($autoGrow) {
        $resize = 'none';
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

    $slotValue = isset($slot) && ! $slot->isEmpty() ? (string) $slot : null;
    $resolvedValue = $slotValue !== null ? $slotValue : ($value ?? '');

    if ($autocomplete === null && filled($name)) {
        $autocomplete = 'off';
    }

    $textareaId = $id ?? ($name ? 'textarea-'.$name : 'textarea-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $showCounter = (bool) $counter || filled($maxlength) || (bool) $wordCounter;
    $needsAlpine = $floating || $clearable || $showCounter || $autoGrow;

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $textareaId.'-hint' : null;
    $errorId = $hasError ? $textareaId.'-error' : null;
    $counterId = $showCounter ? $textareaId.'-counter' : null;

    $describedBy = collect([$hintId, $errorId, $counterId])->filter()->implode(' ');

    $controlTextClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $sizePadClasses = match ($size) {
        'sm' => 'px-2.5 py-2',
        'lg' => 'px-3.5 py-3',
        default => 'px-3 py-2.5',
    };

    $labelSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $radiusClasses = $rounded ? 'rounded-2xl' : 'rounded-lg';

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

    $resizeClass = match ($resize) {
        'none' => 'resize-none',
        'horizontal' => 'resize-x',
        'both' => 'resize',
        default => 'resize-y',
    };

    $controlClasses = collect([
        'group/textarea relative flex w-full flex-col transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        $variant === 'flush' ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        $focusRingClasses,
        $sizePadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-text',
    ])->filter()->implode(' ');

    $textareaClasses = collect([
        'min-w-0 w-full bg-transparent text-foreground outline-none',
        'placeholder:text-muted-foreground disabled:cursor-not-allowed',
        'read-only:cursor-default',
        $controlTextClass,
        $resizeClass,
        // Leading confortável para leitura multilinha.
        'leading-relaxed',
        $floating ? 'peer placeholder-transparent pt-4' : null,
    ])->filter()->implode(' ');

    $floatingLabelRest = match ($size) {
        'sm' => 'top-2 translate-y-0 text-xs',
        'lg' => 'top-3.5 translate-y-0 text-base',
        default => 'top-3 translate-y-0 text-sm',
    };

    $floatingLabelActive = match ($size) {
        'sm' => 'top-1 translate-y-0 text-[10px]',
        'lg' => 'top-2 translate-y-0 text-xs',
        default => 'top-1.5 translate-y-0 text-xs',
    };

    $initialWords = filled(trim((string) $resolvedValue))
        ? count(preg_split('/\s+/', trim((string) $resolvedValue)) ?: [])
        : 0;

    $alpineConfig = [
        'value' => (string) $resolvedValue,
        'maxLength' => $maxlength !== null ? (int) $maxlength : null,
        'showCharCounter' => (bool) $counter || filled($maxlength),
        'showWordCounter' => (bool) $wordCounter,
        'floating' => (bool) $floating,
        'autoGrow' => (bool) $autoGrow,
        'minRows' => $resolvedMinRows,
        'maxRows' => $resolvedMaxRows,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];

    $staticCounterText = collect([
        $wordCounter ? $initialWords.' '.($initialWords === 1 ? 'palavra' : 'palavras') : null,
        ($counter || filled($maxlength))
            ? (strlen((string) $resolvedValue).($maxlength !== null ? '/'.$maxlength : ''))
            : null,
    ])->filter()->implode(' · ');
@endphp

<div
    @if ($needsAlpine)
        x-data="formTextarea(@js($alpineConfig))"
    @endif
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
>
    @if ($hasLabel && ! $floating)
        <label for="{{ $textareaId }}" class="{{ $labelSizeClasses }} font-medium text-foreground">
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

    <div @class([$controlClasses, 'w-full'])>
        <div class="relative min-w-0 flex-1">
            <textarea
                x-ref="textarea"
                @if ($needsAlpine)
                    @focus="onFocus()"
                    @blur="onBlur()"
                    @input="onInput($event)"
                @endif
                id="{{ $textareaId }}"
                @if ($name) name="{{ $name }}" @endif
                rows="{{ $rows }}"
                @if ($placeholder !== null || $floating)
                    placeholder="{{ $floating ? ' ' : $placeholder }}"
                @endif
                @if ($autocomplete !== null) autocomplete="{{ $autocomplete }}" @endif
                @if ($maxlength !== null) maxlength="{{ $maxlength }}" @endif
                @if ($minlength !== null) minlength="{{ $minlength }}" @endif
                @if ($spellcheck !== null) spellcheck="{{ $spellcheck ? 'true' : 'false' }}" @endif
                @if ($wrap !== null) wrap="{{ $wrap }}" @endif
                @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                @if ($hasError) aria-invalid="true" @endif
                @disabled($isDisabled)
                @if ($isReadonly) readonly @endif
                @if ($required) required @endif
                {{
                    $attributes
                        ->except(['class', 'disabled', 'readonly', 'autocomplete'])
                        ->class([$textareaClasses])
                }}
            >{{ $resolvedValue }}</textarea>

            @if ($floating && $hasLabel)
                <label
                    for="{{ $textareaId }}"
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

        @if ($loading || $clearable)
            <div class="pointer-events-none absolute end-2 top-2 z-10 flex items-center gap-1">
                @if ($loading)
                    <span
                        class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}"
                        aria-hidden="true"
                    ></span>
                @elseif ($clearable)
                    <button
                        type="button"
                        x-show="hasValue"
                        x-cloak
                        @click="clear()"
                        @disabled($isDisabled || $isReadonly)
                        class="pointer-events-auto flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                        aria-label="Limpar"
                    >
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                @endif
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
                        x-text="counterText"
                    @endif
                >@unless ($needsAlpine){{ $staticCounterText }}@endunless</p>
            @endif
        </div>
    @endif
</div>
