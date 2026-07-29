@props([
    'default' => null,
    'color' => 'primary',
    'size' => 'md',
    'orientation' => 'horizontal',
    'variant' => 'steps',
    'markerStyle' => 'solid',
    'labelPlacement' => 'inline',
    'linear' => true,
    'clickable' => false,
    'validate' => true,
    'fade' => true,
    'card' => false,
    'showProgress' => false,
    'showHeader' => true,
    'showFooter' => true,
    'showStepIndex' => false,
    'previousText' => 'Voltar',
    'nextText' => 'Próximo',
    'finishText' => 'Concluir',
    'optionalText' => 'Opcional',
    'stepIndexText' => 'Etapa',
    'finishType' => 'submit',
    'disabled' => false,
    'loading' => false,
    'completed' => [],
    'errors' => [],
    'label' => 'Assistente',
])

@php
    // "color", "size", "orientation", "variant", "markerStyle", "fade",
    // "optionalText", "showStepIndex", "stepIndexText" e "clickable"
    // também viram consumíveis por <x-forms.wizard.wizard-step> via @aware.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($orientation, ['horizontal', 'vertical'], true)) {
        $orientation = 'horizontal';
    }

    if (! in_array($variant, ['steps', 'pills', 'progress', 'dots', 'simple'], true)) {
        $variant = 'steps';
    }

    if (! in_array($markerStyle, ['solid', 'soft', 'outline'], true)) {
        $markerStyle = 'solid';
    }

    if (! in_array($labelPlacement, ['inline', 'bottom'], true)) {
        $labelPlacement = 'inline';
    }

    // Em vertical o label já fica ao lado; "bottom" não se aplica.
    if ($orientation === 'vertical') {
        $labelPlacement = 'inline';
    }

    if (! in_array($finishType, ['submit', 'button'], true)) {
        $finishType = 'submit';
    }

    $completed = is_array($completed) ? array_values($completed) : [];
    $errors = is_array($errors) ? array_values($errors) : [];
    $isPills = $variant === 'pills';
    $isInline = $labelPlacement === 'inline' || $orientation === 'vertical' || $isPills;
    $showNav = $showHeader && $variant !== 'progress';
    $showBar = $showProgress || $variant === 'progress';

    $progressTrackClass = match ($color) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
    };

    $markerSizeClass = match ($size) {
        'sm' => 'size-8 text-xs',
        'lg' => 'size-11 text-base',
        default => 'size-9 text-sm',
    };

    $dotSizeClass = match ($size) {
        'sm' => 'size-2.5',
        'lg' => 'size-3.5',
        default => 'size-3',
    };

    $titleSizeClass = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    // Active usa a cor do token; completed usa success (padrão stepper).
    $markerActiveClass = match ($markerStyle) {
        'soft' => match ($color) {
            'primary' => 'border-transparent bg-primary/15 text-primary',
            'secondary' => 'border-transparent bg-secondary/15 text-secondary',
            'success' => 'border-transparent bg-success/15 text-success',
            'warning' => 'border-transparent bg-warning/15 text-warning',
            'danger' => 'border-transparent bg-danger/15 text-danger',
            'info' => 'border-transparent bg-info/15 text-info',
        },
        'outline' => match ($color) {
            'primary' => 'border-primary bg-card text-primary',
            'secondary' => 'border-secondary bg-card text-secondary',
            'success' => 'border-success bg-card text-success',
            'warning' => 'border-warning bg-card text-warning',
            'danger' => 'border-danger bg-card text-danger',
            'info' => 'border-info bg-card text-info',
        },
        default => match ($color) {
            'primary' => 'border-transparent bg-primary text-primary-foreground',
            'secondary' => 'border-transparent bg-secondary text-secondary-foreground',
            'success' => 'border-transparent bg-success text-success-foreground',
            'warning' => 'border-transparent bg-warning text-warning-foreground',
            'danger' => 'border-transparent bg-danger text-danger-foreground',
            'info' => 'border-transparent bg-info text-info-foreground',
        },
    };

    $markerDoneClass = match ($markerStyle) {
        'soft' => 'border-transparent bg-success/15 text-success',
        'outline' => 'border-success bg-card text-success',
        default => 'border-transparent bg-success text-success-foreground',
    };

    $markerErrorClass = 'border-transparent bg-danger text-danger-foreground';
    $markerPendingClass = 'border-transparent bg-muted text-muted-foreground';

    $lineActiveClass = 'bg-success';

    $dotActiveClass = match ($color) {
        'primary' => 'bg-primary ring-4 ring-primary/20',
        'secondary' => 'bg-secondary ring-4 ring-secondary/20',
        'success' => 'bg-success ring-4 ring-success/20',
        'warning' => 'bg-warning ring-4 ring-warning/20',
        'danger' => 'bg-danger ring-4 ring-danger/20',
        'info' => 'bg-info ring-4 ring-info/20',
    };

    $textActiveClass = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
    };

    $wireAttributes = $attributes->whereStartsWith('wire:model');
    $bag = $attributes->whereDoesntStartWith('wire:model');

    $rootClasses = match (true) {
        $card && $orientation === 'vertical' => 'flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm lg:flex-row',
        $card => 'flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm',
        $orientation === 'vertical' => 'flex w-full flex-col gap-6 lg:flex-row',
        default => 'flex w-full flex-col gap-6',
    };
