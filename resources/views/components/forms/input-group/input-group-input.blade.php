@props([
    'type' => 'text',
    'icon' => null,
    'iconPosition' => 'start',
    'prefix' => null,
    'suffix' => null,
    'clearable' => false,
    'passwordToggle' => null,
    'loading' => false,
    'readonly' => false,
    'required' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'maxlength' => null,
    'counter' => false,
    'autocomplete' => null,
])

@aware([
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'rounded' => false,
    'disabled' => false,
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

    $hasBagError = filled($name) && $errorBag?->has($name);
    $resolvedState = match (true) {
        $hasBagError => 'danger',
        in_array($state, ['success', 'warning', 'danger', 'info'], true) => $state,
        default => null,
    };

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

    $hasPrefix = filled($prefix) || isset($prefixSlot);
    $hasSuffix = filled($suffix) || isset($suffixSlot);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showPasswordToggle = (bool) $passwordToggle && $type === 'password';
    $showCounter = (bool) $counter || filled($maxlength);
    $needsAlpine = $showPasswordToggle || $clearable || $showCounter;

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $sizeIconClasses = match ($size) {
        'sm' => 'text-sm',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $stateTextClasses = match ($resolvedState) {
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-muted-foreground',
    };

    $alpineConfig = [
        'value' => $value ?? '',
        'maxLength' => $maxlength !== null ? (int) $maxlength : null,
        'floating' => false,
    ];
@endphp

<div
    @if ($needsAlpine)
        x-data="formInput(@js($type), @js($alpineConfig))"
    @endif
    {{ $attributes->only('class')->class(['input-group-control']) }}
>
    @if ($hasIconStart)
        <span class="inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
            <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
        </span>
    @endif

    @if ($hasPrefix)
        <span class="shrink-0 select-none {{ $sizeIconClasses }} text-muted-foreground">
            @isset($prefixSlot)
                {{ $prefixSlot }}
            @else
                {{ $prefix }}
            @endisset
        </span>
    @endif

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
        @if ($placeholder !== null) placeholder="{{ $placeholder }}" @endif
        @if ($autocomplete !== null) autocomplete="{{ $autocomplete }}" @endif
        @if ($maxlength !== null) maxlength="{{ $maxlength }}" @endif
        @if ($hasBagError || $resolvedState === 'danger') aria-invalid="true" @endif
        @disabled($isDisabled)
        @if ($isReadonly) readonly @endif
        @if ($required) required @endif
        {{
            $attributes
                ->except(['class', 'disabled', 'readonly', 'autocomplete'])
                ->class([
                    'min-w-0 flex-1 bg-transparent text-foreground outline-none',
                    'placeholder:text-muted-foreground disabled:cursor-not-allowed',
                    'read-only:cursor-default h-full w-full',
                ])
        }}
    >

    @if ($hasSuffix)
        <span class="shrink-0 select-none {{ $sizeIconClasses }} text-muted-foreground">
            @isset($suffixSlot)
                {{ $suffixSlot }}
            @else
                {{ $suffix }}
            @endisset
        </span>
    @endif

    @if ($showCounter)
        <span
            class="shrink-0 tabular-nums text-muted-foreground {{ $sizeIconClasses }}"
            @if ($needsAlpine)
                x-text="maxLength ? (length + '/' + maxLength) : length"
            @endif
        >@unless ($needsAlpine){{ strlen((string) ($value ?? '')) }}@if ($maxlength !== null)/{{ $maxlength }}@endif@endunless</span>
    @endif

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
            class="flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
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
            class="flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
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
        <span class="inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
            <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
        </span>
    @endif
</div>
