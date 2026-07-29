// Lógica do <x-forms.textarea> registrada como Alpine.data nomeado (não inline
// no x-data) — floating, clearable, contador e auto-grow usam comparações /
// arrow functions que quebrariam wire:navigate se ficassem soltas num atributo
// x-data="{...}". Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formTextarea', (options = {}) => ({
        length: String(options.value ?? '').length,
        words: 0,
        maxLength: options.maxLength ?? null,
        showCharCounter: Boolean(options.showCharCounter),
        showWordCounter: Boolean(options.showWordCounter),
        focused: false,
        floating: Boolean(options.floating),
        autoGrow: Boolean(options.autoGrow),
        minRows: options.minRows ?? 3,
        maxRows: options.maxRows ?? null,
        labelActive: options.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: options.labelRest ?? 'top-3 translate-y-0 text-sm',

        init() {
            this.words = this.countWords(String(options.value ?? ''));

            this.$nextTick(() => {
                if (this.$refs.textarea) {
                    this.syncFromDom();
                    this.autoResize();
                }
            });
        },

        get hasValue() {
            return this.length > 0;
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

        get counterText() {
            const parts = [];

            if (this.showWordCounter) {
                parts.push(this.words + ' ' + (this.words === 1 ? 'palavra' : 'palavras'));
            }

            if (this.showCharCounter) {
                parts.push(this.maxLength ? (this.length + '/' + this.maxLength) : String(this.length));
            }

            return parts.join(' · ');
        },

        countWords(value) {
            const trimmed = String(value).trim();

            if (trimmed === '') {
                return 0;
            }

            return trimmed.split(/\s+/).length;
        },

        syncFromDom() {
            const textarea = this.$refs.textarea;

            if (! textarea) {
                return;
            }

            this.length = textarea.value.length;
            this.words = this.countWords(textarea.value);
        },

        onFocus() {
            this.focused = true;
        },

        onBlur() {
            this.focused = false;
        },

        onInput(event) {
            this.length = event.target.value.length;
            this.words = this.countWords(event.target.value);
            this.autoResize();
        },

        autoResize() {
            if (! this.autoGrow) {
                return;
            }

            const textarea = this.$refs.textarea;

            if (! textarea) {
                return;
            }

            const styles = window.getComputedStyle(textarea);
            const lineHeight = Number.parseFloat(styles.lineHeight)
                || Number.parseFloat(styles.fontSize) * 1.5
                || 20;
            const paddingY = (Number.parseFloat(styles.paddingTop) || 0)
                + (Number.parseFloat(styles.paddingBottom) || 0);
            const borderY = (Number.parseFloat(styles.borderTopWidth) || 0)
                + (Number.parseFloat(styles.borderBottomWidth) || 0);
            const minHeight = (lineHeight * this.minRows) + paddingY + borderY;
            const maxHeight = this.maxRows
                ? (lineHeight * this.maxRows) + paddingY + borderY
                : null;

            textarea.style.height = 'auto';
            textarea.style.overflowY = 'hidden';

            let nextHeight = Math.max(textarea.scrollHeight, minHeight);

            if (maxHeight !== null && nextHeight > maxHeight) {
                nextHeight = maxHeight;
                textarea.style.overflowY = 'auto';
            }

            textarea.style.height = `${nextHeight}px`;
        },

        clear() {
            const textarea = this.$refs.textarea;

            if (! textarea || textarea.disabled || textarea.readOnly) {
                return;
            }

            textarea.value = '';
            this.length = 0;
            this.words = 0;
            textarea.dispatchEvent(new Event('input', { bubbles: true }));
            textarea.dispatchEvent(new Event('change', { bubbles: true }));
            this.autoResize();
            textarea.focus();
        },
    }));
});
