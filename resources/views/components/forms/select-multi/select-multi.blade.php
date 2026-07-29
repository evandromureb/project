@props([
    'options' => [],
    'layout' => 'dropdown',
    'display' => 'chips',
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => 'bi-ui-checks',
    'iconPosition' => 'start',
    'clearable' => true,
    'removable' => true,
    'searchable' => true,
    'openOnFocus' => true,
    'highlight' => true,
    'hideSelected' => false,
    'stickySelected' => false,
    'selectAll' => true,
    'invertible' => false,
    'sortable' => false,
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
    'searchPlaceholder' => 'Buscar…',
    'emptyText' => 'Nenhum resultado',
    'emptySelectedText' => 'Nenhum selecionado',
    'minCharsText' => 'Digite para buscar…',
    'loadingText' => 'Buscando…',
    'fullText' => 'Limite atingido',
    'selectAllText' => 'Selecionar todos',
    'clearAllText' => 'Limpar',
    'invertText' => 'Inverter',
    'moreText' => 'mais',
    'availableTitle' => 'Disponíveis',
    'selectedTitle' => 'Selecionados',
    'countText' => 'selecionado(s)',
    'url' => null,
    'queryParam' => 'q',
    'debounce' => 250,
    'minChars' => 0,
    'limit' => 100,
    'maxSelected' => null,
    'maxVisible' => null,
    'closeOnSelect' => false,
    'counter' => false,
    'tagColor' => null,
    'tagVariant' => 'soft',
    'instanceId' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    $tagColor = $tagColor ?? $color;

    if (! in_array($tagColor, $tokenColors, true)) {
        $tagColor = $color;
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

    if (! in_array($layout, ['dropdown', 'inline', 'transfer'], true)) {
        $layout = 'dropdown';
    }

    if (! in_array($display, ['chips', 'count', 'text'], true)) {
        $display = 'chips';
    }

    if (! in_array($tagVariant, ['soft', 'solid', 'outline', 'soft-border'], true)) {
        $tagVariant = 'soft';
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

    if (is_array($options)) {
        $isList = array_is_list($options);

        foreach ($options as $key => $item) {
            if (is_array($item) && array_key_exists('options', $item) && is_array($item['options'])) {
                $groupLabel = (string) ($item['label'] ?? $item['name'] ?? $key);

                foreach ($item['options'] as $optKey => $optItem) {
                    $normalized = $normalizeOption($optItem, $isList ? null : $optKey, $groupLabel);

                    if ($normalized !== null) {
                        $normalizedOptions[] = $normalized;
                    }
                }

                continue;
            }

            $normalized = $normalizeOption($item, $isList ? null : $key);

            if ($normalized !== null) {
                $normalizedOptions[] = $normalized;
            }
        }
    }

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

    $inputId = $id ?? ($name ? 'select-multi-'.$name : 'select-multi-'.str()->uuid());
    $resolvedInstanceId = $instanceId ?? $inputId;

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showCounter = (bool) $counter || $maxSelected !== null;
    $isDropdown = $layout === 'dropdown';
    $isInline = $layout === 'inline';
    $isTransfer = $layout === 'transfer';

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $counterId = $showCounter ? $inputId.'-counter' : null;
    $listboxId = $inputId.'-listbox';

    $describedBy = collect([$hintId, $errorId, $counterId])->filter()->implode(' ');

    $controlMinHeightClass = match (true) {
        $floating && $size === 'sm' => 'min-h-11',
        $floating && $size === 'lg' => 'min-h-14',
        $floating => 'min-h-12',
        $size === 'sm' => 'min-h-8',
        $size === 'lg' => 'min-h-11',
        default => 'min-h-9.5',
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
        $size === 'sm' => 'px-2.5 py-1',
        $size === 'lg' => 'px-3.5 py-1.5',
        default => 'px-3 py-1.5',
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

    $tagSoftClasses = match ($tagColor) {
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-primary/15 text-primary',
    };

    $tagSolidClasses = match ($tagColor) {
        'secondary' => 'bg-secondary text-secondary-foreground',
        'success' => 'bg-success text-success-foreground',
        'warning' => 'bg-warning text-warning-foreground',
        'danger' => 'bg-danger text-danger-foreground',
        'info' => 'bg-info text-info-foreground',
        default => 'bg-primary text-primary-foreground',
    };

    $tagOutlineClasses = match ($tagColor) {
        'secondary' => 'border border-secondary bg-transparent text-secondary',
        'success' => 'border border-success bg-transparent text-success',
        'warning' => 'border border-warning bg-transparent text-warning',
        'danger' => 'border border-danger bg-transparent text-danger',
        'info' => 'border border-info bg-transparent text-info',
        default => 'border border-primary bg-transparent text-primary',
    };

    $tagSoftBorderClasses = match ($tagColor) {
        'secondary' => 'border border-secondary/50 bg-secondary/15 text-secondary',
        'success' => 'border border-success/50 bg-success/15 text-success',
        'warning' => 'border border-warning/50 bg-warning/15 text-warning',
        'danger' => 'border border-danger/50 bg-danger/15 text-danger',
        'info' => 'border border-info/50 bg-info/15 text-info',
        default => 'border border-primary/50 bg-primary/15 text-primary',
    };

    $chipToneClasses = match ($tagVariant) {
        'solid' => $tagSolidClasses,
        'outline' => $tagOutlineClasses,
        'soft-border' => $tagSoftBorderClasses,
        default => $tagSoftClasses,
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
        $controlMinHeightClass,
        $controlTextClass,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer',
    ])->filter()->implode(' ');

    $panelShellClasses = collect([
        'overflow-hidden border border-border bg-card',
        $rounded ? 'rounded-2xl' : 'rounded-lg',
        $variant === 'filled' ? 'bg-muted shadow-none' : 'shadow-sm',
        $stateBorderClasses,
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
        'options' => $normalizedOptions,
        'value' => $initialValue,
        'layout' => $layout,
        'display' => $display,
        'clearable' => (bool) $clearable,
        'removable' => (bool) $removable,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'floating' => (bool) $floating,
        'searchable' => (bool) $searchable,
        'openOnFocus' => (bool) $openOnFocus,
        'highlight' => (bool) $highlight,
        'hideSelected' => (bool) $hideSelected,
        'stickySelected' => (bool) $stickySelected,
        'selectAll' => (bool) $selectAll,
        'invertible' => (bool) $invertible,
        'sortable' => (bool) $sortable,
        'maxSelected' => $maxSelected !== null ? (int) $maxSelected : null,
        'maxVisible' => $maxVisible !== null ? max(1, (int) $maxVisible) : null,
        'minChars' => max(0, (int) $minChars),
        'debounce' => max(0, (int) $debounce),
        'limit' => $limit !== null ? (int) $limit : null,
        'url' => filled($url) ? (string) $url : null,
        'queryParam' => (string) $queryParam,
        'closeOnSelect' => (bool) $closeOnSelect,
        'emptyText' => (string) $emptyText,
        'emptySelectedText' => (string) $emptySelectedText,
        'minCharsText' => (string) $minCharsText,
        'loadingText' => (string) $loadingText,
        'fullText' => (string) $fullText,
        'selectAllText' => (string) $selectAllText,
        'clearAllText' => (string) $clearAllText,
        'invertText' => (string) $invertText,
        'moreText' => (string) $moreText,
        'availableTitle' => (string) $availableTitle,
        'selectedTitle' => (string) $selectedTitle,
        'countText' => (string) $countText,
        'placeholder' => (string) $placeholder,
        'searchPlaceholder' => (string) $searchPlaceholder,
        'instanceId' => (string) $resolvedInstanceId,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $triggerAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');
@endphp

@php
    $optionButtonClass = 'flex w-full items-start gap-2 px-3 py-2 text-start transition-colors disabled:cursor-not-allowed disabled:opacity-50 hover:bg-muted focus:bg-muted focus:outline-none data-[active=true]:bg-muted';
@endphp

<div
    x-data="formSelectMulti(@js($alpineConfig))"
    x-modelable="value"
    x-ref="root"
    @click.outside="closeIfOutside($event.target)"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $wireAttributes }}
>
    <input
        type="hidden"
        x-ref="hidden"
        value="{{ e(json_encode($initialValue, JSON_UNESCAPED_UNICODE)) }}"
    >

    @if (filled($name))
        <template x-for="(item, index) in value" x-bind:key="'sm-hidden-' + index + '-' + item">
            <input type="hidden" name="{{ $name }}[]" x-bind:value="item">
        </template>
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

    {{-- Dropdown trigger --}}
    @if ($isDropdown)
        <div
            x-ref="trigger"
            role="combobox"
            tabindex="0"
            aria-haspopup="listbox"
            aria-controls="{{ $listboxId }}"
            x-bind:aria-expanded="open.toString()"
            aria-multiselectable="true"
            @click="toggle()"
            @keydown="onTriggerKeydown($event)"
            @focus="onFocus()"
            @blur="onBlur()"
            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
            @if ($hasError) aria-invalid="true" @endif
            id="{{ $inputId }}"
            {{ $triggerAttributes->class([$controlClasses, 'w-full']) }}
        >
            @if ($hasIconStart)
                <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            <div @class(['relative min-w-0 flex-1', $floating ? 'self-stretch' : null])>
                <div @class([
                    'flex min-w-0 flex-wrap items-center gap-1.5',
                    $floating ? 'h-full min-h-0 pt-4 pb-1' : null,
                ])>
                    <template x-if="display === 'chips'">
                        <div class="contents">
                            <template x-for="opt in visibleTags" x-bind:key="'sm-chip-' + opt.value">
                                <span class="inline-flex max-w-full items-center font-medium {{ $chipToneClasses }} {{ $chipSizeClasses }} {{ $chipRadiusClasses }}">
                                    <template x-if="opt.icon">
                                        <i class="bi leading-none" x-bind:class="opt.icon" aria-hidden="true"></i>
                                    </template>
                                    <span class="max-w-[10rem] truncate" x-text="opt.label"></span>
                                    <button
                                        type="button"
                                        x-show="canEdit && removable"
                                        @click.stop="removeValue(opt.value)"
                                        class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100"
                                        x-bind:aria-label="'Remover ' + opt.label"
                                    >
                                        <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
                                    </button>
                                </span>
                            </template>

                            <button
                                type="button"
                                x-show="showMoreChip"
                                x-cloak
                                @click.stop="toggleExpanded()"
                                class="inline-flex cursor-pointer items-center font-medium opacity-90 transition-opacity hover:opacity-100 {{ $chipToneClasses }} {{ $chipSizeClasses }} {{ $chipRadiusClasses }}"
                            >
                                <span x-text="'+' + hiddenTagCount + ' {{ $moreText }}'"></span>
                            </button>

                            <span
                                x-show="! hasValue"
                                class="text-muted-foreground"
                                x-text="placeholder"
                            ></span>
                        </div>
                    </template>

                    <template x-if="display !== 'chips'">
                        <span
                            class="truncate"
                            x-bind:class="hasValue ? 'text-foreground' : 'text-muted-foreground'"
                            x-text="summaryText"
                        ></span>
                    </template>
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
                <span class="relative z-10 size-4 shrink-0 self-center animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}" aria-hidden="true"></span>
            @else
                @if ($clearable)
                    <button
                        type="button"
                        x-show="hasValue && canEdit"
                        x-cloak
                        @click.stop="clear()"
                        class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                        aria-label="Limpar"
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
                aria-multiselectable="true"
                class="overflow-hidden rounded-lg border border-border bg-card shadow-lg"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @keydown="onPanelKeydown($event)"
            >
                <x-forms.select-multi.select-multi-panel
                    :searchable="$searchable"
                    :select-all="$selectAll"
                    :invertible="$invertible"
                    :clearable="$clearable"
                    :option-button-class="$optionButtonClass"
                    :search-placeholder="$searchPlaceholder"
                    :select-all-text="$selectAllText"
                    :clear-all-text="$clearAllText"
                    :invert-text="$invertText"
                    with-teleport-search
                />
            </div>
        </template>
    @endif

    {{-- Inline checklist --}}
    @if ($isInline)
        <div
            id="{{ $inputId }}"
            @class([$panelShellClasses, 'w-full'])
            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
            @if ($hasError) aria-invalid="true" @endif
        >
            <x-forms.select-multi.select-multi-panel
                :searchable="$searchable"
                :select-all="$selectAll"
                :invertible="$invertible"
                :clearable="$clearable"
                :option-button-class="$optionButtonClass"
                :search-placeholder="$searchPlaceholder"
                :select-all-text="$selectAllText"
                :clear-all-text="$clearAllText"
                :invert-text="$invertText"
                max-height-class="max-h-72"
            />
        </div>
    @endif

    {{-- Transfer dual list --}}
    @if ($isTransfer)
        <div
            id="{{ $inputId }}"
            class="grid w-full grid-cols-1 gap-3 md:grid-cols-[1fr_auto_1fr] md:items-stretch"
            @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
            @if ($hasError) aria-invalid="true" @endif
        >
            <div @class([$panelShellClasses, 'flex min-h-64 flex-col'])>
                <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-muted-foreground" x-text="availableTitle"></span>
                    <span class="text-xs tabular-nums text-muted-foreground" x-text="filteredAvailable.length"></span>
                </div>

                @if ($searchable)
                    <div class="border-b border-border px-2 py-2">
                        <div class="flex items-center gap-2 rounded-md border border-border bg-background px-2.5 py-1.5">
                            <i class="bi bi-search text-xs text-muted-foreground" aria-hidden="true"></i>
                            <input
                                type="text"
                                x-model="query"
                                @input="onQueryInput()"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground"
                                placeholder="{{ $searchPlaceholder }}"
                                autocomplete="off"
                                @disabled($isDisabled)
                            >
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-1.5">
                    <button
                        type="button"
                        x-show="canSelectAll"
                        x-cloak
                        @click="selectAllFiltered()"
                        class="cursor-pointer text-xs font-medium text-primary hover:underline"
                        x-text="selectAllText"
                    ></button>
                    <span x-show="! canSelectAll" class="text-xs text-muted-foreground" x-text="selectAllText"></span>
                </div>

                <div class="min-h-0 flex-1 overflow-y-auto py-1" role="listbox" aria-multiselectable="true" aria-label="{{ $availableTitle }}">
                    <template x-if="statusMessage !== ''">
                        <div class="px-3 py-8 text-center text-sm text-muted-foreground" x-text="statusMessage"></div>
                    </template>

                    <template x-for="(item, index) in visibleItems" x-bind:key="'sm-av-' + index + '-' + (item.type === 'group' ? item.label : item.option.value)">
                        <div>
                            <template x-if="item.type === 'group'">
                                <div class="flex items-center justify-between gap-2 px-3 pb-1 pt-2">
                                    <span class="text-[10px] font-semibold uppercase tracking-wide text-muted-foreground" x-text="item.label"></span>
                                    <button
                                        type="button"
                                        x-show="canEdit"
                                        @click="selectGroup(item.label)"
                                        class="cursor-pointer text-[10px] font-medium text-primary hover:underline"
                                    >Todos</button>
                                </div>
                            </template>

                            <template x-if="item.type === 'option'">
                                <button
                                    type="button"
                                    role="option"
                                    x-bind:aria-selected="false"
                                    x-bind:disabled="item.option.disabled || isFull"
                                    @click="toggleOption(item.option)"
                                    class="{{ $optionButtonClass }}"
                                >
                                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]" aria-hidden="true">
                                        <i class="bi bi-plus leading-none text-muted-foreground"></i>
                                    </span>
                                    <span class="min-w-0 flex-1">
                                        <span class="flex items-center gap-1.5">
                                            <template x-if="item.option.icon">
                                                <i class="bi leading-none text-muted-foreground" x-bind:class="item.option.icon" aria-hidden="true"></i>
                                            </template>
                                            <span class="truncate font-medium text-foreground" x-html="highlightedLabel(item.option.label)"></span>
                                        </span>
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

            <div class="flex flex-row items-center justify-center gap-2 md:flex-col md:px-1">
                <button
                    type="button"
                    @click="moveAllAvailable()"
                    x-bind:disabled="! canSelectAll"
                    class="inline-flex size-9 cursor-pointer items-center justify-center rounded-lg border border-border bg-card text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                    aria-label="Selecionar todos filtrados"
                    title="Selecionar todos filtrados"
                >
                    <i class="bi bi-chevron-double-right hidden leading-none md:inline" aria-hidden="true"></i>
                    <i class="bi bi-chevron-double-down leading-none md:hidden" aria-hidden="true"></i>
                </button>
                <button
                    type="button"
                    @click="removeAllSelected()"
                    x-bind:disabled="! hasValue || ! canEdit || ! clearable"
                    class="inline-flex size-9 cursor-pointer items-center justify-center rounded-lg border border-border bg-card text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                    aria-label="Remover todos filtrados"
                    title="Remover todos filtrados"
                >
                    <i class="bi bi-chevron-double-left hidden leading-none md:inline" aria-hidden="true"></i>
                    <i class="bi bi-chevron-double-up leading-none md:hidden" aria-hidden="true"></i>
                </button>
            </div>

            <div @class([$panelShellClasses, 'flex min-h-64 flex-col'])>
                <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-muted-foreground" x-text="selectedTitle"></span>
                    <span class="text-xs tabular-nums text-muted-foreground" x-text="count"></span>
                </div>

                @if ($searchable)
                    <div class="border-b border-border px-2 py-2">
                        <div class="flex items-center gap-2 rounded-md border border-border bg-background px-2.5 py-1.5">
                            <i class="bi bi-search text-xs text-muted-foreground" aria-hidden="true"></i>
                            <input
                                type="text"
                                x-model="selectedQuery"
                                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground"
                                placeholder="Filtrar selecionados…"
                                autocomplete="off"
                                @disabled($isDisabled)
                            >
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-end gap-2 border-b border-border px-3 py-1.5">
                    <button
                        type="button"
                        x-show="hasValue && clearable && canEdit"
                        x-cloak
                        @click="clear()"
                        class="cursor-pointer text-xs font-medium text-muted-foreground hover:text-foreground hover:underline"
                        x-text="clearAllText"
                    ></button>
                </div>

                <div class="min-h-0 flex-1 overflow-y-auto py-1" role="listbox" aria-label="{{ $selectedTitle }}">
                    <template x-if="filteredSelected.length === 0">
                        <div class="px-3 py-8 text-center text-sm text-muted-foreground" x-text="emptySelectedText"></div>
                    </template>

                    <template x-for="(opt, index) in filteredSelected" x-bind:key="'sm-sel-' + opt.value">
                        <div class="flex items-center gap-1 px-2 py-1.5 hover:bg-muted">
                            <div class="min-w-0 flex-1 px-1">
                                <div class="flex items-center gap-1.5">
                                    <template x-if="opt.icon">
                                        <i class="bi leading-none text-muted-foreground" x-bind:class="opt.icon" aria-hidden="true"></i>
                                    </template>
                                    <span class="truncate text-sm font-medium text-foreground" x-text="opt.label"></span>
                                </div>
                                <template x-if="opt.description">
                                    <span class="mt-0.5 block truncate text-xs text-muted-foreground" x-text="opt.description"></span>
                                </template>
                            </div>

                            @if ($sortable)
                                <button
                                    type="button"
                                    x-show="canEdit"
                                    @click="moveSelected(opt.value, -1)"
                                    class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground"
                                    aria-label="Mover para cima"
                                >
                                    <i class="bi bi-chevron-up text-xs leading-none" aria-hidden="true"></i>
                                </button>
                                <button
                                    type="button"
                                    x-show="canEdit"
                                    @click="moveSelected(opt.value, 1)"
                                    class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground"
                                    aria-label="Mover para baixo"
                                >
                                    <i class="bi bi-chevron-down text-xs leading-none" aria-hidden="true"></i>
                                </button>
                            @endif

                            <button
                                type="button"
                                x-show="canEdit && removable"
                                @click="removeValue(opt.value)"
                                class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground"
                                x-bind:aria-label="'Remover ' + opt.label"
                            >
                                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    @endif

    @if ($showCounter)
        <p id="{{ $counterId }}" class="text-xs text-muted-foreground tabular-nums">
            <span x-text="count">{{ count($initialValue) }}</span>@if ($maxSelected !== null)/{{ (int) $maxSelected }}@endif
        </p>
    @endif

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
