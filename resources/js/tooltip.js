// <x-ui.tooltip> — Alpine.data nomeado (não x-data inline) pelo mesmo motivo
// do dropdown/tabs/accordion: o cálculo de posição/auto-flip usa comparações
// e aritmética, que quebrariam wire:navigate se ficassem soltas num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4) na skill
// ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('tooltip', (placement) => ({
        show: false,
        placement,
        resolvedPlacement: 'top',
        tooltipStyle: '',

        open() {
            this.show = true;

            // Ver comentário em updatePosition() sobre por que só o
            // requestAnimationFrame (sem medir largura do balão) já é
            // suficiente aqui — a centralização não depende mais de medir o
            // elemento em transição.
            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        close() {
            this.show = false;
        },

        updatePosition() {
            const rect = this.$refs.trigger.getBoundingClientRect();
            const bubble = this.$refs.bubble.getBoundingClientRect();
            const gap = 8;
            const vh = window.innerHeight;

            let placement = this.placement;
            if (placement === 'auto') {
                const spaceTop = rect.top;
                const spaceBottom = vh - rect.bottom;
                placement = spaceTop < bubble.height + gap && spaceBottom > spaceTop ? 'bottom' : 'top';
            }

            // Centraliza com "transform" (não com pixels calculados a partir
            // da largura do balão) — isso depende só do retângulo do
            // ACIONADOR, que é estável e nunca está em transição, ao invés do
            // balão, cuja largura pode ser medida de forma pouco confiável
            // logo após x-show revelá-lo. Isso só é seguro porque o balão usa
            // classes de transição explícitas (só opacidade, ver
            // tooltip.blade.php) em vez do x-transition padrão do Alpine
            // (que também anima "scale" via transform e sobrescreveria o
            // nosso) — ver reference/tooltip.md.
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            let style = 'position:fixed;';

            if (placement === 'left') {
                style += `top:${centerY}px;right:${window.innerWidth - rect.left + gap}px;transform:translateY(-50%);`;
            } else if (placement === 'right') {
                style += `top:${centerY}px;left:${rect.right + gap}px;transform:translateY(-50%);`;
            } else if (placement === 'bottom') {
                style += `top:${rect.bottom + gap}px;left:${centerX}px;transform:translateX(-50%);`;
            } else {
                style += `bottom:${vh - rect.top + gap}px;left:${centerX}px;transform:translateX(-50%);`;
            }

            this.tooltipStyle = style;
            this.resolvedPlacement = placement;
        },
    }));
});
