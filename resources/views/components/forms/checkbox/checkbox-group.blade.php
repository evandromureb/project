@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'description' => null,
    'size' => 'md',
    'color' => 'primary',
    'variant' => 'default',
    'direction' => 'vertical',
    'required' => false,
    'disabled' => false,
    'selectAll' => false,
    'selectAllLabel' => 'Selecionar todos',
    'showCount' => false,
    'id' => null,
    'name' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'switch', 'button', 'card'], true)) {
        $variant = 'default';
    }

    if (! in_array($direction, ['vertical', 'horizontal'], true)) {
        $direction = 'vertical';
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

    $isDisabled = $disabled || $attributes->has('disabled');

    $groupId = $id ?? ($name ? 'checkbox-group-'.$name : 'checkbox-group-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasDescription = filled($description) || isset($descriptionSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);

    $hintId = $hasHint ? $groupId.'-hint' : null;
    $errorId = $hasError ? $groupId.'-error' : null;
    $descriptionId = $hasDescription ? $groupId.'-description' : null;
    $describedBy = collect([$descriptionId, $hintId, $errorId])->filter()->implode(' ');

    $labelSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-sm',
    };

    $listClasses = match (true) {
        $variant === 'button' && $direction === 'horizontal' => 'flex flex-wrap gap-2',
        $variant === 'card' && $direction === 'horizontal' => 'grid grid-cols-1 gap-3 sm:grid-cols-2',
        $direction === 'horizontal' => 'flex flex-wrap gap-x-5 gap-y-2',
        $variant === 'card' => 'flex flex-col gap-3',
        default => 'flex flex-col gap-2.5',
    };

    $needsAlpine = $selectAll || $showCount;

    $alpineConfig = [
        'selectAll' => (bool) $selectAll,
    ];
@endphp

<fieldset
    @if ($needsAlpine)
        x-data="formCheckboxGroup(@js($alpineConfig))"
        @change="onChildChange()"
    @endif
    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
    @if ($hasError) aria-invalid="true" @endif
    @disabled($isDisabled)
    {{ $attributes->except(['disabled'])->class(['flex w-full min-w-0 flex-col gap-2 border-0 p-0']) }}
>
    @if ($hasLabel || $showCount)
        <div class="flex items-center justify-between gap-3">
            @if ($hasLabel)
                <legend id="{{ $groupId }}-label" class="float-none w-auto {{ $labelSizeClass }} p-0 font-medium text-foreground">
                    @isset($labelSlot)
                        {{ $labelSlot }}
                    @else
                        {{ $label }}
                    @endisset
                    @if ($required)
                        <span class="text-danger" aria-hidden="true">*</span>
                    @endif
                </legend>
            @else
                <span id="{{ $groupId }}-label" class="sr-only">Grupo de opções</span>
            @endif

            @if ($showCount && $needsAlpine)
                <span class="shrink-0 text-xs tabular-nums text-muted-foreground" x-text="checkedCount + '/' + totalCount"></span>
            @endif
        </div>
    @endif

    @if ($hasDescription)
        <p id="{{ $descriptionId }}" class="mb-0 text-xs text-muted-foreground">
            @isset($descriptionSlot)
                {{ $descriptionSlot }}
            @else
                {{ $description }}
            @endisset
        </p>
    @endif

    @if ($selectAll)
        <div class="border-b border-border pb-2">
            <label class="inline-flex cursor-pointer items-center gap-2.5 {{ $isDisabled ? 'cursor-not-allowed opacity-60' : '' }}">
                <span class="relative inline-flex shrink-0">
                    <input
                        x-ref="master"
                        type="checkbox"
                        id="{{ $groupId }}-select-all"
                        data-checkbox-group-master="true"
                        class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card checked:border-primary checked:bg-primary indeterminate:border-primary indeterminate:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed"
                        @disabled($isDisabled)
                        @click="toggleAll()"
                        aria-label="{{ $selectAllLabel }}"
                    />
                    <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-xs text-primary-foreground opacity-0 peer-checked:opacity-100 peer-indeterminate:opacity-0" aria-hidden="true"></i>
                    <i class="bi bi-dash pointer-events-none absolute inset-0 flex items-center justify-center text-xs text-primary-foreground opacity-0 peer-indeterminate:opacity-100" aria-hidden="true"></i>
                </span>
                <span class="{{ $labelSizeClass }} font-medium text-foreground">{{ $selectAllLabel }}</span>
            </label>
        </div>
    @endif

    <div
        x-ref="list"
        role="group"
        @class([$listClasses])
        @if ($hasLabel) aria-labelledby="{{ $groupId }}-label" @endif
    >
        {{ $slot }}
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
</fieldset>
