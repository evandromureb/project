@props([
    'options' => [],
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => 'bi-diagram-3',
    'iconPosition' => 'start',
    'clearable' => true,
    'searchable' => false,
    'searchDeep' => false,
    'multiple' => false,
    'changeOnSelect' => false,
    'showPath' => true,
    'separator' => ' / ',
    'display' => 'panel',
    'valueMode' => 'leaf',
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
    'loadingText' => 'Carregando…',
    'searchPlaceholder' => 'Buscar…',
    'backText' => 'Voltar',
    'rootText' => 'Início',
    'levels' => [],
    'url' => null,
    'parentParam' => 'parent',
    'queryParam' => 'q',
    'debounce' => 250,
    'maxSelected' => null,
    'closeOnSelect' => null,
    'counter' => false,
    'instanceId' => null,
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

    if (! in_array($display, ['panel', 'columns'], true)) {
        $display = 'panel';
    }

    if (! in_array($valueMode, ['leaf', 'path'], true)) {
        $valueMode = 'leaf';
    }

    $normalizeNode = static function (mixed $item, mixed $key = null) use (&$normalizeNode): ?array {
        if (is_array($item)) {
            $value = $item['value'] ?? $item['id'] ?? (is_string($key) || is_int($key) ? $key : null);
            $label = $item['label'] ?? $item['text'] ?? $item['name'] ?? null;
            $childrenRaw = $item['children'] ?? $item['options'] ?? null;

            if ($value === null && $label === null && ! is_array($childrenRaw)) {
                return null;
            }

            if ($value === null) {
                $value = $label;
            }

            if ($label === null) {
                $label = (string) $value;
            }

            $children = [];

            if (is_array($childrenRaw)) {
                $childIsList = array_is_list($childrenRaw);

                foreach ($childrenRaw as $childKey => $childItem) {
                    $normalized = $normalizeNode($childItem, $childIsList ? null : $childKey);

                    if ($normalized !== null) {
                        $children[] = $normalized;
                    }
                }
            }

            return [
                'value' => (string) $value,
                'label' => (string) $label,
                'icon' => isset($item['icon']) ? (string) $item['icon'] : null,
                'description' => isset($item['description']) ? (string) $item['description'] : null,
                'disabled' => (bool) ($item['disabled'] ?? false),
                'hasChildren' => $children !== [] || (bool) ($item['hasChildren'] ?? false),
                'children' => $children,
            ];
        }

        if (is_string($key) || is_int($key)) {
            return [
                'value' => (string) $key,
                'label' => (string) $item,
                'icon' => null,
                'description' => null,
                'disabled' => false,
                'hasChildren' => false,
                'children' => [],
            ];
        }

        if (is_scalar($item)) {
            return [
                'value' => (string) $item,
                'label' => (string) $item,
                'icon' => null,
                'description' => null,
                'disabled' => false,
                'hasChildren' => false,
                'children' => [],
            ];
        }

        return null;
    };

    $normalizedOptions = [];

    if (is_array($options)) {
        $isList = array_is_list($options);

        foreach ($options as $key => $item) {
            $normalized = $normalizeNode($item, $isList ? null : $key);

            if ($normalized !== null) {
                $normalizedOptions[] = $normalized;
            }
        }
    }

    $findPath = static function (array $nodes, string $target, array $ancestors = []) use (&$findPath): ?array {
        foreach ($nodes as $node) {
            $path = [...$ancestors, $node];

            if ((string) $node['value'] === $target) {
                return $path;
            }

            if (($node['children'] ?? []) !== []) {
                $found = $findPath($node['children'], $target, $path);

                if ($found !== null) {
                    return $found;
                }
            }
        }

        return null;
    };

    $formatPathLabel = static function (array $path) use ($showPath, $separator): string {
        if ($path === []) {
            return '';
        }

        if (! $showPath) {
            return (string) ($path[array_key_last($path)]['label'] ?? '');
        }

        return collect($path)->pluck('label')->implode($separator);
    };

    if ($multiple) {
        $initialValue = match (true) {
            is_array($value) => array_values(array_map(static function ($item) use ($valueMode) {
                if ($valueMode === 'path' && is_array($item)) {
                    return array_values(array_map(static fn ($segment) => (string) $segment, $item));
                }

                return is_array($item)
                    ? array_values(array_map(static fn ($segment) => (string) $segment, $item))
                    : (string) $item;
            }, $value)),
            is_string($value) && $value !== '' => array_values(array_filter(array_map(
                'trim',
                preg_split('/\s*,\s*/', $value) ?: [],
            ), static fn ($item) => $item !== '')),
            default => [],
        };
    } elseif ($valueMode === 'path') {
        $initialValue = match (true) {
            is_array($value) => array_values(array_map(static fn ($segment) => (string) $segment, $value)),
            is_string($value) && $value !== '' => array_values(array_filter(array_map(
                'trim',
                preg_split('/\s*[\/>,]\s*/', $value) ?: [],
            ), static fn ($item) => $item !== '')),
            default => [],
        };
    } else {
        $initialValue = $value === null || $value === '' ? '' : (string) $value;
    }

    $previewLabel = $placeholder;

    if ($multiple && $initialValue !== []) {
        $labels = [];

        foreach ($initialValue as $item) {
            if (is_array($item)) {
                $path = [];
                $nodes = $normalizedOptions;

                foreach ($item as $segment) {
                    $found = collect($nodes)->firstWhere('value', (string) $segment);

                    if ($found === null) {
                        $path[] = ['label' => (string) $segment];
                        $nodes = [];

                        continue;
                    }

                    $path[] = $found;
                    $nodes = $found['children'] ?? [];
                }

                $labels[] = $formatPathLabel($path);
            } else {
                $path = $findPath($normalizedOptions, (string) $item) ?? [['label' => (string) $item]];
                $labels[] = $formatPathLabel($path);
            }
        }

        $previewLabel = implode(', ', array_filter($labels));
    } elseif (! $multiple && $valueMode === 'path' && $initialValue !== []) {
        $path = [];
        $nodes = $normalizedOptions;

        foreach ($initialValue as $segment) {
            $found = collect($nodes)->firstWhere('value', (string) $segment);

            if ($found === null) {
                $path[] = ['label' => (string) $segment];
                $nodes = [];

                continue;
            }

            $path[] = $found;
            $nodes = $found['children'] ?? [];
        }

        $previewLabel = $formatPathLabel($path) ?: $placeholder;
    } elseif (! $multiple && filled($initialValue)) {
        $path = $findPath($normalizedOptions, (string) $initialValue);

        $previewLabel = $path ? $formatPathLabel($path) : $placeholder;
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
    $inputId = $id ?? ($name ? 'select-wizard-'.$name : 'select-wizard-'.str()->uuid());
    $resolvedInstanceId = $instanceId ?? $inputId;

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showCounter = (bool) $counter || ($multiple && $maxSelected !== null);

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
        'group/select-wizard relative flex w-full items-center gap-2 transition-colors',
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

    $resolvedCloseOnSelect = $closeOnSelect ?? ! $multiple;
    $resolvedLevels = is_array($levels) ? array_values(array_map('strval', $levels)) : [];

    $alpineConfig = [
        'options' => $normalizedOptions,
        'value' => $initialValue,
        'multiple' => (bool) $multiple,
        'valueMode' => $valueMode,
        'display' => $display,
        'searchable' => (bool) $searchable,
        'searchDeep' => (bool) $searchDeep,
        'clearable' => (bool) $clearable,
        'changeOnSelect' => (bool) $changeOnSelect,
        'showPath' => (bool) $showPath,
        'separator' => (string) $separator,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'floating' => (bool) $floating,
        'maxSelected' => $maxSelected !== null ? (int) $maxSelected : null,
        'closeOnSelect' => (bool) $resolvedCloseOnSelect,
        'url' => $url,
        'parentParam' => (string) $parentParam,
        'queryParam' => (string) $queryParam,
        'debounce' => (int) $debounce,
        'emptyText' => (string) $emptyText,
        'loadingText' => (string) $loadingText,
        'placeholder' => (string) $placeholder,
        'backText' => (string) $backText,
        'rootText' => (string) $rootText,
        'levels' => $resolvedLevels,
        'instanceId' => (string) $resolvedInstanceId,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $triggerAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');
@endphp

<div
    x-data="formSelectWizard(@js($alpineConfig))"
    x-modelable="value"
    x-ref="root"
    @click.outside="closeIfOutside($event.target)"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $wireAttributes }}
>
    <input
        type="hidden"
        x-ref="hidden"
        value="{{ ($multiple || $valueMode === 'path') ? e(json_encode($initialValue, JSON_UNESCAPED_UNICODE)) : e((string) $initialValue) }}"
    />

    @if (filled($name))
        @if ($multiple)
            <template x-for="(item, index) in value" x-bind:key="'select-wizard-hidden-' + index">
                <input
                    type="hidden"
                    name="{{ $name }}[]"
                    x-bind:value="Array.isArray(item) ? item.join(',') : item"
                />
            </template>
        @elseif ($valueMode === 'path')
            <template x-for="(segment, index) in value" x-bind:key="'select-wizard-path-' + index + '-' + segment">
                <input type="hidden" name="{{ $name }}[]" x-bind:value="segment" />
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
        {{ $triggerAttributes->except(['placeholder']) }}
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
                    <template x-for="opt in selectedOptions" x-bind:key="'chip-' + (Array.isArray(opt.value) ? opt.value.join('-') : opt.value)">
                        <span class="inline-flex max-w-full items-center font-medium {{ $chipToneClasses }} {{ $chipSizeClasses }} {{ $chipRadiusClasses }}">
                            <template x-if="opt.icon">
                                <i class="bi leading-none" x-bind:class="opt.icon" aria-hidden="true"></i>
                            </template>
                            <span class="max-w-[14rem] truncate" x-text="opt.label"></span>
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
                    >{{ $floating && $previewLabel === $placeholder ? ' ' : $previewLabel }}</span>
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
            {{-- Header: breadcrumb / level / search --}}
            <div class="border-b border-border">
                <div class="flex items-center gap-1 px-2 py-1.5">
                    <button
                        type="button"
                        x-show="display === 'panel' && stack.length > 0"
                        x-cloak
                        @click.stop="goBack()"
                        class="inline-flex shrink-0 cursor-pointer items-center gap-1 rounded-md px-2 py-1 text-xs font-medium text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                    >
                        <i class="bi bi-chevron-left leading-none" aria-hidden="true"></i>
                        <span x-text="backText"></span>
                    </button>

                    <nav class="flex min-w-0 flex-1 items-center gap-1 overflow-x-auto text-xs" aria-label="Caminho">
                        <button
                            type="button"
                            @click.stop="goToBreadcrumb(-1)"
                            class="shrink-0 cursor-pointer rounded-md px-1.5 py-1 font-medium transition-colors hover:bg-muted"
                            x-bind:class="stack.length === 0 ? 'text-foreground' : 'text-muted-foreground'"
                            x-text="rootText"
                        ></button>

                        <template x-for="(crumb, index) in breadcrumb" x-bind:key="'crumb-' + crumb.value + '-' + index">
                            <span class="inline-flex shrink-0 items-center gap-1">
                                <i class="bi bi-chevron-right text-[10px] text-muted-foreground" aria-hidden="true"></i>
                                <button
                                    type="button"
                                    @click.stop="goToBreadcrumb(index)"
                                    class="max-w-[8rem] cursor-pointer truncate rounded-md px-1.5 py-1 font-medium transition-colors hover:bg-muted"
                                    x-bind:class="index === breadcrumb.length - 1 ? 'text-foreground' : 'text-muted-foreground'"
                                    x-text="crumb.label"
                                ></button>
                            </span>
                        </template>
                    </nav>

                    <template x-if="currentLevelLabel">
                        <span
                            class="shrink-0 rounded-md bg-muted px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-muted-foreground"
                            x-text="currentLevelLabel"
                        ></span>
                    </template>
                </div>

                @if ($searchable)
                    <div class="px-2 pb-2">
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
                            <span
                                x-show="loading"
                                x-cloak
                                class="size-3.5 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground"
                                aria-hidden="true"
                            ></span>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Panel mode (wizard drill-down) --}}
            <div x-show="display === 'panel'" class="max-h-60 overflow-y-auto py-1">
                <template x-if="loading && currentOptions.length === 0">
                    <div class="px-3 py-6 text-center text-sm text-muted-foreground" x-text="loadingText"></div>
                </template>

                <template x-if="! loading && currentOptions.length === 0">
                    <div class="px-3 py-6 text-center text-sm text-muted-foreground" x-text="emptyText"></div>
                </template>

                <template x-for="(item, index) in visibleItems" x-bind:key="'wizard-item-' + item.option.value">
                    <button
                        type="button"
                        role="option"
                        x-bind:data-active="(activeIndex === index).toString()"
                        x-bind:aria-selected="isSelected(item.option).toString()"
                        x-bind:disabled="item.option.disabled || (isFull && ! isSelected(item.option) && item.option.isLeaf)"
                        @mousedown.prevent="item.option.hasChildren && ! changeOnSelect && ! item.option._matchPath ? drillInto(item.option) : selectOption(item.option)"
                        @mouseenter="activeIndex = index"
                        class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70 disabled:cursor-not-allowed disabled:opacity-50"
                        x-bind:class="{
                            'bg-muted': activeIndex === index,
                            'bg-primary/10': isSelected(item.option) && activeIndex !== index,
                        }"
                    >
                        <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center">
                            <i
                                class="bi bi-check-lg text-sm leading-none text-primary"
                                x-show="isSelected(item.option)"
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
                            <template x-if="item.option._matchPath">
                                <span
                                    class="mt-0.5 block truncate text-[10px] text-muted-foreground"
                                    x-text="item.option._matchPath.map(n => n.label).join(separator)"
                                ></span>
                            </template>
                        </span>

                        <template x-if="item.option.hasChildren && ! item.option._matchPath">
                            <i class="bi bi-chevron-right mt-0.5 shrink-0 text-xs text-muted-foreground" aria-hidden="true"></i>
                        </template>
                    </button>
                </template>
            </div>

            {{-- Columns mode (cascader) --}}
            <div
                x-show="display === 'columns'"
                x-cloak
                class="flex max-h-72 divide-x divide-border overflow-x-auto"
            >
                <template x-for="(column, columnIndex) in columns" x-bind:key="'col-' + columnIndex">
                    <div class="min-w-44 max-w-56 shrink-0 overflow-y-auto py-1">
                        <template x-if="columnOptions(columnIndex).length === 0">
                            <div class="px-3 py-6 text-center text-xs text-muted-foreground" x-text="emptyText"></div>
                        </template>

                        <template x-for="option in columnOptions(columnIndex)" x-bind:key="'col-' + columnIndex + '-' + option.value">
                            <button
                                type="button"
                                role="option"
                                x-bind:aria-selected="isSelected(option).toString()"
                                x-bind:disabled="option.disabled"
                                @mousedown.prevent="expandColumn(option, columnIndex)"
                                class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70 disabled:cursor-not-allowed disabled:opacity-50"
                                x-bind:class="{
                                    'bg-muted': columnActive[columnIndex] === option.value,
                                    'bg-primary/10': isSelected(option) || isPathPrefix(option, columnIndex),
                                }"
                            >
                                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center">
                                    <i
                                        class="bi bi-check-lg text-sm leading-none text-primary"
                                        x-show="isSelected(option)"
                                        x-cloak
                                        aria-hidden="true"
                                    ></i>
                                </span>

                                <template x-if="option.icon">
                                    <i
                                        class="bi mt-0.5 shrink-0 leading-none text-muted-foreground"
                                        x-bind:class="option.icon"
                                        aria-hidden="true"
                                    ></i>
                                </template>

                                <span class="min-w-0 flex-1">
                                    <span class="block truncate font-medium" x-text="option.label"></span>
                                    <template x-if="option.description">
                                        <span class="mt-0.5 block truncate text-xs text-muted-foreground" x-text="option.description"></span>
                                    </template>
                                </span>

                                <template x-if="option.hasChildren">
                                    <i class="bi bi-chevron-right mt-0.5 shrink-0 text-xs text-muted-foreground" aria-hidden="true"></i>
                                </template>
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
                >{{ $multiple ? count($initialValue) : (($valueMode === 'path' ? $initialValue !== [] : filled($initialValue)) ? 1 : 0) }}{{ $maxSelected !== null ? '/'.(int) $maxSelected : '' }}</p>
            @endif
        </div>
    @endif
</div>
