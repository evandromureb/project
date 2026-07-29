// <x-ui.collapse> usa uma store global do Alpine (não um x-data local) porque,
// ao contrário de tabs/accordion, o gatilho e o painel não precisam ser
// vizinhos no DOM — vários botões podem controlar o mesmo painel, e um botão
// pode controlar vários painéis ao mesmo tempo (mesma flexibilidade do
// collapse). O estado fica compartilhado por "name".
document.addEventListener('alpine:init', () => {
    Alpine.store('collapse', {
        open: {},

        isOpen(name) {
            return !!this.open[name];
        },

        // Só define o estado inicial se ainda não existir — evita que o
        // segundo <x-ui.collapse.collapse-trigger>/<x-ui.collapse> com o mesmo "name"
        // sobrescreva um estado já alterado pelo usuário.
        setDefault(name, value) {
            if (this.open[name] === undefined) {
                this.open[name] = value;
            }
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

        toggleMany(names) {
            names.forEach((name) => this.toggle(name));
        },
    });
});
