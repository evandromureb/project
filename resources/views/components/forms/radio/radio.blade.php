@props([
    'label' => null,
    'description' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'checked' => false,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'reverse' => false,
    'rounded' => false,
    'icon' => null,
    'id' => null,
    'name' => null,
])

@aware([
    'size' => 'md',
    'color' => 'primary',
    'variant' => 'default',
    'disabled' => false,
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

    if (! in_array($variant, ['default', 'button', 'card'], true)) {
        $variant = 'default';
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

    $isDisabled = $disabled || $attributes->has('disabled');
    $isReadonly = $readonly || $attributes->has('readonly');
    $isChecked = $checked || $attributes->has('checked');

    $resolvedValue = $value ?? '1';

    $inputId = $id ?? (
        filled($name)
            ? 'radio-'.$name.'-'.str($resolvedValue)->slug()
            : 'radio-'.str()->uuid()
    );

    $hasLabel = filled($label) || isset($labelSlot) || $slot->isNotEmpty();
    $hasDescription = filled($description) || isset($descriptionSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $needsAlpine = $isReadonly;

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $descriptionId = $hasDescription ? $inputId.'-description' : null;

    $describedBy = collect([$descriptionId, $hintId, $errorId])->filter()->implode(' ');

    $boxSizeClass = match ($size) {
        'sm' => 'size-3.5',
        'lg' => 'size-5',
        default => 'size-4',
    };

    $dotSizeClass = match ($size) {
        'sm' => 'size-1.5',
        'lg' => 'size-2.5',
        default => 'size-2',
    };

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

    $nativeCheckedClass = match ($focusColor) {
        'secondary' => 'checked:border-secondary',
        'success' => 'checked:border-success',
        'warning' => 'checked:border-warning',
        'danger' => 'checked:border-danger',
        'info' => 'checked:border-info',
        default => 'checked:border-primary',
    };

    $peerBoxCheckedClass = match ($focusColor) {
        'secondary' => 'peer-checked:border-secondary',
        'success' => 'peer-checked:border-success',
        'warning' => 'peer-checked:border-warning',
        'danger' => 'peer-checked:border-danger',
        'info' => 'peer-checked:border-info',
        default => 'peer-checked:border-primary',
    };

    $dotColorClass = match ($focusColor) {
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
        default => 'bg-primary',
    };

    $focusRingClass = match ($focusColor) {
        'secondary' => 'focus-visible:ring-secondary/40',
        'success' => 'focus-visible:ring-success/40',
        'warning' => 'focus-visible:ring-warning/40',
        'danger' => 'focus-visible:ring-danger/40',
        'info' => 'focus-visible:ring-info/40',
        default => 'focus-visible:ring-primary/40',
    };

    $peerFocusRingClass = match ($focusColor) {
        'secondary' => 'peer-focus-visible:ring-secondary/40',
        'success' => 'peer-focus-visible:ring-success/40',
        'warning' => 'peer-focus-visible:ring-warning/40',
        'danger' => 'peer-focus-visible:ring-danger/40',
        'info' => 'peer-focus-visible:ring-info/40',
        default => 'peer-focus-visible:ring-primary/40',
    };

    $buttonActiveClass = match ($focusColor) {
        'secondary' => 'has-[:checked]:border-secondary has-[:checked]:bg-secondary/10 has-[:checked]:text-secondary',
        'success' => 'has-[:checked]:border-success has-[:checked]:bg-success/10 has-[:checked]:text-success',
        'warning' => 'has-[:checked]:border-warning has-[:checked]:bg-warning/10 has-[:checked]:text-warning',
        'danger' => 'has-[:checked]:border-danger has-[:checked]:bg-danger/10 has-[:checked]:text-danger',
        'info' => 'has-[:checked]:border-info has-[:checked]:bg-info/10 has-[:checked]:text-info',
        default => 'has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary',
    };

    $cardActiveClass = match ($focusColor) {
        'secondary' => 'has-[:checked]:border-secondary has-[:checked]:ring-2 has-[:checked]:ring-secondary/30',
        'success' => 'has-[:checked]:border-success has-[:checked]:ring-2 has-[:checked]:ring-success/30',
        'warning' => 'has-[:checked]:border-warning has-[:checked]:ring-2 has-[:checked]:ring-warning/30',
        'danger' => 'has-[:checked]:border-danger has-[:checked]:ring-2 has-[:checked]:ring-danger/30',
        'info' => 'has-[:checked]:border-info has-[:checked]:ring-2 has-[:checked]:ring-info/30',
        default => 'has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30',
    };

    $stateTextClass = match ($resolvedState) {
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-foreground',
    };

    $nativeInputClasses = collect([
        'peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors',
        'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1',
        'disabled:cursor-not-allowed disabled:opacity-50',
        $boxSizeClass,
        $nativeCheckedClass,
        $focusRingClass,
        $isReadonly ? 'cursor-default' : null,
    ])->filter()->implode(' ');

    // Overlay no lugar do sr-only: foco em input clipado/fora da tela faz o
    // browser rolar a página (salto para o topo).
    $overlayInputClasses = 'peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed';

    $alpineConfig = [
        'readonly' => (bool) $isReadonly,
    ];
@endphp

<div
    @if ($needsAlpine)
        x-data="formRadio(@js($alpineConfig))"
    @endif
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
>
    @if ($variant === 'button')
        <label
            @class([
                'relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors',
                'has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50',
                'hover:bg-muted/60',
                $buttonActiveClass,
                $size === 'sm' ? 'rounded-md px-2.5 py-1 text-xs' : ($size === 'lg' ? 'rounded-lg px-4 py-2.5 text-base' : 'rounded-lg px-3 py-1.5 text-sm'),
                $rounded ? '!rounded-full' : null,
                $isReadonly ? 'cursor-default' : null,
            ])
        >
            <input
                x-ref="input"
                type="radio"
                id="{{ $inputId }}"
                @if ($name) name="{{ $name }}" @endif
                value="{{ $resolvedValue }}"
                @checked($isChecked)
                @disabled($isDisabled)
                @if ($needsAlpine) @click="onClick($event)" @endif
                @if ($required) required @endif
                @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                @if ($hasError) aria-invalid="true" @endif
                {{ $attributes->except(['class', 'disabled', 'readonly', 'checked'])->class([$overlayInputClasses]) }}
            />
            <span
                @class([
                    'relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors',
                    'peer-checked:[&>span]:scale-100',
                    $boxSizeClass,
                    $peerBoxCheckedClass,
                ])
                aria-hidden="true"
            >
                <span
                    @class([
                        'scale-0 rounded-full transition-transform',
                        $dotSizeClass,
                        $dotColorClass,
                    ])
                ></span>
            </span>
            @if (filled($icon))
                <i class="bi {{ $icon }} leading-none" aria-hidden="true"></i>
            @endif
            <span>
                @isset($labelSlot)
                    {{ $labelSlot }}
                @elseif (filled($label))
                    {{ $label }}
                @else
                    {{ $slot }}
                @endisset
                @if ($required)
                    <span class="text-danger" aria-hidden="true">*</span>
                @endif
            </span>
        </label>
    @elseif ($variant === 'card')
        <label
            @class([
                'relative flex w-full cursor-pointer gap-3 border border-border bg-card p-4 shadow-sm transition-colors',
                'has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50',
                'hover:bg-muted/40',
                $cardActiveClass,
                $rounded ? 'rounded-2xl' : 'rounded-xl',
                $reverse ? 'flex-row-reverse' : null,
                $isReadonly ? 'cursor-default' : null,
            ])
        >
            <input
                x-ref="input"
                type="radio"
                id="{{ $inputId }}"
                @if ($name) name="{{ $name }}" @endif
                value="{{ $resolvedValue }}"
                @checked($isChecked)
                @disabled($isDisabled)
                @if ($needsAlpine) @click="onClick($event)" @endif
                @if ($required) required @endif
                @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                @if ($hasError) aria-invalid="true" @endif
                {{ $attributes->except(['class', 'disabled', 'readonly', 'checked'])->class([$overlayInputClasses]) }}
            />

            <span
                @class([
                    'relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors',
                    'peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1',
                    'peer-checked:[&>span]:scale-100',
                    $boxSizeClass,
                    $peerBoxCheckedClass,
                    $peerFocusRingClass,
                ])
                aria-hidden="true"
            >
                <span
                    @class([
                        'scale-0 rounded-full transition-transform',
                        $dotSizeClass,
                        $dotColorClass,
                    ])
                ></span>
            </span>

            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 {{ $labelSizeClass }} font-medium {{ $stateTextClass }}">
                    @if (filled($icon))
                        <i class="bi {{ $icon }} leading-none text-muted-foreground" aria-hidden="true"></i>
                    @endif
                    <span>
                        @isset($labelSlot)
                            {{ $labelSlot }}
                        @elseif (filled($label))
                            {{ $label }}
                        @else
                            {{ $slot }}
                        @endisset
                        @if ($required)
                            <span class="text-danger" aria-hidden="true">*</span>
                        @endif
                    </span>
                </span>
                @if ($hasDescription)
                    <span id="{{ $descriptionId }}" class="mt-1 block {{ $descriptionSizeClass }} text-muted-foreground">
                        @isset($descriptionSlot)
                            {{ $descriptionSlot }}
                        @else
                            {{ $description }}
                        @endisset
                    </span>
                @endif
            </span>
        </label>
    @else
        <label
            @class([
                'flex items-start gap-2.5',
                'flex-row-reverse justify-between' => $reverse,
                $isDisabled || $isReadonly ? 'cursor-not-allowed' : 'cursor-pointer',
            ])
        >
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input
                    x-ref="input"
                    type="radio"
                    id="{{ $inputId }}"
                    @if ($name) name="{{ $name }}" @endif
                    value="{{ $resolvedValue }}"
                    @checked($isChecked)
                    @disabled($isDisabled)
                    @if ($needsAlpine) @click="onClick($event)" @endif
                    @if ($required) required @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    {{ $attributes->except(['class', 'disabled', 'readonly', 'checked'])->class([$nativeInputClasses]) }}
                />
                <span
                    @class([
                        'pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100',
                        $dotSizeClass,
                        $dotColorClass,
                    ])
                    aria-hidden="true"
                ></span>
            </span>

            @if ($hasLabel || $hasDescription)
                <span class="min-w-0 flex-1">
                    @if ($hasLabel)
                        <span
                            @class([
                                'block font-medium',
                                $labelSizeClass,
                                $stateTextClass,
                                $isDisabled ? 'opacity-60' : null,
                            ])
                        >
                            @isset($labelSlot)
                                {{ $labelSlot }}
                            @elseif (filled($label))
                                {{ $label }}
                            @else
                                {{ $slot }}
                            @endisset
                            @if ($required)
                                <span class="text-danger" aria-hidden="true">*</span>
                            @endif
                        </span>
                    @endif
                    @if ($hasDescription)
                        <span id="{{ $descriptionId }}" class="mt-0.5 block {{ $descriptionSizeClass }} text-muted-foreground">
                            @isset($descriptionSlot)
                                {{ $descriptionSlot }}
                            @else
                                {{ $description }}
                            @endisset
                        </span>
                    @endif
                </span>
            @endif
        </label>
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
