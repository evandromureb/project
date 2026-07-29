// <x-ui.drawer> usa uma store global do Alpine, mesmo padrão de
// <x-ui.modal> (ver resources/js/modal.js) — o gatilho não precisa ser
// vizinho do drawer no DOM, e um drawer pode abrir/fechar outro.
document.addEventListener('alpine:init', () => {
    Alpine.store('drawer', {
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
