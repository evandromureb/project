// Lógica do <x-forms.switch> — readonly / loading precisam de preventDefault
// com comparações que quebrariam wire:navigate se ficassem inline no x-data.
// Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formSwitch', (options = {}) => ({
        readonly: Boolean(options.readonly),
        loading: Boolean(options.loading),

        onClick(event) {
            if (this.readonly || this.loading) {
                event.preventDefault();
            }
        },
    }));
});
