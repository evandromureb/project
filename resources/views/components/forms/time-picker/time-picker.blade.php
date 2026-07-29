@props([
    'selected' => null,
    'format' => 'H:i',
    'hourStep' => 1,
    'minuteStep' => 1,
    'secondStep' => 1,
    'minTime' => null,
    'maxTime' => null,
    'disabledTimes' => [],
    'presets' => false,
    'showPreview' => true,
    'showHeaders' => true,
    'variant' => 'soft',
    'size' => 'md',
    'color' => 'primary',
    'placeholder' => null,
    'clearable' => true,
    'disabled' => false,
    'allowInput' => true,
    'closeOnSelect' => false,
    'direction' => 'auto',
    'align' => 'start',
    'icon' => true,
    'name' => null,
])

@php
    // Mesma família de tokens usada nos demais componentes do app, nunca
    // cores Tailwind fixas — ver resources/css/themes/*.css.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($direction, ['auto', 'down', 'up'], true)) {
        $direction = 'auto';
    }

    if (! in_array($align, ['auto', 'start', 'end'], true)) {
        $align = 'start';
    }

    if (! in_array($variant, ['solid', 'soft'], true)) {
        $variant = 'soft';
    }

    // O formato dirige tanto exibição quanto parse do texto digitado, mesma
    // técnica do <x-forms.date-picker> com d/m/Y — aqui os tokens são H (24h),
    // h (12h), i (minutos), s (segundos) e A (AM/PM).
    $hasSeconds = str_contains($format, 's');
    $is12h = str_contains($format, 'h');

    $hourStep = max(1, min(12, (int) $hourStep));
    $minuteStep = max(1, min(30, (int) $minuteStep));
    $secondStep = max(1, min(30, (int) $secondStep));

    $defaultPresets = ['08:00', '09:00', '12:00', '14:00', '18:00', '20:00'];

    $presetTimes = match (true) {
        $presets === true => $defaultPresets,
        is_array($presets) => array_values($presets),
        default => [],
    };

    // Normaliza "selected" (string 'H:i' ou 'H:i:s') para ['h','m','s'].
    $selectedParts = null;
    if (is_string($selected) && $selected !== '' && preg_match('/^(\d{1,2}):(\d{2})(?::(\d{2}))?$/', $selected, $matches)) {
        $selectedParts = [
            'h' => (int) $matches[1],
            'm' => (int) $matches[2],
            's' => (int) ($matches[3] ?? 0),
        ];
    }

    // Soft é o padrão visual: só o item ativo ganha destaque, sem “parede” de
    // pills coloridas nas colunas.
    $selectedClasses = match ([$variant, $color]) {
        ['solid', 'primary'] => 'bg-primary text-primary-foreground',
        ['solid', 'secondary'] => 'bg-secondary text-secondary-foreground',
        ['solid', 'success'] => 'bg-success text-success-foreground',
        ['solid', 'warning'] => 'bg-warning text-warning-foreground',
        ['solid', 'danger'] => 'bg-danger text-danger-foreground',
        ['solid', 'info'] => 'bg-info text-info-foreground',
        ['soft', 'secondary'] => 'bg-secondary/15 text-secondary',
        ['soft', 'success'] => 'bg-success/15 text-success',
        ['soft', 'warning'] => 'bg-warning/15 text-warning',
        ['soft', 'danger'] => 'bg-danger/15 text-danger',
        ['soft', 'info'] => 'bg-info/15 text-info',
        default => 'bg-primary/15 text-primary',
    };

    $presetActiveClasses = match ($color) {
        'primary' => 'bg-primary/15 text-primary ring-1 ring-primary/25',
        'secondary' => 'bg-secondary/15 text-secondary ring-1 ring-secondary/25',
        'success' => 'bg-success/15 text-success ring-1 ring-success/25',
        'warning' => 'bg-warning/15 text-warning ring-1 ring-warning/25',
        'danger' => 'bg-danger/15 text-danger ring-1 ring-danger/25',
        'info' => 'bg-info/15 text-info ring-1 ring-info/25',
    };

    $confirmButtonClasses = match ($color) {
        'primary' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/90',
        'success' => 'bg-success text-success-foreground hover:bg-success/90',
        'warning' => 'bg-warning text-warning-foreground hover:bg-warning/90',
        'danger' => 'bg-danger text-danger-foreground hover:bg-danger/90',
        'info' => 'bg-info text-info-foreground hover:bg-info/90',
    };

    $nowLinkClasses = match ($color) {
        'primary' => 'text-primary hover:bg-primary/10',
        'secondary' => 'text-secondary hover:bg-secondary/10',
        'success' => 'text-success hover:bg-success/10',
        'warning' => 'text-warning hover:bg-warning/10',
        'danger' => 'text-danger hover:bg-danger/10',
        'info' => 'text-info hover:bg-info/10',
    };

    $previewValueClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
    };

    $focusRingClasses = match ($color) {
        'primary' => 'focus-within:ring-primary',
        'secondary' => 'focus-within:ring-secondary',
        'success' => 'focus-within:ring-success',
        'warning' => 'focus-within:ring-warning',
        'danger' => 'focus-within:ring-danger',
        'info' => 'focus-within:ring-info',
    };

    $inputSizeClasses = match ($size) {
        'sm' => 'h-8 text-xs',
        'lg' => 'h-11 text-base',
        default => 'h-9.5 text-sm',
    };

    $columnItemClasses = match ($size) {
        'sm' => 'h-8 text-xs',
        'lg' => 'h-10 text-sm',
        default => 'h-9 text-sm',
    };

    $panelWidthClasses = match (true) {
        $hasSeconds && $is12h => 'w-[19rem]',
        $hasSeconds || $is12h => 'w-72',
        default => 'w-64',
    };

    $config = [
        'selected' => $selectedParts,
        'format' => $format,
        'hasSeconds' => $hasSeconds,
        'is12h' => $is12h,
        'hourStep' => $hourStep,
        'minuteStep' => $minuteStep,
        'secondStep' => $secondStep,
        'minTime' => $minTime,
        'maxTime' => $maxTime,
        'disabledTimes' => array_values($disabledTimes),
        'presets' => $presetTimes,
        'closeOnSelect' => (bool) $closeOnSelect,
        'direction' => $direction,
        'align' => $align,
        'disabled' => $disabled,
    ];
