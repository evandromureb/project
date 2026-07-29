// Lógica do <x-ui.accordion> registrada como Alpine.data nomeado (não inline
// no x-data) — mesma razão do dropdown/tabs: navegação por teclado e o
// toggle de múltiplos itens envolvem comparações/arrow functions, que
// quebrariam wire:navigate se ficassem soltas num atributo x-data="{...}"
// inline. Ver reference/dropdown.md (gotcha #4) na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('accordion', (defaultOpen, multiple) => ({
        open: defaultOpen,
        multiple,

        isOpen(name) {
            return this.multiple ? this.open.includes(name) : this.open === name;
        },

        toggle(name) {
            if (!this.multiple) {
                this.open = this.open === name ? null : name;
                return;
            }

            this.open = this.open.includes(name)
                ? this.open.filter((item) => item !== name)
                : [...this.open, name];
        },

        headers() {
            return Array.from(this.$refs.container.querySelectorAll('[data-accordion-name]:not(:disabled)'));
        },

        focusHeader(offset) {
            const headers = this.headers();
            const currentIndex = headers.indexOf(document.activeElement);
            const nextIndex = (currentIndex + offset + headers.length) % headers.length;
            const next = headers[nextIndex];

            if (next) {
                next.focus();
            }
        },

        focusFirst() {
            const [first] = this.headers();

            if (first) {
                first.focus();
            }
        },

        focusLast() {
            const headers = this.headers();
            const last = headers[headers.length - 1];

            if (last) {
                last.focus();
            }
        },
    }));
});
