// Lógica do <x-forms.time-picker> registrada como Alpine.data nomeado — mesmo
// motivo do <x-forms.date-picker>/<x-ui.calendar>: comparações/aritmética soltas
// num atributo x-data="{...}" quebram wire:navigate. Ver reference/dropdown.md
// (gotcha #4) e reference/forms-time-picker.md na skill ui-components.
//
// IMPORTANTE: o estado NÃO pode se chamar `minute`/`second` — no template
// `x-for="minute in minuteList"` o escopo do loop sombreia a propriedade e
// `$data.minute === minute` fica sempre true (todos os minutos “selecionados”
// e o clique parece quebrado). Use `selectedMinute` / `selectedSecond`.
document.addEventListener('alpine:init', () => {
    Alpine.data('timePicker', (config) => ({
        open: false,
        disabled: config.disabled,
        format: config.format,
        hasSeconds: config.hasSeconds,
        is12h: config.is12h,
        hourStep: config.hourStep,
        minuteStep: config.minuteStep,
        secondStep: config.secondStep,
        closeOnSelect: config.closeOnSelect,
        direction: config.direction,
        align: config.align,
        disabledTimes: config.disabledTimes,
        presets: config.presets ?? [],
        minSeconds: null,
        maxSeconds: null,
        hour24: config.selected?.h ?? null,
        selectedMinute: config.selected?.m ?? null,
        selectedSecond: config.selected ? (config.selected.s ?? 0) : null,
        hourList: [],
        minuteList: [],
        secondList: [],
        periodList: ['AM', 'PM'],
        panelStyle: '',
        inputValue: '',
        activePreset: null,

        init() {
            this.minSeconds = config.minTime ? this.toSeconds(this.parseTime(config.minTime)) : null;
            this.maxSeconds = config.maxTime ? this.toSeconds(this.parseTime(config.maxTime)) : null;
            this.hourList = this.is12h
                ? this.rangeStep(1, 12, this.hourStep)
                : this.rangeStep(0, 23, this.hourStep);
            this.minuteList = this.rangeStep(0, 59, this.minuteStep);
            this.secondList = this.rangeStep(0, 59, this.secondStep);
            this.inputValue = this.formatSelection();
            this.syncActivePreset();
        },

        rangeStep(start, end, step) {
            const list = [];

            for (let i = start; i <= end; i += step) {
                list.push(i);
            }

            return list;
        },

        get period() {
            if (this.hour24 === null) {
                return null;
            }

            return this.hour24 < 12 ? 'AM' : 'PM';
        },

        get displayHour() {
            if (this.hour24 === null) {
                return null;
            }

            if (! this.is12h) {
                return this.hour24;
            }

            const twelveHour = this.hour24 % 12;

            return twelveHour === 0 ? 12 : twelveHour;
        },

        get selectedValue() {
            if (this.hour24 === null) {
                return '';
            }

            const h = String(this.hour24).padStart(2, '0');
            const m = String(this.selectedMinute ?? 0).padStart(2, '0');
            const s = String(this.selectedSecond ?? 0).padStart(2, '0');

            return this.hasSeconds ? `${h}:${m}:${s}` : `${h}:${m}`;
        },

        get previewLabel() {
            return this.formatSelection() || '--:--';
        },

        get hasValue() {
            return this.hour24 !== null;
        },

        get presetItems() {
            return this.presets;
        },

        isHourActive(value) {
            return this.displayHour === value;
        },

        isMinuteActive(value) {
            return this.selectedMinute === value;
        },

        isSecondActive(value) {
            return this.selectedSecond === value;
        },

        isPeriodActive(value) {
            return this.period === value;
        },

        to24(hour12, period) {
            const normalized = hour12 % 12;

            return period === 'PM' ? normalized + 12 : normalized;
        },

        toSeconds(time) {
            if (! time) {
                return null;
            }

            return time.h * 3600 + time.m * 60 + (time.s ?? 0);
        },

        parseTime(value) {
            const match = String(value).match(/^(\d{1,2}):(\d{2})(?::(\d{2}))?$/);

            if (! match) {
                return null;
            }

            return { h: Number(match[1]), m: Number(match[2]), s: Number(match[3] ?? 0) };
        },

        pad(value) {
            return String(value).padStart(2, '0');
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
            this.$nextTick(() => requestAnimationFrame(() => {
                this.updatePosition();
                this.scrollColumnsIntoView();
            }));
        },

        close() {
            this.open = false;
        },

        closeIfOutside(target) {
            if (
                this.open
                && ! this.$refs.trigger.contains(target)
                && (! this.$refs.panel || ! this.$refs.panel.contains(target))
            ) {
                this.close();
            }
        },

        scrollColumnsIntoView() {
            // NÃO use Element.scrollIntoView aqui: ele também rola a janela/
            // documento e “pula” a página ao abrir o painel ou ao mudar o ativo.
            ['hourColumn', 'minuteColumn', 'secondColumn', 'periodColumn'].forEach((ref) => {
                const column = this.$refs[ref];
                const active = column?.querySelector('[data-active="true"]');

                if (! column || ! active) {
                    return;
                }

                const columnRect = column.getBoundingClientRect();
                const activeRect = active.getBoundingClientRect();
                const delta = (activeRect.top - columnRect.top)
                    - (column.clientHeight / 2)
                    + (activeRect.height / 2);

                column.scrollTop += delta;
            });
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

        isHourDisabled(hour) {
            const h24 = this.is12h ? this.to24(hour, this.period ?? 'AM') : hour;
            const hourStart = h24 * 3600;
            const hourEnd = hourStart + 59 * 60 + (this.hasSeconds ? 59 : 0);

            if (this.minSeconds !== null && hourEnd < this.minSeconds) {
                return true;
            }

            if (this.maxSeconds !== null && hourStart > this.maxSeconds) {
                return true;
            }

            return false;
        },

        isMinuteDisabled(minute) {
            const h = this.hour24 ?? 0;
            const minuteStart = h * 3600 + minute * 60;
            const minuteEnd = minuteStart + (this.hasSeconds ? 59 : 0);

            if (this.minSeconds !== null && minuteEnd < this.minSeconds) {
                return true;
            }

            if (this.maxSeconds !== null && minuteStart > this.maxSeconds) {
                return true;
            }

            if (! this.hasSeconds && this.disabledTimes.includes(`${this.pad(h)}:${this.pad(minute)}`)) {
                return true;
            }

            return false;
        },

        isSecondDisabled(second) {
            if (this.hour24 === null || this.selectedMinute === null) {
                return false;
            }

            const total = this.hour24 * 3600 + this.selectedMinute * 60 + second;

            if (this.minSeconds !== null && total < this.minSeconds) {
                return true;
            }

            if (this.maxSeconds !== null && total > this.maxSeconds) {
                return true;
            }

            if (this.disabledTimes.includes(`${this.pad(this.hour24)}:${this.pad(this.selectedMinute)}:${this.pad(second)}`)) {
                return true;
            }

            return false;
        },

        isPeriodDisabled(period) {
            if (this.hour24 === null) {
                return false;
            }

            const candidate = this.to24(this.displayHour, period);
            const start = candidate * 3600;
            const end = start + 59 * 60 + (this.hasSeconds ? 59 : 0);

            if (this.minSeconds !== null && end < this.minSeconds) {
                return true;
            }

            if (this.maxSeconds !== null && start > this.maxSeconds) {
                return true;
            }

            return false;
        },

        isPresetDisabled(value) {
            const parsed = this.parseTime(value);

            if (! parsed) {
                return true;
            }

            const seconds = this.toSeconds(parsed);

            if (this.minSeconds !== null && seconds < this.minSeconds) {
                return true;
            }

            if (this.maxSeconds !== null && seconds > this.maxSeconds) {
                return true;
            }

            const key = this.hasSeconds
                ? `${this.pad(parsed.h)}:${this.pad(parsed.m)}:${this.pad(parsed.s)}`
                : `${this.pad(parsed.h)}:${this.pad(parsed.m)}`;

            return this.disabledTimes.includes(key);
        },

        selectHour(hour) {
            if (this.disabled || this.isHourDisabled(hour)) {
                return;
            }

            this.hour24 = this.is12h ? this.to24(hour, this.period ?? 'AM') : hour;
            this.selectedMinute ??= 0;
            this.selectedSecond ??= 0;

            this.afterChange();
        },

        selectMinute(minute) {
            if (this.disabled || this.isMinuteDisabled(minute)) {
                return;
            }

            this.hour24 ??= 0;
            this.selectedMinute = minute;
            this.selectedSecond ??= 0;

            this.afterChange();
        },

        selectSecond(second) {
            if (this.disabled || this.isSecondDisabled(second)) {
                return;
            }

            this.hour24 ??= 0;
            this.selectedMinute ??= 0;
            this.selectedSecond = second;

            this.afterChange();
        },

        selectPeriod(period) {
            if (this.disabled || this.hour24 === null) {
                return;
            }

            this.hour24 = this.to24(this.displayHour, period);

            this.afterChange();
        },

        applyPreset(value) {
            if (this.disabled || this.isPresetDisabled(value)) {
                return;
            }

            const parsed = this.parseTime(value);

            if (! parsed) {
                return;
            }

            this.hour24 = parsed.h;
            this.selectedMinute = parsed.m;
            this.selectedSecond = this.hasSeconds ? (parsed.s ?? 0) : 0;
            this.activePreset = value;
            this.afterChange();
            this.$nextTick(() => this.scrollColumnsIntoView());
        },

        syncActivePreset() {
            if (this.hour24 === null) {
                this.activePreset = null;
                return;
            }

            const current = this.hasSeconds
                ? `${this.pad(this.hour24)}:${this.pad(this.selectedMinute ?? 0)}:${this.pad(this.selectedSecond ?? 0)}`
                : `${this.pad(this.hour24)}:${this.pad(this.selectedMinute ?? 0)}`;

            const match = this.presets.find((preset) => {
                const parsed = this.parseTime(preset);

                if (! parsed) {
                    return false;
                }

                const key = this.hasSeconds
                    ? `${this.pad(parsed.h)}:${this.pad(parsed.m)}:${this.pad(parsed.s ?? 0)}`
                    : `${this.pad(parsed.h)}:${this.pad(parsed.m)}`;

                return key === current;
            });

            this.activePreset = match ?? null;
        },

        afterChange() {
            this.inputValue = this.formatSelection();
            this.syncActivePreset();
            this.$dispatch('time-picker-change', { selected: this.selectedValue });

            if (this.closeOnSelect) {
                this.close();
            }
        },

        now() {
            if (this.disabled) {
                return;
            }

            const now = new Date();
            this.hour24 = now.getHours();
            this.selectedMinute = this.roundToStep(now.getMinutes(), this.minuteStep);
            this.selectedSecond = this.hasSeconds ? this.roundToStep(now.getSeconds(), this.secondStep) : 0;
            this.afterChange();
            this.close();
        },

        roundToStep(value, step) {
            const rounded = Math.round(value / step) * step;

            return Math.min(rounded, 59 - (59 % step === 0 ? 0 : 59 % step));
        },

        clear() {
            this.hour24 = null;
            this.selectedMinute = null;
            this.selectedSecond = null;
            this.activePreset = null;
            this.inputValue = '';
            this.$dispatch('time-picker-change', { selected: '' });
        },

        confirm() {
            this.close();
        },

        formatTime(h, m, s) {
            const hour12 = h % 12 === 0 ? 12 : h % 12;

            return this.format
                .replace('H', this.pad(h))
                .replace('h', this.pad(hour12))
                .replace('i', this.pad(m))
                .replace('s', this.pad(s))
                .replace('A', h < 12 ? 'AM' : 'PM');
        },

        formatSelection() {
            if (this.hour24 === null) {
                return '';
            }

            return this.formatTime(this.hour24, this.selectedMinute ?? 0, this.selectedSecond ?? 0);
        },

        formatPresetLabel(value) {
            const parsed = this.parseTime(value);

            if (! parsed) {
                return value;
            }

            return this.formatTime(parsed.h, parsed.m, parsed.s ?? 0);
        },

        parseInput(value) {
            const separators = [...new Set(this.format.replace(/[HhisA]/g, '').split(''))].join('');
            const splitPattern = new RegExp(`[${separators.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')}]+`);
            const tokens = this.format.split(splitPattern).filter(Boolean);
            const parts = value.trim().split(splitPattern).filter(Boolean);

            if (parts.length !== tokens.length) {
                return null;
            }

            const map = {};
            tokens.forEach((token, index) => {
                map[token] = parts[index];
            });

            let hour = null;

            if (map.H !== undefined) {
                hour = parseInt(map.H, 10);

                if (Number.isNaN(hour) || hour < 0 || hour > 23) {
                    return null;
                }
            } else if (map.h !== undefined) {
                const hour12 = parseInt(map.h, 10);

                if (Number.isNaN(hour12) || hour12 < 1 || hour12 > 12) {
                    return null;
                }

                const period = (map.A ?? 'AM').toUpperCase();

                if (period !== 'AM' && period !== 'PM') {
                    return null;
                }

                hour = this.to24(hour12, period);
            } else {
                return null;
            }

            const minute = map.i !== undefined ? parseInt(map.i, 10) : 0;

            if (Number.isNaN(minute) || minute < 0 || minute > 59) {
                return null;
            }

            const second = this.hasSeconds && map.s !== undefined ? parseInt(map.s, 10) : 0;

            if (Number.isNaN(second) || second < 0 || second > 59) {
                return null;
            }

            return { h: hour, m: minute, s: second };
        },

        confirmInput() {
            if (this.disabled) {
                return;
            }

            const trimmed = this.inputValue.trim();

            if (trimmed === '') {
                this.clear();
                return;
            }

            const parsed = this.parseInput(trimmed);

            if (! parsed) {
                this.inputValue = this.formatSelection();
                return;
            }

            const seconds = parsed.h * 3600 + parsed.m * 60 + parsed.s;

            if (this.minSeconds !== null && seconds < this.minSeconds) {
                this.inputValue = this.formatSelection();
                return;
            }

            if (this.maxSeconds !== null && seconds > this.maxSeconds) {
                this.inputValue = this.formatSelection();
                return;
            }

            const key = this.hasSeconds
                ? `${this.pad(parsed.h)}:${this.pad(parsed.m)}:${this.pad(parsed.s)}`
                : `${this.pad(parsed.h)}:${this.pad(parsed.m)}`;

            if (this.disabledTimes.includes(key)) {
                this.inputValue = this.formatSelection();
                return;
            }

            this.hour24 = parsed.h;
            this.selectedMinute = parsed.m;
            this.selectedSecond = parsed.s;
            this.inputValue = this.formatSelection();
            this.syncActivePreset();
            this.$dispatch('time-picker-change', { selected: this.selectedValue });
        },
    }));
});