@endphp

<div
    x-data="timePicker(@js($config))"
    x-ref="trigger"
    @click.window="closeIfOutside($event.target)"
    @keydown.escape.window="close()"
    {{ $attributes->class(['relative inline-block w-full']) }}
>
    @if ($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="selectedValue">
    @endif

    <div
        class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 {{ $focusRingClasses }} {{ $inputSizeClasses }}"
        x-bind:class="disabled ? 'opacity-60 cursor-not-allowed bg-muted' : 'cursor-pointer'"
        @click="!disabled && openPanel()"
    >
        @if ($icon)
            <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
        @endif

        <input
            type="text"
            x-model="inputValue"
            x-bind:placeholder="'{{ $placeholder }}'"
            x-bind:readonly="{{ $allowInput ? 'false' : 'true' }}"
            x-bind:disabled="disabled"
            @focus="openPanel()"
            @click.stop="openPanel()"
            @keydown.enter.prevent="confirmInput()"
            @blur="confirmInput()"
            autocomplete="off"
            placeholder="{{ $placeholder ?? 'Selecione o horário' }}"
            class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed {{ $allowInput ? 'cursor-text' : 'cursor-pointer' }}"
        >

        @if ($clearable)
            <button
                type="button"
                x-show="hasValue && !disabled"
                x-cloak
                @click.stop="clear()"
                class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                aria-label="Limpar horário"
            >
                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
            </button>
        @endif

        <button
            type="button"
            @click.stop="toggle()"
            x-bind:disabled="disabled"
            class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
            aria-label="Abrir seletor de horário"
        >
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" x-bind:class="open ? 'rotate-180' : ''" aria-hidden="true"></i>
        </button>
    </div>

    <template x-teleport="body">
        <div
            x-ref="panel"
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-bind:style="panelStyle"
            class="z-[110] overflow-hidden rounded-xl border border-border bg-card shadow-xl {{ $panelWidthClasses }}"
            @click.stop
        >
            @if ($showPreview)
                <div class="border-b border-border px-4 py-3.5 text-center">
                    <p class="text-[10px] font-medium tracking-[0.14em] text-muted-foreground uppercase">Horário</p>
                    <p
                        class="mt-1 font-mono text-[1.75rem] leading-none font-semibold tracking-tight tabular-nums"
                        x-bind:class="hasValue ? '{{ $previewValueClasses }}' : 'text-muted-foreground/50'"
                        x-text="previewLabel"
                    ></p>
                </div>
            @endif

            @if (count($presetTimes) > 0)
                <div class="flex flex-wrap gap-1.5 border-b border-border px-3 py-2.5">
                    <template x-for="preset in presetItems" :key="preset">
                        <button
                            type="button"
                            @mousedown.prevent
                            @click="applyPreset(preset)"
                            x-bind:disabled="isPresetDisabled(preset)"
                            class="rounded-md px-2.5 py-1 text-[11px] font-medium transition-colors disabled:pointer-events-none disabled:opacity-35"
                            x-bind:class="activePreset === preset
                                ? '{{ $presetActiveClasses }}'
                                : 'text-muted-foreground hover:bg-muted hover:text-foreground'"
                            x-text="formatPresetLabel(preset)"
                        ></button>
                    </template>
                </div>
            @endif

            <div class="grid {{ $is12h ? ($hasSeconds ? 'grid-cols-4' : 'grid-cols-3') : ($hasSeconds ? 'grid-cols-3' : 'grid-cols-2') }}">
                <div class="flex min-w-0 flex-col border-r border-border">
                    @if ($showHeaders)
                        <div class="border-b border-border px-2 py-2 text-center text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">
                            Hora
                        </div>
                    @endif
                    <div
                        x-ref="hourColumn"
                        class="flex max-h-56 flex-col gap-0.5 overflow-y-auto overscroll-contain p-1.5 [scrollbar-width:thin]"
                        role="listbox"
                        aria-label="Hora"
                    >
                        <template x-for="hourOption in hourList" :key="'h-' + hourOption">
                            <button
                                type="button"
                                role="option"
                                @mousedown.prevent
                                @click="selectHour(hourOption)"
                                x-bind:disabled="isHourDisabled(hourOption)"
                                x-bind:data-active="isHourActive(hourOption) ? 'true' : 'false'"
                                x-bind:aria-selected="isHourActive(hourOption) ? 'true' : 'false'"
                                x-bind:class="isHourActive(hourOption)
                                    ? '{{ $selectedClasses }} font-semibold'
                                    : (isHourDisabled(hourOption)
                                        ? 'cursor-not-allowed text-muted-foreground/30'
                                        : 'text-foreground/80 hover:bg-muted hover:text-foreground')"
                                class="flex w-full shrink-0 cursor-pointer items-center justify-center rounded-md tabular-nums transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none {{ $columnItemClasses }}"
                                x-text="hourOption.toString().padStart(2, '0')"
                            ></button>
                        </template>
                    </div>
                </div>

                <div class="flex min-w-0 flex-col {{ ($hasSeconds || $is12h) ? 'border-r border-border' : '' }}">
                    @if ($showHeaders)
                        <div class="border-b border-border px-2 py-2 text-center text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">
                            Min
                        </div>
                    @endif
                    <div
                        x-ref="minuteColumn"
                        class="flex max-h-56 flex-col gap-0.5 overflow-y-auto overscroll-contain p-1.5 [scrollbar-width:thin]"
                        role="listbox"
                        aria-label="Minuto"
                    >
                        <template x-for="minuteOption in minuteList" :key="'m-' + minuteOption">
                            <button
                                type="button"
                                role="option"
                                @mousedown.prevent
                                @click="selectMinute(minuteOption)"
                                x-bind:disabled="isMinuteDisabled(minuteOption)"
                                x-bind:data-active="isMinuteActive(minuteOption) ? 'true' : 'false'"
                                x-bind:aria-selected="isMinuteActive(minuteOption) ? 'true' : 'false'"
                                x-bind:class="isMinuteActive(minuteOption)
                                    ? '{{ $selectedClasses }} font-semibold'
                                    : (isMinuteDisabled(minuteOption)
                                        ? 'cursor-not-allowed text-muted-foreground/30'
                                        : 'text-foreground/80 hover:bg-muted hover:text-foreground')"
                                class="flex w-full shrink-0 cursor-pointer items-center justify-center rounded-md tabular-nums transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none {{ $columnItemClasses }}"
                                x-text="minuteOption.toString().padStart(2, '0')"
                            ></button>
                        </template>
                    </div>
                </div>

                @if ($hasSeconds)
                    <div class="flex min-w-0 flex-col {{ $is12h ? 'border-r border-border' : '' }}">
                        @if ($showHeaders)
                            <div class="border-b border-border px-2 py-2 text-center text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">
                                Seg
                            </div>
                        @endif
                        <div
                            x-ref="secondColumn"
                            class="flex max-h-56 flex-col gap-0.5 overflow-y-auto overscroll-contain p-1.5 [scrollbar-width:thin]"
                            role="listbox"
                            aria-label="Segundo"
                        >
                            <template x-for="secondOption in secondList" :key="'s-' + secondOption">
                                <button
                                    type="button"
                                    role="option"
                                    @mousedown.prevent
                                    @click="selectSecond(secondOption)"
                                    x-bind:disabled="isSecondDisabled(secondOption)"
                                    x-bind:data-active="isSecondActive(secondOption) ? 'true' : 'false'"
                                    x-bind:aria-selected="isSecondActive(secondOption) ? 'true' : 'false'"
                                    x-bind:class="isSecondActive(secondOption)
                                        ? '{{ $selectedClasses }} font-semibold'
                                        : (isSecondDisabled(secondOption)
                                            ? 'cursor-not-allowed text-muted-foreground/30'
                                            : 'text-foreground/80 hover:bg-muted hover:text-foreground')"
                                    class="flex w-full shrink-0 cursor-pointer items-center justify-center rounded-md tabular-nums transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none {{ $columnItemClasses }}"
                                    x-text="secondOption.toString().padStart(2, '0')"
                                ></button>
                            </template>
                        </div>
                    </div>
                @endif

                @if ($is12h)
                    <div class="flex min-w-0 flex-col">
                        @if ($showHeaders)
                            <div class="border-b border-border px-2 py-2 text-center text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">
                                —
                            </div>
                        @endif
                        <div
                            x-ref="periodColumn"
                            class="flex max-h-56 flex-col gap-0.5 overflow-y-auto overscroll-contain p-1.5 [scrollbar-width:thin]"
                            role="listbox"
                            aria-label="AM/PM"
                        >
                            <template x-for="periodOption in periodList" :key="'p-' + periodOption">
                                <button
                                    type="button"
                                    role="option"
                                    @mousedown.prevent
                                    @click="selectPeriod(periodOption)"
                                    x-bind:disabled="isPeriodDisabled(periodOption)"
                                    x-bind:data-active="isPeriodActive(periodOption) ? 'true' : 'false'"
                                    x-bind:aria-selected="isPeriodActive(periodOption) ? 'true' : 'false'"
                                    x-bind:class="isPeriodActive(periodOption)
                                        ? '{{ $selectedClasses }} font-semibold'
                                        : (isPeriodDisabled(periodOption)
                                            ? 'cursor-not-allowed text-muted-foreground/30'
                                            : 'text-foreground/80 hover:bg-muted hover:text-foreground')"
                                    class="flex w-full shrink-0 cursor-pointer items-center justify-center rounded-md transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none {{ $columnItemClasses }}"
                                    x-text="periodOption"
                                ></button>
                            </template>
                        </div>
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-between gap-2 border-t border-border px-2.5 py-2">
                <button
                    type="button"
                    @click="now()"
                    class="rounded-md px-2.5 py-1.5 text-xs font-medium transition-colors {{ $nowLinkClasses }}"
                >
                    Agora
                </button>

                <button
                    type="button"
                    @click="confirm()"
                    class="rounded-md px-3.5 py-1.5 text-xs font-semibold transition-colors {{ $confirmButtonClasses }}"
                >
                    OK
                </button>
            </div>
        </div>
    </template>
</div>
