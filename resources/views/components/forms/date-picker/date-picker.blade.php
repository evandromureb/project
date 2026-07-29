@props([
    'year' => null,
    'month' => null,
    'mode' => 'single',
    'selected' => null,
    'weekStart' => 'sunday',
    'minDate' => null,
    'maxDate' => null,
    'disabledDates' => [],
    'disablePast' => false,
    'disableWeekends' => false,
    'size' => 'md',
    'color' => 'primary',
    'format' => 'd/m/Y',
    'placeholder' => null,
    'clearable' => true,
    'disabled' => false,
    'allowInput' => true,
    'closeOnSelect' => null,
    'direction' => 'auto',
    'align' => 'start',
    'icon' => true,
    'name' => null,
    'months' => 1,
    'presets' => false,
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts/botões/calendar
    // do app, nunca cores Tailwind fixas — ver resources/css/themes/*.css.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($mode, ['single', 'multiple', 'range'], true)) {
        $mode = 'single';
    }

    if (! in_array($weekStart, ['sunday', 'monday'], true)) {
        $weekStart = 'sunday';
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

    $months = (int) $months === 2 ? 2 : 1;
    $presets = (bool) $presets;

    // Presets pedem dois meses lado a lado (layout do modelo de referência).
    if ($presets) {
        $months = 2;
    }

    $now = now();
    $viewYear = $year ?? (int) $now->format('Y');
    $viewMonth = $month ?? (int) $now->format('n');

    // Normaliza "selected" para array de strings 'Y-m-d', independente de vir
    // como string única, array ou null — mesma técnica do <x-ui.calendar>.
    $selectedDates = match (true) {
        is_array($selected) => array_values($selected),
        is_string($selected) && $selected !== '' => [$selected],
        default => [],
    };

    $selectedClasses = match ($color) {
        'primary' => 'bg-primary text-primary-foreground shadow-sm hover:bg-primary',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary',
        'success' => 'bg-success text-success-foreground shadow-sm hover:bg-success',
        'warning' => 'bg-warning text-warning-foreground shadow-sm hover:bg-warning',
        'danger' => 'bg-danger text-danger-foreground shadow-sm hover:bg-danger',
        'info' => 'bg-info text-info-foreground shadow-sm hover:bg-info',
    };

    $rangeClasses = match ($color) {
        'primary' => 'bg-primary/15 text-foreground',
        'secondary' => 'bg-secondary/15 text-foreground',
        'success' => 'bg-success/15 text-foreground',
        'warning' => 'bg-warning/15 text-foreground',
        'danger' => 'bg-danger/15 text-foreground',
        'info' => 'bg-info/15 text-foreground',
    };

    $todayDotClasses = match ($color) {
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'danger' => 'bg-danger',
        'info' => 'bg-info',
    };

    $presetActiveClasses = match ($color) {
        'primary' => 'bg-primary text-primary-foreground shadow-sm',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-sm',
        'success' => 'bg-success text-success-foreground shadow-sm',
        'warning' => 'bg-warning text-warning-foreground shadow-sm',
        'danger' => 'bg-danger text-danger-foreground shadow-sm',
        'info' => 'bg-info text-info-foreground shadow-sm',
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

    $daySizeClasses = match ($size) {
        'sm' => 'size-8 text-xs',
        'lg' => 'size-10 text-sm',
        default => 'size-9 text-sm',
    };

    $panelWidthClasses = match (true) {
        $presets => 'w-[min(100vw-1.5rem,44rem)]',
        $months === 2 => 'w-[min(100vw-1.5rem,36rem)]',
        $size === 'sm' => 'w-72',
        $size === 'lg' => 'w-80',
        default => 'w-72',
    };

    $allowInput = $allowInput && $mode === 'single';

    $config = [
        'year' => $viewYear,
        'month' => $viewMonth,
        'mode' => $mode,
        'months' => $months,
        'presets' => $presets,
        'selected' => $selectedDates,
        'weekStart' => $weekStart,
        'minDate' => $minDate,
        'maxDate' => $maxDate,
        'disabledDates' => array_values($disabledDates),
        'disablePast' => $disablePast,
        'disableWeekends' => $disableWeekends,
        'format' => $format,
        'closeOnSelect' => $closeOnSelect,
        'direction' => $direction,
        'align' => $align,
        'disabled' => $disabled,
    ];
@endphp

<div
    x-data="datePicker(@js($config))"
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
            <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
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
            placeholder="{{ $placeholder ?? 'Selecione a data' }}"
            class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed {{ $allowInput ? 'cursor-text' : 'cursor-pointer' }}"
        >

        @if ($clearable)
            <button
                type="button"
                x-show="selected.length > 0 && !disabled"
                x-cloak
                @click.stop="clear()"
                class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                aria-label="Limpar data"
            >
                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
            </button>
        @endif

        <button
            type="button"
            @click.stop="toggle()"
            x-bind:disabled="disabled"
            class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
            aria-label="Abrir calendário"
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
            <div class="flex {{ $presets ? 'flex-col sm:flex-row' : '' }}">
                @if ($presets)
                    <div class="flex shrink-0 flex-row gap-1 overflow-x-auto border-b border-border bg-muted/30 p-2 sm:w-40 sm:flex-col sm:overflow-visible sm:border-r sm:border-b-0 sm:p-3">
                        <template x-for="preset in presetItems" :key="preset.key">
                            <button
                                type="button"
                                @click="applyPreset(preset.key)"
                                class="shrink-0 rounded-lg px-3 py-2 text-left text-xs font-medium whitespace-nowrap transition-colors sm:w-full"
                                x-bind:class="activePreset === preset.key
                                    ? '{{ $presetActiveClasses }}'
                                    : 'text-muted-foreground hover:bg-muted hover:text-foreground'"
                                x-text="preset.label"
                            ></button>
                        </template>
                    </div>
                @endif

                <div class="min-w-0 flex-1 p-4">
                    <div class="mb-3 flex items-center gap-3">
                        @if ($months === 2)
                            <div class="grid min-w-0 flex-1 grid-cols-1 gap-4 sm:grid-cols-2">
                                <span class="truncate text-sm font-semibold tracking-tight text-foreground" x-text="monthLabel"></span>
                                <span class="hidden truncate text-sm font-semibold tracking-tight text-foreground sm:block" x-text="nextMonthLabel"></span>
                            </div>
                        @else
                            <span class="min-w-0 flex-1 truncate text-sm font-semibold tracking-tight text-foreground" x-text="monthLabel"></span>
                        @endif

                        <div class="flex shrink-0 items-center gap-0.5">
                            <button
                                type="button"
                                @click="prevMonth()"
                                class="flex size-8 items-center justify-center rounded-lg text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                aria-label="Mês anterior"
                            >
                                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
                            </button>
                            <button
                                type="button"
                                @click="nextMonth()"
                                class="flex size-8 items-center justify-center rounded-lg text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                aria-label="Próximo mês"
                            >
                                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <div class="{{ $months === 2 ? 'grid grid-cols-1 gap-5 sm:grid-cols-2' : '' }}">
                        <div>
                            <div class="mb-1.5 grid grid-cols-7 gap-0.5">
                                <template x-for="(weekday, weekdayIndex) in weekdayLabels" :key="'a-' + weekdayIndex">
                                    <span class="flex h-7 items-center justify-center text-[10px] font-medium tracking-wide text-muted-foreground lowercase" x-text="weekday"></span>
                                </template>
                            </div>

                            <div class="grid grid-cols-7 gap-0.5" role="grid" aria-label="Mês atual">
                                <template x-for="day in days" :key="day.iso">
                                    <div class="relative flex items-center justify-center">
                                        <button
                                            type="button"
                                            role="gridcell"
                                            @click="selectDay(day)"
                                            x-bind:disabled="day.isDisabled"
                                            x-bind:aria-selected="day.isSelected ? 'true' : 'false'"
                                            x-bind:aria-label="day.iso"
                                            x-bind:class="{
                                                '{{ $selectedClasses }}': day.isSelected,
                                                '{{ $rangeClasses }}': day.isInRange,
                                                'rounded-l-md rounded-r-none': day.isRangeStart && selected.length === 2 && ! day.isRangeEnd,
                                                'rounded-r-md rounded-l-none': day.isRangeEnd && selected.length === 2 && ! day.isRangeStart,
                                                'rounded-none': day.isInRange,
                                                'rounded-md': (day.isSelected && ! (day.isRangeStart && selected.length === 2 && ! day.isRangeEnd) && ! (day.isRangeEnd && selected.length === 2 && ! day.isRangeStart)) || (! day.isSelected && ! day.isInRange),
                                                'text-muted-foreground/35': day.otherMonth && ! day.isSelected && ! day.isInRange,
                                                'text-foreground': ! day.otherMonth && ! day.isSelected && ! day.isInRange,
                                                'opacity-35 cursor-not-allowed hover:bg-transparent': day.isDisabled,
                                                'cursor-pointer hover:bg-muted': ! day.isDisabled && ! day.isSelected && ! day.isInRange,
                                            }"
                                            class="relative flex items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none {{ $daySizeClasses }}"
                                        >
                                            <span x-text="day.day"></span>
                                            <span
                                                x-show="day.isToday && ! day.isSelected"
                                                class="pointer-events-none absolute bottom-1 size-1 rounded-full {{ $todayDotClasses }}"
                                                aria-hidden="true"
                                            ></span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                        @if ($months === 2)
                            <div>
                                <div class="mb-3 sm:hidden">
                                    <span class="text-sm font-semibold tracking-tight text-foreground" x-text="nextMonthLabel"></span>
                                </div>

                                <div class="mb-1.5 grid grid-cols-7 gap-0.5">
                                    <template x-for="(weekday, weekdayIndex) in weekdayLabels" :key="'b-' + weekdayIndex">
                                        <span class="flex h-7 items-center justify-center text-[10px] font-medium tracking-wide text-muted-foreground lowercase" x-text="weekday"></span>
                                    </template>
                                </div>

                                <div class="grid grid-cols-7 gap-0.5" role="grid" aria-label="Próximo mês">
                                    <template x-for="day in daysNext" :key="'n-' + day.iso">
                                        <div class="relative flex items-center justify-center">
                                            <button
                                                type="button"
                                                role="gridcell"
                                                @click="selectDay(day)"
                                                x-bind:disabled="day.isDisabled"
                                                x-bind:aria-selected="day.isSelected ? 'true' : 'false'"
                                                x-bind:aria-label="day.iso"
                                                x-bind:class="{
                                                    '{{ $selectedClasses }}': day.isSelected,
                                                    '{{ $rangeClasses }}': day.isInRange,
                                                    'rounded-l-md rounded-r-none': day.isRangeStart && selected.length === 2 && ! day.isRangeEnd,
                                                    'rounded-r-md rounded-l-none': day.isRangeEnd && selected.length === 2 && ! day.isRangeStart,
                                                    'rounded-none': day.isInRange,
                                                    'rounded-md': (day.isSelected && ! (day.isRangeStart && selected.length === 2 && ! day.isRangeEnd) && ! (day.isRangeEnd && selected.length === 2 && ! day.isRangeStart)) || (! day.isSelected && ! day.isInRange),
                                                    'text-muted-foreground/35': day.otherMonth && ! day.isSelected && ! day.isInRange,
                                                    'text-foreground': ! day.otherMonth && ! day.isSelected && ! day.isInRange,
                                                    'opacity-35 cursor-not-allowed hover:bg-transparent': day.isDisabled,
                                                    'cursor-pointer hover:bg-muted': ! day.isDisabled && ! day.isSelected && ! day.isInRange,
                                                }"
                                                class="relative flex items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none {{ $daySizeClasses }}"
                                            >
                                                <span x-text="day.day"></span>
                                                <span
                                                    x-show="day.isToday && ! day.isSelected"
                                                    class="pointer-events-none absolute bottom-1 size-1 rounded-full {{ $todayDotClasses }}"
                                                    aria-hidden="true"
                                                ></span>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
