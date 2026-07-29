// Lógica do <x-forms.rating> como Alpine.data nomeado
// (não inline no x-data) — comparações/arrows quebrariam wire:navigate.
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formRating', (options = {}) => ({
        max: Math.max(1, Math.min(10, Number(options.max ?? 5))),
        value: null,
        hoverValue: null,
        allowHalf: Boolean(options.allowHalf),
        clearable: options.clearable !== false,
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        required: Boolean(options.required),
        labels: Array.isArray(options.labels) ? options.labels : [],
        emptyLabel: options.emptyLabel ?? 'Sem avaliação',
        name: options.name ?? null,

        init() {
            this.value = this.normalize(options.value);

            this.$watch('value', () => {
                this.syncModel();
                this.$dispatch('rating-changed', {
                    value: this.value,
                    max: this.max,
                    label: this.currentLabel,
                });
            });

            this.$nextTick(() => this.syncModel());
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get hasValue() {
            return this.value !== null && this.value !== undefined && this.value !== '';
        },

        get displayValue() {
            return this.hoverValue !== null ? this.hoverValue : (this.hasValue ? this.value : 0);
        },

        get step() {
            return this.allowHalf ? 0.5 : 1;
        },

        get currentLabel() {
            if (! this.hasValue && this.hoverValue === null) {
                return this.emptyLabel;
            }

            const score = this.hoverValue !== null ? this.hoverValue : this.value;
            const index = Math.max(0, Math.ceil(Number(score)) - 1);

            if (this.labels[index]) {
                return String(this.labels[index]);
            }

            return this.formatValue(score);
        },

        get stars() {
            return Array.from({ length: this.max }, (_, index) => index + 1);
        },

        normalize(raw) {
            if (raw === null || raw === undefined || raw === '') {
                return null;
            }

            let next = Number(raw);

            if (! Number.isFinite(next)) {
                return null;
            }

            next = Math.max(0, Math.min(this.max, next));

            if (this.allowHalf) {
                next = Math.round(next * 2) / 2;
            } else {
                next = Math.round(next);
            }

            if (next <= 0) {
                return this.clearable ? null : this.step;
            }

            return next;
        },

        formatValue(value) {
            if (value === null || value === undefined) {
                return '';
            }

            const number = Number(value);

            if (! Number.isFinite(number)) {
                return '';
            }

            return Number.isInteger(number) ? String(number) : number.toFixed(1);
        },

        syncModel() {
            const model = this.$refs.model;

            if (! model) {
                return;
            }

            const next = this.hasValue ? String(this.value) : '';

            if (model.value !== next) {
                model.value = next;
                model.dispatchEvent(new Event('input', { bubbles: true }));
                model.dispatchEvent(new Event('change', { bubbles: true }));
            }
        },

        fillState(star) {
            const current = Number(this.displayValue);

            if (current >= star) {
                return 'full';
            }

            if (this.allowHalf && current >= star - 0.5) {
                return 'half';
            }

            return 'empty';
        },

        isActive(star) {
            return this.fillState(star) !== 'empty';
        },

        resolveClickValue(star, event) {
            if (! this.allowHalf) {
                return star;
            }

            const rect = event.currentTarget?.getBoundingClientRect?.();

            if (! rect) {
                return star;
            }

            const ratio = (event.clientX - rect.left) / rect.width;
            const isRtl = getComputedStyle(event.currentTarget).direction === 'rtl';
            const onLeft = isRtl ? ratio > 0.5 : ratio <= 0.5;

            return onLeft ? star - 0.5 : star;
        },

        resolveHoverValue(star, event) {
            return this.resolveClickValue(star, event);
        },

        setValue(next) {
            if (! this.canEdit) {
                return;
            }

            const normalized = this.normalize(next);
            const previous = this.value;

            if (
                this.clearable
                && previous !== null
                && normalized !== null
                && Number(previous) === Number(normalized)
            ) {
                this.value = null;
                this.hoverValue = null;
                this.$dispatch('rating-cleared');

                return;
            }

            this.value = normalized;
            this.hoverValue = null;
        },

        clear() {
            if (! this.canEdit || ! this.clearable) {
                return;
            }

            this.value = null;
            this.hoverValue = null;
            this.$dispatch('rating-cleared');
        },

        onStarClick(star, event) {
            if (! this.canEdit) {
                return;
            }

            this.setValue(this.resolveClickValue(star, event));
        },

        onStarMove(star, event) {
            if (! this.canEdit) {
                return;
            }

            this.hoverValue = this.resolveHoverValue(star, event);
        },

        onStarEnter(star) {
            if (! this.canEdit || this.allowHalf) {
                return;
            }

            this.hoverValue = star;
        },

        onLeave() {
            this.hoverValue = null;
        },

        onKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            const key = event.key;
            const current = this.hasValue ? Number(this.value) : 0;

            if (key === 'ArrowRight' || key === 'ArrowUp') {
                event.preventDefault();
                this.setValue(current > 0 ? current + this.step : this.step);

                return;
            }

            if (key === 'ArrowLeft' || key === 'ArrowDown') {
                event.preventDefault();

                if (current <= this.step) {
                    if (this.clearable) {
                        this.clear();
                    }

                    return;
                }

                this.setValue(current - this.step);

                return;
            }

            if (key === 'Home') {
                event.preventDefault();
                this.setValue(this.step);

                return;
            }

            if (key === 'End') {
                event.preventDefault();
                this.setValue(this.max);

                return;
            }

            if (key === 'Backspace' || key === 'Delete' || key === 'Escape') {
                if (this.clearable) {
                    event.preventDefault();
                    this.clear();
                }

                return;
            }

            if (/^[0-9]$/.test(key)) {
                const digit = Number(key);

                if (digit >= 0 && digit <= this.max) {
                    event.preventDefault();

                    if (digit === 0 && this.clearable) {
                        this.clear();
                    } else if (digit > 0) {
                        this.setValue(digit);
                    }
                }
            }
        },
    }));
});
