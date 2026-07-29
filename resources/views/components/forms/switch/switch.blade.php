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
    'value' => '1',
    'uncheckedValue' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'reverse' => true,
    'square' => false,
    'loading' => false,
    'withIcons' => false,
    'onIcon' => 'bi-check',
    'offIcon' => 'bi-x',
    'onLabel' => null,
    'offLabel' => null,
    'labelsInside' => false,
    'showStatus' => false,
    'icon' => null,
    'id' => null,
    'name' => null,
])

@aware([
    'size' => 'md',
    'color' => 'primary',
    'variant' => 'default',
    'disabled' => false,
    'reverse' => true,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'outlined', 'card'], true)) {
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

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');
    $isChecked = $checked || $attributes->has('checked');

    $inputId = $id ?? ($name ? 'switch-'.$name : 'switch-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot) || $slot->isNotEmpty();
    $hasDescription = filled($description) || isset($descriptionSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasOnLabel = filled($onLabel);
    $hasOffLabel = filled($offLabel);
    $hasStatusLabels = $showStatus && ($hasOnLabel || $hasOffLabel);
    $hasInsideLabels = $labelsInside && ($hasOnLabel || $hasOffLabel);
    $needsAlpine = $isReadonly || $loading;

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $descriptionId = $hasDescription ? $inputId.'-description' : null;
    $describedBy = collect([$descriptionId, $hintId, $errorId])->filter()->implode(' ');

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

    $statusSizeClass = match ($size) {
        'sm' => 'text-[0.65rem]',
        'lg' => 'text-sm',
        default => 'text-xs',
    };

    $insideLabelSizeClass = match ($size) {
        'sm' => 'text-[0.55rem]',
        'lg' => 'text-[0.7rem]',
        default => 'text-[0.6rem]',
    };

    $iconSizeClass = match ($size) {
        'sm' => 'text-[0.55rem]',
        'lg' => 'text-xs',
        default => 'text-[0.65rem]',
    };

    $trackClass = match (true) {
        $hasInsideLabels && $size === 'sm' => 'h-4 w-10',
        $hasInsideLabels && $size === 'lg' => 'h-7 w-14',
        $hasInsideLabels => 'h-5 w-12',
        $size === 'sm' => 'h-4 w-7',
        $size === 'lg' => 'h-6 w-11',
        default => 'h-5 w-9',
    };

    // peer-* só funciona em irmãos do input — o thumb é neto, então o
    // translate vai no track via peer-checked:[&>span.thumb]:translate-x-*.
    $thumbCheckedClass = match (true) {
        $hasInsideLabels && $size === 'sm' => 'peer-checked:[&>span.thumb]:translate-x-6',
        $hasInsideLabels && $size === 'lg' => 'peer-checked:[&>span.thumb]:translate-x-7',
        $hasInsideLabels => 'peer-checked:[&>span.thumb]:translate-x-7',
        $size === 'sm' => 'peer-checked:[&>span.thumb]:translate-x-3',
        $size === 'lg' => 'peer-checked:[&>span.thumb]:translate-x-5',
        default => 'peer-checked:[&>span.thumb]:translate-x-4',
    };

    $thumbClass = match ($size) {
        'sm' => 'top-0.5 left-0.5 size-3',
        'lg' => 'top-0.5 left-0.5 size-5',
        default => 'top-0.5 left-0.5 size-4',
    };

    $trackRadiusClass = $square ? 'rounded-md' : 'rounded-full';
    $thumbRadiusClass = $square ? 'rounded' : 'rounded-full';

    $switchCheckedBgClass = match ($focusColor) {
        'secondary' => 'peer-checked:bg-secondary',
        'success' => 'peer-checked:bg-success',
        'warning' => 'peer-checked:bg-warning',
        'danger' => 'peer-checked:bg-danger',
        'info' => 'peer-checked:bg-info',
        default => 'peer-checked:bg-primary',
    };

    $switchCheckedSoftBgClass = match ($focusColor) {
        'secondary' => 'peer-checked:bg-secondary/25',
        'success' => 'peer-checked:bg-success/25',
        'warning' => 'peer-checked:bg-warning/25',
        'danger' => 'peer-checked:bg-danger/25',
        'info' => 'peer-checked:bg-info/25',
        default => 'peer-checked:bg-primary/25',
    };

    $switchCheckedBorderClass = match ($focusColor) {
        'secondary' => 'peer-checked:border-secondary peer-checked:bg-secondary',
        'success' => 'peer-checked:border-success peer-checked:bg-success',
        'warning' => 'peer-checked:border-warning peer-checked:bg-warning',
        'danger' => 'peer-checked:border-danger peer-checked:bg-danger',
        'info' => 'peer-checked:border-info peer-checked:bg-info',
        default => 'peer-checked:border-primary peer-checked:bg-primary',
    };

    // Thumb do outlined precisa de borda no off (branco sumia no fundo);
    // no on, a borda some via peer no track.
    $outlinedThumbPeerClass = 'peer-checked:[&>span.thumb]:border-transparent peer-checked:[&>span.thumb]:bg-white';

    $softThumbCheckedClass = match ($focusColor) {
        'secondary' => 'peer-checked:[&>span.thumb]:bg-secondary',
        'success' => 'peer-checked:[&>span.thumb]:bg-success',
        'warning' => 'peer-checked:[&>span.thumb]:bg-warning',
        'danger' => 'peer-checked:[&>span.thumb]:bg-danger',
        'info' => 'peer-checked:[&>span.thumb]:bg-info',
        default => 'peer-checked:[&>span.thumb]:bg-primary',
    };

    $peerFocusRingClass = match ($focusColor) {
        'secondary' => 'peer-focus-visible:ring-secondary/40',
        'success' => 'peer-focus-visible:ring-success/40',
        'warning' => 'peer-focus-visible:ring-warning/40',
        'danger' => 'peer-focus-visible:ring-danger/40',
        'info' => 'peer-focus-visible:ring-info/40',
        default => 'peer-focus-visible:ring-primary/40',
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

    $trackToneClass = match ($variant) {
        'soft' => collect([
            'bg-muted/80',
            $switchCheckedSoftBgClass,
            $softThumbCheckedClass,
        ])->implode(' '),
        'outlined' => collect([
            'border border-border bg-transparent',
            $switchCheckedBorderClass,
            $outlinedThumbPeerClass,
        ])->implode(' '),
        default => collect([
            'bg-muted',
            $switchCheckedBgClass,
        ])->implode(' '),
    };

    $thumbToneClass = match ($variant) {
        'soft' => 'bg-white shadow-sm dark:bg-card',
        'outlined' => 'border border-border bg-card shadow-sm',
        default => 'bg-white shadow-sm',
    };

    // Overlay no lugar do sr-only: foco em input clipado/fora da tela faz o
    // browser rolar a página (salto para o topo).
    $overlayInputClasses = collect([
        'peer absolute inset-0 z-10 m-0 size-full opacity-0',
        $isDisabled || $isReadonly || $loading ? 'cursor-not-allowed' : 'cursor-pointer',
    ])->implode(' ');

    $alpineConfig = [
        'readonly' => (bool) $isReadonly,
        'loading' => (bool) $loading,
    ];

    $controlWrapperClasses = 'relative mt-0.5 inline-flex shrink-0 items-center gap-2';

    $trackClasses = collect([
        'relative block transition-colors',
        'peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1',
        'peer-disabled:opacity-50',
        // Ícones / labels internos são netos do peer — ativamos via [&_.switch-*].
        'peer-checked:[&_.switch-on]:opacity-100',
        'peer-checked:[&_.switch-off]:opacity-0',
        $trackClass,
        $trackRadiusClass,
        $trackToneClass,
        $thumbCheckedClass,
        $peerFocusRingClass,
    ])->implode(' ');
@endphp

<div
    @if ($needsAlpine)
        x-data="formSwitch(@js($alpineConfig))"
    @endif
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
>
    @if (filled($name) && $uncheckedValue !== null)
        <input type="hidden" name="{{ $name }}" value="{{ $uncheckedValue }}" />
    @endif

    @if ($variant === 'card')
        <label
            @class([
                'relative flex w-full gap-3 border border-border bg-card p-4 shadow-sm transition-colors',
                'has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50',
                'hover:bg-muted/40',
                $cardActiveClass,
                $square ? 'rounded-xl' : 'rounded-2xl',
                $reverse ? 'flex-row-reverse' : null,
                $isDisabled || $isReadonly || $loading ? 'cursor-not-allowed' : 'cursor-pointer',
            ])
        >
            <span @class([$controlWrapperClasses])>
                <input
                    x-ref="input"
                    type="checkbox"
                    id="{{ $inputId }}"
                    role="switch"
                    @if ($name) name="{{ $name }}" @endif
                    value="{{ $value }}"
                    @checked($isChecked)
                    @disabled($isDisabled)
                    @if ($needsAlpine) @click="onClick($event)" @endif
                    @if ($required) required @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    {{ $attributes->except(['class', 'disabled', 'readonly', 'checked'])->class([$overlayInputClasses]) }}
                />
                <span @class([$trackClasses]) aria-hidden="true">
                    @if ($hasInsideLabels)
                        <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1.5 font-bold uppercase tracking-wide {{ $insideLabelSizeClass }}">
                            @if ($hasOnLabel)
                                <span class="switch-on text-white/90 opacity-0 transition-opacity">{{ $onLabel }}</span>
                            @else
                                <span></span>
                            @endif
                            @if ($hasOffLabel)
                                <span class="switch-off ms-auto text-muted-foreground transition-opacity">{{ $offLabel }}</span>
                            @endif
                        </span>
                    @elseif ($withIcons)
                        <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1">
                            <i class="switch-on bi {{ $onIcon }} text-white/90 opacity-0 transition-opacity {{ $iconSizeClass }}"></i>
                            <i class="switch-off bi {{ $offIcon }} ms-auto text-muted-foreground transition-opacity {{ $iconSizeClass }}"></i>
                        </span>
                    @endif

                    <span
                        @class([
                            'thumb absolute flex items-center justify-center transition-transform',
                            $thumbToneClass,
                            $thumbClass,
                            $thumbRadiusClass,
                        ])
                    >
                        @if ($loading)
                            <x-ui.spinner size="xs" color="secondary" />
                        @endif
                    </span>
                </span>

                @if ($hasStatusLabels)
                    <span class="{{ $statusSizeClass }} font-medium text-muted-foreground tabular-nums">
                        @if ($hasOffLabel)
                            <span class="peer-checked:hidden">{{ $offLabel }}</span>
                        @endif
                        @if ($hasOnLabel)
                            <span @class(['hidden peer-checked:inline' => $hasOffLabel])>{{ $onLabel }}</span>
                        @endif
                    </span>
                @endif
            </span>

            <span class="min-w-0 flex-1">
                @if ($hasLabel)
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
                @endif
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
                'flex items-start gap-3',
                'flex-row-reverse justify-between' => $reverse,
                $isDisabled || $isReadonly || $loading ? 'cursor-not-allowed' : 'cursor-pointer',
            ])
        >
            <span @class([$controlWrapperClasses])>
                <input
                    x-ref="input"
                    type="checkbox"
                    id="{{ $inputId }}"
                    role="switch"
                    @if ($name) name="{{ $name }}" @endif
                    value="{{ $value }}"
                    @checked($isChecked)
                    @disabled($isDisabled)
                    @if ($needsAlpine) @click="onClick($event)" @endif
                    @if ($required) required @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    {{ $attributes->except(['class', 'disabled', 'readonly', 'checked'])->class([$overlayInputClasses]) }}
                />
                <span @class([$trackClasses]) aria-hidden="true">
                    @if ($hasInsideLabels)
                        <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1.5 font-bold uppercase tracking-wide {{ $insideLabelSizeClass }}">
                            @if ($hasOnLabel)
                                <span class="switch-on text-white/90 opacity-0 transition-opacity">{{ $onLabel }}</span>
                            @else
                                <span></span>
                            @endif
                            @if ($hasOffLabel)
                                <span class="switch-off ms-auto text-muted-foreground transition-opacity">{{ $offLabel }}</span>
                            @endif
                        </span>
                    @elseif ($withIcons)
                        <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1">
                            <i class="switch-on bi {{ $onIcon }} text-white/90 opacity-0 transition-opacity {{ $iconSizeClass }}"></i>
                            <i class="switch-off bi {{ $offIcon }} ms-auto text-muted-foreground transition-opacity {{ $iconSizeClass }}"></i>
                        </span>
                    @endif

                    <span
                        @class([
                            'thumb absolute flex items-center justify-center transition-transform',
                            $thumbToneClass,
                            $thumbClass,
                            $thumbRadiusClass,
                        ])
                    >
                        @if ($loading)
                            <x-ui.spinner size="xs" color="secondary" />
                        @endif
                    </span>
                </span>

                @if ($hasStatusLabels)
                    <span class="{{ $statusSizeClass }} font-medium text-muted-foreground tabular-nums">
                        @if ($hasOffLabel)
                            <span class="peer-checked:hidden">{{ $offLabel }}</span>
                        @endif
                        @if ($hasOnLabel)
                            <span @class(['hidden peer-checked:inline' => $hasOffLabel])>{{ $onLabel }}</span>
                        @endif
                    </span>
                @endif
            </span>

            @if ($hasLabel || $hasDescription)
                <span class="min-w-0 flex-1">
                    @if ($hasLabel)
                        <span
                            @class([
                                'flex items-center gap-2 font-medium',
                                $labelSizeClass,
                                $stateTextClass,
                                $isDisabled ? 'opacity-60' : null,
                            ])
                        >
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
