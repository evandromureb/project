// Lógica do <x-forms.date-picker> registrada como Alpine.data nomeado (não
// inline no x-data) — pelo mesmo motivo do <x-ui.calendar>/<x-ui.dropdown>:
// aritmética/comparações de data soltas num atributo x-data="{...}" quebram
// wire:navigate. Ver reference/dropdown.md (gotcha #4) e
// reference/forms-date-picker.md na skill ui-components.
//
// O grid de dias reaproveita a mesma lógica de resources/js/calendar.js, mas
// mora aqui (não é importado de lá) porque o date-picker precisa da MESMA
// instância Alpine controlando input, painel flutuante e grid ao mesmo
// tempo — compor com um <x-ui.calendar> aninhado exigiria alcançar o escopo
// Alpine de outro componente (Alpine.$data), o que é mais frágil do que um
// componente autocontido, o padrão já usado por tooltip/popover/dropdown.
document.addEventListener('alpine:init', () => {
    Alpine.data('datePicker', (config) => ({
        open: false,
        disabled: config.disabled,
        viewYear: config.year,
        viewMonth: config.month,
        mode: config.mode,
        months: config.months,
        presetsEnabled: config.presets,
        selected: [...config.selected],
        weekStart: config.weekStart,
        minDate: config.minDate,
        maxDate: config.maxDate,
        disabledDates: config.disabledDates,
        disablePast: config.disablePast,
        disableWeekends: config.disableWeekends,
        format: config.format,
        closeOnSelect: config.closeOnSelect,
        direction: config.direction,
        align: config.align,
        days: [],
        daysNext: [],
        panelStyle: '',
        inputValue: '',
        activePreset: 'custom',

        init() {
            this.buildDays();
            this.inputValue = this.formatSelection();
            this.syncActivePreset();
        },

        get monthLabel() {
            return this.formatMonthLabel(this.viewYear, this.viewMonth);
        },

        get nextMonthLabel() {
            const { year, month } = this.offsetMonth(this.viewYear, this.viewMonth, 1);

            return this.formatMonthLabel(year, month);
        },

        get weekdayLabels() {
            // Abreviações de 2 letras no estilo do painel dual (do se te…).
            const base = ['do', 'se', 'te', 'qu', 'qu', 'se', 'sá'];

            return this.weekStart === 'monday' ? [...base.slice(1), base[0]] : base;
        },

        get selectedValue() {
            return this.mode === 'single' ? (this.selected[0] ?? '') : this.selected.join(',');
        },

        get presetItems() {
            return [
                { key: 'today', label: 'Hoje' },
                { key: 'yesterday', label: 'Ontem' },
                { key: 'this_week', label: 'Esta semana' },
                { key: 'last_7', label: 'Últimos 7 dias' },
                { key: 'this_month', label: 'Este mês' },
                { key: 'ytd', label: 'Ano até agora' },
                { key: 'all', label: 'Todo o período' },
                { key: 'custom', label: 'Personalizado' },
            ];
        },

        formatMonthLabel(year, month) {
            const date = new Date(year, month - 1, 1);
            const label = new Intl.DateTimeFormat('pt-BR', { month: 'long', year: 'numeric' }).format(date);

            return label.charAt(0).toUpperCase() + label.slice(1);
        },

        offsetMonth(year, month, delta) {
            const date = new Date(year, month - 1 + delta, 1);

            return { year: date.getFullYear(), month: date.getMonth() + 1 };
        },

        toggle() {
            if (this.disabled) {
                return;
            }

            if (this.open) {
                this.close();
                return;
            }

            this.openPanel();
        },

        openPanel() {
            if (this.disabled || this.open) {
                return;
            }

            this.open = true;
            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        close() {
            this.open = false;
        },

        closeIfOutside(target) {
            if (
                this.open
                && !this.$refs.trigger.contains(target)
                && (!this.$refs.panel || !this.$refs.panel.contains(target))
            ) {
                this.close();
            }
        },

        updatePosition() {
            const rect = this.$refs.trigger.getBoundingClientRect();
            const panel = this.$refs.panel.getBoundingClientRect();
            const gap = 8;
            const vh = window.innerHeight;
            const vw = window.innerWidth;

            let direction = this.direction;
            if (direction === 'auto') {
                const spaceBelow = vh - rect.bottom;
                const spaceAbove = rect.top;
                direction = spaceBelow < panel.height + gap && spaceAbove > spaceBelow ? 'up' : 'down';
            }

            let align = this.align;
            if (align === 'auto') {
                align = vw - rect.left < panel.width ? 'end' : 'start';
            }

            let style = 'position:fixed;';
            style += direction === 'up' ? `bottom:${vh - rect.top + gap}px;` : `top:${rect.bottom + gap}px;`;
            style += align === 'end' ? `right:${vw - rect.right}px;` : `left:${rect.left}px;`;

            this.panelStyle = style;
        },

        prevMonth() {
            const previous = this.offsetMonth(this.viewYear, this.viewMonth, -1);
            this.viewYear = previous.year;
            this.viewMonth = previous.month;
            this.buildDays();
        },

        nextMonth() {
            const next = this.offsetMonth(this.viewYear, this.viewMonth, 1);
            this.viewYear = next.year;
            this.viewMonth = next.month;
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

        addDays(iso, amount) {
            const [year, month, day] = iso.split('-').map(Number);
            const date = new Date(year, month - 1, day + amount);

            return this.toIso(date);
        },

        startOfWeek(iso) {
            const [year, month, day] = iso.split('-').map(Number);
            const date = new Date(year, month - 1, day);
            const weekday = date.getDay();
            const offset = this.weekStart === 'monday'
                ? (weekday + 6) % 7
                : weekday;

            return this.addDays(iso, -offset);
        },

        clampIso(iso) {
            if (this.minDate && iso < this.minDate) {
                return this.minDate;
            }

            if (this.maxDate && iso > this.maxDate) {
                return this.maxDate;
            }

            return iso;
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

        computeDays(year, month) {
            const firstOfMonth = new Date(year, month - 1, 1);
            const startOffset = this.weekStart === 'monday'
                ? (firstOfMonth.getDay() + 6) % 7
                : firstOfMonth.getDay();

            const gridStart = new Date(year, month - 1, 1 - startOffset);
            const todayIso = this.toIso(new Date());
            const cells = [];

            for (let i = 0; i < 42; i++) {
                const date = new Date(gridStart.getFullYear(), gridStart.getMonth(), gridStart.getDate() + i);
                const iso = this.toIso(date);

                cells.push({
                    iso,
                    day: date.getDate(),
                    otherMonth: date.getMonth() + 1 !== month,
                    isToday: iso === todayIso,
                    isSelected: this.selected.includes(iso),
                    isRangeStart: this.mode === 'range' && this.selected[0] === iso,
                    isRangeEnd: this.mode === 'range' && this.selected.length === 2 && this.selected[1] === iso,
                    isInRange: this.mode === 'range' && this.selected.length === 2 && iso > this.selected[0] && iso < this.selected[1],
                    isDisabled: this.isDisabled(iso, date),
                });
            }

            return this.trimTrailingWeek(cells);
        },

        trimTrailingWeek(days) {
            if (days.length <= 35) {
                return days;
            }

            const lastWeek = days.slice(-7);

            if (lastWeek.every((cell) => cell.otherMonth)) {
                return days.slice(0, -7);
            }

            return days;
        },

        buildDays() {
            this.days = this.computeDays(this.viewYear, this.viewMonth);

            if (this.months === 2) {
                const next = this.offsetMonth(this.viewYear, this.viewMonth, 1);
                this.daysNext = this.computeDays(next.year, next.month);
            } else {
                this.daysNext = [];
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

            this.activePreset = 'custom';
            this.buildDays();
            this.inputValue = this.formatSelection();
            this.$dispatch('date-picker-change', { selected: this.selected });

            const shouldClose = this.closeOnSelect === null ? this.mode !== 'multiple' : this.closeOnSelect;

            if (shouldClose && (this.mode !== 'range' || this.selected.length === 2)) {
                this.close();
            }
        },

        applyPreset(key) {
            if (key === 'custom') {
                this.activePreset = 'custom';
                return;
            }

            const today = this.toIso(new Date());
            let start = today;
            let end = today;

            if (key === 'yesterday') {
                start = this.addDays(today, -1);
                end = start;
            } else if (key === 'this_week') {
                start = this.startOfWeek(today);
                end = today;
            } else if (key === 'last_7') {
                start = this.addDays(today, -6);
                end = today;
            } else if (key === 'this_month') {
                const now = new Date();
                start = this.toIso(new Date(now.getFullYear(), now.getMonth(), 1));
                end = today;
            } else if (key === 'ytd') {
                const now = new Date();
                start = this.toIso(new Date(now.getFullYear(), 0, 1));
                end = today;
            } else if (key === 'all') {
                start = this.minDate ?? this.toIso(new Date(new Date().getFullYear() - 10, 0, 1));
                end = this.maxDate ?? today;
            }

            start = this.clampIso(start);
            end = this.clampIso(end);

            if (start > end) {
                [start, end] = [end, start];
            }

            this.selected = this.mode === 'range' ? [start, end] : [start];

            const [year, month] = start.split('-').map(Number);
            this.viewYear = year;
            this.viewMonth = month;
            this.activePreset = key;
            this.buildDays();
            this.inputValue = this.formatSelection();
            this.$dispatch('date-picker-change', { selected: this.selected });

            const shouldClose = this.closeOnSelect === null ? this.mode !== 'multiple' : this.closeOnSelect;

            if (shouldClose && (this.mode !== 'range' || this.selected.length === 2)) {
                this.close();
            }
        },

        syncActivePreset() {
            if (! this.presetsEnabled || this.selected.length === 0) {
                this.activePreset = this.selected.length === 0 ? 'custom' : 'custom';
                return;
            }

            const today = this.toIso(new Date());
            const start = this.selected[0];
            const end = this.selected[this.selected.length - 1];

            const matches = {
                today: start === today && end === today,
                yesterday: start === this.addDays(today, -1) && end === this.addDays(today, -1),
                this_week: start === this.startOfWeek(today) && end === today,
                last_7: start === this.addDays(today, -6) && end === today,
                this_month: start === this.toIso(new Date(new Date().getFullYear(), new Date().getMonth(), 1)) && end === today,
                ytd: start === this.toIso(new Date(new Date().getFullYear(), 0, 1)) && end === today,
            };

            this.activePreset = Object.keys(matches).find((key) => matches[key]) ?? 'custom';
        },

        clear() {
            this.selected = [];
            this.inputValue = '';
            this.activePreset = 'custom';
            this.buildDays();
            this.$dispatch('date-picker-change', { selected: this.selected });
        },

        formatDate(iso) {
            const [year, month, day] = iso.split('-');

            return this.format
                .replace('Y', year)
                .replace('m', month)
                .replace('d', day);
        },

        formatSelection() {
            if (this.selected.length === 0) {
                return '';
            }

            if (this.mode === 'range') {
                return this.selected.length === 2
                    ? `${this.formatDate(this.selected[0])} - ${this.formatDate(this.selected[1])}`
                    : this.formatDate(this.selected[0]);
            }

            if (this.mode === 'multiple') {
                return this.selected.map((iso) => this.formatDate(iso)).join(', ');
            }

            return this.formatDate(this.selected[0]);
        },

        // Interpreta o texto digitado usando as posições dos tokens d/m/Y no
        // "format" configurado (ex.: 'd/m/Y' → dia, mês, ano nessa ordem),
        // sem depender de libs de datas. Só é usado no modo "single".
        parseInput(value) {
            const separators = this.format.match(/[^dmY]+/)?.[0] ?? '/';
            const tokens = this.format.split(new RegExp(`[${separators}]`)).filter(Boolean);
            const parts = value.split(new RegExp(`[${separators}]`)).filter(Boolean);

            if (parts.length !== tokens.length) {
                return null;
            }

            const map = {};
            tokens.forEach((token, index) => {
                map[token] = parts[index];
            });

            const day = parseInt(map.d, 10);
            const month = parseInt(map.m, 10);
            const year = parseInt(map.Y, 10);

            if (! day || ! month || ! year) {
                return null;
            }

            const date = new Date(year, month - 1, day);

            if (date.getFullYear() !== year || date.getMonth() !== month - 1 || date.getDate() !== day) {
                return null;
            }

            return this.toIso(date);
        },

        confirmInput() {
            if (this.mode !== 'single' || this.disabled) {
                return;
            }

            const trimmed = this.inputValue.trim();

            if (trimmed === '') {
                this.clear();
                return;
            }

            const iso = this.parseInput(trimmed);

            if (! iso) {
                this.inputValue = this.formatSelection();
                return;
            }

            const [year, month] = iso.split('-').map(Number);
            const date = new Date(year, month - 1, Number(iso.split('-')[2]));

            if (this.isDisabled(iso, date)) {
                this.inputValue = this.formatSelection();
                return;
            }

            this.viewYear = year;
            this.viewMonth = month;
            this.selected = [iso];
            this.activePreset = 'custom';
            this.buildDays();
            this.inputValue = this.formatSelection();
            this.$dispatch('date-picker-change', { selected: this.selected });
        },
    }));
});
