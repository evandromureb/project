// <x-ui.modal> usa uma store global do Alpine (mesmo padrão do collapse, ver
// reference/collapse.md) — o gatilho não precisa ser vizinho do modal no DOM,
// e um modal pode abrir/fechar outro (ex.: fluxo de confirmação em etapas).
document.addEventListener('alpine:init', () => {
    Alpine.store('modal', {
        open: {},

        isOpen(name) {
            return !!this.open[name];
        },

        show(name) {
            this.open[name] = true;
        },

        hide(name) {
            this.open[name] = false;
        },

        toggle(name) {
            this.open[name] = !this.open[name];
        },

        hideMany(names) {
            names.forEach((name) => this.hide(name));
        },
    });
});
