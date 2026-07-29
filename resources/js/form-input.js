// Lógica do <x-forms.input> registrada como Alpine.data nomeado (não inline
// no x-data) — toggle de senha, clearable, contador e floating label usam
// comparações / arrow functions que quebrariam wire:navigate se ficassem
// soltas num atributo x-data="{...}". Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formInput', (initialType, options = {}) => ({
        type: initialType,
        showPassword: false,
        length: String(options.value ?? '').length,
        maxLength: options.maxLength ?? null,
        focused: false,
        floating: Boolean(options.floating),
        labelActive: options.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: options.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',

        init() {
            // Valor inicial / autofill podem existir no DOM antes do Alpine.
            this.$nextTick(() => {
                if (this.$refs.input) {
                    this.length = this.$refs.input.value.length;
                }
            });
        },

        get inputType() {
            if (this.type !== 'password') {
                return this.type;
            }

            return this.showPassword ? 'text' : 'password';
        },

        get hasValue() {
            return this.length > 0;
        },

        // Floating: sobe com foco ou valor; desce só quando vazio e blur.
        get labelFloated() {
            return ! this.floating || this.focused || this.hasValue;
        },

        // Objeto Alpine: remove a classe quando false (string merge NÃO remove
        // as classes estáticas do atributo class — era isso que sobrepunha).
        get floatingLabelClasses() {
            return {
                [this.labelActive]: this.labelFloated,
                [this.labelRest]: ! this.labelFloated,
            };
        },

        togglePassword() {
            this.showPassword = ! this.showPassword;
        },

        onFocus() {
            this.focused = true;
        },

        onBlur() {
            this.focused = false;
        },

        onInput(event) {
            this.length = event.target.value.length;
        },

        clear() {
            const input = this.$refs.input;

            if (! input || input.disabled || input.readOnly) {
                return;
            }

            input.value = '';
            this.length = 0;
            input.dispatchEvent(new Event('input', { bubbles: true }));
            input.dispatchEvent(new Event('change', { bubbles: true }));
            input.focus();
        },
    }));
});
