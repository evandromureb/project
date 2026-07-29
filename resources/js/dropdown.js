// Lógica do <x-ui.dropdown> registrada como um componente Alpine nomeado
// (Alpine.data), em vez de um objeto inline no atributo x-data.
//
// Por quê: um x-data inline grande, com comparações (`>`, `<`) e arrow
// functions (`=>`), quebra a navegação via wire:navigate — o HTML da página
// de destino é reprocessado pelo Livewire antes de entrar no DOM, e esse
// reprocessamento não lida bem com um `>` "solto" dentro do valor de um
// atributo (mesmo sendo HTML válido), cortando a tag ali e despejando o
// restante do atributo como texto visível na página. Um x-data curto como
// `dropdown(direction, align, autoCloseOutside, autoCloseInside)` — só uma
// chamada de função com argumentos JSON, sem operadores — não sofre disso.
document.addEventListener('alpine:init', () => {
    Alpine.data('dropdown', (direction, align, autoCloseOutside, autoCloseInside) => ({
        open: false,
        direction,
        align,
        autoCloseOutside,
        autoCloseInside,
        menuStyle: '',

        toggle() {
            if (this.open) {
                this.open = false;
                return;
            }

            // Torna o menu mensurável (mas invisível) antes de calcular a
            // posição final — necessário para o modo "auto" decidir o lado
            // com espaço suficiente a partir da altura/largura reais do menu.
            this.menuStyle = 'position:fixed; visibility:hidden; top:0; left:0;';
            this.open = true;
            this.$nextTick(() => this.updatePosition());
        },

        updatePosition() {
            const rect = this.$refs.trigger.getBoundingClientRect();
            const menuRect = this.$refs.menu.getBoundingClientRect();
            const gap = 8;
            const vw = window.innerWidth;
            const vh = window.innerHeight;

            let direction = this.direction;
            if (direction === 'auto') {
                const spaceBelow = vh - rect.bottom;
                const spaceAbove = rect.top;
                direction = spaceBelow < menuRect.height + gap && spaceAbove > spaceBelow ? 'up' : 'down';
            }

            let align = this.align;
            if (align === 'auto') {
                const spaceRight = vw - rect.left;
                align = spaceRight < menuRect.width + gap ? 'end' : 'start';
            }

            let style = 'position:fixed;';

            if (direction === 'start') {
                style += `top:${rect.top}px;right:${vw - rect.left + gap}px;`;
            } else if (direction === 'end') {
                style += `top:${rect.top}px;left:${rect.right + gap}px;`;
            } else if (direction === 'up') {
                style += `bottom:${vh - rect.top + gap}px;`;
                style += align === 'end' ? `right:${vw - rect.right}px;` : `left:${rect.left}px;`;
            } else {
                style += `top:${rect.bottom + gap}px;`;
                style += align === 'end' ? `right:${vw - rect.right}px;` : `left:${rect.left}px;`;
            }

            this.menuStyle = style;
        },

        closeIfOutside(target) {
            if (
                this.autoCloseOutside
                && this.open
                && !this.$refs.trigger.contains(target)
                && (!this.$refs.menu || !this.$refs.menu.contains(target))
            ) {
                this.open = false;
            }
        },

        closeIfInside(target) {
            if (this.autoCloseInside && !target.closest('[data-keep-open]')) {
                this.open = false;
            }
        },
    }));
});
