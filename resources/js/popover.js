// <x-ui.popover> — Alpine.data nomeado, mesmo motivo do tooltip/dropdown
// (posição/auto-flip envolve comparações e aritmética, ver reference/dropdown.md
// gotcha #4). Ao contrário do <x-ui.collapse>/<x-ui.modal>, o estado NÃO é uma
// store global — gatilho e painel de um popover são sempre vizinhos no DOM
// (o slot "trigger" fica dentro do próprio componente), então um x-data local
// por instância é suficiente e mais simples.
document.addEventListener('alpine:init', () => {
    Alpine.data('popover', (placement) => ({
        open: false,
        placement,
        resolvedPlacement: 'bottom',
        popoverStyle: '',

        toggle() {
            if (this.open) {
                this.open = false;
                return;
            }

            this.openPopover();
        },

        openPopover() {
            this.open = true;
            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        close() {
            this.open = false;
        },

        updatePosition() {
            const rect = this.$refs.trigger.getBoundingClientRect();
            const panel = this.$refs.panel.getBoundingClientRect();
            const gap = 10;
            const vh = window.innerHeight;

            let placement = this.placement;
            if (placement === 'auto') {
                const spaceTop = rect.top;
                const spaceBottom = vh - rect.bottom;
                placement = spaceBottom < panel.height + gap && spaceTop > spaceBottom ? 'top' : 'bottom';
            }

            // Centraliza com "transform" a partir do retângulo (estável) do
            // acionador — não da largura do painel (que está em transição).
            // Só é seguro porque o painel usa classes de transição explícitas
            // de opacidade (ver popover.blade.php), não o x-transition padrão
            // do Alpine, que também anima "scale" via transform e
            // sobrescreveria o nosso — ver reference/tooltip.md.
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            let style = 'position:fixed;';

            if (placement === 'left') {
                style += `top:${centerY}px;right:${window.innerWidth - rect.left + gap}px;transform:translateY(-50%);`;
            } else if (placement === 'right') {
                style += `top:${centerY}px;left:${rect.right + gap}px;transform:translateY(-50%);`;
            } else if (placement === 'top') {
                style += `bottom:${vh - rect.top + gap}px;left:${centerX}px;transform:translateX(-50%);`;
            } else {
                style += `top:${rect.bottom + gap}px;left:${centerX}px;transform:translateX(-50%);`;
            }

            this.popoverStyle = style;
            this.resolvedPlacement = placement;
        },

        closeIfOutside(target) {
            if (
                this.open
                && !this.$refs.trigger.contains(target)
                && (!this.$refs.panel || !this.$refs.panel.contains(target))
            ) {
                this.close();
            }
        },
    }));
});
