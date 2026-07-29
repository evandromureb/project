@props([
    'label' => null,
    'hint' => null,
    'error' => null,
    'size' => 'md',
    'color' => 'primary',
    'state' => null,
    'variant' => 'default',
    'icon' => 'bi-tags',
    'iconPosition' => 'start',
    'clearable' => true,
    'removable' => true,
    'floating' => false,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'rounded' => false,
    'id' => null,
    'name' => null,
    'value' => null,
    'placeholder' => 'Adicionar tag…',
    'maxTags' => null,
    'maxLength' => null,
    'minLength' => 1,
    'allowDuplicates' => false,
    'caseSensitive' => false,
    'allowCreate' => true,
    'addOnBlur' => true,
    'separators' => [','],
    'suggestions' => [],
    'counter' => false,
    'tagColor' => null,
    'tagVariant' => 'soft',
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

    if (! in_array($tagVariant, ['soft', 'solid', 'outline', 'soft-border'], true)) {
        $tagVariant = 'soft';
    }

    $initialTags = match (true) {
        is_array($value) => array_values(array_filter(array_map(
            static fn ($tag) => trim((string) $tag),
            $value,
        ), static fn ($tag) => $tag !== '')),
        is_string($value) && $value !== '' => array_values(array_filter(array_map(
            'trim',
            preg_split('/\s*,\s*/', $value) ?: [],
        ), static fn ($tag) => $tag !== '')),
        default => [],
    };

    $suggestions = is_array($suggestions)
        ? array_values(array_filter(array_map(
            static fn ($item) => trim((string) $item),
            $suggestions,
        ), static fn ($item) => $item !== ''))
        : [];

    $separators = is_array($separators) && count($separators) > 0
        ? array_values(array_map(static fn ($sep) => (string) $sep, $separators))
        : [','];

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

    $inputId = $id ?? ($name ? 'input-tags-'.$name : 'input-tags-'.str()->uuid());

    $hasLabel = filled($label) || isset($labelSlot);
    $hasHint = filled($hint) || isset($hintSlot);
    $hasError = filled($error) || isset($errorSlot);
    $hasIconStart = filled($icon) && $iconPosition === 'start';
    $hasIconEnd = filled($icon) && $iconPosition === 'end';
    $showCounter = (bool) $counter || $maxTags !== null;

    $isDisabled = $disabled || $attributes->has('disabled') || $loading;
    $isReadonly = $readonly || $attributes->has('readonly');

    $hintId = $hasHint ? $inputId.'-hint' : null;
    $errorId = $hasError ? $inputId.'-error' : null;
    $counterId = $showCounter ? $inputId.'-counter' : null;
    $listboxId = $inputId.'-suggestions';

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

    // Floating: só padding horizontal no shell (como <x-forms.input>);
    // o empurrão vertical do valor fica no miolo (pt-4), sob o label.
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

    // Altura via leading (não h-* fixo): leading-none + overflow do truncate
    // cortava descendentes (o "p" de "php"). py mínimo + leading folgado.
    $tagSizeClasses = match ($size) {
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

    $tagToneClasses = match ($tagVariant) {
        'solid' => $tagSolidClasses,
        'outline' => $tagOutlineClasses,
        'soft-border' => $tagSoftBorderClasses,
        default => $tagSoftClasses,
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-lg';
    $tagRadiusClasses = $rounded ? 'rounded-full' : 'rounded-md';

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
        'group/input relative flex w-full items-center gap-2 transition-colors',
        $variant === 'flush' ? null : $radiusClasses,
        $variantShellClasses,
        $stateBorderClasses,
        $variant === 'flush' ? null : 'focus-within:ring-2 focus-within:ring-offset-1',
        $focusRingClasses,
        $controlMinHeightClass,
        $controlTextClass,
        $sizeInputPadClasses,
        $isDisabled ? 'cursor-not-allowed opacity-60' : 'cursor-text',
    ])->filter()->implode(' ');

    $inputClasses = collect([
        'min-w-[7rem] flex-1 bg-transparent text-foreground outline-none',
        'placeholder:text-muted-foreground disabled:cursor-not-allowed',
        'read-only:cursor-default',
        // Mesmo empurrão do <x-forms.input> floating: valor abaixo do label.
        $floating ? 'placeholder-transparent py-0' : null,
    ])->filter()->implode(' ');

    // Mesmas classes do <x-forms.input> — posição só via Alpine (objeto).
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
        'tags' => $initialTags,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'maxTags' => $maxTags !== null ? (int) $maxTags : null,
        'maxLength' => $maxLength !== null ? (int) $maxLength : null,
        'minLength' => max(1, (int) $minLength),
        'allowDuplicates' => (bool) $allowDuplicates,
        'caseSensitive' => (bool) $caseSensitive,
        'allowCreate' => (bool) $allowCreate,
        'addOnBlur' => (bool) $addOnBlur,
        'separators' => $separators,
        'suggestions' => $suggestions,
        'removable' => (bool) $removable,
        'floating' => (bool) $floating,
        'labelActive' => $floatingLabelActive,
        'labelRest' => $floatingLabelRest,
    ];

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $inputAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');
@endphp

<div
    x-data="formInputTags(@js($alpineConfig))"
    x-modelable="tags"
    x-ref="root"
    @click.outside="closeIfOutside($event.target)"
    {{ $attributes->only('class')->class(['flex w-full flex-col gap-1.5']) }}
    {{ $wireAttributes }}
>
    {{-- Hidden JSON sync (Livewire via x-modelable + wire:model no root). --}}
    <input type="hidden" x-ref="hidden" value="{{ json_encode($initialTags, JSON_UNESCAPED_UNICODE) }}" />

    @if (filled($name))
        <template x-for="(tag, index) in tags" x-bind:key="'tag-hidden-' + index + '-' + tag">
            <input type="hidden" name="{{ $name }}[]" x-bind:value="tag" />
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

    <div
        x-ref="trigger"
        @click="focusInput()"
        @class([$controlClasses, 'w-full'])
    >
        @if ($hasIconStart)
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
            </span>
        @endif

        {{-- Mesmo padrão do <x-forms.input>: wrapper relative + valor com pt-4
             abaixo do label absoluto (Alpine floatingLabelClasses). --}}
        <div @class(['relative min-w-0 flex-1', $floating ? 'self-stretch' : null])>
            <div @class([
                'flex min-w-0 flex-wrap items-center gap-1.5',
                // pt-4 como o input; chips são um pouco mais altos que a linha
                // de texto, então pb-1 + min-h do shell já fecha o alinhamento.
                $floating ? 'h-full min-h-0 pt-4 pb-1' : null,
            ])>
                <template x-for="(tag, index) in tags" x-bind:key="'tag-' + index + '-' + tag">
                    <span class="inline-flex max-w-full items-center font-medium {{ $tagToneClasses }} {{ $tagSizeClasses }} {{ $tagRadiusClasses }}">
                        <span class="max-w-[12rem] truncate" x-text="tag"></span>
                        @if ($removable && ! $isDisabled && ! $isReadonly)
                            <button
                                type="button"
                                @click.stop="removeAt(index)"
                                class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100"
                                x-bind:aria-label="'Remover ' + tag"
                            >
                                <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
                            </button>
                        @endif
                    </span>
                </template>

                <input
                    x-ref="input"
                    type="text"
                    id="{{ $inputId }}"
                    x-model="draft"
                    @focus="onFocus()"
                    @blur="onBlur()"
                    @input="onInput()"
                    @keydown="onKeydown($event)"
                    @paste="onPaste($event)"
                    x-bind:placeholder="tags.length === 0 ? @js($floating ? ' ' : $placeholder) : ''"
                    x-bind:disabled="disabled || isFull"
                    @if ($isReadonly) readonly @endif
                    @if ($required) x-bind:required="tags.length === 0" @endif
                    @if ($describedBy !== '') aria-describedby="{{ $describedBy }}" @endif
                    @if ($hasError) aria-invalid="true" @endif
                    role="combobox"
                    aria-autocomplete="list"
                    x-bind:aria-expanded="showSuggestions.toString()"
                    aria-controls="{{ $listboxId }}"
                    autocomplete="off"
                    {{ $inputAttributes->class([$inputClasses]) }}
                >
            </div>

            @if ($floating && $hasLabel)
                {{-- Posição só via floatingLabelClasses (objeto Alpine).
                     Não misturar top/translate no class estático — o bind
                     por string NÃO remove classes do atributo class. --}}
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
        @elseif ($clearable)
            <button
                type="button"
                x-show="tags.length > 0"
                x-cloak
                @click.stop="clear()"
                @disabled($isDisabled || $isReadonly)
                class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                aria-label="Limpar tags"
            >
                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
            </button>
        @endif

        @if ($hasIconEnd)
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center {{ $stateTextClasses }}" aria-hidden="true">
                <i class="bi {{ $icon }} leading-none {{ $sizeIconClasses }}"></i>
            </span>
        @endif
    </div>

    @if (count($suggestions) > 0)
        <template x-teleport="body">
            <div
                x-ref="menu"
                x-show="showSuggestions"
                x-cloak
                x-bind:style="menuStyle"
                id="{{ $listboxId }}"
                role="listbox"
                class="overflow-hidden rounded-lg border border-border bg-card py-1 shadow-lg"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                <template x-for="(item, index) in filteredSuggestions" x-bind:key="'suggestion-' + index + '-' + item">
                    <button
                        type="button"
                        role="option"
                        x-bind:aria-selected="(activeIndex === index).toString()"
                        @mousedown.prevent="pickSuggestion(index)"
                        @mouseenter="activeIndex = index"
                        class="flex w-full cursor-pointer items-center px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"
                        x-bind:class="{ 'bg-muted': activeIndex === index }"
                    >
                        <span x-text="item"></span>
                    </button>
                </template>
            </div>
        </template>
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
            </div>

            @if ($showCounter)
                <p
                    id="{{ $counterId }}"
                    class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground"
                    x-text="maxTags ? (count + '/' + maxTags) : count"
                >{{ count($initialTags) }}{{ $maxTags !== null ? '/'.(int) $maxTags : '' }}</p>
            @endif
        </div>
    @endif
</div>
