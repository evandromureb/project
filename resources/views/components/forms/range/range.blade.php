@props([
    'mode' => 'single',
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => null,
    'valueEnd' => null,
    'decimals' => null,
    'prefix' => null,
    'suffix' => null,
    'marks' => null,
    'snap' => false,
    'showValue' => true,
    'valuePosition' => 'end',
    'showMinMax' => false,
    'tooltip' => 'drag',
    'withInput' => false,
    'vertical' => false,
    'label' => null,
    'description' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'id' => null,
    'name' => null,
    'nameEnd' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'gradient'], true)) {
        $variant = 'default';
    }

    if (! in_array($mode, ['single', 'dual'], true)) {
        $mode = 'single';
    }

    if (! in_array($valuePosition, ['end', 'top', 'tooltip', 'hidden'], true)) {
        $valuePosition = 'end';
    }

    if (! in_array($tooltip, [true, false, 'drag', 'always', 'never', 'focus'], true)) {
        $tooltip = 'drag';
    }

    if ($tooltip === true) {
        $tooltip = 'always';
    }

    if ($tooltip === false) {
        $tooltip = 'never';
    }

    $dual = $mode === 'dual';
    $min = is_numeric($min) ? (float) $min : 0;
    $max = is_numeric($max) ? (float) $max : 100;

    if ($max < $min) {
        [$min, $max] = [$max, $min];
    }

    $step = is_numeric($step) && (float) $step > 0 ? (float) $step : 1;

    if ($decimals === null) {
        $stepDecimals = strlen(strrchr(rtrim(sprintf('%.12F', $step), '0'), '.') ?: '') - 1;
        $decimals = max(0, $stepDecimals);
    }

    $decimals = max(0, min(20, (int) $decimals));
    $prefix = $prefix ?? '';
    $suffix = $suffix ?? '';

    $resolvedMarks = [];

    if ($marks === true) {
        $count = 4;
        $span = $max - $min;

        for ($i = 0; $i <= $count; $i++) {
            $resolvedMarks[] = $min + ($span * ($i / $count));
        }
    } elseif (is_array($marks)) {
        $resolvedMarks = $marks;
    }

    $initialValue = $value;
    $initialValueEnd = $valueEnd;

    if (is_array($value)) {
        $initialValue = $value[0] ?? $min;
        $initialValueEnd = $value[1] ?? ($dual ? $max : $initialValue);
    }

    if ($initialValue === null || $initialValue === '') {
        $initialValue = $min;
    }

    if ($dual && ($initialValueEnd === null || $initialValueEnd === '')) {
        $initialValueEnd = $max;
    }

    if (! $dual) {
        $initialValueEnd = $initialValue;
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

    if ($error === null && filled($nameEnd) && $errorBag?->has($nameEnd)) {
        $error = $errorBag->first($nameEnd);
    }

    $resolvedState = match (true) {
        filled($error) => 'danger',
        in_array($state, ['success', 'warning', 'danger', 'info'], true) => $state,
        default => null,
    };

    $focusColor = $resolvedState ?? $color;

    $isDisabled = $disabled || $attributes->has('disabled');
    $isReadonly = $readonly || $attributes->has('readonly');

    $inputId = $id ?? ($name ? 'range-'.$name : 'range-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasDescription = filled($description) || isset($descriptionSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $showValueBadge = $showValue && $valuePosition !== 'hidden' && $valuePosition !== 'tooltip';
    $tooltipEnabled = $valuePosition === 'tooltip' || $tooltip !== 'never';

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $descriptionId = $hasDescription ? $inputId.'-description' : null;
    $valueId = $showValue ? $inputId.'-value' : null;
    $describedBy = collect([$descriptionId, $hintId, $errorId, $valueId])->filter()->implode(' ');

    $labelSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $descriptionSizeClass = match ($size) {
        'sm' => 'text-[0.7rem]',
        'lg' => 'text-sm',
        default => 'text-xs',
    };

    $valueSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $trackThicknessClass = match ($size) {
        'sm' => $vertical ? 'w-1' : 'h-1',
        'lg' => $vertical ? 'w-2.5' : 'h-2.5',
        default => $vertical ? 'w-1.5' : 'h-1.5',
    };

    $thumbSizeClass = match ($size) {
        'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $trackHitClass = match ($size) {
        'sm' => $vertical ? 'w-6' : 'h-6',
        'lg' => $vertical ? 'w-10' : 'h-10',
        default => $vertical ? 'w-8' : 'h-8',
    };

    $verticalHeightClass = match ($size) {
        'sm' => 'h-40',
        'lg' => 'h-64',
        default => 'h-52',
    };

    $inputControlClass = match ($size) {
        'sm' => 'h-8 w-16 px-2 text-xs',
        'lg' => 'h-11 w-24 px-3 text-base',
        default => 'h-9.5 w-20 px-2.5 text-sm',
    };

    $fillColorClass = match ($focusColor) {
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
        default => 'bg-primary',
    };

    $fillGradientClass = match ($focusColor) {
        'secondary' => 'bg-gradient-to-r from-secondary/70 to-secondary',
        'success' => 'bg-gradient-to-r from-success/70 to-success',
        'warning' => 'bg-gradient-to-r from-warning/70 to-warning',
        'danger' => 'bg-gradient-to-r from-danger/70 to-danger',
        'info' => 'bg-gradient-to-r from-info/70 to-info',
        default => 'bg-gradient-to-r from-primary/70 to-primary',
    };

    $thumbRingClass = match ($focusColor) {
        'secondary' => 'border-secondary focus-visible:ring-secondary/40',
        'success' => 'border-success focus-visible:ring-success/40',
        'warning' => 'border-warning focus-visible:ring-warning/40',
        'danger' => 'border-danger focus-visible:ring-danger/40',
        'info' => 'border-info focus-visible:ring-info/40',
        default => 'border-primary focus-visible:ring-primary/40',
    };

    $trackToneClass = match ($variant) {
        'soft' => match ($focusColor) {
            'secondary' => 'bg-secondary/15',
            'success' => 'bg-success/15',
            'warning' => 'bg-warning/15',
            'danger' => 'bg-danger/15',
            'info' => 'bg-info/15',
            default => 'bg-primary/15',
        },
        default => 'bg-muted',
    };

    $fillToneClass = $variant === 'gradient' ? $fillGradientClass : $fillColorClass;

    $stateTextClass = match ($resolvedState) {
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-foreground',
    };

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $rootAttributes = $attributes->except(['class', 'disabled', 'readonly'])->whereDoesntStartWith('wire:model');

    $alpineConfig = [
        'dual' => $dual,
        'min' => $min,
        'max' => $max,
        'step' => $step,
        'decimals' => $decimals,
        'prefix' => (string) $prefix,
        'suffix' => (string) $suffix,
        'marks' => $resolvedMarks,
        'snap' => (bool) $snap,
        'vertical' => (bool) $vertical,
        'tooltip' => $valuePosition === 'tooltip' ? 'always' : $tooltip,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'value' => $initialValue,
        'valueEnd' => $initialValueEnd,
    ];
@endphp

<div
    x-data="formRange(@js($alpineConfig))"
    x-modelable="model"
    {{ $modelAttributes }}
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $rootAttributes }}
>
    @if ($hasLabel || $showValueBadge && $valuePosition === 'top')
        <div class="flex items-start justify-between gap-3">
            @if ($hasLabel)
                <div class="min-w-0 flex-1">
                    <div id="{{ $inputId }}-label" class="{{ $labelSizeClass }} font-medium {{ $stateTextClass }}">
                        @isset($labelSlot)
                            {{ $labelSlot }}
                        @else
                            {{ $label }}
                        @endisset
                        @if ($required)
                            <span class="text-danger" aria-hidden="true">*</span>
                        @endif
                    </div>
                    @if ($hasDescription)
                        <p id="{{ $descriptionId }}" class="mb-0 mt-0.5 {{ $descriptionSizeClass }} text-muted-foreground">
                            @isset($descriptionSlot)
                                {{ $descriptionSlot }}
                            @else
                                {{ $description }}
                            @endisset
                        </p>
                    @endif
                </div>
            @endif

            @if ($showValueBadge && $valuePosition === 'top')
                <span
                    id="{{ $valueId }}"
                    class="shrink-0 font-semibold tabular-nums {{ $valueSizeClass }} {{ $stateTextClass }}"
                    x-text="formattedRange"
                ></span>
            @endif
        </div>
    @elseif ($hasDescription)
        <p id="{{ $descriptionId }}" class="mb-0 {{ $descriptionSizeClass }} text-muted-foreground">
            @isset($descriptionSlot)
                {{ $descriptionSlot }}
            @else
                {{ $description }}
            @endisset
        </p>
    @endif

    @if (filled($name) && ! $dual)
        <input
            type="hidden"
            x-ref="start"
            id="{{ $inputId }}"
            name="{{ $name }}"
            value="{{ $initialValue }}"
            @disabled($isDisabled)
        >
    @elseif (filled($name) && $dual)
        <input
            type="hidden"
            x-ref="start"
            id="{{ $inputId }}"
            name="{{ $name }}"
            value="{{ $initialValue }}"
            @disabled($isDisabled)
        >
        <input
            type="hidden"
            x-ref="end"
            id="{{ $inputId }}-end"
            name="{{ $nameEnd ?? $name.'_end' }}"
            value="{{ $initialValueEnd }}"
            @disabled($isDisabled)
        >
    @endif

    <div @class([
        'flex gap-3',
        'flex-col items-center' => $vertical,
        'items-center' => ! $vertical,
        $isDisabled ? 'opacity-60' : null,
    ])>
        @if ($withInput && $vertical)
            <input
                type="number"
                x-bind:value="value"
                @change="onInputChange($event, 'start')"
                @disabled($isDisabled)
                @readonly($isReadonly)
                min="{{ $min }}"
                max="{{ $max }}"
                step="{{ $step }}"
                class="rounded-lg border border-border bg-card text-center tabular-nums text-foreground shadow-sm outline-none focus:ring-2 focus:ring-offset-1 {{ $inputControlClass }} {{ $thumbRingClass }}"
                aria-label="Valor inicial"
            >
        @endif

        <div @class([
            'relative flex min-w-0',
            $vertical ? $verticalHeightClass.' flex-col items-center' : 'w-full flex-1 items-center',
            $withInput && ! $vertical ? 'gap-3' : null,
        ])>
            @if ($withInput && ! $vertical)
                <input
                    type="number"
                    x-bind:value="value"
                    @change="onInputChange($event, 'start')"
                    @disabled($isDisabled)
                    @readonly($isReadonly)
                    min="{{ $min }}"
                    max="{{ $max }}"
                    step="{{ $step }}"
                    class="shrink-0 rounded-lg border border-border bg-card tabular-nums text-foreground shadow-sm outline-none focus:ring-2 focus:ring-offset-1 {{ $inputControlClass }} {{ $thumbRingClass }}"
                    aria-label="{{ $dual ? 'Valor mínimo' : 'Valor' }}"
                >
            @endif

            <div
                x-ref="track"
                @pointerdown="onTrackPointerDown($event)"
                @class([
                    'relative touch-none select-none',
                    $vertical ? 'h-full '.$trackHitClass : 'w-full '.$trackHitClass,
                    $isDisabled || $isReadonly ? 'cursor-not-allowed' : 'cursor-pointer',
                ])
                role="presentation"
            >
                <div
                    @class([
                        'absolute rounded-full',
                        $vertical ? 'inset-y-0 left-1/2 -translate-x-1/2 '.$trackThicknessClass : 'inset-x-0 top-1/2 -translate-y-1/2 '.$trackThicknessClass,
                        $trackToneClass,
                    ])
                ></div>

                <div
                    @class([
                        'absolute rounded-full',
                        $vertical ? 'left-1/2 -translate-x-1/2 '.$trackThicknessClass : 'top-1/2 -translate-y-1/2 '.$trackThicknessClass,
                        $fillToneClass,
                    ])
                    x-bind:style="fillStyle"
                ></div>

                @if (count($resolvedMarks) > 0)
                    <div class="pointer-events-none absolute inset-0">
                        <template x-for="mark in markItems" x-bind:key="mark.value">
                            <button
                                type="button"
                                class="pointer-events-auto absolute z-[1] flex flex-col items-center"
                                x-bind:style="markStyle(mark.percent)"
                                @click.stop="jumpToMark(mark.value)"
                                x-bind:aria-label="'Marca ' + mark.label"
                                tabindex="-1"
                            >
                                <span @class([
                                    'block rounded-full bg-border',
                                    $size === 'sm' ? 'size-1' : 'size-1.5',
                                ])></span>
                            </button>
                        </template>
                    </div>
                @endif

                <button
                    type="button"
                    x-ref="thumbStart"
                    @pointerdown="onThumbPointerDown($event, 'start')"
                    @focus="onThumbFocus('start')"
                    @blur="onThumbBlur()"
                    @keydown="onKeydown($event, 'start')"
                    role="slider"
                    x-bind:aria-valuemin="min"
                    x-bind:aria-valuemax="dual ? valueEnd : max"
                    x-bind:aria-valuenow="value"
                    x-bind:aria-valuetext="formattedValue"
                    x-bind:aria-disabled="disabled || readonly"
                    x-bind:aria-orientation="vertical ? 'vertical' : 'horizontal'"
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    @if ($hasLabel) aria-labelledby="{{ $inputId }}-label" @endif
                    @disabled($isDisabled)
                    tabindex="0"
                    @class([
                        'absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none',
                        'focus-visible:ring-2 focus-visible:ring-offset-1',
                        $thumbSizeClass,
                        $thumbRingClass,
                        $isDisabled || $isReadonly ? 'cursor-not-allowed' : 'cursor-grab active:cursor-grabbing',
                        $vertical ? 'left-1/2' : 'top-1/2',
                    ])
                    x-bind:style="startThumbStyle"
                    aria-label="{{ $dual ? 'Valor mínimo' : 'Valor' }}"
                >
                    @if ($tooltipEnabled)
                        <span
                            x-show="tooltipVisible && activeThumb === 'start'"
                            x-cloak
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            @class([
                                'pointer-events-none absolute rounded-md bg-foreground px-1.5 py-0.5 text-[10px] font-semibold text-background tabular-nums shadow-sm',
                                $vertical ? 'start-full ms-2 top-1/2 -translate-y-1/2' : 'bottom-full mb-2 left-1/2 -translate-x-1/2',
                            ])
                            x-text="formattedValue"
                        ></span>
                    @endif
                </button>

                @if ($dual)
                    <button
                        type="button"
                        x-ref="thumbEnd"
                        @pointerdown="onThumbPointerDown($event, 'end')"
                        @focus="onThumbFocus('end')"
                        @blur="onThumbBlur()"
                        @keydown="onKeydown($event, 'end')"
                        role="slider"
                        x-bind:aria-valuemin="value"
                        x-bind:aria-valuemax="max"
                        x-bind:aria-valuenow="valueEnd"
                        x-bind:aria-valuetext="formattedValueEnd"
                        x-bind:aria-disabled="disabled || readonly"
                        x-bind:aria-orientation="vertical ? 'vertical' : 'horizontal'"
                        @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                        @if ($hasError) aria-invalid="true" @endif
                        @disabled($isDisabled)
                        tabindex="0"
                        @class([
                            'absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none',
                            'focus-visible:ring-2 focus-visible:ring-offset-1',
                            $thumbSizeClass,
                            $thumbRingClass,
                            $isDisabled || $isReadonly ? 'cursor-not-allowed' : 'cursor-grab active:cursor-grabbing',
                            $vertical ? 'left-1/2' : 'top-1/2',
                        ])
                        x-bind:style="endThumbStyle"
                        aria-label="Valor máximo"
                    >
                        @if ($tooltipEnabled)
                            <span
                                x-show="tooltipVisible && activeThumb === 'end'"
                                x-cloak
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                @class([
                                    'pointer-events-none absolute rounded-md bg-foreground px-1.5 py-0.5 text-[10px] font-semibold text-background tabular-nums shadow-sm',
                                    $vertical ? 'start-full ms-2 top-1/2 -translate-y-1/2' : 'bottom-full mb-2 left-1/2 -translate-x-1/2',
                                ])
                                x-text="formattedValueEnd"
                            ></span>
                        @endif
                    </button>
                @endif
            </div>

            @if ($withInput && ! $vertical && $dual)
                <input
                    type="number"
                    x-bind:value="valueEnd"
                    @change="onInputChange($event, 'end')"
                    @disabled($isDisabled)
                    @readonly($isReadonly)
                    min="{{ $min }}"
                    max="{{ $max }}"
                    step="{{ $step }}"
                    class="shrink-0 rounded-lg border border-border bg-card tabular-nums text-foreground shadow-sm outline-none focus:ring-2 focus:ring-offset-1 {{ $inputControlClass }} {{ $thumbRingClass }}"
                    aria-label="Valor máximo"
                >
            @endif

            @if ($showValueBadge && $valuePosition === 'end' && ! $vertical)
                <span
                    id="{{ $valueId }}"
                    class="shrink-0 min-w-12 text-end font-semibold tabular-nums {{ $valueSizeClass }} {{ $stateTextClass }}"
                    x-text="formattedRange"
                ></span>
            @endif
        </div>

        @if ($withInput && $vertical)
            @if ($dual)
                <input
                    type="number"
                    x-bind:value="valueEnd"
                    @change="onInputChange($event, 'end')"
                    @disabled($isDisabled)
                    @readonly($isReadonly)
                    min="{{ $min }}"
                    max="{{ $max }}"
                    step="{{ $step }}"
                    class="rounded-lg border border-border bg-card text-center tabular-nums text-foreground shadow-sm outline-none focus:ring-2 focus:ring-offset-1 {{ $inputControlClass }} {{ $thumbRingClass }}"
                    aria-label="Valor máximo"
                >
            @endif
        @elseif ($showValueBadge && $valuePosition === 'end' && $vertical)
            <span
                id="{{ $valueId }}"
                class="font-semibold tabular-nums {{ $valueSizeClass }} {{ $stateTextClass }}"
                x-text="formattedRange"
            ></span>
        @endif
    </div>

    @if ($showMinMax || count($resolvedMarks) > 0)
        <div @class([
            'flex text-muted-foreground tabular-nums',
            $descriptionSizeClass,
            $vertical ? 'flex-col-reverse items-center gap-2' : 'justify-between gap-2',
        ])>
            @if ($showMinMax)
                <span>{{ $prefix }}{{ $decimals > 0 ? number_format($min, $decimals, '.', '') : (int) $min }}{{ $suffix }}</span>
            @endif

            @if (count($resolvedMarks) > 0 && ! $vertical)
                <div class="relative mx-2 hidden min-h-4 flex-1 sm:block">
                    <template x-for="mark in markItems" x-bind:key="'label-' + mark.value">
                        <span
                            class="absolute -translate-x-1/2 text-[0.65rem]"
                            x-bind:style="markLabelStyle(mark.percent)"
                            x-text="mark.label"
                        ></span>
                    </template>
                </div>
            @endif

            @if ($showMinMax)
                <span>{{ $prefix }}{{ $decimals > 0 ? number_format($max, $decimals, '.', '') : (int) $max }}{{ $suffix }}</span>
            @endif
        </div>
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
