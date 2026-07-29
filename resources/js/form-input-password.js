// Lógica do <x-forms.input-password> como Alpine.data nomeado (não inline
// no x-data) — toggle, Caps Lock, força, gerar/copiar usam comparações /
// arrow functions que quebrariam wire:navigate se ficassem soltas num
// atributo x-data="{...}". Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formInputPassword', (options = {}) => ({
        showPassword: false,
        holdingReveal: false,
        value: String(options.value ?? ''),
        focused: false,
        capsLockOn: false,
        copied: false,
        copyTimer: null,
        floating: Boolean(options.floating),
        labelActive: options.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: options.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',
        minLength: Number(options.minLength ?? 10),
        requireUpper: Boolean(options.requireUpper ?? true),
        requireLower: Boolean(options.requireLower ?? true),
        requireNumber: Boolean(options.requireNumber ?? true),
        requireSymbol: Boolean(options.requireSymbol ?? true),
        generatorLength: Number(options.generatorLength ?? 16),
        toggleMode: options.toggleMode === 'hold' ? 'hold' : 'click',

        init() {
            this.$nextTick(() => {
                if (this.$refs.input) {
                    this.value = this.$refs.input.value ?? '';
                }
            });
        },

        get inputType() {
            return this.isRevealed ? 'text' : 'password';
        },

        get isRevealed() {
            return this.toggleMode === 'hold' ? this.holdingReveal : this.showPassword;
        },

        get hasValue() {
            return this.value.length > 0;
        },

        get length() {
            return this.value.length;
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

        get rules() {
            return [
                {
                    key: 'min',
                    label: `Pelo menos ${this.minLength} caracteres`,
                    ok: this.value.length >= this.minLength,
                },
                {
                    key: 'lower',
                    label: 'Uma letra minúscula',
                    ok: /[a-z]/.test(this.value),
                    enabled: this.requireLower,
                },
                {
                    key: 'upper',
                    label: 'Uma letra maiúscula',
                    ok: /[A-Z]/.test(this.value),
                    enabled: this.requireUpper,
                },
                {
                    key: 'number',
                    label: 'Um número',
                    ok: /\d/.test(this.value),
                    enabled: this.requireNumber,
                },
                {
                    key: 'symbol',
                    label: 'Um caractere especial',
                    ok: /[^A-Za-z0-9]/.test(this.value),
                    enabled: this.requireSymbol,
                },
            ].filter((rule) => rule.enabled !== false);
        },

        get passedRules() {
            return this.rules.filter((rule) => rule.ok).length;
        },

        get totalRules() {
            return this.rules.length;
        },

        get strengthScore() {
            if (! this.hasValue) {
                return 0;
            }

            let score = 0;

            if (this.value.length >= this.minLength) {
                score += 1;
            }

            if (this.value.length >= this.minLength + 4) {
                score += 1;
            }

            if (/[a-z]/.test(this.value) && /[A-Z]/.test(this.value)) {
                score += 1;
            }

            if (/\d/.test(this.value)) {
                score += 1;
            }

            if (/[^A-Za-z0-9]/.test(this.value)) {
                score += 1;
            }

            return Math.min(score, 4);
        },

        get strengthMeta() {
            const score = this.strengthScore;

            if (! this.hasValue) {
                return {
                    score: 0,
                    label: 'Digite uma senha',
                    barClass: 'bg-muted',
                    textClass: 'text-muted-foreground',
                    width: '0%',
                };
            }

            if (score <= 1) {
                return {
                    score,
                    label: 'Fraca',
                    barClass: 'bg-danger',
                    textClass: 'text-danger',
                    width: '25%',
                };
            }

            if (score === 2) {
                return {
                    score,
                    label: 'Média',
                    barClass: 'bg-warning',
                    textClass: 'text-warning',
                    width: '50%',
                };
            }

            if (score === 3) {
                return {
                    score,
                    label: 'Forte',
                    barClass: 'bg-info',
                    textClass: 'text-info',
                    width: '75%',
                };
            }

            return {
                score,
                label: 'Muito forte',
                barClass: 'bg-success',
                textClass: 'text-success',
                width: '100%',
            };
        },

        togglePassword() {
            if (this.toggleMode === 'hold') {
                return;
            }

            this.showPassword = ! this.showPassword;
        },

        startReveal() {
            if (this.toggleMode !== 'hold') {
                return;
            }

            this.holdingReveal = true;
        },

        endReveal() {
            if (this.toggleMode !== 'hold') {
                return;
            }

            this.holdingReveal = false;
        },

        onFocus() {
            this.focused = true;
        },

        onBlur() {
            this.focused = false;
            this.capsLockOn = false;
            this.endReveal();
        },

        onInput(event) {
            this.value = event.target.value ?? '';
        },

        onKey(event) {
            if (typeof event.getModifierState === 'function') {
                this.capsLockOn = event.getModifierState('CapsLock');
            }
        },

        syncInput(value) {
            const input = this.$refs.input;

            if (! input || input.disabled || input.readOnly) {
                return;
            }

            input.value = value;
            this.value = value;
            input.dispatchEvent(new Event('input', { bubbles: true }));
            input.dispatchEvent(new Event('change', { bubbles: true }));
        },

        clear() {
            this.syncInput('');
            this.$refs.input?.focus();
        },

        generate() {
            const upper = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
            const lower = 'abcdefghijkmnopqrstuvwxyz';
            const numbers = '23456789';
            const symbols = '!@#$%&*?_+-=';
            const pools = [];

            if (this.requireUpper) {
                pools.push(upper);
            }

            if (this.requireLower) {
                pools.push(lower);
            }

            if (this.requireNumber) {
                pools.push(numbers);
            }

            if (this.requireSymbol) {
                pools.push(symbols);
            }

            if (pools.length === 0) {
                pools.push(upper, lower, numbers);
            }

            const all = pools.join('');
            const length = Math.max(this.generatorLength, this.minLength, pools.length);
            const chars = [];

            // Garante ao menos um de cada pool exigido.
            pools.forEach((pool) => {
                chars.push(pool[Math.floor(Math.random() * pool.length)]);
            });

            while (chars.length < length) {
                chars.push(all[Math.floor(Math.random() * all.length)]);
            }

            for (let i = chars.length - 1; i > 0; i -= 1) {
                const j = Math.floor(Math.random() * (i + 1));
                [chars[i], chars[j]] = [chars[j], chars[i]];
            }

            this.syncInput(chars.join(''));
            this.showPassword = true;
            this.$refs.input?.focus();
        },

        async copy() {
            const input = this.$refs.input;

            if (! input || ! this.hasValue) {
                return;
            }

            try {
                if (navigator.clipboard?.writeText) {
                    await navigator.clipboard.writeText(input.value);
                } else {
                    const previouslyRevealed = this.isRevealed;
                    const previousType = input.type;

                    input.type = 'text';
                    input.select();
                    document.execCommand('copy');
                    input.type = previousType;

                    if (! previouslyRevealed) {
                        this.showPassword = false;
                        this.holdingReveal = false;
                    }

                    window.getSelection()?.removeAllRanges();
                }

                this.copied = true;

                if (this.copyTimer) {
                    clearTimeout(this.copyTimer);
                }

                this.copyTimer = setTimeout(() => {
                    this.copied = false;
                }, 1600);
            } catch {
                this.copied = false;
            }
        },
    }));
});
