@props([
    'max' => 5,
    'value' => null,
    'allowHalf' => false,
    'clearable' => true,
    'showValue' => false,
    'showLabel' => false,
    'labels' => [],
    'emptyLabel' => 'Sem avaliação',
    'icon' => 'star',
    'filledIcon' => null,
    'emptyIcon' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'warning',
    'state' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'id' => null,
    'name' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'warning';
    }

    if (! in_array($size, ['sm', 'md', 'lg', 'xl'], true)) {
        $size = 'md';
    }

    $iconPresets = [
        'star' => ['filled' => 'bi-star-fill', 'empty' => 'bi-star'],
        'heart' => ['filled' => 'bi-heart-fill', 'empty' => 'bi-heart'],
        'circle' => ['filled' => 'bi-circle-fill', 'empty' => 'bi-circle'],
        'hand' => ['filled' => 'bi-hand-thumbs-up-fill', 'empty' => 'bi-hand-thumbs-up'],
        'emoji' => ['filled' => 'bi-emoji-smile-fill', 'empty' => 'bi-emoji-smile'],
    ];

    if (! is_string($icon) || ! array_key_exists($icon, $iconPresets)) {
        $icon = 'star';
    }

    $preset = $iconPresets[$icon];
    $resolvedFilledIcon = filled($filledIcon) ? (string) $filledIcon : $preset['filled'];
    $resolvedEmptyIcon = filled($emptyIcon) ? (string) $emptyIcon : $preset['empty'];

    $max = max(1, min(10, (int) $max));
    $labels = is_array($labels) ? array_values($labels) : [];

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

    $inputId = $id ?? ($name ? 'rating-'.$name : 'rating-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $valueId = $showValue || $showLabel ? $inputId.'-value' : null;
    $describedBy = collect([$hintId, $errorId, $valueId])->filter()->implode(' ');

    $labelSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg', 'xl' => 'text-sm',
        default => 'text-sm',
    };

    $starSizeClasses = match ($size) {
        'sm' => 'text-base',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
        default => 'text-xl',
    };

    $gapClasses = match ($size) {
        'sm' => 'gap-0.5',
        'lg' => 'gap-1.5',
        'xl' => 'gap-2',
        default => 'gap-1',
    };

    $activeColorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-warning',
    };

    $emptyColorClasses = 'text-muted-foreground/35';

    $hoverRingClasses = match ($color) {
        'primary' => 'focus-visible:ring-primary',
        'secondary' => 'focus-visible:ring-secondary',
        'success' => 'focus-visible:ring-success',
        'danger' => 'focus-visible:ring-danger',
        'info' => 'focus-visible:ring-info',
        default => 'focus-visible:ring-warning',
    };

    $initialValue = $value;

    if (is_string($initialValue) && $initialValue !== '' && is_numeric($initialValue)) {
        $initialValue = (float) $initialValue;
    }

    if ($initialValue === '' || $initialValue === false) {
        $initialValue = null;
    }

    $alpineConfig = [
        'max' => $max,
        'value' => $initialValue,
        'allowHalf' => (bool) $allowHalf,
        'clearable' => (bool) $clearable,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'required' => (bool) $required,
        'labels' => $labels,
        'emptyLabel' => (string) $emptyLabel,
        'name' => $name,
    ];

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $eventAttributes = $attributes->filter(
        fn (mixed $attrValue, string $key): bool => str_starts_with($key, 'x-on:rating') || str_starts_with($key, '@rating')
    );
    $rootAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model')
        ->filter(
            fn (mixed $attrValue, string $key): bool => ! str_starts_with($key, 'x-on:rating') && ! str_starts_with($key, '@rating')
        );
@endphp

<div
    x-data="formRating(@js($alpineConfig))"
    x-modelable="value"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $modelAttributes }}
    {{ $eventAttributes }}
