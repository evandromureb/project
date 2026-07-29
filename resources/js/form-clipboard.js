// Lógica do <x-forms.clipboard> como Alpine.data nomeado
// (não inline no x-data) — comparações/arrows quebrariam wire:navigate.
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formClipboard', (options = {}) => ({
        text: String(options.value ?? ''),
        copyValue: options.copyValue === null || options.copyValue === undefined
            ? null
            : String(options.copyValue),
        mode: ['input', 'textarea', 'code', 'button'].includes(options.mode)
            ? options.mode
            : 'input',
        editable: Boolean(options.editable),
        masked: Boolean(options.masked),
        trim: options.trim !== false,
        selectOnFocus: Boolean(options.selectOnFocus ?? true),
        selectOnCopy: options.selectOnCopy !== false,
        clickToCopy: Boolean(options.clickToCopy),
        timeout: Math.max(400, Number(options.timeout ?? 1600)),
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly ?? true),
        floating: Boolean(options.floating),
        labelActive: options.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: options.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',
        copiedLabel: options.copiedLabel ?? 'Copiado!',
        copyLabel: options.copyLabel ?? 'Copiar',
        errorLabel: options.errorLabel ?? 'Falha ao copiar',

        copied: false,
        failed: false,
        revealed: false,
        focused: false,
        copyTimer: null,

        init() {
            if (this.$refs.field && this.text !== '' && this.$refs.field.value !== this.text) {
                this.$refs.field.value = this.text;
            }

            this.$watch('text', (value) => {
                this.syncField(value);
                this.syncModel();
            });

            this.$nextTick(() => this.syncModel());
        },

        destroy() {
            if (this.copyTimer) {
                clearTimeout(this.copyTimer);
            }
        },

        get hasValue() {
            return String(this.payload).length > 0;
        },

        get payload() {
            const raw = this.copyValue !== null ? this.copyValue : this.text;
            const value = String(raw ?? '');

            return this.trim ? value.trim() : value;
        },

        get displayValue() {
            if (this.masked && ! this.revealed && this.text !== '') {
                return '•'.repeat(Math.min(24, Math.max(8, this.text.length)));
            }

            return this.text;
        },

        get canEdit() {
            return this.editable && ! this.disabled && ! this.readonly;
        },

        get canCopy() {
            return ! this.disabled && this.hasValue;
        },

        // Sempre `text`: máscara via CSS text-security (não type=password),
        // para o Password Manager não tratar API keys / tokens como senha de login.
        get fieldType() {
            return 'text';
        },

        get fieldMaskClass() {
            return this.masked && ! this.revealed
                ? '[-webkit-text-security:disc] [text-security:disc]'
                : '';
        },

        get statusLabel() {
            if (this.failed) {
                return this.errorLabel;
            }

            if (this.copied) {
                return this.copiedLabel;
            }

            return this.copyLabel;
        },

        get labelFloated() {
            return ! this.floating || this.focused || this.hasValue || this.copied;
        },

        get floatingLabelClasses() {
            return {
                [this.labelActive]: this.labelFloated,
                [this.labelRest]: ! this.labelFloated,
            };
        },

        syncField(value) {
            const field = this.$refs.field;

            if (field && field.value !== String(value ?? '')) {
                field.value = String(value ?? '');
            }
        },

        syncModel() {
            const model = this.$refs.model;

            if (! model) {
                return;
            }

            const next = this.text;

            if (model.value !== next) {
                model.value = next;
                model.dispatchEvent(new Event('input', { bubbles: true }));
                model.dispatchEvent(new Event('change', { bubbles: true }));
            }
        },

        onFocus() {
            this.focused = true;

            if (this.selectOnFocus && this.$refs.field && ! this.canEdit) {
                this.$nextTick(() => this.$refs.field?.select?.());
            }
        },

        onBlur() {
            this.focused = false;
        },

        onInput(event) {
            if (! this.canEdit) {
                event.target.value = this.text;

                return;
            }

            this.text = event.target.value;
            this.copied = false;
            this.failed = false;
        },

        onClickSurface() {
            if (this.clickToCopy) {
                this.copy();
            }
        },

        toggleReveal() {
            if (! this.masked || this.disabled) {
                return;
            }

            this.revealed = ! this.revealed;
        },

        selectField() {
            const field = this.$refs.field;

            if (! field) {
                return;
            }

            field.focus();
            field.select?.();
        },

        async writeClipboard(value) {
            if (navigator.clipboard?.writeText) {
                await navigator.clipboard.writeText(value);

                return;
            }

            const helper = document.createElement('textarea');
            helper.value = value;
            helper.setAttribute('readonly', '');
            helper.style.position = 'fixed';
            helper.style.top = '-9999px';
            helper.style.opacity = '0';
            document.body.appendChild(helper);
            helper.select();
            const ok = document.execCommand('copy');
            helper.remove();

            if (! ok) {
                throw new Error('execCommand copy failed');
            }
        },

        resetStatusSoon() {
            if (this.copyTimer) {
                clearTimeout(this.copyTimer);
            }

            this.copyTimer = setTimeout(() => {
                this.copied = false;
                this.failed = false;
            }, this.timeout);
        },

        async copy() {
            if (! this.canCopy) {
                return;
            }

            const value = this.payload;

            try {
                await this.writeClipboard(value);

                this.copied = true;
                this.failed = false;

                if (this.selectOnCopy) {
                    this.selectField();
                }

                this.$dispatch('clipboard-copied', {
                    value,
                    mode: this.mode,
                });

                this.resetStatusSoon();
            } catch {
                this.copied = false;
                this.failed = true;

                this.$dispatch('clipboard-failed', {
                    value,
                    mode: this.mode,
                });

                this.resetStatusSoon();
            }
        },

        clear() {
            if (this.disabled || ! this.canEdit) {
                return;
            }

            this.text = '';
            this.copied = false;
            this.failed = false;
            this.$refs.field?.focus();
            this.$dispatch('clipboard-cleared');
        },
    }));
});
