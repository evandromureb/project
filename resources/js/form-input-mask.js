// Lógica do <x-forms.input-mask> registrada como Alpine.data nomeado (não
// inline no x-data) — comparações / arrow functions quebrariam wire:navigate
// se ficassem soltas num atributo x-data="{...}". Ver reference/dropdown.md
// (gotcha #4) e reference/forms-input-mask.md na skill ui-components.
//
// Engine de máscara sem dependências: tokens 9/a/A/*/S, literais, escape \,
// máscaras dinâmicas (array), money reverso (pt-BR) e valueMode masked|unmasked.

document.addEventListener('alpine:init', () => {
    Alpine.data('formInputMask', (config = {}) => ({
        masks: Array.isArray(config.masks)
            ? config.masks.filter(Boolean)
            : [String(config.masks || '')].filter(Boolean),
        reverse: Boolean(config.reverse),
        mode: config.mode === 'money' ? 'money' : 'pattern',
        lazy: config.lazy !== false,
        guide: Boolean(config.guide),
        placeholderChar: config.placeholderChar || '_',
        valueMode: config.valueMode === 'masked' ? 'masked' : 'unmasked',
        decimals: Number.isFinite(config.decimals) ? config.decimals : 2,
        thousandSeparator: config.thousandSeparator ?? '.',
        decimalSeparator: config.decimalSeparator ?? ',',
        maxRawLength: config.maxRawLength ?? null,
        clearIncomplete: Boolean(config.clearIncomplete),
        display: String(config.value ?? ''),
        raw: '',
        length: 0,
        maxLength: config.maxLength ?? null,
        focused: false,
        floating: Boolean(config.floating),
        labelActive: config.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: config.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',
        incomplete: false,

        tokenDefs: {
            '9': { test: (ch) => /\d/.test(ch) },
            a: { test: (ch) => /[a-zA-Z]/.test(ch) },
            A: {
                test: (ch) => /[a-zA-Z]/.test(ch),
                transform: (ch) => ch.toUpperCase(),
            },
            S: {
                test: (ch) => /[a-zA-Z]/.test(ch),
                transform: (ch) => ch.toLowerCase(),
            },
            '*': { test: (ch) => /[a-zA-Z0-9]/.test(ch) },
        },

        init() {
            this.$nextTick(() => {
                const initial = this.$refs.input?.value ?? this.display ?? '';
                this.setFromExternal(initial, { emit: false });
            });
        },

        get hasValue() {
            return this.raw.length > 0;
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

        get modelValue() {
            return this.valueMode === 'masked' ? this.display : this.raw;
        },

        get isComplete() {
            if (this.mode === 'money') {
                return this.raw.length > this.decimals;
            }

            const mask = this.pickMask(this.raw);
            const tokens = this.tokenCount(mask);

            return tokens > 0 && this.raw.length >= tokens;
        },

        isToken(char) {
            return Object.prototype.hasOwnProperty.call(this.tokenDefs, char);
        },

        tokenCount(mask) {
            let count = 0;

            for (let i = 0; i < mask.length; i++) {
                if (mask[i] === '\\') {
                    i++;
                    continue;
                }

                if (this.isToken(mask[i])) {
                    count++;
                }
            }

            return count;
        },

        pickMask(raw) {
            if (this.masks.length === 0) {
                return '';
            }

            if (this.masks.length === 1) {
                return this.masks[0];
            }

            const sorted = [...this.masks].sort(
                (a, b) => this.tokenCount(a) - this.tokenCount(b),
            );

            for (const mask of sorted) {
                if (raw.length <= this.tokenCount(mask)) {
                    return mask;
                }
            }

            return sorted[sorted.length - 1];
        },

        extractRaw(value) {
            const source = String(value ?? '');

            if (this.mode === 'money') {
                let digits = source.replace(/\D/g, '');

                if (this.maxRawLength) {
                    digits = digits.slice(0, this.maxRawLength);
                }

                return digits;
            }

            const maxTokens = Math.max(...this.masks.map((mask) => this.tokenCount(mask)), 0);
            let raw = '';

            for (const ch of source) {
                if (raw.length >= maxTokens) {
                    break;
                }

                for (const def of Object.values(this.tokenDefs)) {
                    if (def.test(ch)) {
                        raw += def.transform ? def.transform(ch) : ch;
                        break;
                    }
                }
            }

            if (this.maxRawLength) {
                raw = raw.slice(0, this.maxRawLength);
            }

            return raw;
        },

        formatMoney(raw) {
            if (! raw) {
                return '';
            }

            const decimals = this.decimals;
            const padded = raw.padStart(decimals + 1, '0');
            const fraction = padded.slice(-decimals);
            let integer = padded.slice(0, -decimals).replace(/^0+/, '') || '0';

            integer = integer.replace(
                /\B(?=(\d{3})+(?!\d))/g,
                this.thousandSeparator,
            );

            return `${integer}${this.decimalSeparator}${fraction}`;
        },

        formatPattern(raw) {
            const mask = this.pickMask(raw);
            let result = '';
            let ri = 0;
            let i = 0;

            const shouldShowPlaceholder = this.guide && this.focused;
            const shouldShowEagerLiterals = ! this.lazy && this.focused;

            while (i < mask.length) {
                const m = mask[i];

                if (m === '\\') {
                    i++;
                    const literal = mask[i] ?? '';

                    if (ri < raw.length || shouldShowPlaceholder || (shouldShowEagerLiterals && ri === 0)) {
                        result += literal;
                    } else {
                        break;
                    }

                    i++;
                    continue;
                }

                if (this.isToken(m)) {
                    if (ri < raw.length) {
                        const def = this.tokenDefs[m];
                        const ch = raw[ri];

                        if (def.test(ch)) {
                            result += def.transform ? def.transform(ch) : ch;
                        }

                        ri++;
                    } else if (shouldShowPlaceholder) {
                        result += this.placeholderChar;
                    } else {
                        break;
                    }

                    i++;
                    continue;
                }

                if (ri < raw.length || shouldShowPlaceholder) {
                    result += m;
                } else if (shouldShowEagerLiterals && raw.length === 0) {
                    result += m;
                } else {
                    break;
                }

                i++;
            }

            if (ri >= this.tokenCount(mask) && ri > 0) {
                while (i < mask.length) {
                    if (mask[i] === '\\') {
                        i++;
                        result += mask[i] ?? '';
                        i++;
                        continue;
                    }

                    if (this.isToken(mask[i])) {
                        break;
                    }

                    result += mask[i];
                    i++;
                }
            }

            return result;
        },

        format(raw) {
            return this.mode === 'money' ? this.formatMoney(raw) : this.formatPattern(raw);
        },

        setFromExternal(value, { emit = true } = {}) {
            this.raw = this.extractRaw(value);
            this.display = this.format(this.raw);
            this.length = this.display.length;
            this.incomplete = this.hasValue && ! this.isComplete;
            this.writeToDom();

            if (emit) {
                this.emitModel();
            }
        },

        writeToDom() {
            const input = this.$refs.input;

            if (input && input.value !== this.display) {
                input.value = this.display;
            }

            const model = this.$refs.model;

            if (model && model.value !== this.modelValue) {
                model.value = this.modelValue;
            }
        },

        emitModel() {
            this.writeToDom();

            const target =
                this.valueMode === 'unmasked' && this.$refs.model
                    ? this.$refs.model
                    : this.$refs.input;

            if (! target) {
                return;
            }

            target.dispatchEvent(new Event('input', { bubbles: true }));
            target.dispatchEvent(new Event('change', { bubbles: true }));
        },

        onFocus() {
            this.focused = true;

            if ((! this.lazy || this.guide) && this.mode === 'pattern') {
                this.display = this.format(this.raw);
                this.length = this.display.length;
                this.writeToDom();
            }
        },

        onBlur() {
            this.focused = false;

            if (this.clearIncomplete && this.hasValue && ! this.isComplete && this.mode !== 'money') {
                this.raw = '';
                this.display = '';
                this.length = 0;
                this.incomplete = false;
                this.emitModel();

                return;
            }

            this.display = this.format(this.raw);
            this.length = this.display.length;
            this.incomplete = this.hasValue && ! this.isComplete;
            this.writeToDom();
        },

        onInput(event) {
            const input = event.target;
            this.raw = this.extractRaw(input.value);
            this.display = this.format(this.raw);
            this.length = this.display.length;
            this.incomplete = this.hasValue && ! this.isComplete;

            input.value = this.display;

            const caret = this.caretAfterRaw(this.display, this.raw.length);

            try {
                input.setSelectionRange(caret, caret);
            } catch {
                // Alguns tipos de input não permitem selectionRange.
            }

            if (this.valueMode === 'unmasked' && this.$refs.model) {
                this.$refs.model.value = this.raw;
                this.$refs.model.dispatchEvent(new Event('input', { bubbles: true }));
            }
        },

        caretAfterRaw(display, rawIndex) {
            if (this.mode === 'money') {
                return display.length;
            }

            if (rawIndex <= 0) {
                let i = 0;

                while (i < display.length && ! /[a-zA-Z0-9]/.test(display[i])) {
                    i++;
                }

                return i;
            }

            let seen = 0;

            for (let i = 0; i < display.length; i++) {
                if (/[a-zA-Z0-9]/.test(display[i])) {
                    seen++;

                    if (seen >= rawIndex) {
                        return i + 1;
                    }
                }
            }

            return display.length;
        },

        onPaste(event) {
            event.preventDefault();
            const text = event.clipboardData?.getData('text') ?? '';
            this.setFromExternal(text);
        },

        clear() {
            const input = this.$refs.input;

            if (! input || input.disabled || input.readOnly) {
                return;
            }

            this.raw = '';
            this.display = '';
            this.length = 0;
            this.incomplete = false;
            this.emitModel();
            input.focus();
        },
    }));
});
