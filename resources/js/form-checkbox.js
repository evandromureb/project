// Lógica do <x-forms.checkbox> — indeterminate e readonly precisam de
// propriedade DOM / preventDefault com comparações que quebrariam
// wire:navigate se ficassem inline no x-data. Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formCheckbox', (options = {}) => ({
        indeterminate: Boolean(options.indeterminate),
        readonly: Boolean(options.readonly),

        init() {
            this.syncIndeterminate();
        },

        syncIndeterminate() {
            const input = this.$refs.input;

            if (! input) {
                return;
            }

            input.indeterminate = this.indeterminate;
        },

        onClick(event) {
            if (this.readonly) {
                event.preventDefault();

                return;
            }

            if (this.indeterminate) {
                this.indeterminate = false;
                this.$nextTick(() => this.syncIndeterminate());
            }
        },
    }));
});