@endphp

<div
    x-data="formWizard(@js([
        'default' => $default,
        'linear' => $linear,
        'clickable' => $clickable,
        'validate' => $validate,
        'disabled' => $disabled,
        'loading' => $loading,
        'optionalText' => $optionalText,
        'stepIndexText' => $stepIndexText,
        'completed' => $completed,
        'errors' => $errors,
    ]))"
    x-modelable="active"
    x-bind:data-wizard-position="position"
    {{ $wireAttributes }}
    {{ $bag->class($rootClasses) }}
    data-forms-wizard
    @keydown.alt.right.prevent="focusStep(1)"
    @keydown.alt.left.prevent="focusStep(-1)"
>
    @if ($showNav || $showBar)
        <div @class([
            'shrink-0',
            'border-b border-border px-5 py-4 sm:px-6' => $card && $orientation === 'horizontal',
            'border-b border-border px-5 py-4 lg:w-56 lg:border-b-0 lg:border-e lg:px-4 lg:py-6' => $card && $orientation === 'vertical',
            'w-full' => ! $card && $orientation === 'horizontal',
            'w-full lg:w-56' => ! $card && $orientation === 'vertical',
        ])>
            @if ($showBar)
                <div @class(['mb-4' => $showNav])>
                    <div class="mb-2 flex items-center justify-between gap-3">
                        <span class="text-xs font-medium text-muted-foreground" x-text="progressLabel"></span>
                        <span class="text-xs font-medium text-muted-foreground">
                            <span x-text="progress"></span>%
                        </span>
                    </div>
                    <div
                        class="h-1.5 overflow-hidden rounded-full bg-muted"
                        role="progressbar"
                        x-bind:aria-valuenow="progress"
                        aria-valuemin="0"
                        aria-valuemax="100"
                    >
                        <div
                            class="{{ $progressTrackClass }} h-full rounded-full transition-all duration-300 ease-out"
                            x-bind:style="'width: ' + progress + '%'"
                        ></div>
                    </div>
                </div>
            @endif

            @if ($showNav)
                <nav aria-label="{{ $label }}">
                    <ol
                        x-ref="nav"
                        @class([
                            'flex w-full',
                            'flex-row flex-wrap items-center gap-x-6 gap-y-4' => $orientation === 'horizontal' && in_array($variant, ['steps', 'pills'], true),
                            'flex-col gap-4' => $orientation === 'vertical' && in_array($variant, ['steps', 'pills'], true),
                            'flex-col gap-1' => $variant === 'simple',
                            'justify-center gap-2' => $variant === 'dots',
                        ])
                    >
                        <template x-for="(step, index) in steps" x-bind:key="step.name">
                            <li
                                @class([
                                    'relative flex min-w-0',
                                    'flex-1 items-center' => $orientation === 'horizontal' && in_array($variant, ['steps', 'pills'], true) && $isInline,
                                    'flex-1 flex-col items-center' => $orientation === 'horizontal' && $variant === 'steps' && ! $isInline,
                                    'w-full' => $orientation === 'vertical' || $variant === 'simple',
                                    'items-center' => $variant === 'dots',
                                ])
                            >
                                @if ($orientation === 'horizontal' && in_array($variant, ['steps', 'pills'], true) && $isInline)
                                    <div
                                        class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"
                                        x-show="isNotLastIndex(index)"
                                        x-cloak
                                        x-bind:class="completed.includes(step.name) ? '{{ $lineActiveClass }}' : 'bg-border'"
                                    ></div>
                                @endif

                                @if ($orientation === 'horizontal' && $variant === 'steps' && ! $isInline)
                                    <div
                                        class="absolute top-4 right-0 left-0 -z-0 hidden items-center px-[calc(50%+1.25rem)] sm:flex"
                                        x-show="isNotLastIndex(index)"
                                        x-cloak
                                    >
                                        <div
                                            class="h-px w-full bg-border transition-colors"
                                            x-bind:class="completed.includes(step.name) ? '{{ $lineActiveClass }}' : 'bg-border'"
                                        ></div>
                                    </div>
                                @endif

                                <button
                                    type="button"
                                    x-bind:disabled="disabled || step.disabled || (! clickable && ! isReachable(step.name))"
                                    x-on:click="goTo(step.name)"
                                    class="relative z-10 flex min-w-0 items-center gap-2.5 text-left transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-50"
                                    x-bind:class="{
                                        'flex-col': {{ $orientation === 'horizontal' && $variant === 'steps' && ! $isInline ? 'true' : 'false' }},
                                        'w-full rounded-md px-2 py-2 hover:bg-muted/70': {{ $orientation === 'vertical' || $variant === 'simple' ? 'true' : 'false' }},
                                        'pe-6': {{ $orientation === 'horizontal' && in_array($variant, ['steps', 'pills'], true) && $isInline ? 'true' : 'false' }},
                                    }"
                                    x-bind:aria-current="active === step.name ? 'step' : 'false'"
                                >
                                    @if ($variant === 'dots')
                                        <span
                                            class="{{ $dotSizeClass }} rounded-full transition-all"
                                            x-bind:class="{
                                                '{{ $dotActiveClass }}': statusOf(step.name) === 'active',
                                                'bg-success': statusOf(step.name) === 'done',
                                                'bg-danger': statusOf(step.name) === 'error',
                                                'bg-border': statusOf(step.name) === 'pending',
                                            }"
                                        ></span>
                                        <span class="sr-only" x-text="step.title"></span>
                                    @elseif ($variant === 'simple')
                                        <span
                                            class="{{ $markerSizeClass }} inline-flex shrink-0 items-center justify-center rounded-full border font-semibold transition-all"
                                            x-bind:class="{
                                                '{{ $markerActiveClass }}': statusOf(step.name) === 'active',
                                                '{{ $markerDoneClass }}': statusOf(step.name) === 'done',
                                                '{{ $markerErrorClass }}': statusOf(step.name) === 'error',
                                                '{{ $markerPendingClass }}': statusOf(step.name) === 'pending',
                                            }"
                                        >
                                            <span x-show="statusOf(step.name) === 'done'" x-cloak>
                                                <i class="bi bi-check-lg leading-none" aria-hidden="true"></i>
                                            </span>
                                            <span x-show="statusOf(step.name) !== 'done'" x-text="index + 1"></span>
                                        </span>
                                        <span class="min-w-0 flex-1">
                                            <span
                                                class="{{ $titleSizeClass }} block font-medium"
                                                x-bind:class="{
                                                    '{{ $textActiveClass }}': statusOf(step.name) === 'active',
                                                    'text-foreground opacity-70': statusOf(step.name) === 'done',
                                                    'text-danger': statusOf(step.name) === 'error',
                                                    'text-muted-foreground': statusOf(step.name) === 'pending',
                                                }"
                                                x-text="step.title"
                                            ></span>
                                        </span>
                                        <span
                                            class="text-[0.6875rem] text-muted-foreground"
                                            x-show="step.optional"
                                            x-text="optionalText"
                                        ></span>
                                    @else
                                        <span
                                            class="{{ $markerSizeClass }} relative inline-flex shrink-0 items-center justify-center rounded-full border font-semibold transition-all"
                                            x-bind:class="{
                                                '{{ $markerActiveClass }}': statusOf(step.name) === 'active',
                                                '{{ $markerDoneClass }}': statusOf(step.name) === 'done',
                                                '{{ $markerErrorClass }}': statusOf(step.name) === 'error',
                                                '{{ $markerPendingClass }}': statusOf(step.name) === 'pending',
                                            }"
                                        >
                                            <span x-show="statusOf(step.name) === 'done'" x-cloak>
                                                <i class="bi bi-check-lg leading-none" aria-hidden="true"></i>
                                            </span>
                                            <span x-show="statusOf(step.name) === 'error'" x-cloak>
                                                <i class="bi bi-exclamation-lg leading-none" aria-hidden="true"></i>
                                            </span>
                                            <span x-show="statusOf(step.name) !== 'done' && statusOf(step.name) !== 'error'">
                                                <i
                                                    class="bi leading-none"
                                                    x-show="step.icon"
                                                    x-cloak
                                                    x-bind:class="step.icon"
                                                    aria-hidden="true"
                                                ></i>
                                                <span x-show="! step.icon" x-text="index + 1"></span>
                                            </span>
                                        </span>

                                        <span @class([
                                            'min-w-0',
                                            'mt-2 text-center' => ! $isInline,
                                            'flex-1' => $isInline,
                                        ])>
                                            @if ($showStepIndex)
                                                <span
                                                    class="mb-0.5 block text-[0.6875rem] font-medium tracking-wide text-muted-foreground uppercase"
                                                    x-text="stepIndexText + ' ' + (index + 1)"
                                                ></span>
                                            @endif
                                            <span
                                                class="{{ $titleSizeClass }} block font-medium text-foreground"
                                                x-bind:class="{
                                                    '{{ $textActiveClass }}': statusOf(step.name) === 'active',
                                                    'opacity-70': statusOf(step.name) === 'done',
                                                    'text-danger': statusOf(step.name) === 'error',
                                                    'text-muted-foreground': statusOf(step.name) === 'pending',
                                                }"
                                                x-text="step.title"
                                            ></span>
                                            <span
                                                class="mt-0.5 block text-xs leading-snug text-muted-foreground"
                                                x-show="step.description"
                                                x-bind:class="statusOf(step.name) === 'done' ? 'opacity-70' : ''"
                                                x-text="step.description"
                                            ></span>
                                            <span
                                                class="mt-0.5 block text-[0.6875rem] text-muted-foreground"
                                                x-show="step.optional && ! step.description"
                                                x-text="optionalText"
                                            ></span>
                                        </span>
                                    @endif
                                </button>

                                @if ($orientation === 'vertical' && in_array($variant, ['steps', 'pills'], true))
                                    <div
                                        class="ms-4 w-px flex-1 bg-border"
                                        x-show="isNotLastIndex(index)"
                                        x-cloak
                                        x-bind:class="completed.includes(step.name) ? '{{ $lineActiveClass }}' : 'bg-border'"
                                        style="min-height: 0.75rem"
                                    ></div>
                                @endif
                            </li>
                        </template>
                    </ol>
                </nav>
            @endif
        </div>
    @endif

    <div @class([
        'flex min-w-0 flex-1 flex-col',
        'gap-6' => ! $card,
    ])>
        <div @class([
            'min-h-24 flex-1',
            'px-5 py-6 sm:px-6' => $card,
        ]) data-wizard-panels>
            {{ $slot }}
        </div>

        @if ($showFooter)
            <div
                @class([
                    'flex flex-wrap items-center justify-between gap-3',
                    'border-t border-border px-5 py-4 sm:px-6' => $card,
                    'border-t border-border pt-4' => ! $card,
                ])
                data-wizard-footer
            >
                @isset($actions)
                    {{ $actions }}
                @else
                    <div class="flex min-h-9 flex-wrap items-center gap-2">
                        @isset($previous)
                            {{ $previous }}
                        @else
                            <x-ui.button
                                type="button"
                                variant="outline"
                                color="secondary"
                                icon="bi-arrow-left"
                                x-show="! isFirst"
                                x-cloak
                                x-on:click="previous()"
                                x-bind:disabled="disabled || loading || isFirst"
                            >
                                {{ $previousText }}
                            </x-ui.button>
                        @endisset
                    </div>

                    <div class="flex flex-wrap items-center gap-2">
                        @isset($next)
                            {{ $next }}
                        @else
                            <x-ui.button
                                type="button"
                                :color="$color"
                                icon="bi-arrow-right"
                                icon-position="end"
                                x-show="! isLast"
                                x-cloak
                                x-on:click="next()"
                                x-bind:disabled="disabled || loading"
                            >
                                {{ $nextText }}
                            </x-ui.button>

                            <x-ui.button
                                :type="$finishType"
                                :color="$color"
                                icon="bi-check-lg"
                                :loading="$loading"
                                x-show="isLast"
                                x-cloak
                                x-on:click="finish($event)"
                                x-bind:disabled="disabled || loading"
                            >
                                {{ $finishText }}
                            </x-ui.button>
                        @endisset
                    </div>
                @endisset
            </div>
        @endif
    </div>
</div>
