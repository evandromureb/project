// Lógica do <x-forms.radio> — readonly precisa de preventDefault com
// comparações que quebrariam wire:navigate se ficassem inline no x-data.
// Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formRadio', (options = {}) => ({
        readonly: Boolean(options.readonly),

        onClick(event) {
            if (this.readonly) {
                event.preventDefault();
            }
        },
    }));
});
