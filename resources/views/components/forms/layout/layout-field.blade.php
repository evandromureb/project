@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'required' => false,
    'id' => null,
    'name' => null,
    'for' => null,
    'span' => null,
    'auto' => false,
    'labelCols' => null,
    'controlCols' => null,
    'hideLabel' => null,
    // Modo conveniência: renderiza o input do forms sem label próprio.
    'type' => null,
    'value' => null,
    'placeholder' => null,
    'disabled' => false,
    'readonly' => false,
    'floating' => false,
])

@aware([
    'variant' => 'vertical',
    'size' => 'md',
    'labelCols' => 3,
    'controlCols' => 9,
    'labelAlign' => 'start',
    'breakpoint' => 'sm',
    'floating' => false,
    'hideLabels' => 'auto',
    'dense' => false,
    'disabled' => false,
])

@php
    $errorBag = null;

    if (isset($errors) && $errors instanceof \Illuminate\Support\ViewErrorBag) {
        $errorBag = $errors;
    } elseif (view()->shared('errors') instanceof \Illuminate\Support\ViewErrorBag) {
        $errorBag = view()->shared('errors');
    }

    if ($error === null && filled($name) && $errorBag?->has($name)) {
        $error = $errorBag->first($name);
    }

    $fieldId = $for ?? $id ?? ($name ? 'form-layout-field-'.$name : 'form-layout-field-'.str()->uuid());
    $isDisabled = (bool) $disabled || $attributes->has('disabled');
    $resolvedFloating = (bool) $floating;

    $resolvedHideLabel = match (true) {
        $hideLabel !== null => (bool) $hideLabel,
        $hideLabels === 'auto', $hideLabels === null => $variant === 'inline',
        default => filter_var($hideLabels, FILTER_VALIDATE_BOOLEAN),
    };

    $fieldLabelCols = (int) $labelCols;
    $fieldControlCols = (int) $controlCols;

    if ($fieldLabelCols < 1 || $fieldLabelCols > 6) {
        $fieldLabelCols = 3;
    }

    if ($fieldControlCols < 1 || $fieldControlCols > 11) {
        $fieldControlCols = 12 - $fieldLabelCols;
    }

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasDefaultSlot = isset($slot) && strlen(trim(preg_replace('/<!--.*?-->/s', '', (string) $slot))) > 0;
    $isConvenience = ! $hasDefaultSlot && ($type !== null || filled($name) || filled($placeholder) || $value !== null);

    $labelSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $labelPadClass = match ($size) {
        'sm' => 'pt-1.5',
        'lg' => 'pt-3',
        default => 'pt-2.5',
    };

    $labelAlignClass = match ($labelAlign) {
        'center' => 'items-center',
        'end' => 'items-end',
        default => 'items-start',
    };

    $labelColClass = match ([$breakpoint, $fieldLabelCols]) {
        ['sm', 1] => 'sm:col-span-1',
        ['sm', 2] => 'sm:col-span-2',
        ['sm', 3] => 'sm:col-span-3',
        ['sm', 4] => 'sm:col-span-4',
        ['sm', 5] => 'sm:col-span-5',
        ['sm', 6] => 'sm:col-span-6',
        ['md', 1] => 'md:col-span-1',
        ['md', 2] => 'md:col-span-2',
        ['md', 3] => 'md:col-span-3',
        ['md', 4] => 'md:col-span-4',
        ['md', 5] => 'md:col-span-5',
        ['md', 6] => 'md:col-span-6',
        ['lg', 1] => 'lg:col-span-1',
        ['lg', 2] => 'lg:col-span-2',
        ['lg', 3] => 'lg:col-span-3',
        ['lg', 4] => 'lg:col-span-4',
        ['lg', 5] => 'lg:col-span-5',
        ['lg', 6] => 'lg:col-span-6',
        ['xl', 1] => 'xl:col-span-1',
        ['xl', 2] => 'xl:col-span-2',
        ['xl', 3] => 'xl:col-span-3',
        ['xl', 4] => 'xl:col-span-4',
        ['xl', 5] => 'xl:col-span-5',
        ['xl', 6] => 'xl:col-span-6',
        default => 'sm:col-span-3',
    };

    $controlColClass = match ([$breakpoint, $fieldControlCols]) {
        ['sm', 1] => 'sm:col-span-1',
        ['sm', 2] => 'sm:col-span-2',
        ['sm', 3] => 'sm:col-span-3',
        ['sm', 4] => 'sm:col-span-4',
        ['sm', 5] => 'sm:col-span-5',
        ['sm', 6] => 'sm:col-span-6',
        ['sm', 7] => 'sm:col-span-7',
        ['sm', 8] => 'sm:col-span-8',
        ['sm', 9] => 'sm:col-span-9',
        ['sm', 10] => 'sm:col-span-10',
        ['sm', 11] => 'sm:col-span-11',
        ['md', 1] => 'md:col-span-1',
        ['md', 2] => 'md:col-span-2',
        ['md', 3] => 'md:col-span-3',
        ['md', 4] => 'md:col-span-4',
        ['md', 5] => 'md:col-span-5',
        ['md', 6] => 'md:col-span-6',
        ['md', 7] => 'md:col-span-7',
        ['md', 8] => 'md:col-span-8',
        ['md', 9] => 'md:col-span-9',
        ['md', 10] => 'md:col-span-10',
        ['md', 11] => 'md:col-span-11',
        ['lg', 1] => 'lg:col-span-1',
        ['lg', 2] => 'lg:col-span-2',
        ['lg', 3] => 'lg:col-span-3',
        ['lg', 4] => 'lg:col-span-4',
        ['lg', 5] => 'lg:col-span-5',
        ['lg', 6] => 'lg:col-span-6',
        ['lg', 7] => 'lg:col-span-7',
        ['lg', 8] => 'lg:col-span-8',
        ['lg', 9] => 'lg:col-span-9',
        ['lg', 10] => 'lg:col-span-10',
        ['lg', 11] => 'lg:col-span-11',
        ['xl', 1] => 'xl:col-span-1',
        ['xl', 2] => 'xl:col-span-2',
        ['xl', 3] => 'xl:col-span-3',
        ['xl', 4] => 'xl:col-span-4',
        ['xl', 5] => 'xl:col-span-5',
        ['xl', 6] => 'xl:col-span-6',
        ['xl', 7] => 'xl:col-span-7',
        ['xl', 8] => 'xl:col-span-8',
        ['xl', 9] => 'xl:col-span-9',
        ['xl', 10] => 'xl:col-span-10',
        ['xl', 11] => 'xl:col-span-11',
        default => 'sm:col-span-9',
    };

    $spanClass = match ((string) ($span ?? '')) {
        '1' => 'col-span-1',
        '2' => 'col-span-1 md:col-span-2',
        '3' => 'col-span-1 md:col-span-2 xl:col-span-3',
        '4' => 'col-span-1 sm:col-span-2 xl:col-span-4',
        'full' => 'col-span-full',
        'auto' => 'col-auto',
        default => null,
    };

    if ($auto) {
        $spanClass = 'w-auto shrink-0';
    }

    $wrapperClass = match ($variant) {
        'horizontal' => 'grid grid-cols-12 gap-x-4 gap-y-2 '.$labelAlignClass,
        'inline' => 'flex w-auto min-w-0 flex-col gap-1.5',
        default => 'flex w-full flex-col '.($dense ? 'gap-1' : 'gap-1.5'),
    };

    // Em floating, o label vive no input; no horizontal/inline externo some.
    $showExternalLabel = $hasLabel && ! $resolvedHideLabel && ! $resolvedFloating;
    $srOnlyLabel = $hasLabel && $resolvedHideLabel && ! $resolvedFloating;

    // O ComponentTagCompiler só aceita {{ $attributes... }} em tags x-*.
    $convenienceControlAttributes = array_filter([
        'type' => $type ?? 'text',
        'name' => $name,
        'id' => $fieldId,
        'value' => $value,
        'placeholder' => $placeholder,
        'size' => $size,
        'required' => $required ?: null,
        'disabled' => $isDisabled ?: null,
        'readonly' => $readonly ?: null,
        'floating' => $resolvedFloating ?: null,
        'label' => $resolvedFloating ? $label : null,
        'error' => $error,
        'hint' => $hasError ? null : $hint,
    ], fn ($v) => $v !== null && $v !== false);
