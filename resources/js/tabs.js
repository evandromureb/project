// Lógica do <x-ui.tabs> registrada como Alpine.data nomeado (não inline no
// x-data) — mesma razão do dropdown: navegação por teclado envolve
// comparações e aritmética, que quebrariam wire:navigate se ficassem soltas
// num atributo x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4)
// e reference/tabs.md na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('tabs', (defaultTab) => ({
        active: defaultTab,

        init() {
            if (this.active) {
                return;
            }

            const [first] = this.focusableTabs();

            if (first) {
                this.active = first.dataset.tabName;
            }
        },

        focusableTabs() {
            return Array.from(this.$refs.nav.querySelectorAll('[data-tab-name]:not(:disabled)'));
        },

        select(name) {
            this.active = name;
        },

        focusTab(offset) {
            const tabs = this.focusableTabs();
            const currentIndex = tabs.findIndex((tab) => tab.dataset.tabName === this.active);
            const nextIndex = (currentIndex + offset + tabs.length) % tabs.length;
            const next = tabs[nextIndex];

            if (next) {
                next.focus();
                this.select(next.dataset.tabName);
            }
        },

        focusFirst() {
            const [first] = this.focusableTabs();

            if (first) {
                first.focus();
                this.select(first.dataset.tabName);
            }
        },

        focusLast() {
            const tabs = this.focusableTabs();
            const last = tabs[tabs.length - 1];

            if (last) {
                last.focus();
                this.select(last.dataset.tabName);
            }
        },
    }));
});
