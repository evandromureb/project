// Lógica do <x-ui.calendar> registrada como Alpine.data nomeado (não inline
// no x-data) — navegação de mês envolve aritmética e comparações de datas,
// que quebrariam wire:navigate se ficassem soltas num atributo x-data="{...}"
// inline. Ver reference/dropdown.md (gotcha #4) e reference/calendar.md na
// skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('calendar', (config) => ({
        viewYear: config.year,
        viewMonth: config.month,
        mode: config.mode,
        selected: [...config.selected],
        events: config.events,
        weekStart: config.weekStart,
        minDate: config.minDate,
        maxDate: config.maxDate,
        disabledDates: config.disabledDates,
        disablePast: config.disablePast,
        disableWeekends: config.disableWeekends,
        days: [],

        init() {
            this.buildDays();
        },

        get monthLabel() {
            const date = new Date(this.viewYear, this.viewMonth - 1, 1);
            const label = new Intl.DateTimeFormat('pt-BR', { month: 'long', year: 'numeric' }).format(date);

            return label.charAt(0).toUpperCase() + label.slice(1);
        },

        get weekdayLabels() {
            const base = ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sáb'];

            return this.weekStart === 'monday' ? [...base.slice(1), base[0]] : base;
        },

        get selectedValue() {
            return this.mode === 'single' ? (this.selected[0] ?? '') : this.selected.join(',');
        },

        get selectionLabel() {
            if (this.selected.length === 0) {
                return '';
            }

            const format = (iso) => {
                const [year, month, day] = iso.split('-').map(Number);
                const date = new Date(year, month - 1, day);

                return new Intl.DateTimeFormat('pt-BR', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric',
                }).format(date);
            };

            if (this.mode === 'range' && this.selected.length === 2) {
                return `${format(this.selected[0])} → ${format(this.selected[1])}`;
            }

            if (this.mode === 'multiple') {
                return this.selected.map(format).join(', ');
            }

            return format(this.selected[0]);
        },

        formatEventDay(iso) {
            const [year, month, day] = iso.split('-').map(Number);
            const date = new Date(year, month - 1, day);

            return new Intl.DateTimeFormat('pt-BR', {
                weekday: 'short',
                day: '2-digit',
                month: 'short',
            }).format(date);
        },

        prevMonth() {
            this.viewMonth--;

            if (this.viewMonth < 1) {
                this.viewMonth = 12;
                this.viewYear--;
            }

            this.buildDays();
        },

        nextMonth() {
            this.viewMonth++;

            if (this.viewMonth > 12) {
                this.viewMonth = 1;
                this.viewYear++;
            }

            this.buildDays();
        },

        goToday() {
            const today = new Date();
            this.viewYear = today.getFullYear();
            this.viewMonth = today.getMonth() + 1;
            this.buildDays();
        },

        toIso(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        },

        isDisabled(iso, date) {
            if (this.disabledDates.includes(iso)) {
                return true;
            }

            if (this.disablePast && iso < this.toIso(new Date())) {
                return true;
            }

            if (this.disableWeekends && (date.getDay() === 0 || date.getDay() === 6)) {
                return true;
            }

            if (this.minDate && iso < this.minDate) {
                return true;
            }

            if (this.maxDate && iso > this.maxDate) {
                return true;
            }

            return false;
        },

        eventsFor(iso) {
            return this.events.filter((event) => event.date === iso);
        },

        buildDays() {
            const firstOfMonth = new Date(this.viewYear, this.viewMonth - 1, 1);
            const startOffset = this.weekStart === 'monday'
                ? (firstOfMonth.getDay() + 6) % 7
                : firstOfMonth.getDay();

            const gridStart = new Date(this.viewYear, this.viewMonth - 1, 1 - startOffset);
            const todayIso = this.toIso(new Date());
            const cells = [];

            for (let i = 0; i < 42; i++) {
                const date = new Date(gridStart.getFullYear(), gridStart.getMonth(), gridStart.getDate() + i);
                const iso = this.toIso(date);

                cells.push({
                    iso,
                    day: date.getDate(),
                    weekday: date.getDay(),
                    otherMonth: date.getMonth() + 1 !== this.viewMonth,
                    isToday: iso === todayIso,
                    isSelected: this.selected.includes(iso),
                    isRangeStart: this.mode === 'range' && this.selected[0] === iso,
                    isRangeEnd: this.mode === 'range' && this.selected.length === 2 && this.selected[1] === iso,
                    isInRange: this.mode === 'range' && this.selected.length === 2 && iso > this.selected[0] && iso < this.selected[1],
                    isDisabled: this.isDisabled(iso, date),
                    events: this.eventsFor(iso),
                });
            }

            this.days = cells;
            this.trimTrailingWeek();
        },

        trimTrailingWeek() {
            if (this.days.length <= 35) {
                return;
            }

            const lastWeek = this.days.slice(-7);

            if (lastWeek.every((cell) => cell.otherMonth)) {
                this.days = this.days.slice(0, -7);
            }
        },

        selectDay(cell) {
            if (cell.isDisabled) {
                return;
            }

            if (this.mode === 'single') {
                this.selected = [cell.iso];
            } else if (this.mode === 'multiple') {
                this.selected = this.selected.includes(cell.iso)
                    ? this.selected.filter((iso) => iso !== cell.iso)
                    : [...this.selected, cell.iso].sort();
            } else if (this.mode === 'range') {
                this.selected = (this.selected.length !== 1 || cell.iso < this.selected[0])
                    ? [cell.iso]
                    : [this.selected[0], cell.iso];
            }

            this.buildDays();
            this.$dispatch('calendar-change', { selected: this.selected });
        },
    }));
});
