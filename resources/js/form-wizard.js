// Lógica do <x-forms.wizard> como Alpine.data nomeado (não inline no
// x-data) — comparações e arrows quebrariam wire:navigate se ficassem
// soltas num atributo x-data="{...}". Ver reference/dropdown.md (gotcha #4)
// e reference/forms-wizard.md na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('formWizard', (config = {}) => ({
        active: config.default ?? null,
        linear: config.linear !== false,
        clickable: Boolean(config.clickable),
        validate: config.validate !== false,
        disabled: Boolean(config.disabled),
        loading: Boolean(config.loading),
        optionalText: config.optionalText ?? 'Opcional',
        stepIndexText: config.stepIndexText ?? 'Etapa',
        completed: Array.isArray(config.completed) ? [...config.completed.map(String)] : [],
        errors: Array.isArray(config.errors) ? [...config.errors.map(String)] : [],
        steps: [],

        init() {
            this.collectSteps();

            if (! this.active) {
                const first = this.enabledSteps()[0];

                if (first) {
                    this.active = first.name;
                }
            }

            this.$watch('active', (value, oldValue) => {
                this.$dispatch('wizard-changed', {
                    step: value,
                    previous: oldValue,
                    index: this.currentIndex,
                    total: this.steps.length,
                    isFirst: this.isFirst,
                    isLast: this.isLast,
                    completed: [...this.completed],
                });
            });

            this.$el.addEventListener('wizard-set-error', (event) => {
                const step = event.detail?.step ?? event.detail;

                if (step) {
                    this.markError(String(step));
                }
            });

            this.$el.addEventListener('wizard-clear-error', (event) => {
                const step = event.detail?.step ?? event.detail;

                if (step) {
                    this.clearError(String(step));
                } else {
                    this.errors = [];
                }
            });

            this.$el.addEventListener('wizard-complete-step', (event) => {
                const step = event.detail?.step ?? event.detail;

                if (step) {
                    this.markComplete(String(step));
                }
            });
        },

        collectSteps() {
            const panels = Array.from(this.$el.querySelectorAll('[data-wizard-step]'));

            this.steps = panels.map((panel, index) => ({
                name: String(panel.dataset.wizardStep),
                title: panel.dataset.wizardTitle || `Etapa ${index + 1}`,
                description: panel.dataset.wizardDescription || '',
                icon: panel.dataset.wizardIcon || '',
                optional: panel.dataset.wizardOptional === 'true',
                disabled: panel.hasAttribute('disabled') || panel.dataset.wizardDisabled === 'true',
            }));
        },

        enabledSteps() {
            return this.steps.filter((step) => ! step.disabled);
        },

        get currentIndex() {
            return this.steps.findIndex((step) => step.name === this.active);
        },

        get currentStep() {
            return this.steps[this.currentIndex] ?? null;
        },

        get isFirst() {
            const enabled = this.enabledSteps();

            return enabled.length === 0 || enabled[0]?.name === this.active;
        },

        get isLast() {
            const enabled = this.enabledSteps();

            return enabled.length === 0 || enabled[enabled.length - 1]?.name === this.active;
        },

        get progress() {
            if (this.steps.length === 0) {
                return 0;
            }

            if (this.isLast && this.completed.includes(this.active)) {
                return 100;
            }

            const index = Math.max(this.currentIndex, 0);

            return Math.round(((index) / Math.max(this.steps.length - 1, 1)) * 100);
        },

        get progressLabel() {
            if (this.steps.length === 0) {
                return '0 / 0';
            }

            return `${this.currentIndex + 1} / ${this.steps.length}`;
        },

        get position() {
            if (this.isFirst) {
                return 'first';
            }

            if (this.isLast) {
                return 'last';
            }

            return 'between';
        },

        statusOf(name) {
            if (this.errors.includes(name)) {
                return 'error';
            }

            if (this.active === name) {
                return 'active';
            }

            if (this.completed.includes(name)) {
                return 'done';
            }

            return 'pending';
        },

        isReachable(name) {
            if (this.disabled) {
                return false;
            }

            const step = this.steps.find((item) => item.name === name);

            if (! step || step.disabled) {
                return false;
            }

            if (! this.linear || this.clickable) {
                return true;
            }

            const targetIndex = this.steps.findIndex((item) => item.name === name);

            if (targetIndex <= this.currentIndex) {
                return true;
            }

            // Em modo linear, só avança para a próxima etapa ainda não bloqueada
            // (todas as anteriores obrigatórias precisam estar completed).
            for (let i = 0; i < targetIndex; i++) {
                const prior = this.steps[i];

                if (prior.disabled || prior.optional) {
                    continue;
                }

                if (! this.completed.includes(prior.name) && prior.name !== this.active) {
                    return false;
                }
            }

            return targetIndex <= this.currentIndex + 1;
        },

        panelEl(name = this.active) {
            return this.$el.querySelector(`[data-wizard-step="${name}"]`);
        },

        validateCurrent() {
            if (! this.validate) {
                return true;
            }

            const panel = this.panelEl();

            if (! panel) {
                return true;
            }

            const fields = Array.from(panel.querySelectorAll('input, select, textarea'));
            let firstInvalid = null;

            for (const field of fields) {
                if (field.disabled || field.readOnly) {
                    continue;
                }

                if (typeof field.checkValidity === 'function' && ! field.checkValidity()) {
                    firstInvalid = firstInvalid ?? field;
                }
            }

            if (firstInvalid) {
                this.markError(this.active);
                firstInvalid.reportValidity();
                this.$dispatch('wizard-invalid', {
                    step: this.active,
                    field: firstInvalid,
                });

                return false;
            }

            this.clearError(this.active);

            return true;
        },

        markComplete(name) {
            if (! this.completed.includes(name)) {
                this.completed.push(name);
            }

            this.clearError(name);
        },

        markError(name) {
            if (! this.errors.includes(name)) {
                this.errors.push(name);
            }
        },

        clearError(name) {
            this.errors = this.errors.filter((item) => item !== name);
        },

        select(name, { force = false } = {}) {
            if (! force && ! this.isReachable(name)) {
                return false;
            }

            if (name === this.active) {
                return true;
            }

            this.active = name;

            return true;
        },

        next() {
            if (this.disabled || this.loading || this.isLast) {
                return false;
            }

            if (! this.requestProceed('next')) {
                return false;
            }

            if (! this.validateCurrent()) {
                return false;
            }

            this.markComplete(this.active);

            const enabled = this.enabledSteps();
            const currentEnabledIndex = enabled.findIndex((step) => step.name === this.active);
            const next = enabled[currentEnabledIndex + 1];

            if (! next) {
                return false;
            }

            this.active = next.name;
            this.$dispatch('wizard-next', {
                step: this.active,
                index: this.currentIndex,
            });

            return true;
        },

        previous() {
            if (this.disabled || this.loading || this.isFirst) {
                return false;
            }

            if (! this.requestProceed('previous')) {
                return false;
            }

            const enabled = this.enabledSteps();
            const currentEnabledIndex = enabled.findIndex((step) => step.name === this.active);
            const prev = enabled[currentEnabledIndex - 1];

            if (! prev) {
                return false;
            }

            this.active = prev.name;
            this.$dispatch('wizard-previous', {
                step: this.active,
                index: this.currentIndex,
            });

            return true;
        },

        // Síncrono de propósito: em botão type="submit" o preventDefault precisa
        // rodar antes de qualquer await, senão o form envia mesmo inválido.
        finish(event = null) {
            if (this.disabled || this.loading) {
                event?.preventDefault?.();

                return false;
            }

            if (! this.requestProceed('finish')) {
                event?.preventDefault?.();

                return false;
            }

            if (! this.validateCurrent()) {
                event?.preventDefault?.();

                return false;
            }

            this.markComplete(this.active);

            this.$dispatch('wizard-finish', {
                step: this.active,
                completed: [...this.completed],
                steps: this.steps.map((step) => step.name),
            });

            return true;
        },

        goTo(name) {
            if (! this.isReachable(name) || name === this.active) {
                return false;
            }

            const targetIndex = this.steps.findIndex((step) => step.name === name);

            if (targetIndex > this.currentIndex && ! this.validateCurrent()) {
                return false;
            }

            if (targetIndex > this.currentIndex) {
                this.markComplete(this.active);
            }

            if (! this.requestProceed('goto', name)) {
                return false;
            }

            this.active = name;
            this.$dispatch('wizard-goto', {
                step: this.active,
                index: this.currentIndex,
            });

            return true;
        },

        requestProceed(action, target = null) {
            let allowed = true;

            const detail = {
                action,
                step: this.active,
                target,
                preventDefault() {
                    allowed = false;
                },
            };

            this.$dispatch('wizard-before-change', detail);

            return allowed;
        },

        focusStep(offset) {
            const enabled = this.enabledSteps().filter((step) => this.isReachable(step.name));
            const currentIndex = enabled.findIndex((step) => step.name === this.active);
            const nextIndex = (currentIndex + offset + enabled.length) % enabled.length;
            const next = enabled[nextIndex];

            if (next) {
                this.goTo(next.name);
            }
        },

        isNotLastIndex(index) {
            return index !== this.steps.length - 1;
        },

        goFirst() {
            const [first] = this.enabledSteps();

            return first ? this.goTo(first.name) : false;
        },

        goLast() {
            const enabled = this.enabledSteps();
            const last = enabled[enabled.length - 1];

            return last ? this.goTo(last.name) : false;
        },
    }));
});
