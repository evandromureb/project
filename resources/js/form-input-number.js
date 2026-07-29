// Lógica do <x-forms.input-number> como Alpine.data nomeado (não inline
// no x-data) — parsers, stepUp/Down e formatação usam comparações /
// arrow functions que quebrariam wire:navigate se ficassem soltas num
// atributo x-data="{...}". Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formInputNumber', (options = {}) => ({
        display: '',
        number: null,
        focused: false,
        floating: Boolean(options.floating),
        labelActive: options.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: options.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',
        min: options.min === null || options.min === undefined || options.min === ''
            ? null
            : Number(options.min),
        max: options.max === null || options.max === undefined || options.max === ''
            ? null
            : Number(options.max),
        step: Number(options.step ?? 1),
        decimals: Number(options.decimals ?? 0),
        thousandSeparator: String(options.thousandSeparator ?? '.'),
        decimalSeparator: String(options.decimalSeparator ?? ','),
        allowNegative: Boolean(options.allowNegative ?? true),
        clamp: Boolean(options.clamp ?? true),
        wheel: Boolean(options.wheel ?? false),
        selectOnFocus: Boolean(options.selectOnFocus ?? true),
        formatOnBlur: Boolean(options.formatOnBlur ?? true),
        valueMode: options.valueMode === 'formatted' ? 'formatted' : 'number',
        nullable: Boolean(options.nullable ?? true),
        emptyValue: options.emptyValue ?? '',

        init() {
            this.step = Number.isFinite(this.step) && this.step > 0 ? this.step : 1;
            this.decimals = Math.max(0, Math.min(20, Math.floor(this.decimals)));

            if (! Number.isFinite(this.min)) {
                this.min = null;
            }

            if (! Number.isFinite(this.max)) {
                this.max = null;
            }

            this.$nextTick(() => {
                const initial = this.$refs.input?.value ?? options.value ?? '';
                this.applyExternal(initial, { emit: false, grouped: true });
            });
        },

        applyExternal(raw, { emit = true, grouped = true } = {}) {
            if (raw === null || raw === undefined || raw === '') {
                this.number = null;
                this.display = '';
            } else {
                // Valor cru com ponto decimal (ex.: wire/PHP) ou já formatado.
                let parsed = this.parseInput(raw);

                if (parsed === null && typeof raw === 'number') {
                    parsed = raw;
                }

                if (parsed === null && /^-?\d+(\.\d+)?$/.test(String(raw).trim())) {
                    parsed = Number(raw);
                }

                if (parsed === null || ! Number.isFinite(parsed)) {
                    this.number = null;
                    this.display = '';
                } else {
                    this.number = this.clamp ? this.clampValue(parsed) : this.round(parsed);
                    this.display = this.format(this.number, { grouped });
                }
            }

            if (this.$refs.input) {
                this.$refs.input.value = this.display;
            }

            this.syncModel(emit);
        },

        get hasValue() {
            return this.display.length > 0;
        },

        get modelValue() {
            if (this.number === null) {
                return this.nullable ? String(this.emptyValue ?? '') : '0';
            }

            if (this.valueMode === 'formatted') {
                return this.format(this.number, { grouped: true });
            }

            return this.stringifyNumber(this.number);
        },

        get canIncrement() {
            if (this.max === null) {
                return true;
            }

            const current = this.number ?? 0;

            return current < this.max;
        },

        get canDecrement() {
            if (this.min === null) {
                return this.allowNegative || (this.number ?? 0) > 0;
            }

            const current = this.number ?? 0;

            return current > this.min;
        },

        get labelFloated() {
            return ! this.floating || this.focused || this.hasValue;
        },

        get floatingLabelClasses() {
            return {
                [this.labelActive]: this.labelFloated,
                [this.labelRest]: ! this.labelFloated,
            };
        },

        escapeRegExp(value) {
            return String(value).replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        },

        stringifyNumber(value) {
            if (! Number.isFinite(value)) {
                return '';
            }

            if (this.decimals === 0) {
                return String(Math.trunc(value));
            }

            return value.toFixed(this.decimals);
        },

        round(value) {
            if (! Number.isFinite(value)) {
                return null;
            }

            if (this.decimals === 0) {
                return Math.round(value);
            }

            const factor = 10 ** this.decimals;

            return Math.round((value + Number.EPSILON) * factor) / factor;
        },

        clampValue(value) {
            if (! Number.isFinite(value)) {
                return null;
            }

            let next = value;

            if (this.min !== null && next < this.min) {
                next = this.min;
            }

            if (this.max !== null && next > this.max) {
                next = this.max;
            }

            if (! this.allowNegative && next < 0) {
                next = 0;
            }

            return this.round(next);
        },

        parseInput(raw) {
            if (raw === null || raw === undefined) {
                return null;
            }

            let text = String(raw).trim();

            if (text === '' || text === '-' || text === this.decimalSeparator) {
                return null;
            }

            text = text
                .replace(/\s/g, '')
                .replace(new RegExp(this.escapeRegExp(this.thousandSeparator), 'g'), '');

            if (this.decimalSeparator !== '.') {
                text = text.replace(this.decimalSeparator, '.');
            }

            // Aceita "1.234,56" já normalizado e também "1234.56" puro.
            if ((text.match(/\./g) || []).length > 1) {
                return null;
            }

            if (! /^-?\d*(\.\d*)?$/.test(text)) {
                return null;
            }

            if (text === '-' || text === '.' || text === '-.') {
                return null;
            }

            const value = Number(text);

            return Number.isFinite(value) ? value : null;
        },

        format(value, { grouped = true } = {}) {
            if (! Number.isFinite(value)) {
                return '';
            }

            const negative = value < 0;
            const absolute = Math.abs(value);
            let [integerPart, fractionPart] = this.stringifyNumber(absolute).split('.');

            if (grouped && this.thousandSeparator) {
                integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, this.thousandSeparator);
            }

            let result = integerPart;

            if (this.decimals > 0) {
                fractionPart = (fractionPart ?? '').padEnd(this.decimals, '0').slice(0, this.decimals);
                result += this.decimalSeparator + fractionPart;
            }

            return (negative ? '-' : '') + result;
        },

        sanitizeTyping(raw) {
            let text = String(raw ?? '');
            const negative = this.allowNegative && text.includes('-');

            text = text.replace(/[^\d.,\-]/g, '');

            // Mantém só o primeiro sinal no início.
            text = text.replace(/-/g, '');

            if (negative) {
                text = '-' + text;
            }

            const dec = this.decimalSeparator;
            const thousand = this.thousandSeparator;

            // Normaliza ponto/vírgula digitados conforme o locale.
            if (dec === ',') {
                text = text.replace(/\./g, ',');
            } else {
                text = text.replace(/,/g, '.');
            }

            const firstDec = text.indexOf(dec);

            if (firstDec !== -1) {
                const head = text.slice(0, firstDec + 1);
                let tail = text.slice(firstDec + 1).replace(new RegExp(this.escapeRegExp(dec), 'g'), '');

                if (thousand) {
                    tail = tail.replace(new RegExp(this.escapeRegExp(thousand), 'g'), '');
                }

                if (this.decimals > 0) {
                    tail = tail.slice(0, this.decimals);
                } else {
                    tail = '';
                }

                text = head + (this.decimals > 0 ? tail : '');

                if (this.decimals === 0) {
                    text = text.replace(new RegExp(this.escapeRegExp(dec), 'g'), '');
                }
            }

            if (thousand) {
                // Remove milhares enquanto digita — reaplicamos no blur.
                const sign = text.startsWith('-') ? '-' : '';
                const body = text.replace(/^-/, '').replace(new RegExp(this.escapeRegExp(thousand), 'g'), '');
                text = sign + body;
            }

            return text;
        },

        syncFromDisplay(display, { clampNow = false } = {}) {
            this.display = display;
            const parsed = this.parseInput(display);

            if (parsed === null) {
                this.number = null;
            } else {
                this.number = clampNow && this.clamp ? this.clampValue(parsed) : this.round(parsed);

                if (clampNow && this.clamp && this.number !== parsed) {
                    this.display = this.format(this.number, { grouped: this.formatOnBlur });
                }
            }

            this.syncModel(true);
        },

        syncModel(dispatch = false) {
            const model = this.$refs.model;
            const value = this.modelValue;

            if (model && model.value !== value) {
                model.value = value;

                if (dispatch) {
                    model.dispatchEvent(new Event('input', { bubbles: true }));
                }
            }

            if (this.valueMode === 'formatted' && this.$refs.input && ! model) {
                // Nome/wire no input visível.
            }
        },

        commitDisplay() {
            if (this.display === '' || this.display === '-' || this.display === this.decimalSeparator) {
                if (this.nullable) {
                    this.number = null;
                    this.display = '';
                } else {
                    this.number = this.clampValue(0) ?? 0;
                    this.display = this.format(this.number, { grouped: this.formatOnBlur });
                }

                this.syncModel(true);

                return;
            }

            const parsed = this.parseInput(this.display);

            if (parsed === null) {
                this.number = null;
                this.display = '';
                this.syncModel(true);

                return;
            }

            this.number = this.clamp ? this.clampValue(parsed) : this.round(parsed);
            this.display = this.formatOnBlur
                ? this.format(this.number, { grouped: true })
                : this.format(this.number, { grouped: false });
            this.syncModel(true);

            if (this.$refs.input) {
                this.$refs.input.value = this.display;
            }
        },

        setNumber(value, { formatGrouped = true } = {}) {
            if (value === null || value === undefined || value === '') {
                this.number = null;
                this.display = '';
            } else {
                const next = this.clamp ? this.clampValue(Number(value)) : this.round(Number(value));
                this.number = next;
                this.display = Number.isFinite(next)
                    ? this.format(next, { grouped: formatGrouped })
                    : '';
            }

            if (this.$refs.input) {
                this.$refs.input.value = this.display;
            }

            this.syncModel(true);
            this.$refs.input?.dispatchEvent(new Event('input', { bubbles: true }));
            this.$refs.input?.dispatchEvent(new Event('change', { bubbles: true }));
        },

        stepBy(direction, multiplier = 1) {
            if (this.isBlocked()) {
                return;
            }

            const base = this.number ?? (direction > 0
                ? (this.min ?? 0)
                : (this.max ?? 0));
            const delta = this.step * multiplier * direction;
            let next = this.round(base + delta);

            // Alinha ao grid do step a partir do min (quando houver).
            if (this.min !== null && this.step > 0) {
                const steps = Math.round((next - this.min) / this.step);
                next = this.round(this.min + steps * this.step);
            }

            if (this.clamp) {
                next = this.clampValue(next);
            } else {
                if (this.min !== null && next < this.min) {
                    next = this.min;
                }

                if (this.max !== null && next > this.max) {
                    next = this.max;
                }

                if (! this.allowNegative && next < 0) {
                    next = 0;
                }

                next = this.round(next);
            }

            this.setNumber(next, { formatGrouped: ! this.focused || this.formatOnBlur });
            this.$refs.input?.focus();
        },

        increment(multiplier = 1) {
            this.stepBy(1, multiplier);
        },

        decrement(multiplier = 1) {
            this.stepBy(-1, multiplier);
        },

        isBlocked() {
            const input = this.$refs.input;

            return ! input || input.disabled || input.readOnly;
        },

        onFocus() {
            this.focused = true;

            if (this.number !== null && ! this.formatOnBlur) {
                this.display = this.format(this.number, { grouped: false });

                if (this.$refs.input) {
                    this.$refs.input.value = this.display;
                }
            } else if (this.number !== null) {
                // Em foco, remove agrupamento para facilitar edição.
                this.display = this.format(this.number, { grouped: false });

                if (this.$refs.input) {
                    this.$refs.input.value = this.display;
                }
            }

            if (this.selectOnFocus) {
                this.$nextTick(() => this.$refs.input?.select());
            }
        },

        onBlur() {
            this.focused = false;
            this.commitDisplay();
        },

        onInput(event) {
            const sanitized = this.sanitizeTyping(event.target.value);

            if (event.target.value !== sanitized) {
                event.target.value = sanitized;
            }

            this.syncFromDisplay(sanitized);
        },

        onPaste(event) {
            event.preventDefault();
            const text = (event.clipboardData || window.clipboardData)?.getData('text') ?? '';
            const sanitized = this.sanitizeTyping(text);
            this.syncFromDisplay(sanitized);

            if (this.$refs.input) {
                this.$refs.input.value = this.display;
            }
        },

        onKeydown(event) {
            if (this.isBlocked()) {
                return;
            }

            if (event.key === 'ArrowUp') {
                event.preventDefault();
                this.increment(event.shiftKey ? 10 : 1);

                return;
            }

            if (event.key === 'ArrowDown') {
                event.preventDefault();
                this.decrement(event.shiftKey ? 10 : 1);

                return;
            }

            if (event.key === 'PageUp') {
                event.preventDefault();
                this.increment(10);

                return;
            }

            if (event.key === 'PageDown') {
                event.preventDefault();
                this.decrement(10);

                return;
            }

            if (event.key === 'Home' && this.min !== null) {
                event.preventDefault();
                this.setNumber(this.min);

                return;
            }

            if (event.key === 'End' && this.max !== null) {
                event.preventDefault();
                this.setNumber(this.max);
            }
        },

        onWheel(event) {
            if (! this.wheel || ! this.focused || this.isBlocked()) {
                return;
            }

            event.preventDefault();

            if (event.deltaY < 0) {
                this.increment(event.shiftKey ? 10 : 1);
            } else if (event.deltaY > 0) {
                this.decrement(event.shiftKey ? 10 : 1);
            }
        },

        clear() {
            if (this.isBlocked()) {
                return;
            }

            if (this.nullable) {
                this.setNumber(null);
            } else {
                this.setNumber(this.clampValue(0) ?? 0);
            }

            this.$refs.input?.focus();
        },
    }));
});