>
    @if ($hasLabel)
        <div class="flex items-center justify-between gap-3">
            <label
                id="{{ $inputId }}-label"
                for="{{ $inputId }}"
                class="{{ $labelSizeClasses }} font-medium text-foreground"
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

            @if ($clearable && ! $isReadonly)
                <button
                    type="button"
                    class="text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                    x-show="hasValue && canEdit"
                    x-cloak
                    @click="clear()"
                >
                    Limpar
                </button>
            @endif
        </div>
    @elseif ($clearable && ! $isReadonly)
        <div class="flex justify-end">
            <button
                type="button"
                class="text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                x-show="hasValue && canEdit"
                x-cloak
                @click="clear()"
            >
                Limpar
            </button>
        </div>
    @endif

    <input
        type="hidden"
        x-ref="model"
        id="{{ $inputId }}"
        @if ($name) name="{{ $name }}" @endif
        value="{{ $initialValue ?? '' }}"
        @if ($required) x-bind:required="! hasValue" @endif
        @disabled($isDisabled)
        {{ $rootAttributes }}
    >

    <div class="flex flex-wrap items-center gap-3">
        <div
            role="slider"
            tabindex="0"
            @if ($hasLabel)
                aria-labelledby="{{ $inputId }}-label"
            @else
                aria-label="Avaliação"
            @endif
            x-bind:aria-valuenow="hasValue ? value : 0"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}"
            x-bind:aria-valuetext="currentLabel"
            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
            @if ($hasError) aria-invalid="true" @endif
            @keydown="onKeydown($event)"
            @mouseleave="onLeave()"
            @blur="onLeave()"
            @class([
                'inline-flex items-center outline-none',
                $gapClasses,
                $isDisabled ? 'cursor-not-allowed opacity-60' : ($isReadonly ? 'cursor-default' : 'cursor-pointer'),
                'focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 '.$hoverRingClasses,
            ])
        >
            <template x-for="star in stars" x-bind:key="'rating-star-' + star">
                <button
                    type="button"
                    tabindex="-1"
                    class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none"
                    x-bind:aria-label="star + ' de ' + max"
                    x-bind:disabled="! canEdit"
                    @click="onStarClick(star, $event)"
                    @mousemove="onStarMove(star, $event)"
                    @mouseenter="onStarEnter(star)"
                >
                    <i
                        class="bi {{ $resolvedEmptyIcon }} leading-none {{ $starSizeClasses }} {{ $emptyColorClasses }}"
                        aria-hidden="true"
                    ></i>

                    <i
                        class="bi {{ $resolvedFilledIcon }} pointer-events-none absolute inset-0 flex items-center justify-center leading-none {{ $starSizeClasses }} {{ $activeColorClasses }}"
                        x-show="fillState(star) === 'full'"
                        x-cloak
                        aria-hidden="true"
                    ></i>

                    <span
                        class="pointer-events-none absolute inset-y-0 start-0 w-1/2 overflow-hidden"
                        x-show="fillState(star) === 'half'"
                        x-cloak
                        aria-hidden="true"
                    >
                        <i class="bi {{ $resolvedFilledIcon }} absolute start-0 top-1/2 -translate-y-1/2 leading-none {{ $starSizeClasses }} {{ $activeColorClasses }}"></i>
                    </span>
                </button>
            </template>

            @if ($loading)
                <span class="ms-1 inline-flex size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
            @endif
        </div>

        @if ($showValue || $showLabel)
            <div id="{{ $valueId }}" class="flex min-w-0 items-baseline gap-1.5 text-sm">
                @if ($showValue)
                    <span class="font-semibold tabular-nums text-foreground">
                        <span x-text="hasValue || hoverValue !== null ? formatValue(displayValue) : '—'">{{ $initialValue !== null ? $initialValue : '—' }}</span>
                        <span class="font-normal text-muted-foreground">/{{ $max }}</span>
                    </span>
                @endif
                @if ($showLabel)
                    <span class="truncate text-muted-foreground" x-text="currentLabel">{{ $emptyLabel }}</span>
                @endif
            </div>
        @endif
    </div>

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
