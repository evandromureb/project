@props([
    'options' => [],
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => null,
    'iconPosition' => 'start',
    'clearable' => true,
    'searchable' => false,
    'multiple' => false,
    'native' => false,
    'floating' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => 'Selecione…',
    'emptyText' => 'Nenhum resultado',
    'searchPlaceholder' => 'Buscar…',
    'maxSelected' => null,
    'closeOnSelect' => null,
    'counter' => false,
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

    $normalizeOption = static function (mixed $item, mixed $key = null, ?string $group = null): ?array {
        if (is_array($item)) {
            if (array_key_exists('options', $item) && is_array($item['options'])) {
                return null;
            }

            $value = $item['value'] ?? $item['id'] ?? null;
            $label = $item['label'] ?? $item['text'] ?? $item['name'] ?? null;

            if ($value === null && $label === null) {
                return null;
            }

            if ($value === null) {
                $value = $label;
            }

            if ($label === null) {
                $label = (string) $value;
            }

            return [
                'value' => (string) $value,
                'label' => (string) $label,
                'icon' => isset($item['icon']) ? (string) $item['icon'] : null,
                'description' => isset($item['description']) ? (string) $item['description'] : null,
                'disabled' => (bool) ($item['disabled'] ?? false),
                'group' => $group ?? (isset($item['group']) ? (string) $item['group'] : null),
            ];
        }

        if (is_string($key) || is_int($key)) {
            return [
                'value' => (string) $key,
                'label' => (string) $item,
                'icon' => null,
                'description' => null,
                'disabled' => false,
                'group' => $group,
            ];
        }

        if (is_scalar($item)) {
            return [
                'value' => (string) $item,
                'label' => (string) $item,
                'icon' => null,
                'description' => null,
                'disabled' => false,
                'group' => $group,
            ];
        }

        return null;
    };

    $normalizedOptions = [];
    $groupedForNative = [];

    if (is_array($options)) {
        $isList = array_is_list($options);

        foreach ($options as $key => $item) {
            if (is_array($item) && array_key_exists('options', $item) && is_array($item['options'])) {
                $groupLabel = (string) ($item['label'] ?? $item['name'] ?? $key);
                $groupOptions = [];

                foreach ($item['options'] as $optKey => $optItem) {
                    $normalized = $normalizeOption($optItem, $isList ? null : $optKey, $groupLabel);

                    if ($normalized === null) {
                        continue;
                    }

                    $normalizedOptions[] = $normalized;
                    $groupOptions[] = $normalized;
                }

                if ($groupOptions !== []) {
                    $groupedForNative[] = [
                        'label' => $groupLabel,
                        'options' => $groupOptions,
                    ];
                }

                continue;
            }

            $normalized = $normalizeOption($item, $isList ? null : $key);

            if ($normalized === null) {
                continue;
            }

            $normalizedOptions[] = $normalized;
        }
    }

    // Agrupa por `group` quando veio flat com chave group.
    if ($groupedForNative === [] && collect($normalizedOptions)->contains(fn ($opt) => filled($opt['group']))) {
        $groupedForNative = collect($normalizedOptions)
            ->groupBy(fn ($opt) => $opt['group'] ?: '__ungrouped__')
            ->map(function ($items, $group) {
                if ($group === '__ungrouped__') {
                    return [
                        'label' => null,
                        'options' => $items->values()->all(),
                    ];
                }

                return [
                    'label' => (string) $group,
                    'options' => $items->values()->all(),
                ];
            })
            ->values()
            ->all();
    }

    if ($multiple) {
        $initialValue = match (true) {
            is_array($value) => array_values(array_map(
                static fn ($item) => (string) $item,
                $value,
            )),
            is_string($value) && $value !== '' => array_values(array_filter(array_map(
                'trim',
                preg_split('/\s*,\s*/', $value) ?: [],
            ), static fn ($item) => $item !== '')),
            default => [],
        };
    } else {
        $initialValue = $value === null || $value === '' ? '' : (string) $value;
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

    $inputId = $id ?? ($name ? 'select-'.$name : 'select-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showCounter = (bool) $counter || ($multiple && $maxSelected !== null);
    $hasSlotOptions = trim((string) $slot) !== '';

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $counterId = $showCounter ? $inputId.'-counter' : null;
    $listboxId = $inputId.'-listbox';

    $describedBy = collect([$hintId, $errorId, $counterId])->filter()->implode(' ');

    $controlHeightClass = match (true) {
        $floating && $size === 'sm' => 'min-h-11',
        $floating && $size === 'lg' => 'min-h-14',
        $floating => 'min-h-12',
        $multiple && $size === 'sm' => 'min-h-8',
        $multiple && $size === 'lg' => 'min-h-11',
        $multiple => 'min-h-9.5',
        $size === 'sm' => 'h-8',
        $size === 'lg' => 'h-11',
        default => 'h-9.5',
    };

    $controlTextClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $sizeInputPadClasses = match (true) {
        $floating && $size === 'sm' => 'px-2.5',
        $floating && $size === 'lg' => 'px-3.5',
        $floating => 'px-3',
        $multiple && $size === 'sm' => 'px-2.5 py-1',
        $multiple && $size === 'lg' => 'px-3.5 py-1.5',
        $multiple => 'px-3 py-1.5',
        $size === 'sm' => 'px-2.5',
        $size === 'lg' => 'px-3.5',
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

    $chipSizeClasses = match ($size) {
        'sm' => 'gap-0.5 px-1.5 py-px text-[10px] leading-4',
        'lg' => 'gap-1 px-2 py-0.5 text-xs leading-5',
        default => 'gap-0.5 px-1.5 py-px text-[11px] leading-4',
    };

    $chipToneClasses = match ($color) {
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-primary/15 text-primary',
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';
    $chipRadiusClasses = $rounded ? 'rounded-full' : 'rounded-md';

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
        'group/select relative flex w-full items-center gap-2 transition-colors',
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

    $nativeSelectClasses = collect([
        'min-w-0 flex-1 appearance-none bg-transparent text-foreground outline-none',
        'disabled:cursor-not-allowed',
        $floating ? 'peer h-full w-full pt-4 pb-1' : 'h-full w-full',
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

    $resolvedCloseOnSelect = $closeOnSelect ?? ! $multiple;

    $alpineConfig = [
        'options' => $normalizedOptions,
        'value' => $initialValue,
        'multiple' => (bool) $multiple,
        'searchable' => (bool) $searchable,
        'clearable' => (bool) $clearable,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'floating' => (bool) $floating,
        'maxSelected' => $maxSelected !== null ? (int) $maxSelected : null,
        'closeOnSelect' => (bool) $resolvedCloseOnSelect,
        'emptyText' => (string) $emptyText,
        'placeholder' => (string) $placeholder,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $selectAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');
@endphp

@if ($native)
    <div {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}>
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

        <div @class([$controlClasses, 'w-full'])>
            @if ($hasIconStart)
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            <div @class(['relative min-w-0 flex-1', 'h-full' => $floating])>
                <select
                    id="{{ $inputId }}"
                    @if ($name) name="{{ $name }}{{ $multiple ? '[]' : '' }}" @endif
                    @if ($multiple) multiple @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    @disabled($isDisabled || $isReadonly)
                    @if ($required) required @endif
                    {{ $attributes->except(['class', 'disabled', 'readonly'])->class([$nativeSelectClasses]) }}
                >
                    @unless ($multiple)
                        <option value="" @selected($initialValue === '' || $initialValue === null)>{{ $placeholder }}</option>
                    @endunless

                    @if ($hasSlotOptions)
                        {{ $slot }}
                    @elseif ($groupedForNative !== [])
                        @foreach ($groupedForNative as $group)
                            @if (filled($group['label']))
                                <optgroup label="{{ $group['label'] }}">
                                    @foreach ($group['options'] as $option)
                                        <option
                                            value="{{ $option['value'] }}"
                                            @disabled($option['disabled'])
                                            @selected($multiple ? in_array($option['value'], $initialValue, true) : $initialValue === $option['value'])
                                        >{{ $option['label'] }}</option>
                                    @endforeach
                                </optgroup>
                            @else
                                @foreach ($group['options'] as $option)
                                    <option
                                        value="{{ $option['value'] }}"
                                        @disabled($option['disabled'])
                                        @selected($multiple ? in_array($option['value'], $initialValue, true) : $initialValue === $option['value'])
                                    >{{ $option['label'] }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        @foreach ($normalizedOptions as $option)
                            <option
                                value="{{ $option['value'] }}"
                                @disabled($option['disabled'])
                                @selected($multiple ? in_array($option['value'], $initialValue, true) : $initialValue === $option['value'])
                            >{{ $option['label'] }}</option>
                        @endforeach
                    @endif
                </select>

                @if ($floating && $hasLabel)
                    <label
                        for="{{ $inputId }}"
                        class="pointer-events-none absolute start-0 z-10 {{ $floatingLabelActive }} text-muted-foreground transition-all duration-150 ease-out"
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
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-chevron-down leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            @if ($hasIconEnd)
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif
        </div>

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
@else
    <div
        x-data="formSelect(@js($alpineConfig))"
        x-modelable="value"
        x-ref="root"
        @click.outside="closeIfOutside($event.target)"
        {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
        {{ $wireAttributes }}
    >
        <input
            type="hidden"
            x-ref="hidden"
            value="{{ $multiple ? e(json_encode($initialValue, JSON_UNESCAPED_UNICODE)) : e((string) $initialValue) }}"
        />

        @if (filled($name))
            @if ($multiple)
                <template x-for="(item, index) in value" x-bind:key="'select-hidden-' + index + '-' + item">
                    <input type="hidden" name="{{ $name }}[]" x-bind:value="item" />
                </template>
            @else
                <input type="hidden" name="{{ $name }}" x-bind:value="value" />
            @endif
        @endif

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
            aria-haspopup="listbox"
            aria-controls="{{ $listboxId }}"
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
            {{ $selectAttributes->except(['placeholder']) }}
        >
            @if ($hasIconStart)
                <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            <div @class(['relative min-w-0 flex-1', $floating ? 'self-stretch' : null])>
                <div @class([
                    'flex min-w-0 items-center gap-1.5',
                    $multiple ? 'flex-wrap' : 'flex-nowrap',
                    $floating ? 'h-full min-h-0 pt-4 pb-1' : null,
                ])>
                    @if ($multiple)
                        <template x-for="opt in selectedOptions" x-bind:key="'chip-' + opt.value">
                            <span class="inline-flex max-w-full items-center font-medium {{ $chipToneClasses }} {{ $chipSizeClasses }} {{ $chipRadiusClasses }}">
                                <template x-if="opt.icon">
                                    <i class="bi leading-none" x-bind:class="opt.icon" aria-hidden="true"></i>
                                </template>
                                <span class="max-w-[10rem] truncate" x-text="opt.label"></span>
                                <button
                                    type="button"
                                    x-show="canEdit"
                                    @click.stop="removeValue(opt.value)"
                                    class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100"
                                    x-bind:aria-label="'Remover ' + opt.label"
                                >
                                    <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
                                </button>
                            </span>
                        </template>
                        <span
                            x-show="! hasValue"
                            class="truncate text-muted-foreground"
                            x-text="@js($floating ? ' ' : $placeholder)"
                        ></span>
                    @else
                        <template x-if="selectedOptions[0]?.icon">
                            <i
                                class="bi shrink-0 leading-none {{ $sizeIconClasses }} {{ $stateTextClasses }}"
                                x-bind:class="selectedOptions[0].icon"
                                aria-hidden="true"
                            ></i>
                        </template>
                        <span
                            class="min-w-0 flex-1 truncate"
                            x-bind:class="hasValue ? 'text-foreground' : 'text-muted-foreground'"
                            x-text="hasValue ? selectedLabel : @js($floating ? ' ' : $placeholder)"
                        >{{ filled($initialValue) ? (collect($normalizedOptions)->firstWhere('value', (string) $initialValue)['label'] ?? $placeholder) : ($floating ? ' ' : $placeholder) }}</span>
                    @endif
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
                    class="relative z-10 size-4 shrink-0 self-center animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}"
                    aria-hidden="true"
                ></span>
            @else
                @if ($clearable)
                    <button
                        type="button"
                        x-show="hasValue && canEdit"
                        x-cloak
                        @click.stop="clear()"
                        class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                        aria-label="Limpar seleção"
                    >
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                @endif

                <span
                    class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150"
                    x-bind:class="{ 'rotate-180': open }"
                    aria-hidden="true"
                >
                    <i class="bi bi-chevron-down leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            @if ($hasIconEnd)
                <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif
        </div>

        <template x-teleport="body">
            <div
                x-ref="menu"
                x-show="open"
                x-cloak
                x-bind:style="menuStyle"
                id="{{ $listboxId }}"
                role="listbox"
                @if ($multiple) aria-multiselectable="true" @endif
                class="overflow-hidden rounded-lg border border-border bg-card shadow-lg"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                @if ($searchable)
                    <div class="border-b border-border p-2">
                        <div class="flex items-center gap-2 rounded-md border border-border bg-muted/40 px-2.5 py-1.5">
                            <i class="bi bi-search text-sm text-muted-foreground" aria-hidden="true"></i>
                            <input
                                x-ref="search"
                                type="text"
                                x-model="search"
                                @input="onSearchInput()"
                                @keydown="onSearchKeydown($event)"
                                @click.stop
                                placeholder="{{ $searchPlaceholder }}"
                                class="min-w-0 flex-1 bg-transparent text-sm text-foreground outline-none placeholder:text-muted-foreground"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                @endif

                <div class="max-h-60 overflow-y-auto py-1">
                    <template x-if="filteredOptions.length === 0">
                        <div class="px-3 py-6 text-center text-sm text-muted-foreground" x-text="emptyText"></div>
                    </template>

                    <template x-for="(item, index) in visibleItems" x-bind:key="'item-' + index + '-' + (item.type === 'group' ? item.label : item.option.value)">
                        <div>
                            <template x-if="item.type === 'group'">
                                <div
                                    class="px-3 pb-1 pt-2 text-[10px] font-semibold uppercase tracking-wide text-muted-foreground"
                                    x-text="item.label"
                                ></div>
                            </template>

                            <template x-if="item.type === 'option'">
                                <button
                                    type="button"
                                    role="option"
                                    x-bind:data-active="(activeIndex === index).toString()"
                                    x-bind:aria-selected="isSelected(item.option.value).toString()"
                                    x-bind:disabled="item.option.disabled || (isFull && ! isSelected(item.option.value))"
                                    @mousedown.prevent="selectOption(item.option)"
                                    @mouseenter="activeIndex = index"
                                    class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70 disabled:cursor-not-allowed disabled:opacity-50"
                                    x-bind:class="{
                                        'bg-muted': activeIndex === index,
                                        'bg-primary/10': isSelected(item.option.value) && activeIndex !== index,
                                    }"
                                >
                                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center">
                                        <i
                                            class="bi bi-check-lg text-sm leading-none text-primary"
                                            x-show="isSelected(item.option.value)"
                                            x-cloak
                                            aria-hidden="true"
                                        ></i>
                                    </span>

                                    <template x-if="item.option.icon">
                                        <i
                                            class="bi mt-0.5 shrink-0 leading-none text-muted-foreground"
                                            x-bind:class="item.option.icon"
                                            aria-hidden="true"
                                        ></i>
                                    </template>

                                    <span class="min-w-0 flex-1">
                                        <span class="block truncate font-medium" x-text="item.option.label"></span>
                                        <template x-if="item.option.description">
                                            <span class="mt-0.5 block truncate text-xs text-muted-foreground" x-text="item.option.description"></span>
                                        </template>
                                    </span>
                                </button>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </template>

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
                        x-text="maxSelected ? (count + '/' + maxSelected) : count"
                    >{{ $multiple ? count($initialValue) : (filled($initialValue) ? 1 : 0) }}{{ $maxSelected !== null ? '/'.(int) $maxSelected : '' }}</p>
                @endif
            </div>
        @endif
    </div>
@endif
