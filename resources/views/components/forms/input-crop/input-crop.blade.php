@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'layout' => null,
    'shape' => null,
    'aspect' => 'square',
    'aspectLock' => false,
    'circular' => false,
    'objectFit' => 'cover',
    'previewSize' => 'md',
    'icon' => 'bi-crop',
    'multiple' => false,
    'accept' => 'image/*',
    'maxSize' => '5MB',
    'maxFiles' => null,
    'outputWidth' => null,
    'outputHeight' => null,
    'outputType' => 'image/jpeg',
    'quality' => 0.92,
    'viewMode' => 1,
    'dragMode' => 'move',
    'guides' => true,
    'center' => true,
    'highlight' => true,
    'background' => true,
    'autoCropArea' => 0.8,
    'rotatable' => true,
    'scalable' => true,
    'zoomable' => true,
    'zoomOnTouch' => true,
    'zoomOnWheel' => true,
    'cropBoxMovable' => true,
    'cropBoxResizable' => true,
    'toggleDragModeOnDblclick' => true,
    'minCropBoxWidth' => 0,
    'minCropBoxHeight' => 0,
    'showToolbar' => true,
    'showPreview' => true,
    'showMeta' => true,
    'showOverlay' => true,
    'clearable' => true,
    'removable' => true,
    'replaceOnSelect' => true,
    'counter' => false,
    'existing' => null,
    'browseText' => null,
    'dropText' => null,
    'emptyText' => null,
    'changeText' => null,
    'removeText' => null,
    'editText' => null,
    'modalTitle' => null,
    'confirmText' => null,
    'cancelText' => null,
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

    if ($layout === null) {
        $layout = $multiple ? 'gallery' : 'card';
    }

    if (! in_array($layout, ['avatar', 'card', 'dropzone', 'gallery'], true)) {
        $layout = 'card';
    }

    if ($multiple && $layout === 'avatar') {
        $layout = 'gallery';
    }

    if ($shape === null) {
        $shape = $layout === 'avatar' || $circular ? 'circle' : 'rounded';
    }

    if (! in_array($shape, ['square', 'rounded', 'circle'], true)) {
        $shape = $layout === 'avatar' ? 'circle' : 'rounded';
    }

    if ($circular) {
        $shape = 'circle';
        $aspect = 'square';
    }

    if (! in_array($objectFit, ['cover', 'contain'], true)) {
        $objectFit = 'cover';
    }

    if (! in_array($previewSize, ['sm', 'md', 'lg', 'xl'], true)) {
        $previewSize = 'md';
    }

    if (! in_array($outputType, ['image/jpeg', 'image/png', 'image/webp'], true)) {
        $outputType = 'image/jpeg';
    }

    $quality = max(0.1, min(1, (float) $quality));
    $viewMode = max(0, min(3, (int) $viewMode));
    $dragMode = in_array($dragMode, ['crop', 'move', 'none'], true) ? $dragMode : 'move';
    $autoCropArea = max(0.1, min(1, (float) $autoCropArea));

    $aspectPresetsMap = [
        'square' => 1,
        'video' => 16 / 9,
        'landscape' => 4 / 3,
        'portrait' => 3 / 4,
        'wide' => 21 / 9,
        'free' => null,
    ];

    if (is_string($aspect) && array_key_exists($aspect, $aspectPresetsMap)) {
        $aspectRatio = $aspectPresetsMap[$aspect];
    } elseif (is_numeric($aspect)) {
        $aspectRatio = (float) $aspect;
    } elseif (is_string($aspect) && preg_match('/^\s*(\d+(?:\.\d+)?)\s*[\/:]\s*(\d+(?:\.\d+)?)\s*$/', $aspect, $matches)) {
        $denom = (float) $matches[2];
        $aspectRatio = $denom > 0 ? ((float) $matches[1]) / $denom : 1;
    } else {
        $aspectRatio = 1;
    }

    $cssAspect = match (true) {
        $aspectRatio === null => null,
        abs($aspectRatio - 1) < 0.001 => '1 / 1',
        abs($aspectRatio - 16 / 9) < 0.001 => '16 / 9',
        abs($aspectRatio - 4 / 3) < 0.001 => '4 / 3',
        abs($aspectRatio - 3 / 4) < 0.001 => '3 / 4',
        abs($aspectRatio - 21 / 9) < 0.001 => '21 / 9',
        default => round($aspectRatio, 4).' / 1',
    };

    $toolbarAspectPresets = $aspectLock || $circular
        ? []
        : [
            ['label' => '1:1', 'value' => 1],
            ['label' => '16:9', 'value' => 16 / 9],
            ['label' => '4:3', 'value' => 4 / 3],
            ['label' => '3:4', 'value' => 3 / 4],
            ['label' => 'Livre', 'value' => null],
        ];

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
    $outputWidth = $outputWidth !== null ? max(1, (int) $outputWidth) : null;
    $outputHeight = $outputHeight !== null ? max(1, (int) $outputHeight) : null;
    $minCropBoxWidth = max(0, (int) $minCropBoxWidth);
    $minCropBoxHeight = max(0, (int) $minCropBoxHeight);

    if (! $multiple) {
        $maxFiles = 1;
    }

    $existingItems = [];

    if (is_string($existing) && $existing !== '') {
        $existing = [['url' => $existing, 'name' => basename(parse_url($existing, PHP_URL_PATH) ?: 'imagem')]];
    }

    if (is_array($existing)) {
        foreach ($existing as $item) {
            if (is_string($item) && $item !== '') {
                $existingItems[] = [
                    'name' => basename(parse_url($item, PHP_URL_PATH) ?: 'imagem'),
                    'url' => $item,
                    'size' => null,
                    'width' => null,
                    'height' => null,
                ];

                continue;
            }

            if (! is_array($item)) {
                continue;
            }

            $itemUrl = $item['url'] ?? null;
            $itemName = trim((string) ($item['name'] ?? basename((string) ($itemUrl ?? ''))));

            if ($itemName === '' && filled($itemUrl)) {
                $itemName = 'imagem';
            }

            if ($itemName === '' && blank($itemUrl)) {
                continue;
            }

            $existingItems[] = [
                'name' => $itemName,
                'url' => $itemUrl,
                'size' => isset($item['size']) ? (int) $item['size'] : null,
                'width' => isset($item['width']) ? (int) $item['width'] : null,
                'height' => isset($item['height']) ? (int) $item['height'] : null,
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

    $inputId = $id ?? ($name ? 'input-crop-'.$name : 'input-crop-'.str()->uuid());

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

    $browseText = $browseText ?? 'Selecionar imagem';
    $dropText = $dropText ?? 'Arraste uma imagem para recortar';
    $emptyText = $emptyText ?? 'Nenhuma imagem';
    $changeText = $changeText ?? 'Trocar';
    $removeText = $removeText ?? 'Remover';
    $editText = $editText ?? 'Recortar';
    $modalTitle = $modalTitle ?? 'Recortar imagem';
    $confirmText = $confirmText ?? 'Aplicar';
    $cancelText = $cancelText ?? 'Cancelar';

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

    $shapeClasses = match ($shape) {
        'circle' => 'rounded-full',
        'square' => 'rounded-none',
        default => 'rounded-lg',
    };

    $objectFitClass = $objectFit === 'contain' ? 'object-contain' : 'object-cover';

    $avatarSizeClasses = match ($previewSize) {
        'sm' => 'size-20',
        'lg' => 'size-36',
        'xl' => 'size-44',
        default => 'size-28',
    };

    $galleryThumbClasses = match ($previewSize) {
        'sm' => 'size-16',
        'lg' => 'size-28',
        'xl' => 'size-32',
        default => 'size-24',
    };

    $dropPaddingClasses = match ($size) {
        'sm' => 'px-3 py-5',
        'lg' => 'px-6 py-10',
        default => 'px-4 py-8',
    };

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

    $softButtonClass = match ($color) {
        'secondary' => 'btn-soft-secondary',
        'success' => 'btn-soft-success',
        'warning' => 'btn-soft-warning',
        'danger' => 'btn-soft-danger',
        'info' => 'btn-soft-info',
        default => 'btn-soft-primary',
    };

    $buttonSizeClass = match ($size) {
        'sm' => 'btn-sm',
        'lg' => 'btn-lg',
        default => '',
    };

    $surfaceClasses = match ($variant) {
        'filled' => 'border border-transparent bg-muted',
        'flush' => 'rounded-none border-0 border-b border-border bg-transparent',
        default => 'border bg-card',
    };

    $alpineConfig = [
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'multiple' => (bool) $multiple,
        'maxFiles' => $maxFiles,
        'maxSize' => $maxSizeBytes,
        'accept' => (string) ($accept ?? 'image/*'),
        'removable' => (bool) $removable,
        'replaceOnSelect' => (bool) $replaceOnSelect,
        'showMeta' => (bool) $showMeta,
        'showToolbar' => (bool) $showToolbar,
        'showPreview' => (bool) $showPreview,
        'aspectLock' => (bool) $aspectLock,
        'circular' => (bool) $circular,
        'browseText' => (string) $browseText,
        'changeText' => (string) $changeText,
        'modalTitle' => (string) $modalTitle,
        'confirmText' => (string) $confirmText,
        'cancelText' => (string) $cancelText,
        'outputWidth' => $outputWidth,
        'outputHeight' => $outputHeight,
        'outputType' => (string) $outputType,
        'quality' => $quality,
        'viewMode' => $viewMode,
        'dragMode' => (string) $dragMode,
        'guides' => (bool) $guides,
        'center' => (bool) $center,
        'highlight' => (bool) $highlight,
        'background' => (bool) $background,
        'autoCropArea' => $autoCropArea,
        'rotatable' => (bool) $rotatable,
        'scalable' => (bool) $scalable,
        'zoomable' => (bool) $zoomable,
        'zoomOnTouch' => (bool) $zoomOnTouch,
        'zoomOnWheel' => (bool) $zoomOnWheel,
        'cropBoxMovable' => (bool) $cropBoxMovable,
        'cropBoxResizable' => (bool) $cropBoxResizable,
        'toggleDragModeOnDblclick' => (bool) $toggleDragModeOnDblclick,
        'minCropBoxWidth' => $minCropBoxWidth,
        'minCropBoxHeight' => $minCropBoxHeight,
        'aspectRatio' => $aspectRatio,
        'aspectPresets' => $toolbarAspectPresets,
        'existing' => $existingItems,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $inputAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');

    $constraintsHint = collect([
        filled($accept) ? $accept : null,
        $maxSizeLabel !== null ? 'Máx. '.$maxSizeLabel : null,
        $outputWidth || $outputHeight
            ? 'Saída '.($outputWidth ?? '…').'×'.($outputHeight ?? '…').'px'
            : null,
        $multiple && $maxFiles !== null ? 'Até '.$maxFiles.' imagem(ns)' : null,
        match ($outputType) {
            'image/png' => 'PNG',
            'image/webp' => 'WebP',
            default => 'JPEG',
        },
    ])->filter()->implode(' · ');
@endphp

<div
    x-data="formInputCrop(@js($alpineConfig))"
    x-ref="root"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
>
    <input
        x-ref="input"
        type="file"
        id="{{ $inputId }}"
        @if (filled($inputName)) name="{{ $inputName }}" @endif
        class="sr-only"
        accept="{{ $accept }}"
        @change="onInputChange($event)"
        @focus="onFocus()"
        @blur="onBlur()"
        @if ($multiple) multiple @endif
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

    @if ($layout === 'avatar')
        <div class="flex flex-wrap items-center gap-4">
            <div
                role="button"
                tabindex="0"
                aria-controls="{{ $inputId }}"
                aria-label="{{ $browseText }}"
                @click="openPicker()"
                @keydown="onZoneKeydown($event)"
                @dragenter="onDragEnter($event)"
                @dragover="onDragOver($event)"
                @dragleave="onDragLeave($event)"
                @drop="onDrop($event)"
                x-bind:class="dragging ? @js($dragBorderClasses) : ''"
                @class([
                    'group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed transition-all',
                    $avatarSizeClasses,
                    $shapeClasses,
                    'bg-muted',
                    $stateBorderClasses,
                    $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer hover:border-current',
                    $isDisabled ? null : $accentTextClasses,
                    'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1',
                    $focusRingClasses,
                ])
            >
                <template x-if="primaryPreview">
                    <img
                        x-bind:src="primaryPreview"
                        x-bind:alt="primaryName"
                        @class(['size-full', $objectFitClass])
                    />
                </template>

                <template x-if="! primaryPreview">
                    <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current" aria-hidden="true">
                        @if ($loading)
                            <span class="size-6 animate-spin rounded-full border-2 border-current border-t-transparent"></span>
                        @else
                            <i class="bi bi-camera leading-none {{ $sizeIconClasses }}"></i>
                        @endif
                    </span>
                </template>

                @if ($showOverlay && ! $isDisabled && ! $isReadonly)
                    <div
                        class="pointer-events-none absolute inset-0 flex items-center justify-center bg-black/55 opacity-0 transition-opacity group-hover/avatar:opacity-100 group-focus-visible/avatar:opacity-100"
                        x-show="hasImages"
                        x-cloak
                        aria-hidden="true"
                    >
                        <span class="inline-flex size-9 items-center justify-center rounded-full bg-white text-foreground shadow-sm">
                            <i class="bi bi-crop text-base leading-none"></i>
                        </span>
                    </div>
                @endif
            </div>

            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button
                        type="button"
                        @click="openPicker()"
                        @disabled($isDisabled || $isReadonly)
                        @class(['btn', $softButtonClass, $buttonSizeClass ?: 'btn-sm'])
                    >
                        <i class="bi bi-camera" aria-hidden="true"></i>
                        <span x-text="hasImages ? changeText : browseText"></span>
                    </button>

                    <button
                        type="button"
                        x-show="items.length"
                        x-cloak
                        @click="recropPrimary()"
                        @disabled($isDisabled || $isReadonly)
                        class="btn btn-ghost-secondary {{ $buttonSizeClass ?: 'btn-sm' }}"
                    >
                        <i class="bi bi-crop" aria-hidden="true"></i>
                        <span>{{ $editText }}</span>
                    </button>

                    @if ($removable)
                        <button
                            type="button"
                            x-show="hasImages"
                            x-cloak
                            @click="removePrimary()"
                            @disabled($isDisabled || $isReadonly)
                            class="btn btn-ghost-secondary {{ $buttonSizeClass ?: 'btn-sm' }}"
                        >
                            <i class="bi bi-trash" aria-hidden="true"></i>
                            <span>{{ $removeText }}</span>
                        </button>
                    @endif
                </div>

                @if ($showMeta)
                    <p class="mb-0 truncate text-xs text-muted-foreground" x-show="hasImages" x-cloak>
                        <span x-text="primaryName"></span>
                        <span x-show="primaryMeta" x-text="' · ' + primaryMeta"></span>
                    </p>
                    <p class="mb-0 text-xs text-muted-foreground" x-show="! hasImages">{{ $emptyText }}</p>
                @endif

                @if (filled($constraintsHint))
                    <p class="mb-0 text-[11px] text-muted-foreground">{{ $constraintsHint }}</p>
                @endif
            </div>
        </div>
    @elseif ($layout === 'card')
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
            @class([
                'group/card relative w-full overflow-hidden border-2 border-dashed transition-colors',
                $variant === 'flush' ? 'rounded-none' : $shapeClasses,
                $surfaceClasses,
                $stateBorderClasses,
                $controlTextClass,
                $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer',
                'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1',
                $focusRingClasses,
            ])
            @if ($cssAspect) style="aspect-ratio: {{ $cssAspect }};" @endif
        >
            <template x-if="primaryPreview">
                <div class="absolute inset-0">
                    <img
                        x-bind:src="primaryPreview"
                        x-bind:alt="primaryName"
                        @class(['size-full', $objectFitClass, $variant === 'filled' ? 'bg-muted' : 'bg-card'])
                    />

                    @if ($showOverlay && ! $isDisabled && ! $isReadonly)
                        <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-black/55 opacity-0 transition-opacity group-hover/card:opacity-100">
                            <div class="flex items-center justify-center gap-2">
                                <span
                                    class="inline-flex size-10 items-center justify-center rounded-full bg-white text-foreground shadow-sm"
                                    title="{{ $changeText }}"
                                >
                                    <i class="bi bi-camera text-lg leading-none" aria-hidden="true"></i>
                                </span>
                                <button
                                    type="button"
                                    x-show="items.length"
                                    @click.stop="recropPrimary()"
                                    class="inline-flex size-10 items-center justify-center rounded-full bg-white text-foreground shadow-sm"
                                    title="{{ $editText }}"
                                    aria-label="{{ $editText }}"
                                >
                                    <i class="bi bi-crop text-lg leading-none" aria-hidden="true"></i>
                                </button>
                                @if ($removable)
                                    <button
                                        type="button"
                                        @click.stop="removePrimary()"
                                        class="inline-flex size-10 items-center justify-center rounded-full bg-white text-foreground shadow-sm"
                                        title="{{ $removeText }}"
                                        aria-label="{{ $removeText }}"
                                    >
                                        <i class="bi bi-trash text-lg leading-none" aria-hidden="true"></i>
                                    </button>
                                @endif
                            </div>
                            @if ($showMeta)
                                <p class="mb-0 max-w-[90%] truncate px-3 text-center text-xs text-white/90">
                                    <span x-text="primaryName"></span>
                                    <span x-show="primaryMeta" x-text="' · ' + primaryMeta"></span>
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </template>

            <template x-if="! primaryPreview">
                <div @class(['flex h-full min-h-40 w-full flex-col items-center justify-center gap-2', $dropPaddingClasses])>
                    @if ($loading)
                        <span class="size-6 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}" aria-hidden="true"></span>
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

                    @if (filled($constraintsHint))
                        <p class="mb-0 text-center text-[11px] text-muted-foreground">{{ $constraintsHint }}</p>
                    @endif
                </div>
            </template>
        </div>
    @elseif ($layout === 'dropzone')
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
            @class([
                'relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors',
                $variant === 'flush' ? 'rounded-none' : $shapeClasses,
                $variant === 'filled' ? 'bg-muted' : 'bg-card',
                $stateBorderClasses,
                $dropPaddingClasses,
                $controlTextClass,
                $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer',
                'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1',
                $focusRingClasses,
            ])
        >
            @if ($loading)
                <span class="size-6 animate-spin rounded-full border-2 border-current border-t-transparent {{ $stateTextClasses }}" aria-hidden="true"></span>
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

            @if (filled($constraintsHint))
                <p class="mb-0 text-center text-[11px] text-muted-foreground">{{ $constraintsHint }}</p>
            @endif
        </div>

        <div class="flex flex-wrap gap-3" x-show="hasImages" x-cloak>
            <template x-for="(item, index) in existing" x-bind:key="'existing-' + index + '-' + item.name">
                <div @class([
                    'group/thumb relative overflow-hidden border border-border bg-muted',
                    $galleryThumbClasses,
                    $shapeClasses,
                ])>
                    <img
                        x-bind:src="item.url"
                        x-bind:alt="item.name"
                        @class(['size-full', $objectFitClass])
                    />
                    @if ($removable && ! $isDisabled && ! $isReadonly)
                        <button
                            type="button"
                            @click.stop="removeExistingAt(index)"
                            class="absolute end-1 top-1 inline-flex size-6 items-center justify-center rounded-full bg-black/60 text-white opacity-0 transition-opacity group-hover/thumb:opacity-100"
                            x-bind:aria-label="'Remover ' + item.name"
                        >
                            <i class="bi bi-x-lg text-[10px] leading-none" aria-hidden="true"></i>
                        </button>
                    @endif
                </div>
            </template>

            <template x-for="(item, index) in items" x-bind:key="item.id">
                <div @class([
                    'group/thumb relative overflow-hidden border border-border bg-muted',
                    $galleryThumbClasses,
                    $shapeClasses,
                ])>
                    <img
                        x-bind:src="item.previewUrl"
                        x-bind:alt="item.name"
                        @class(['size-full', $objectFitClass])
                    />
                    @if (! $isDisabled && ! $isReadonly)
                        <button
                            type="button"
                            @click.stop="recropAt(index)"
                            class="absolute start-1 top-1 inline-flex size-6 items-center justify-center rounded-full bg-black/60 text-white opacity-0 transition-opacity group-hover/thumb:opacity-100"
                            x-bind:aria-label="'Recortar ' + item.name"
                        >
                            <i class="bi bi-crop text-[10px] leading-none" aria-hidden="true"></i>
                        </button>
                        @if ($removable)
                            <button
                                type="button"
                                @click.stop="removeAt(index)"
                                class="absolute end-1 top-1 inline-flex size-6 items-center justify-center rounded-full bg-black/60 text-white opacity-0 transition-opacity group-hover/thumb:opacity-100"
                                x-bind:aria-label="'Remover ' + item.name"
                            >
                                <i class="bi bi-x-lg text-[10px] leading-none" aria-hidden="true"></i>
                            </button>
                        @endif
                    @endif
                </div>
            </template>
        </div>
    @else
        {{-- layout=gallery --}}
        <div
            @dragenter="onDragEnter($event)"
            @dragover="onDragOver($event)"
            @dragleave="onDragLeave($event)"
            @drop="onDrop($event)"
            x-bind:class="dragging ? @js($dragBorderClasses) : ''"
            @class([
                'flex w-full flex-wrap gap-3 border-2 border-dashed p-3 transition-colors',
                $variant === 'flush' ? 'rounded-none' : $shapeClasses,
                $variant === 'filled' ? 'bg-muted' : 'bg-card',
                $stateBorderClasses,
                $isDisabled ? 'opacity-60' : null,
            ])
        >
            <template x-for="(item, index) in existing" x-bind:key="'existing-' + index + '-' + item.name">
                <div class="flex flex-col gap-1.5">
                    <div @class([
                        'group/thumb relative overflow-hidden border border-border bg-muted',
                        $galleryThumbClasses,
                        $shapeClasses,
                    ])>
                        <img
                            x-bind:src="item.url"
                            x-bind:alt="item.name"
                            @class(['size-full', $objectFitClass])
                        />
                        @if ($removable && ! $isDisabled && ! $isReadonly)
                            <button
                                type="button"
                                @click.stop="removeExistingAt(index)"
                                class="absolute end-1 top-1 inline-flex size-6 items-center justify-center rounded-full bg-black/60 text-white opacity-0 transition-opacity group-hover/thumb:opacity-100"
                                x-bind:aria-label="'Remover ' + item.name"
                            >
                                <i class="bi bi-x-lg text-[10px] leading-none" aria-hidden="true"></i>
                            </button>
                        @endif
                    </div>
                    @if ($showMeta)
                        <p class="mb-0 w-full max-w-24 truncate text-[11px] text-muted-foreground" x-text="item.name"></p>
                    @endif
                </div>
            </template>

            <template x-for="(item, index) in items" x-bind:key="item.id">
                <div class="flex flex-col gap-1.5">
                    <div @class([
                        'group/thumb relative overflow-hidden border border-border bg-muted',
                        $galleryThumbClasses,
                        $shapeClasses,
                    ])>
                        <img
                            x-bind:src="item.previewUrl"
                            x-bind:alt="item.name"
                            @class(['size-full', $objectFitClass])
                        />
                        @if (! $isDisabled && ! $isReadonly)
                            <button
                                type="button"
                                @click.stop="recropAt(index)"
                                class="absolute start-1 top-1 inline-flex size-6 items-center justify-center rounded-full bg-black/60 text-white opacity-0 transition-opacity group-hover/thumb:opacity-100"
                                x-bind:aria-label="'Recortar ' + item.name"
                            >
                                <i class="bi bi-crop text-[10px] leading-none" aria-hidden="true"></i>
                            </button>
                            @if ($removable)
                                <button
                                    type="button"
                                    @click.stop="removeAt(index)"
                                    class="absolute end-1 top-1 inline-flex size-6 items-center justify-center rounded-full bg-black/60 text-white opacity-0 transition-opacity group-hover/thumb:opacity-100"
                                    x-bind:aria-label="'Remover ' + item.name"
                                >
                                    <i class="bi bi-x-lg text-[10px] leading-none" aria-hidden="true"></i>
                                </button>
                            @endif
                        @endif
                    </div>
                    @if ($showMeta)
                        <p class="mb-0 w-full max-w-24 truncate text-[11px] text-muted-foreground" x-text="item.name"></p>
                    @endif
                </div>
            </template>

            <button
                type="button"
                @click="openPicker()"
                x-show="canAdd"
                x-cloak
                @disabled($isDisabled || $isReadonly)
                @class([
                    'inline-flex flex-col items-center justify-center gap-1 border border-dashed border-border text-muted-foreground transition-colors hover:border-current hover:text-foreground disabled:pointer-events-none',
                    $galleryThumbClasses,
                    $shapeClasses,
                    $accentTextClasses,
                ])
                aria-label="{{ $browseText }}"
            >
                @if ($loading)
                    <span class="size-5 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
                @else
                    <i class="bi bi-plus-lg text-xl leading-none" aria-hidden="true"></i>
                @endif
                <span class="text-[11px] font-medium">Add</span>
            </button>
        </div>

        @if (filled($constraintsHint))
            <p class="mb-0 text-[11px] text-muted-foreground">{{ $constraintsHint }}</p>
        @endif
    @endif

    @if ($clearable && $layout !== 'avatar')
        <div class="flex justify-end" x-show="hasImages" x-cloak>
            <button
                type="button"
                @click="clear()"
                @disabled($isDisabled || $isReadonly)
                class="text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none"
            >
                Remover {{ $multiple ? 'todas' : 'imagem' }}
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

    {{-- Modal de crop (teleportado para evitar clip por overflow dos ancestrais) --}}
    <template x-teleport="body">
        <div
            x-show="modalOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[110] flex items-center justify-center overflow-y-auto p-4"
            role="presentation"
        >
            <div
                class="fixed inset-0 bg-black/50"
                aria-hidden="true"
                @click="cancelCrop()"
            ></div>

            <div
                x-show="modalOpen"
                x-trap.noscroll="modalOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                role="dialog"
                aria-modal="true"
                x-bind:aria-label="modalTitle"
                class="relative z-10 my-auto flex w-full max-w-4xl flex-col overflow-hidden rounded-md border border-border bg-card text-card-foreground shadow-lg"
            >
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <div class="min-w-0">
                        <h5 class="m-0 truncate text-base font-semibold text-card-foreground" x-text="modalTitle"></h5>
                        <p class="mb-0 mt-0.5 text-xs text-muted-foreground" x-show="queueRemaining" x-cloak>
                            <span x-text="queueRemaining"></span> na fila
                        </p>
                    </div>
                    <button
                        type="button"
                        @click="cancelCrop()"
                        class="btn-icon -me-2 shrink-0"
                        aria-label="Fechar"
                    >
                        <i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="grid gap-4 p-5 lg:grid-cols-[1fr_11rem]">
                    <div
                        @class([
                            'relative min-h-72 overflow-hidden rounded-md bg-muted',
                            '[&_.cropper-view-box]:rounded-full [&_.cropper-face]:rounded-full' => $circular,
                        ])
                    >
                        <img
                            x-ref="cropImage"
                            alt="Recorte"
                            class="block max-h-[min(70vh,36rem)] max-w-full"
                        />
                    </div>

                    <div class="flex flex-col gap-4">
                        @if ($showPreview)
                            <div class="flex flex-col items-center gap-2">
                                <p class="mb-0 text-xs font-medium text-muted-foreground">Preview</p>
                                <div @class([
                                    'overflow-hidden border border-border bg-muted',
                                    $circular ? 'rounded-full' : 'rounded-md',
                                    'size-28',
                                ])>
                                    <template x-if="livePreviewUrl">
                                        <img
                                            x-bind:src="livePreviewUrl"
                                            alt="Preview do recorte"
                                            class="size-full object-cover"
                                        />
                                    </template>
                                </div>
                            </div>
                        @endif

                        @if ($showToolbar)
                            <div class="flex flex-col gap-3">
                                @if (count($toolbarAspectPresets) > 0)
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach ($toolbarAspectPresets as $preset)
                                            <button
                                                type="button"
                                                @click="setAspect(@js($preset['value']))"
                                                x-bind:class="isAspectActive(@js($preset['value'])) ? 'btn-soft-primary' : 'btn-ghost-secondary'"
                                                class="btn btn-sm"
                                            >
                                                {{ $preset['label'] }}
                                            </button>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex flex-wrap gap-1.5">
                                    <button type="button" class="btn btn-sm btn-ghost-secondary" @click="setDragMode('move')" title="Mover" aria-label="Mover">
                                        <i class="bi bi-arrows-move" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-ghost-secondary" @click="setDragMode('crop')" title="Recortar" aria-label="Recortar área">
                                        <i class="bi bi-crop" aria-hidden="true"></i>
                                    </button>
                                    @if ($zoomable)
                                        <button type="button" class="btn btn-sm btn-ghost-secondary" @click="zoom(0.1)" title="Zoom +" aria-label="Aumentar zoom">
                                            <i class="bi bi-zoom-in" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-ghost-secondary" @click="zoom(-0.1)" title="Zoom −" aria-label="Diminuir zoom">
                                            <i class="bi bi-zoom-out" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                    @if ($rotatable)
                                        <button type="button" class="btn btn-sm btn-ghost-secondary" @click="rotate(-90)" title="Girar −90°" aria-label="Girar anti-horário">
                                            <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-ghost-secondary" @click="rotate(90)" title="Girar 90°" aria-label="Girar horário">
                                            <i class="bi bi-arrow-clockwise" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                    @if ($scalable)
                                        <button type="button" class="btn btn-sm btn-ghost-secondary" @click="scaleX()" title="Espelhar H" aria-label="Espelhar horizontalmente">
                                            <i class="bi bi-symmetry-vertical" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-ghost-secondary" @click="scaleY()" title="Espelhar V" aria-label="Espelhar verticalmente">
                                            <i class="bi bi-symmetry-horizontal" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-ghost-secondary" @click="resetCropper()" title="Resetar" aria-label="Resetar">
                                        <i class="bi bi-arrow-repeat" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button
                        type="button"
                        class="btn btn-ghost-secondary"
                        @click="cancelCrop()"
                        x-bind:disabled="cropping"
                        x-text="cancelText"
                    ></button>
                    <button
                        type="button"
                        @class(['btn', 'btn-'.$color])
                        @click="confirmCrop()"
                        x-bind:disabled="cropping"
                    >
                        <span x-show="! cropping" x-text="confirmText"></span>
                        <span x-show="cropping" x-cloak class="inline-flex items-center gap-2">
                            <span class="size-4 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
                            Processando…
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
