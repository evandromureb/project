@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'layout' => 'dropzone',
    'icon' => 'bi-cloud-arrow-up',
    'multiple' => false,
    'accept' => null,
    'maxSize' => null,
    'maxFiles' => null,
    'showPreview' => true,
    'showFileList' => true,
    'clearable' => true,
    'removable' => true,
    'counter' => false,
    'replaceOnSelect' => true,
    'simulateProgress' => false,
    'existing' => [],
    'browseText' => null,
    'dropText' => null,
    'emptyText' => null,
    'buttonText' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'capture' => null,
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

    if (! in_array($layout, ['dropzone', 'button', 'inline'], true)) {
        $layout = 'dropzone';
    }

    $parseMaxSize = static function (mixed $value): ?int {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_int($value) || is_float($value)) {
            return max(0, (int) $value);
        }

        if (! is_string($value)) {
            return null;
        }

        if (! preg_match('/^\s*(\d+(?:\.\d+)?)\s*(B|KB|MB|GB)?\s*$/i', $value, $matches)) {
            return null;
        }

        $amount = (float) $matches[1];
        $unit = strtoupper($matches[2] ?? 'B');

        $multipliers = [
            'B' => 1,
            'KB' => 1024,
            'MB' => 1024 ** 2,
            'GB' => 1024 ** 3,
        ];

        return (int) round($amount * ($multipliers[$unit] ?? 1));
    };

    $maxSizeBytes = $parseMaxSize($maxSize);
    $maxFiles = $maxFiles !== null ? max(1, (int) $maxFiles) : null;

    if (! $multiple) {
        $maxFiles = 1;
    }

    $existingItems = [];

    if (is_array($existing)) {
        foreach ($existing as $item) {
            if (is_string($item) && $item !== '') {
                $existingItems[] = [
                    'name' => basename($item),
                    'url' => $item,
                    'size' => null,
                    'type' => null,
                ];

                continue;
            }

            if (! is_array($item)) {
                continue;
            }

            $itemName = trim((string) ($item['name'] ?? basename((string) ($item['url'] ?? ''))));

            if ($itemName === '') {
                continue;
            }

            $existingItems[] = [
                'name' => $itemName,
                'url' => $item['url'] ?? null,
                'size' => isset($item['size']) ? (int) $item['size'] : null,
                'type' => $item['type'] ?? null,
                'isImage' => (bool) ($item['isImage'] ?? false),
            ];
        }
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

    $inputId = $id ?? ($name ? 'input-upload-'.$name : 'input-upload-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $showCounter = (bool) $counter || ($multiple && $maxFiles !== null);

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $counterId = $showCounter ? $inputId.'-counter' : null;
    $validationId = $inputId.'-validation';

    $describedBy = collect([$hintId, $errorId, $counterId, $validationId])->filter()->implode(' ');

    $inputName = $name;

    if (filled($inputName) && $multiple && ! str_ends_with($inputName, '[]')) {
        $inputName .= '[]';
    }

    $browseText = $browseText ?? 'Selecionar arquivo';
    $dropText = $dropText ?? 'Arraste e solte os arquivos aqui';
    $emptyText = $emptyText ?? 'Nenhum arquivo selecionado';
    $buttonText = $buttonText ?? ($multiple ? 'Escolher arquivos' : 'Escolher arquivo');

    $maxSizeLabel = null;

    if ($maxSizeBytes !== null) {
        if ($maxSizeBytes >= 1024 ** 3) {
            $maxSizeLabel = rtrim(rtrim(number_format($maxSizeBytes / (1024 ** 3), 1, '.', ''), '0'), '.').' GB';
        } elseif ($maxSizeBytes >= 1024 ** 2) {
            $maxSizeLabel = rtrim(rtrim(number_format($maxSizeBytes / (1024 ** 2), 1, '.', ''), '0'), '.').' MB';
        } elseif ($maxSizeBytes >= 1024) {
            $maxSizeLabel = rtrim(rtrim(number_format($maxSizeBytes / 1024, 1, '.', ''), '0'), '.').' KB';
        } else {
            $maxSizeLabel = $maxSizeBytes.' B';
        }
    }

    $labelSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $controlTextClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $sizeIconClasses = match ($size) {
        'sm' => 'text-xl',
        'lg' => 'text-3xl',
        default => 'text-2xl',
    };

    $dropPaddingClasses = match ($size) {
        'sm' => 'px-3 py-5',
        'lg' => 'px-6 py-10',
        default => 'px-4 py-8',
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';
    $itemRadiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';

    $focusRingClasses = match ($focusColor) {
        'secondary' => 'focus-within:border-secondary focus-within:ring-secondary',
        'success' => 'focus-within:border-success focus-within:ring-success',
        'warning' => 'focus-within:border-warning focus-within:ring-warning',
        'danger' => 'focus-within:border-danger focus-within:ring-danger',
        'info' => 'focus-within:border-info focus-within:ring-info',
        default => 'focus-within:border-primary focus-within:ring-primary',
    };

    $dragBorderClasses = match ($color) {
        'secondary' => 'border-secondary bg-secondary/5',
        'success' => 'border-success bg-success/5',
        'warning' => 'border-warning bg-warning/5',
        'danger' => 'border-danger bg-danger/5',
        'info' => 'border-info bg-info/5',
        default => 'border-primary bg-primary/5',
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

    $accentTextClasses = match ($color) {
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-primary',
    };

    $accentSoftClasses = match ($color) {
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-primary/15 text-primary',
    };

    $progressBarClasses = match ($color) {
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
        default => 'bg-primary',
    };

    $variantShellClasses = match ($variant) {
        'filled' => 'border border-transparent bg-muted shadow-none',
        'flush' => 'rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2',
        default => 'border bg-card shadow-sm',
    };

    $dropzoneClasses = collect([
        'relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variant === 'filled' ? 'bg-muted' : 'bg-card',
        $stateBorderClasses,
        $dropPaddingClasses,
        $controlTextClass,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1',
        $focusRingClasses,
    ])->filter()->implode(' ');

    $inlineShellClasses = collect([
        'group/input relative flex w-full items-center gap-2 transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        $variant === 'flush' ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        $focusRingClasses,
        $controlTextClass,
        match ($size) {
            'sm' => 'min-h-8 px-2.5 py-1',
            'lg' => 'min-h-11 px-3.5 py-1.5',
            default => 'min-h-9.5 px-3 py-1.5',
        },
        $isDisabled ? 'cursor-not-allowed opacity-60' : null,
    ])->filter()->implode(' ');

    $buttonSizeClass = match ($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    $softButtonClass = match ($color) {
        'secondary' => 'btn-soft-secondary',
        'success' => 'btn-soft-success',
        'warning' => 'btn-soft-warning',
        'danger' => 'btn-soft-danger',
        'info' => 'btn-soft-info',
        default => 'btn-soft-primary',
    };

    $previewSizeClasses = match ($size) {
        'sm' => 'size-9',
        'lg' => 'size-14',
        default => 'size-12',
    };

    $fileIconSizeClasses = match ($size) {
        'sm' => 'text-base',
        'lg' => 'text-xl',
        default => 'text-lg',
    };

    $alpineConfig = [
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'multiple' => (bool) $multiple,
        'maxFiles' => $maxFiles,
        'maxSize' => $maxSizeBytes,
        'accept' => (string) ($accept ?? ''),
        'showPreview' => (bool) $showPreview,
        'removable' => (bool) $removable,
        'replaceOnSelect' => (bool) $replaceOnSelect,
        'simulateProgress' => (bool) $simulateProgress,
        'existing' => $existingItems,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $inputAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');
@endphp

<div
    x-data="formInputUpload(@js($alpineConfig))"
    x-ref="root"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
>
    <input
        x-ref="input"
        type="file"
        id="{{ $inputId }}"
        @if (filled($inputName)) name="{{ $inputName }}" @endif
        class="sr-only"
        @change="onInputChange($event)"
        @focus="onFocus()"
        @blur="onBlur()"
        @if ($multiple) multiple @endif
        @if (filled($accept)) accept="{{ $accept }}" @endif
        @if (filled($capture)) capture="{{ $capture }}" @endif
        @if ($required) x-bind:required="count === 0" @endif
        @if ($isDisabled) disabled @endif
        @if ($isReadonly) readonly @endif
        @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
        @if ($hasError) aria-invalid="true" @endif
        {{ $wireAttributes }}
        {{ $inputAttributes }}
    >

    @if ($hasLabel)
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

    @if ($layout === 'dropzone')
        <div
            role="button"
            tabindex="0"
            aria-controls="{{ $inputId }}"
            @click="openPicker()"
            @keydown="onZoneKeydown($event)"
            @dragenter="onDragEnter($event)"
            @dragover="onDragOver($event)"
            @dragleave="onDragLeave($event)"
            @drop="onDrop($event)"
            x-bind:class="dragging ? @js($dragBorderClasses) : (focused ? 'ring-2 ring-offset-1' : '')"
            @class([$dropzoneClasses, 'w-full'])
        >
            @if ($loading)
                <span
                    class="size-6 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}"
                    aria-hidden="true"
                ></span>
            @else
                <span class="inline-flex {{ $accentSoftClasses }} rounded-full p-3" aria-hidden="true">
                    <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
                </span>
            @endif

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">{{ $dropText }}</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium {{ $accentTextClasses }} underline-offset-2 hover:underline">{{ $browseText }}</span>
                </p>
            </div>

            @if (filled($accept) || $maxSizeLabel !== null || ($multiple && $maxFiles !== null))
                <p class="mb-0 text-center text-[11px] text-muted-foreground">
                    @if (filled($accept))
                        <span>{{ $accept }}</span>
                    @endif
                    @if (filled($accept) && ($maxSizeLabel !== null || ($multiple && $maxFiles !== null)))
                        <span aria-hidden="true"> · </span>
                    @endif
                    @if ($maxSizeLabel !== null)
                        <span>Máx. {{ $maxSizeLabel }}</span>
                    @endif
                    @if ($multiple && $maxFiles !== null)
                        @if (filled($accept) || $maxSizeLabel !== null)
                            <span aria-hidden="true"> · </span>
                        @endif
                        <span>Até {{ $maxFiles }} arquivo(s)</span>
                    @endif
                </p>
            @endif
        </div>
    @elseif ($layout === 'button')
        <div class="flex flex-wrap items-center gap-3">
            <button
                type="button"
                @click="openPicker()"
                @disabled($isDisabled || $isReadonly)
                @class(['btn btn-primary', $buttonSizeClass])
            >
                @if ($loading)
                    <span class="size-4 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
                @else
                    <i class="bi {{ $icon }}" aria-hidden="true"></i>
                @endif
                <span>{{ $buttonText }}</span>
            </button>

            <p class="mb-0 text-sm text-muted-foreground" x-show="! hasFiles" x-cloak>
                {{ $emptyText }}
            </p>

            @if ($clearable)
                <button
                    type="button"
                    x-show="items.length > 0"
                    x-cloak
                    @click="clear()"
                    @disabled($isDisabled || $isReadonly)
                    class="btn btn-ghost-secondary {{ $buttonSizeClass }}"
                >
                    Limpar
                </button>
            @endif
        </div>
    @else
        {{-- layout=inline --}}
        <div
            @dragenter="onDragEnter($event)"
            @dragover="onDragOver($event)"
            @dragleave="onDragLeave($event)"
            @drop="onDrop($event)"
            x-bind:class="dragging ? @js($dragBorderClasses) : ''"
            @class([$inlineShellClasses, 'w-full'])
        >
            <span class="inline-flex shrink-0 items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                @if ($loading)
                    <span class="size-4 animate-spin rounded-full border-2 border-current border-t-transparent"></span>
                @else
                    <i class="bi {{ $icon }} leading-none text-sm"></i>
                @endif
            </span>

            <button
                type="button"
                @click="openPicker()"
                @disabled($isDisabled || $isReadonly)
                class="min-w-0 flex-1 truncate bg-transparent text-start text-foreground outline-none disabled:cursor-not-allowed"
            >
                <span x-show="! hasFiles" class="text-muted-foreground">{{ $emptyText }}</span>
                <span x-show="hasFiles" x-cloak x-text="items.length === 1 ? items[0].name : (count + ' arquivo(s)')"></span>
            </button>

            <button
                type="button"
                @click="openPicker()"
                @disabled($isDisabled || $isReadonly)
                @class(['btn shrink-0', $softButtonClass, $buttonSizeClass ?: 'btn-sm'])
            >
                {{ $browseText }}
            </button>

            @if ($clearable)
                <button
                    type="button"
                    x-show="items.length > 0"
                    x-cloak
                    @click.stop="clear()"
                    @disabled($isDisabled || $isReadonly)
                    class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                    aria-label="Limpar arquivos"
                >
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            @endif
        </div>
    @endif

    @if ($showFileList)
        <ul class="m-0 flex list-none flex-col gap-2 p-0" x-show="hasFiles" x-cloak>
            <template x-for="(item, index) in existing" x-bind:key="'existing-' + index + '-' + item.name">
                <li @class([
                    'flex items-center gap-3 border border-border bg-card p-2',
                    $itemRadiusClasses,
                ])>
                    <div @class([
                        'relative flex shrink-0 items-center justify-center overflow-hidden bg-muted',
                        $previewSizeClasses,
                        $itemRadiusClasses,
                    ])>
                        <template x-if="showPreview && existingIsImage(item) && item.url">
                            <img x-bind:src="item.url" x-bind:alt="item.name" class="size-full object-cover" />
                        </template>
                        <template x-if="! (showPreview && existingIsImage(item) && item.url)">
                            <i class="bi leading-none {{ $fileIconSizeClasses }} {{ $accentTextClasses }}" x-bind:class="existingIcon(item)" aria-hidden="true"></i>
                        </template>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="mb-0 truncate text-sm font-medium text-foreground" x-text="item.name"></p>
                        <p class="mb-0 text-xs text-muted-foreground">
                            <span x-show="item.size" x-text="formatBytes(item.size)"></span>
                            <span x-show="! item.size">Arquivo atual</span>
                        </p>
                    </div>

                    @if ($removable && ! $isDisabled && ! $isReadonly)
                        <button
                            type="button"
                            @click="removeExistingAt(index)"
                            class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-1.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                            x-bind:aria-label="'Remover ' + item.name"
                        >
                            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                        </button>
                    @endif
                </li>
            </template>

            <template x-for="(item, index) in items" x-bind:key="item.id">
                <li @class([
                    'flex items-center gap-3 border border-border bg-card p-2',
                    $itemRadiusClasses,
                ])>
                    <div @class([
                        'relative flex shrink-0 items-center justify-center overflow-hidden bg-muted',
                        $previewSizeClasses,
                        $itemRadiusClasses,
                    ])>
                        <template x-if="item.isImage && item.previewUrl">
                            <img x-bind:src="item.previewUrl" x-bind:alt="item.name" class="size-full object-cover" />
                        </template>
                        <template x-if="! (item.isImage && item.previewUrl)">
                            <i class="bi leading-none {{ $fileIconSizeClasses }} {{ $accentTextClasses }}" x-bind:class="item.icon" aria-hidden="true"></i>
                        </template>
                    </div>

                    <div class="min-w-0 flex-1">
                        <div class="flex items-start justify-between gap-2">
                            <div class="min-w-0">
                                <p class="mb-0 truncate text-sm font-medium text-foreground" x-text="item.name"></p>
                                <p class="mb-0 text-xs text-muted-foreground">
                                    <span x-text="formatBytes(item.size)"></span>
                                    <span x-show="item.extension" x-text="' · ' + item.extension.toUpperCase()"></span>
                                </p>
                            </div>

                            @if ($removable && ! $isDisabled && ! $isReadonly)
                                <button
                                    type="button"
                                    @click="removeAt(index)"
                                    class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-1.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                                    x-bind:aria-label="'Remover ' + item.name"
                                >
                                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                                </button>
                            @endif
                        </div>

                        @if ($simulateProgress)
                            <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-muted" x-show="item.status === 'uploading' || item.progress < 100">
                                <div
                                    class="h-full rounded-full transition-all duration-150 {{ $progressBarClasses }}"
                                    x-bind:style="'width:' + item.progress + '%'"
                                ></div>
                            </div>
                        @endif
                    </div>
                </li>
            </template>
        </ul>
    @endif

    @if ($layout === 'dropzone' && $clearable)
        <div class="flex justify-end" x-show="items.length > 0" x-cloak>
            <button
                type="button"
                @click="clear()"
                @disabled($isDisabled || $isReadonly)
                class="text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none"
            >
                Remover todos
            </button>
        </div>
    @endif

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

                <p
                    id="{{ $validationId }}"
                    class="mb-0 text-xs text-danger"
                    role="alert"
                    x-show="validationError"
                    x-text="validationError"
                    x-cloak
                ></p>
            </div>

            @if ($showCounter)
                <p
                    id="{{ $counterId }}"
                    class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground"
                    x-text="maxFiles ? (count + '/' + maxFiles) : count"
                >0{{ $maxFiles !== null ? '/'.$maxFiles : '' }}</p>
            @endif
        </div>
    @else
        <p
            id="{{ $validationId }}"
            class="mb-0 text-xs text-danger"
            role="alert"
            x-show="validationError"
            x-text="validationError"
            x-cloak
        ></p>
    @endif
</div>