@endphp

<div
    data-form-layout-field
    data-variant="{{ $variant }}"
    {{
        $attributes->only('class')->class([
            'form-layout-field min-w-0',
            $wrapperClass,
            $spanClass,
        ])
    }}
>
    {{--
        Modo conveniência: label[for] ↔ input#id.
        Modo slot: o controle aninhado tem id próprio — usar aria-labelledby
        no grupo em vez de for= órfão (Chrome: Incorrect use of label for).
    --}}
    @if ($showExternalLabel)
        @if ($isConvenience)
            <label
                for="{{ $fieldId }}"
                @class([
                    'font-medium text-foreground',
                    $labelSizeClass,
                    $variant === 'horizontal' ? 'col-span-12 '.$labelColClass.' '.$labelPadClass : null,
                    $required ? "after:ms-0.5 after:text-danger after:content-['*']" : null,
                ])
            >
                @isset($labelSlot)
                    {{ $labelSlot }}
                @else
                    {{ $label }}
                @endisset
            </label>
        @else
            <div
                id="{{ $fieldId }}-label"
                @class([
                    'font-medium text-foreground',
                    $labelSizeClass,
                    $variant === 'horizontal' ? 'col-span-12 '.$labelColClass.' '.$labelPadClass : null,
                    $required ? "after:ms-0.5 after:text-danger after:content-['*']" : null,
                ])
            >
                @isset($labelSlot)
                    {{ $labelSlot }}
                @else
                    {{ $label }}
                @endisset
            </div>
        @endif
    @elseif ($srOnlyLabel && ! $resolvedFloating)
        @if ($isConvenience)
            <label for="{{ $fieldId }}" class="sr-only">
                @isset($labelSlot)
                    {{ $labelSlot }}
                @else
                    {{ $label }}
                @endisset
            </label>
        @else
            <div id="{{ $fieldId }}-label" class="sr-only">
                @isset($labelSlot)
                    {{ $labelSlot }}
                @else
                    {{ $label }}
                @endisset
            </div>
        @endif
    @endif

    <div
        @if (! $isConvenience && ($showExternalLabel || ($srOnlyLabel && ! $resolvedFloating)))
            role="group"
            aria-labelledby="{{ $fieldId }}-label"
        @endif
        @class([
            'min-w-0',
            $variant === 'horizontal' ? 'col-span-12 '.$controlColClass : 'w-full',
            $variant === 'inline' ? 'w-auto' : null,
        ])
    >
        @if ($isConvenience)
            <x-forms.input {{ $attributes->except(['class', 'disabled', 'readonly'])->merge($convenienceControlAttributes) }} />
        @else
            {{ $slot }}
        @endif

        @if (! $isConvenience && $hasError)
            <p class="mt-1.5 mb-0 text-sm text-danger" role="alert">
                @isset($errorSlot)
                    {{ $errorSlot }}
                @else
                    {{ $error }}
                @endisset
            </p>
        @elseif (! $isConvenience && $hasHint)
            <p class="mt-1.5 mb-0 text-sm text-muted-foreground">
                @isset($hintSlot)
                    {{ $hintSlot }}
                @else
                    {{ $hint }}
                @endisset
            </p>
        @endif
    </div>
</div>
