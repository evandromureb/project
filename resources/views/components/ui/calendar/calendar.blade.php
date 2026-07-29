@props([
    'year' => null,
    'month' => null,
    'mode' => 'single',
    'selected' => null,
    'events' => [],
    'weekStart' => 'sunday',
    'minDate' => null,
    'maxDate' => null,
    'disabledDates' => [],
    'disablePast' => false,
    'disableWeekends' => false,
    'size' => 'md',
    'color' => 'primary',
    'showNavigation' => true,
    'showToday' => true,
    'showWeekdays' => true,
    'showSelection' => false,
    'eventsDisplay' => 'dot',
    'name' => null,
])

@php
    // Mesma família de tokens usada nos badges/avatares/alerts/botões do app,
    // nunca cores Tailwind fixas — ver resources/css/themes/*.css.
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

    if (! in_array($eventsDisplay, ['dot', 'list', 'badge'], true)) {
        $eventsDisplay = 'dot';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    $now = now();
    $viewYear = $year ?? (int) $now->format('Y');
    $viewMonth = $month ?? (int) $now->format('n');

    // Normaliza "selected" para array de strings 'Y-m-d', independente de vir
    // como string única, array ou null.
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

    $todayClasses = match ($color) {
        'primary' => 'ring-1 ring-inset ring-primary text-primary font-semibold',
        'secondary' => 'ring-1 ring-inset ring-secondary text-secondary font-semibold',
        'success' => 'ring-1 ring-inset ring-success text-success font-semibold',
        'warning' => 'ring-1 ring-inset ring-warning text-warning font-semibold',
        'danger' => 'ring-1 ring-inset ring-danger text-danger font-semibold',
        'info' => 'ring-1 ring-inset ring-info text-info font-semibold',
    };

    $todayLinkClasses = match ($color) {
        'primary' => 'text-primary hover:bg-primary/10',
        'secondary' => 'text-secondary hover:bg-secondary/10',
        'success' => 'text-success hover:bg-success/10',
        'warning' => 'text-warning hover:bg-warning/10',
        'danger' => 'text-danger hover:bg-danger/10',
        'info' => 'text-info hover:bg-info/10',
    };

    $sizeClasses = match ($size) {
        'sm' => 'size-8 text-xs',
        'lg' => 'size-11 text-sm sm:size-12 sm:text-base',
        default => 'size-9 text-sm sm:size-10',
    };

    $config = [
        'year' => $viewYear,
        'month' => $viewMonth,
        'mode' => $mode,
        'selected' => $selectedDates,
        'events' => array_values($events),
        'weekStart' => $weekStart,
        'minDate' => $minDate,
        'maxDate' => $maxDate,
        'disabledDates' => array_values($disabledDates),
        'disablePast' => $disablePast,
        'disableWeekends' => $disableWeekends,
    ];
@endphp

<div
    x-data="calendar(@js($config))"
    {{ $attributes->class(['inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm']) }}
>
    @if ($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="selectedValue">
    @endif

    @if ($showNavigation)
        <div class="mb-3 flex items-center justify-between gap-2">
            <button
                type="button"
                @click="prevMonth()"
                class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                aria-label="Mês anterior"
            >
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>

            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground" x-text="monthLabel"></span>
                @if ($showToday)
                    <button
                        type="button"
                        @click="goToday()"
                        class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors {{ $todayLinkClasses }}"
                    >
                        Hoje
                    </button>
                @endif
            </div>

            <button
                type="button"
                @click="nextMonth()"
                class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                aria-label="Próximo mês"
            >
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    @else
        <div class="mb-3 text-center">
            <span class="text-sm font-semibold tracking-tight text-foreground" x-text="monthLabel"></span>
        </div>
    @endif
    @if ($showWeekdays)
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <template x-for="weekday in weekdayLabels" :key="weekday">
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase" x-text="weekday"></span>
            </template>
        </div>
    @endif

    <div class="grid grid-cols-7 gap-0.5" role="grid">
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
                        '{{ $todayClasses }}': day.isToday && ! day.isSelected && ! day.isInRange,
                        'text-muted-foreground/35': day.otherMonth && ! day.isSelected && ! day.isInRange,
                        'text-foreground': ! day.otherMonth && ! day.isSelected && ! day.isToday && ! day.isInRange,
                        'opacity-35 cursor-not-allowed hover:bg-transparent': day.isDisabled,
                        'cursor-pointer hover:bg-muted': ! day.isDisabled && ! day.isSelected && ! day.isInRange,
                    }"
                    class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none {{ $sizeClasses }}"
                >
                    <span x-text="day.day"></span>

                    @if ($eventsDisplay === 'dot')
                        <span class="absolute bottom-1 flex h-1 items-center justify-center gap-0.5">
                            <template x-for="event in day.events.slice(0, 3)" :key="event.date + event.title">
                                <span
                                    class="size-1 rounded-full"
                                    x-bind:class="day.isSelected ? 'bg-current opacity-80' : {
                                        'bg-primary': event.color === 'primary' || ! event.color,
                                        'bg-secondary': event.color === 'secondary',
                                        'bg-success': event.color === 'success',
                                        'bg-warning': event.color === 'warning',
                                        'bg-danger': event.color === 'danger',
                                        'bg-info': event.color === 'info',
                                    }"
                                ></span>
                            </template>
                        </span>
                    @endif
                </button>

                @if ($eventsDisplay === 'badge')
                    <template x-if="day.events.length > 0">
                        <span
                            class="pointer-events-none absolute -top-0.5 -right-0.5 flex size-3.5 items-center justify-center rounded-full bg-danger text-[9px] font-semibold text-danger-foreground shadow-sm"
                            x-text="day.events.length"
                        ></span>
                    </template>
                @endif
            </div>
        </template>
    </div>

    @if ($eventsDisplay === 'list')
        <template x-if="days.some((day) => day.events.length > 0 && ! day.otherMonth)">
            <div class="mt-4 flex flex-col gap-2 border-t border-border pt-3">
                <p class="text-[11px] font-semibold tracking-wide text-muted-foreground uppercase">Eventos do mês</p>
                <template x-for="day in days.filter((d) => d.events.length > 0 && ! d.otherMonth)" :key="day.iso">
                    <div class="flex items-start gap-2.5">
                        <span class="mt-0.5 w-[4.5rem] shrink-0 text-[11px] font-medium text-muted-foreground capitalize" x-text="formatEventDay(day.iso)"></span>
                        <div class="flex min-w-0 flex-1 flex-col gap-1">
                            <template x-for="event in day.events" :key="event.date + event.title">
                                <div class="flex items-center gap-2 text-xs text-foreground">
                                    <span
                                        class="size-1.5 shrink-0 rounded-full"
                                        x-bind:class="{
                                            'bg-primary': event.color === 'primary' || ! event.color,
                                            'bg-secondary': event.color === 'secondary',
                                            'bg-success': event.color === 'success',
                                            'bg-warning': event.color === 'warning',
                                            'bg-danger': event.color === 'danger',
                                            'bg-info': event.color === 'info',
                                        }"
                                    ></span>
                                    <span class="truncate" x-text="event.title"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    @endif

    @if ($showSelection)
        <template x-if="selected.length > 0">
            <div class="mt-3 flex items-center gap-2 rounded-md border border-border bg-muted/40 px-3 py-2 text-xs">
                <i class="bi bi-calendar-check text-sm text-muted-foreground" aria-hidden="true"></i>
                <span class="min-w-0 truncate font-medium text-foreground" x-text="selectionLabel"></span>
            </div>
        </template>
    @endif
</div>
