@props([
    'name' => null,
    'label' => null,
    'hint' => null,
    'error' => null,
    'items' => null,
    'value' => null,
    'fields' => [],
    'defaultItem' => [],
    'defaultItems' => 0,
    'min' => 0,
    'max' => null,
    'itemLabel' => 'Item :number',
    'addLabel' => 'Adicionar item',
    'emptyText' => 'Nenhum item ainda.',
    'confirmDelete' => false,
    'confirmDeleteText' => 'Remover este item?',
    'addable' => true,
    'removable' => true,
    'cloneable' => false,
    'reorderable' => true,
    'reorderWithButtons' => true,
    'collapsible' => false,
    'collapsed' => false,
    'addPosition' => 'bottom',
    'showCounter' => false,
    'variant' => 'card',
    'color' => 'primary',
    'size' => 'md',
    'columns' => 1,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'required' => false,
    'compact' => false,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['card', 'bordered', 'soft', 'flush'], true)) {
        $variant = 'card';
    }

    if (! in_array($addPosition, ['top', 'bottom', 'both'], true)) {
        $addPosition = 'bottom';
    }

    $columns = (int) $columns;

    if (! in_array($columns, [1, 2, 3], true)) {
        $columns = 1;
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

    $hasError = filled($error);
    $isDisabled = $disabled || $attributes->has('disabled');
    $isReadonly = $readonly || $attributes->has('readonly');
    $showCounter = $showCounter || $max !== null;

    $min = max(0, (int) $min);
    $max = $max === null || $max === '' ? null : max(0, (int) $max);
    $defaultItems = max(0, (int) $defaultItems);

    $items = match (true) {
        is_array($value) => array_values($value),
        is_array($items) => array_values($items),
        default => [],
    };
    $defaultItem = is_array($defaultItem) ? $defaultItem : [];
    $fields = is_array($fields) ? array_values($fields) : [];

    $normalizeOptions = static function (mixed $options): array {
        if (! is_array($options)) {
            return [];
        }

        if (! array_is_list($options)) {
            return collect($options)
                ->map(fn ($label, $val) => [
                    'value' => (string) $val,
                    'label' => (string) $label,
                ])
                ->values()
                ->all();
        }

        return collect($options)
            ->map(function ($option) {
                if (is_array($option)) {
                    $optionValue = (string) ($option['value'] ?? '');

                    return [
                        'value' => $optionValue,
                        'label' => (string) ($option['label'] ?? $optionValue),
                    ];
                }

                return [
                    'value' => (string) $option,
                    'label' => (string) $option,
                ];
            })
            ->values()
            ->all();
    };

    $normalizedFields = collect($fields)
        ->map(function ($field) use ($normalizeOptions) {
            if (is_string($field)) {
                return [
                    'name' => $field,
                    'label' => str($field)->headline()->toString(),
                    'type' => 'text',
                    'placeholder' => null,
                    'hint' => null,
                    'required' => false,
                    'options' => [],
                    'default' => null,
                    'colSpan' => 1,
                    'rows' => 3,
                    'multiple' => false,
                    'min' => null,
                    'max' => null,
                    'step' => null,
                ];
            }

            if (! is_array($field) || blank($field['name'] ?? null)) {
                return null;
            }

            $type = $field['type'] ?? 'text';
            $allowed = ['text', 'email', 'tel', 'url', 'number', 'password', 'date', 'time', 'datetime-local', 'textarea', 'select', 'checkbox', 'radio'];

            if (! in_array($type, $allowed, true)) {
                $type = 'text';
            }

            return [
                'name' => (string) $field['name'],
                'label' => (string) ($field['label'] ?? str($field['name'])->headline()),
                'type' => $type,
                'placeholder' => $field['placeholder'] ?? null,
                'hint' => $field['hint'] ?? null,
                'required' => (bool) ($field['required'] ?? false),
                'options' => $normalizeOptions($field['options'] ?? []),
                'default' => $field['default'] ?? null,
                'colSpan' => in_array((int) ($span = $field['colSpan'] ?? 1), [1, 2, 3], true) ? (int) $span : 1,
                'rows' => max(2, (int) ($field['rows'] ?? 3)),
                'multiple' => (bool) ($field['multiple'] ?? false),
                'min' => $field['min'] ?? null,
                'max' => $field['max'] ?? null,
                'step' => $field['step'] ?? null,
            ];
        })
        ->filter()
        ->values()
        ->all();

    $hasCustomItem = isset($item) || $slot->isNotEmpty();
    $labelSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $gapClass = match ($size) {
        'sm' => 'gap-2',
        'lg' => 'gap-4',
        default => 'gap-3',
    };

    $fieldGapClass = match ($size) {
        'sm' => 'gap-3',
        'lg' => 'gap-5',
        default => 'gap-4',
    };

    $itemShellClass = match ($variant) {
        'bordered' => 'relative flex flex-col overflow-hidden rounded-lg border-2 border-border bg-card text-card-foreground transition-shadow',
        'soft' => 'relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-muted text-foreground transition-shadow',
        'flush' => 'relative flex flex-col overflow-hidden rounded-none border-0 border-b border-border bg-transparent text-foreground shadow-none',
        default => 'relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow',
    };

    $headerPadClass = $compact ? 'px-2.5 py-2' : 'px-3 py-2.5';
    $bodyPadClass = $compact ? 'p-3' : 'p-4';

    $controlSizeClass = match ($size) {
        'sm' => 'h-9 px-2.5 text-xs',
        'lg' => 'h-12 px-4 text-base',
        default => 'h-10 px-3 text-sm',
    };

    $controlClass = 'w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 '.$controlSizeClass;

    $textareaClass = 'w-full rounded-md border border-border bg-card px-3 py-2 text-sm text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60';

    $gridClass = match ($columns) {
        2 => 'grid grid-cols-1 gap-4 sm:grid-cols-2',
        3 => 'grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3',
        default => 'grid grid-cols-1 '.$fieldGapClass,
    };

    $addColorClass = match ($color) {
        'secondary' => 'btn-outline-secondary',
        'success' => 'btn-outline-success',
        'warning' => 'btn-outline-warning',
        'danger' => 'btn-outline-danger',
        'info' => 'btn-outline-info',
        default => 'btn-outline-primary',
    };

    $addSizeClass = match ($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $bag = $attributes->whereDoesntStartWith('wire:model')->except(['disabled', 'readonly', 'required']);

    $alpineConfig = [
        'name' => $name,
        'items' => $items,
        'fields' => $normalizedFields,
        'defaultItem' => $defaultItem,
        'defaultItems' => $defaultItems,
        'min' => $min,
        'max' => $max,
        'itemLabel' => $itemLabel,
        'addLabel' => $addLabel,
        'emptyText' => $emptyText,
        'confirmDelete' => (bool) $confirmDelete,
        'confirmDeleteText' => $confirmDeleteText,
        'addable' => (bool) $addable,
        'removable' => (bool) $removable,
        'cloneable' => (bool) $cloneable,
        'reorderable' => (bool) $reorderable,
        'reorderWithButtons' => (bool) $reorderWithButtons,
        'collapsible' => (bool) $collapsible,
        'collapsed' => (bool) $collapsed,
        'addPosition' => $addPosition,
        'disabled' => $isDisabled,
        'readonly' => $isReadonly,
        'loading' => (bool) $loading,
    ];
@endphp

<div
    x-data="formRepeater(@js($alpineConfig))"
    x-modelable="items"
    data-forms-repeater
    {{ $wireAttributes }}
    {{ $bag->class(['flex w-full flex-col', $gapClass]) }}
>
    @if (filled($label) || isset($labelSlot) || $showCounter)
        <div class="flex flex-wrap items-end justify-between gap-2">
            @if (filled($label) || isset($labelSlot))
                <div class="{{ $labelSizeClass }} font-medium text-foreground">
                    @isset($labelSlot)
                        {{ $labelSlot }}
                    @else
                        {{ $label }}
                    @endisset
                    @if ($required)
                        <span class="text-danger" aria-hidden="true">*</span>
                    @endif
                </div>
            @endif

            @if ($showCounter)
                <span class="text-xs text-muted-foreground" x-text="counterLabel" data-repeater-counter></span>
            @endif
        </div>
    @endif

    @if ($collapsible)
        <div class="flex flex-wrap items-center gap-2" data-repeater-toolbar>
            <button
                type="button"
                class="btn btn-ghost-secondary btn-sm"
                x-on:click="expandAll()"
                x-bind:disabled="disabled || isEmpty"
            >
                <i class="bi bi-arrows-expand" aria-hidden="true"></i>
                Expandir todos
            </button>
            <button
                type="button"
                class="btn btn-ghost-secondary btn-sm"
                x-on:click="collapseAll()"
                x-bind:disabled="disabled || isEmpty"
            >
                <i class="bi bi-arrows-collapse" aria-hidden="true"></i>
                Recolher todos
            </button>
        </div>
    @endif

    @if ($addable && in_array($addPosition, ['top', 'both'], true))
        <div data-repeater-add-top>
            @isset($add)
                {{ $add }}
            @else
                <button
                    type="button"
                    class="btn {{ $addColorClass }} {{ $addSizeClass }} w-full sm:w-auto"
                    x-on:click="add()"
                    x-bind:disabled="! canAdd"
                >
                    <i class="bi bi-plus-lg" aria-hidden="true"></i>
                    <span x-text="addLabel">{{ $addLabel }}</span>
                </button>
            @endisset
        </div>
    @endif

    <div
        class="flex flex-col {{ $gapClass }}"
        data-repeater-list
        role="list"
        @if (filled($label)) aria-label="{{ $label }}" @endif
    >
        <template x-for="(item, index) in items" x-bind:key="keys[index]">
            <div
                class="{{ $itemShellClass }}"
                role="listitem"
                x-bind:data-repeater-index="index"
                x-bind:data-repeater-key="keys[index]"
                x-bind:class="{
                    'opacity-50': isDragging(index),
                    'ring-2 ring-primary/40': isDropTarget(index),
                }"
                x-on:dragover.prevent="onDragOver($event, index)"
                x-on:dragleave="onDragLeave(index)"
                x-on:drop.prevent="onDrop($event, index)"
            >
                <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 {{ $headerPadClass }}" data-repeater-header>
                    <button
                        type="button"
                        class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground active:cursor-grabbing disabled:cursor-not-allowed disabled:opacity-40"
                        draggable="true"
                        x-show="reorderable"
                        x-cloak
                        x-on:dragstart="onDragStart($event, index)"
                        x-on:dragend="onDragEnd()"
                        x-bind:disabled="! canReorder"
                        aria-label="Arrastar para reordenar"
                        title="Arrastar para reordenar"
                        data-repeater-drag
                    >
                        <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                    </button>

                    <button
                        type="button"
                        class="inline-flex size-8 shrink-0 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground"
                        x-show="collapsible"
                        x-cloak
                        x-on:click="toggle(keys[index])"
                        x-bind:aria-expanded="(! isCollapsed(keys[index])).toString()"
                        aria-label="Expandir ou recolher"
                        data-repeater-collapse
                    >
                        <i
                            class="bi bi-chevron-down text-sm leading-none transition-transform"
                            x-bind:class="isCollapsed(keys[index]) ? '' : 'rotate-180'"
                            aria-hidden="true"
                        ></i>
                    </button>

                    <div class="min-w-0 flex-1">
                        <div
                            class="truncate text-sm font-medium text-foreground"
                            x-text="resolveItemLabel(item, index)"
                            data-repeater-title
                        ></div>
                        <div class="text-[0.6875rem] text-muted-foreground">
                            #<span x-text="Number(index) + 1"></span>
                        </div>
                    </div>

                    <div class="flex shrink-0 flex-wrap items-center gap-0.5" data-repeater-actions>
                        <button
                            type="button"
                            class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground disabled:cursor-not-allowed disabled:opacity-40"
                            x-show="reorderable && reorderWithButtons"
                            x-cloak
                            x-on:click="moveUp(index)"
                            x-bind:disabled="! canReorder || isFirst(index)"
                            aria-label="Mover para cima"
                            data-repeater-up
                        >
                            <i class="bi bi-arrow-up text-sm leading-none" aria-hidden="true"></i>
                        </button>
                        <button
                            type="button"
                            class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground disabled:cursor-not-allowed disabled:opacity-40"
                            x-show="reorderable && reorderWithButtons"
                            x-cloak
                            x-on:click="moveDown(index)"
                            x-bind:disabled="! canReorder || isLast(index)"
                            aria-label="Mover para baixo"
                            data-repeater-down
                        >
                            <i class="bi bi-arrow-down text-sm leading-none" aria-hidden="true"></i>
                        </button>
                        <button
                            type="button"
                            class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground disabled:cursor-not-allowed disabled:opacity-40"
                            x-show="cloneable"
                            x-cloak
                            x-on:click="clone(index)"
                            x-bind:disabled="! canClone"
                            aria-label="Duplicar item"
                            data-repeater-clone
                        >
                            <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                        </button>
                        <button
                            type="button"
                            class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10 disabled:cursor-not-allowed disabled:opacity-40"
                            x-show="removable"
                            x-cloak
                            x-on:click="remove(index)"
                            x-bind:disabled="! canRemove"
                            aria-label="Remover item"
                            data-repeater-remove
                        >
                            <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                        </button>

                        @isset($itemActions)
                            {{ $itemActions }}
                        @endisset
                    </div>
                </div>

                <div
                    class="{{ $bodyPadClass }}"
                    data-repeater-body
                    x-show="! collapsible || ! isCollapsed(keys[index])"
                    x-cloak
                    @if ($collapsible)
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    @endif
                >
                    @if ($hasCustomItem)
                        @isset($item)
                            {{ $item }}
                        @else
                            {{ $slot }}
                        @endisset
                    @else
                        <div class="{{ $gridClass }}" data-repeater-fields>
                            <template x-for="field in fields" x-bind:key="field.name">
                                <div
                                    x-bind:class="{
                                        'sm:col-span-2': field.colSpan === 2,
                                        'sm:col-span-2 xl:col-span-3': field.colSpan === 3,
                                    }"
                                >
                                    {{-- Checkbox --}}
                                    <label
                                        class="flex cursor-pointer items-start gap-2.5"
                                        x-show="field.type === 'checkbox'"
                                        x-cloak
                                    >
                                        <input
                                            type="checkbox"
                                            class="mt-0.5 size-4 rounded border-border text-primary focus:ring-primary/30"
                                            x-model="item[field.name]"
                                            x-bind:name="fieldName(field.name, index)"
                                            x-bind:id="fieldId(field.name, index)"
                                            x-bind:disabled="disabled || readonly || loading"
                                            x-bind:required="field.required"
                                        >
                                        <span class="min-w-0">
                                            <span class="block text-sm font-medium text-foreground" x-text="field.label"></span>
                                            <span
                                                class="mt-0.5 block text-xs text-muted-foreground"
                                                x-show="field.hint"
                                                x-text="field.hint"
                                            ></span>
                                        </span>
                                    </label>

                                    {{-- Demais tipos --}}
                                    <div class="flex flex-col gap-1.5" x-show="field.type !== 'checkbox'" x-cloak>
                                        <label
                                            class="text-sm font-medium text-foreground"
                                            x-bind:for="fieldId(field.name, index)"
                                        >
                                            <span x-text="field.label"></span>
                                            <span class="text-danger" x-show="field.required" aria-hidden="true">*</span>
                                        </label>

                                        <select
                                            class="{{ $controlClass }}"
                                            x-show="field.type === 'select'"
                                            x-model="item[field.name]"
                                            x-bind:name="fieldName(field.name, index)"
                                            x-bind:id="fieldId(field.name, index)"
                                            x-bind:disabled="disabled || readonly || loading"
                                            x-bind:required="field.required"
                                            x-bind:multiple="field.multiple"
                                        >
                                            <option value="" x-show="! field.multiple" x-bind:disabled="field.required">Selecione…</option>
                                            <template x-for="opt in (field.options || [])" x-bind:key="String(opt.value)">
                                                <option
                                                    x-bind:value="opt.value"
                                                    x-text="opt.label || opt.value"
                                                ></option>
                                            </template>
                                        </select>

                                        <div class="flex flex-col gap-2" x-show="field.type === 'radio'" x-cloak>
                                            <template x-for="opt in (field.options || [])" x-bind:key="String(opt.value)">
                                                <label class="inline-flex items-center gap-2 text-sm text-foreground">
                                                    <input
                                                        type="radio"
                                                        class="size-4 border-border text-primary focus:ring-primary/30"
                                                        x-model="item[field.name]"
                                                        x-bind:name="fieldName(field.name, index)"
                                                        x-bind:value="opt.value"
                                                        x-bind:disabled="disabled || readonly || loading"
                                                        x-bind:required="field.required"
                                                    >
                                                    <span x-text="opt.label || opt.value"></span>
                                                </label>
                                            </template>
                                        </div>

                                        <textarea
                                            class="{{ $textareaClass }}"
                                            x-show="field.type === 'textarea'"
                                            x-model="item[field.name]"
                                            x-bind:name="fieldName(field.name, index)"
                                            x-bind:id="fieldId(field.name, index)"
                                            x-bind:rows="field.rows || 3"
                                            x-bind:placeholder="field.placeholder || ''"
                                            x-bind:disabled="disabled || readonly || loading"
                                            x-bind:readonly="readonly"
                                            x-bind:required="field.required"
                                        ></textarea>

                                        <input
                                            class="{{ $controlClass }}"
                                            x-show="field.type !== 'select' && field.type !== 'radio' && field.type !== 'textarea' && field.type !== 'checkbox'"
                                            x-bind:type="field.type || 'text'"
                                            x-model="item[field.name]"
                                            x-bind:name="fieldName(field.name, index)"
                                            x-bind:id="fieldId(field.name, index)"
                                            x-bind:placeholder="field.placeholder || ''"
                                            x-bind:disabled="disabled || readonly || loading"
                                            x-bind:readonly="readonly"
                                            x-bind:required="field.required"
                                            x-bind:min="field.min"
                                            x-bind:max="field.max"
                                            x-bind:step="field.step"
                                        >

                                        <p
                                            class="mb-0 text-xs text-muted-foreground"
                                            x-show="field.hint && field.type !== 'checkbox'"
                                            x-text="field.hint"
                                        ></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    @endif
                </div>
            </div>
        </template>
    </div>

    <div
        class="flex flex-col items-center justify-center gap-3 rounded-lg border border-dashed border-border bg-muted/30 px-4 py-8 text-center"
        x-show="isEmpty"
        x-cloak
        data-repeater-empty
    >
        @isset($empty)
            {{ $empty }}
        @else
            <i class="bi bi-ui-checks-grid text-2xl text-muted-foreground" aria-hidden="true"></i>
            <p class="mb-0 text-sm text-muted-foreground" x-text="emptyText">{{ $emptyText }}</p>
        @endisset

        @if ($addable)
            @isset($add)
                <div x-show="canAdd" x-cloak>
                    {{ $add }}
                </div>
            @else
                <button
                    type="button"
                    class="btn {{ $addColorClass }} {{ $addSizeClass }}"
                    x-show="canAdd"
                    x-cloak
                    x-on:click="add()"
                    x-bind:disabled="! canAdd"
                >
                    <i class="bi bi-plus-lg" aria-hidden="true"></i>
                    <span x-text="addLabel">{{ $addLabel }}</span>
                </button>
            @endisset
        @endif
    </div>

    @if ($addable && in_array($addPosition, ['bottom', 'both'], true))
        <div data-repeater-add-bottom x-show="! isEmpty" x-cloak>
            @isset($add)
                {{ $add }}
            @else
                <button
                    type="button"
                    class="btn {{ $addColorClass }} {{ $addSizeClass }} w-full sm:w-auto"
                    x-on:click="add()"
                    x-bind:disabled="! canAdd"
                >
                    <i class="bi bi-plus-lg" aria-hidden="true"></i>
                    <span x-text="addLabel">{{ $addLabel }}</span>
                </button>
            @endisset
        </div>
    @endif

    @if (filled($hint) || isset($hintSlot))
        <p class="mb-0 text-xs text-muted-foreground" data-repeater-hint>
            @isset($hintSlot)
                {{ $hintSlot }}
            @else
                {{ $hint }}
            @endisset
        </p>
    @endif

    @if ($hasError)
        <p class="mb-0 text-xs text-danger" data-repeater-error role="alert">
            @isset($errorSlot)
                {{ $errorSlot }}
            @else
                {{ $error }}
            @endisset
        </p>
    @endif
</div>
