@props([
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
    'clearable' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'height' => null,
    'width' => null,
    'preset' => null,
    'theme' => 'padrao',
    'appearance' => null,
    'locale' => 'pt',
    'plugins' => null,
    'toolbar' => null,
    'footer' => true,
    'responsive' => true,
    'persistTheme' => false,
    'persistAppearance' => false,
    'assetBaseUrl' => null,
    'imageUploadUrl' => null,
    'imageMaxSize' => null,
    'imageMinWidth' => null,
    'imageMaxWidth' => null,
    'imageMinHeight' => null,
    'imageMaxHeight' => null,
    'fontFamilyDefault' => null,
    'fontFamilyItems' => null,
    'maxlength' => null,
    'counter' => false,
    'wordCounter' => false,
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

    $allowedPresets = ['default', 'corporate', 'minimalist'];

    if ($preset !== null && ! in_array($preset, $allowedPresets, true)) {
        $preset = null;
    }

    $allowedThemes = ['padrao', 'escuro', 'corporate'];

    if (! in_array($theme, $allowedThemes, true)) {
        $theme = 'padrao';
    }

    if ($appearance !== null && ! in_array($appearance, ['light', 'dark'], true)) {
        $appearance = null;
    }

    $allowedLocales = ['pt', 'en', 'es'];

    if (! in_array($locale, $allowedLocales, true)) {
        $locale = 'pt';
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

    $editorId = $id ?? ($name ? 'editor-'.$name : 'editor-'.str()->uuid());
    $textareaId = $editorId.'-source';

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $showCounter = (bool) $counter || filled($maxlength) || (bool) $wordCounter;

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $editorId.'-hint' : null;
    $errorId = $hasError ? $editorId.'-error' : null;
    $counterId = $showCounter ? $editorId.'-counter' : null;
    $describedBy = collect([$hintId, $errorId, $counterId])->filter()->implode(' ');

    $defaultHeight = match ($size) {
        'sm' => 220,
        'lg' => 420,
        default => 320,
    };

    $resolvedHeight = $height !== null ? max(120, (int) $height) : $defaultHeight;
    $resolvedWidth = $width !== null ? max(200, (int) $width) : null;

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

    // Sem overflow-hidden: overlays/menus do baselabeditor (overlayRoot)
    // ficam dentro do mount e seriam cortados.
    $shellClasses = collect([
        'group/editor relative w-full transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        $variant === 'flush' ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        $focusRingClasses,
        $isDisabled ? 'opacity-60' : null,
    ])->filter()->implode(' ');

    $resolvedPlugins = null;

    if (is_string($plugins) && filled($plugins)) {
        $resolvedPlugins = collect(preg_split('/\s*,\s*/', $plugins) ?: [])
            ->filter()
            ->values()
            ->all();
    } elseif (is_array($plugins)) {
        $resolvedPlugins = array_values(array_filter($plugins, fn ($plugin) => filled($plugin)));
    }

    $resolvedToolbar = $toolbar;

    if (is_string($toolbar) && str_contains($toolbar, "\n")) {
        $resolvedToolbar = collect(preg_split('/\r\n|\r|\n/', $toolbar) ?: [])
            ->map(fn (string $line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    $plainForStats = trim(html_entity_decode(strip_tags((string) $resolvedValue), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    $initialLength = mb_strlen($plainForStats);
    $initialWords = $plainForStats === ''
        ? 0
        : count(preg_split('/\s+/', $plainForStats) ?: []);

    $staticCounterText = collect([
        $wordCounter ? $initialWords.' '.($initialWords === 1 ? 'palavra' : 'palavras') : null,
        ($counter || filled($maxlength))
            ? ($initialLength.($maxlength !== null ? '/'.$maxlength : ''))
            : null,
    ])->filter()->implode(' · ');

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $rootAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');

    $alpineConfig = [
        'value' => (string) $resolvedValue,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'loading' => (bool) $loading,
        'maxLength' => $maxlength !== null ? (int) $maxlength : null,
        'showCharCounter' => (bool) $counter || filled($maxlength),
        'showWordCounter' => (bool) $wordCounter,
        'clearable' => (bool) $clearable,
        'preset' => $preset,
        'theme' => $theme,
        'appearance' => $appearance,
        'locale' => $locale,
        'plugins' => $resolvedPlugins,
        'toolbar' => $resolvedToolbar,
        'footer' => (bool) $footer,
        'responsive' => (bool) $responsive,
        'persistTheme' => (bool) $persistTheme,
        'persistAppearance' => (bool) $persistAppearance,
        'width' => $resolvedWidth,
        'height' => $resolvedHeight,
        'assetBaseUrl' => $assetBaseUrl,
        'imageUploadUrl' => $imageUploadUrl,
        'imageMaxSize' => $imageMaxSize !== null ? (int) $imageMaxSize : null,
        'imageMinWidth' => $imageMinWidth !== null ? (int) $imageMinWidth : null,
        'imageMaxWidth' => $imageMaxWidth !== null ? (int) $imageMaxWidth : null,
        'imageMinHeight' => $imageMinHeight !== null ? (int) $imageMinHeight : null,
        'imageMaxHeight' => $imageMaxHeight !== null ? (int) $imageMaxHeight : null,
        'fontFamilyDefault' => $fontFamilyDefault,
        'fontFamilyItems' => $fontFamilyItems,
    ];
@endphp

<div
    id="{{ $editorId }}"
    x-data="formEditor(@js($alpineConfig))"
    x-modelable="value"
    {{ $modelAttributes }}
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $rootAttributes }}
>
    @if ($hasLabel)
        <div class="flex items-center justify-between gap-3">
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

            @if ($clearable || $loading)
                <div class="flex items-center gap-1.5">
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
                            class="inline-flex cursor-pointer items-center gap-1 rounded-md px-1.5 py-0.5 text-xs text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                            aria-label="Limpar editor"
                        >
                            <i class="bi bi-x-lg text-[0.7rem] leading-none" aria-hidden="true"></i>
                            Limpar
                        </button>
                    @endif
                </div>
            @endif
        </div>
    @endif

    <div
        @class([$shellClasses, 'w-full'])
        @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
        @if ($hasError) aria-invalid="true" @endif
    >
        {{-- Textarea de origem exigida pelo baselabeditor (espelha o HTML). --}}
        <textarea
            x-ref="textarea"
            id="{{ $textareaId }}"
            @if ($name) name="{{ $name }}" @endif
            class="sr-only"
            tabindex="-1"
            aria-hidden="true"
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($maxlength !== null) maxlength="{{ $maxlength }}" @endif
            @disabled($isDisabled)
            @if ($isReadonly) readonly @endif
            @if ($required) required @endif
        >{!! str_replace('</textarea>', '&lt;/textarea>', (string) $resolvedValue) !!}</textarea>

        <div
            x-ref="mount"
            wire:ignore
            class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none"
            data-forms-editor-mount
            style="min-height: {{ $resolvedHeight }}px"
        ></div>

        @if (filled($placeholder))
            <p
                x-show="ready && ! hasValue && ! focused"
                x-cloak
                class="pointer-events-none absolute start-4 top-14 z-10 max-w-[calc(100%-2rem)] text-sm text-muted-foreground"
            >{{ $placeholder }}</p>
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
                    x-text="counterText"
                >{{ $staticCounterText }}</p>
            @endif
        </div>
    @endif
</div>
