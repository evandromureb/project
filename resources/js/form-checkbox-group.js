// <x-forms.checkbox.checkbox-group> — select-all / contagem opcional.
// Alpine.data nomeado (sem operadores no atributo x-data). Ver dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formCheckboxGroup', (options = {}) => ({
        selectAll: Boolean(options.selectAll),
        version: 0,

        get checkboxes() {
            this.version;

            return Array.from(this.$refs.list?.querySelectorAll('input[type="checkbox"]') ?? [])
                .filter((input) => ! input.disabled && input.dataset.checkboxGroupMaster !== 'true');
        },

        get checkedCount() {
            return this.checkboxes.filter((input) => input.checked).length;
        },

        get totalCount() {
            return this.checkboxes.length;
        },

        get allChecked() {
            return this.totalCount > 0 && this.checkedCount === this.totalCount;
        },

        get someChecked() {
            return this.checkedCount > 0 && this.checkedCount < this.totalCount;
        },

        init() {
            this.$nextTick(() => {
                this.version++;
                this.syncMaster();
            });
        },

        syncMaster() {
            const master = this.$refs.master;

            if (! master) {
                return;
            }

            master.checked = this.allChecked;
            master.indeterminate = this.someChecked;
        },

        toggleAll() {
            const master = this.$refs.master;
            const shouldCheck = Boolean(master?.checked);

            this.checkboxes.forEach((input) => {
                if (input.checked === shouldCheck) {
                    return;
                }

                input.checked = shouldCheck;
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            });

            this.version++;
            this.syncMaster();
        },

        onChildChange() {
            this.version++;
            this.syncMaster();
        },
    }));
});
