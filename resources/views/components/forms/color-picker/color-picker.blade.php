@props([
    'format' => 'hex',
    'alpha' => false,
    'presets' => null,
    'showPresets' => true,
    'showRecent' => true,
    'showInput' => true,
    'showEyedropper' => true,
    'showCopy' => true,
    'showNative' => false,
    'inline' => false,
    'swatchPosition' => 'start',
    'closeOnSelect' => false,
    'direction' => 'auto',
    'align' => 'start',
    'recentKey' => null,
    'recentLimit' => 8,
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'clearable' => true,
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

    if (! in_array($format, ['hex', 'rgb', 'hsl'], true)) {
        $format = 'hex';
    }

    if (! in_array($swatchPosition, ['start', 'end'], true)) {
        $swatchPosition = 'start';
    }

    if (! in_array($direction, ['auto', 'down', 'up'], true)) {
        $direction = 'auto';
    }

    if (! in_array($align, ['auto', 'start', 'end', 'center'], true)) {
        $align = 'start';
    }

    $defaultPresets = [
        '#EF4444', '#F97316', '#F59E0B', '#84CC16',
        '#22C55E', '#14B8A6', '#06B6D4', '#3B82F6',
        '#6366F1', '#8B5CF6', '#EC4899', '#F43F5E',
        '#000000', '#64748B', '#94A3B8', '#FFFFFF',
    ];

    $presetColors = match (true) {
        $presets === false || $showPresets === false => [],
        $presets === null || $presets === true => $defaultPresets,
        is_array($presets) => array_values(array_filter($presets, fn ($item) => is_string($item) && $item !== '')),
        default => $defaultPresets,
    };

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

    $inputId = $id ?? ($name ? 'color-picker-'.$name : 'color-picker-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $panelId = $inputId.'-panel';

    $describedBy = collect([$hintId, $errorId])->filter()->implode(' ');

    $placeholder = $placeholder ?? match ($format) {
        'rgb' => $alpha ? 'rgba(0, 0, 0, 1)' : 'rgb(0, 0, 0)',
        'hsl' => $alpha ? 'hsla(0, 0%, 0%, 1)' : 'hsl(0, 0%, 0%)',
        default => $alpha ? '#000000FF' : '#000000',
    };

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

    $sizeInputPadClasses = match ($size) {
        'sm' => 'px-2.5',
        'lg' => 'px-3.5',
        default => 'px-3',
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

    $swatchSizeClasses = match ($size) {
        'sm' => 'size-5',
        'lg' => 'size-7',
        default => 'size-6',
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';
    $swatchRadiusClasses = $rounded ? 'rounded-full' : 'rounded-md';

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

    $formatActiveClasses = match ($color) {
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-primary/15 text-primary',
    };

    $controlClasses = collect([
        'group/color-picker relative flex w-full items-center gap-2 transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        $variant === 'flush' ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        $focusRingClasses,
        $controlHeightClass,
        $controlTextClass,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer',
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

    $initialValue = filled($value) ? (string) $value : '';

    $alpineConfig = [
        'value' => $initialValue,
        'format' => $format,
        'alpha' => (bool) $alpha,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'floating' => (bool) $floating,
        'clearable' => (bool) $clearable,
        'closeOnSelect' => (bool) $closeOnSelect,
        'inline' => (bool) $inline,
        'showInput' => (bool) $showInput,
        'showPresets' => count($presetColors) > 0,
        'showRecent' => (bool) $showRecent,
        'showEyedropper' => (bool) $showEyedropper,
        'showCopy' => (bool) $showCopy,
        'showNative' => (bool) $showNative,
        'presets' => $presetColors,
        'recentKey' => $recentKey ?? 'forms-color-picker-recent',
        'recentLimit' => max(1, min(24, (int) $recentLimit)),
        'placeholder' => (string) $placeholder,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
        'direction' => $direction,
        'align' => $align === 'auto' ? 'start' : $align,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $bagAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');
@endphp

<div
    x-data="formColorPicker(@js($alpineConfig))"
    x-modelable="value"
    x-ref="root"
    @click.outside="closeIfOutside($event.target)"
    @keydown.escape.window="close()"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $wireAttributes }}
>
    <input
        type="hidden"
        x-ref="hidden"
        @if ($name) name="{{ $name }}" @endif
        value="{{ e($initialValue) }}"
        @if ($required) required @endif
    />

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

    <div
        x-ref="trigger"
        id="{{ $inputId }}"
        role="combobox"
        tabindex="0"
        aria-haspopup="dialog"
        aria-controls="{{ $panelId }}"
        x-bind:aria-expanded="open.toString()"
        x-bind:aria-disabled="disabled.toString()"
        @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
        @if ($hasError) aria-invalid="true" @endif
        @if ($required) aria-required="true" @endif
        @click="toggle()"
        @keydown="onTriggerKeydown($event)"
        @focus="onFocus()"
        @blur="onBlur()"
        @class([$controlClasses, 'w-full'])
        {{ $bagAttributes }}
    >
        @if ($swatchPosition === 'start')
            <span
                class="relative z-10 inline-flex shrink-0 items-center justify-center border border-border {{ $swatchSizeClasses }} {{ $swatchRadiusClasses }}"
                x-bind:style="swatchStyle"
                aria-hidden="true"
            ></span>
        @endif

        <div @class(['relative min-w-0 flex-1', 'h-full' => $floating])>
            <div @class([
                'flex min-w-0 items-center',
                $floating ? 'h-full pt-4 pb-1' : 'h-full',
            ])>
                <span
                    class="min-w-0 flex-1 truncate font-mono tabular-nums"
                    x-bind:class="hasValue ? 'text-foreground' : 'text-muted-foreground'"
                    x-text="hasValue ? value : @js($floating ? ' ' : $placeholder)"
                >{{ filled($initialValue) ? $initialValue : ($floating ? ' ' : $placeholder) }}</span>
            </div>

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

        @if ($loading)
            <span
                class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}"
                aria-hidden="true"
            ></span>
        @else
            @if ($clearable)
                <button
                    type="button"
                    x-show="hasValue && canEdit"
                    x-cloak
                    @click.stop="clear()"
                    class="relative z-10 flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                    aria-label="Limpar cor"
                >
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            @endif

            @if ($swatchPosition === 'end')
                <span
                    class="relative z-10 inline-flex shrink-0 items-center justify-center border border-border {{ $swatchSizeClasses }} {{ $swatchRadiusClasses }}"
                    x-bind:style="swatchStyle"
                    aria-hidden="true"
                ></span>
            @endif

            @unless ($inline)
                <span
                    class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground transition-transform duration-150"
                    x-bind:class="{ 'rotate-180': open }"
                    aria-hidden="true"
                >
                    <i class="bi bi-chevron-down leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endunless
        @endif
    </div>

    @if ($inline)
        <div
            x-ref="panel"
            id="{{ $panelId }}"
            role="dialog"
            aria-label="Seletor de cor"
            class="w-full max-w-sm overflow-hidden rounded-xl border border-border bg-card shadow-sm"
            @click.stop
        >
            @include('components.forms.color-picker.color-picker-panel')
        </div>
    @else
        <template x-teleport="body">
            <div
                x-ref="panel"
                x-show="open"
                x-cloak
                x-bind:style="panelStyle"
                id="{{ $panelId }}"
                role="dialog"
                aria-label="Seletor de cor"
                class="overflow-hidden rounded-xl border border-border bg-card shadow-xl"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click.stop
            >
                @include('components.forms.color-picker.color-picker-panel')
            </div>
        </template>
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
