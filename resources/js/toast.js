// <x-ui.toast-container> lê essa store global do Alpine — mesmo padrão do
// modal/collapse (ver reference/modal.md, reference/collapse.md): o estado
// mora fora do DOM do container, então qualquer parte do app (um @click
// Alpine, um listener de evento do Livewire) pode empilhar um toast sem
// precisar ser vizinho do container no DOM.
//
// Classes visuais (shell/ícone/ação/barra) ficam em métodos da store — NÃO
// em objetos gigantes no x-bind:class do Blade. Objetos multilinha sem
// aspas no atributo HTML quebram o parse e o toast some; além disso,
// qualquer `>` solto no atributo corrompe wire:navigate (reference/dropdown.md).
const TICK_MS = 100;

document.addEventListener('alpine:init', () => {
    Alpine.store('toast', {
        items: [],
        nextId: 1,
        tickerId: null,

        forPosition(position, max = null) {
            const list = this.items.filter((item) => item.position === position);

            return max ? list.slice(-max) : list;
        },

        resolvedVariant(item, fallback) {
            return item.variant || fallback || 'soft';
        },

        shellClass(item, fallback) {
            const variant = this.resolvedVariant(item, fallback);
            const type = item.type || 'default';

            if (variant === 'solid') {
                return {
                    success: 'border-success bg-success text-success-foreground',
                    danger: 'border-danger bg-danger text-danger-foreground',
                    warning: 'border-warning bg-warning text-warning-foreground',
                    info: 'border-info bg-info text-info-foreground',
                    default: 'border-border bg-secondary text-secondary-foreground',
                }[type] || 'border-border bg-secondary text-secondary-foreground';
            }

            if (variant === 'outline') {
                const border = {
                    success: 'border-success/50',
                    danger: 'border-danger/50',
                    warning: 'border-warning/50',
                    info: 'border-info/50',
                    default: 'border-border',
                }[type] || 'border-border';

                return `border bg-card/95 text-foreground ${border}`;
            }

            // soft
            const soft = {
                success: 'border border-border border-l-[3px] border-l-success bg-success/5 text-foreground',
                danger: 'border border-border border-l-[3px] border-l-danger bg-danger/5 text-foreground',
                warning: 'border border-border border-l-[3px] border-l-warning bg-warning/5 text-foreground',
                info: 'border border-border border-l-[3px] border-l-info bg-info/5 text-foreground',
                default: 'border border-border bg-card/95 text-foreground',
            };

            return soft[type] || soft.default;
        },

        iconClass(item, fallback) {
            const variant = this.resolvedVariant(item, fallback);
            const type = item.type || 'default';

            if (variant === 'solid') {
                return 'bg-black/10 text-current';
            }

            return {
                success: 'bg-success/15 text-success',
                danger: 'bg-danger/15 text-danger',
                warning: 'bg-warning/15 text-warning',
                info: 'bg-info/15 text-info',
                default: 'bg-muted text-muted-foreground',
            }[type] || 'bg-muted text-muted-foreground';
        },

        actionClass(item, fallback) {
            const variant = this.resolvedVariant(item, fallback);
            const type = item.type || 'default';

            if (variant === 'solid') {
                return 'bg-black/10 text-current hover:bg-black/15';
            }

            return {
                success: 'bg-success/15 text-success hover:bg-success/25',
                danger: 'bg-danger/15 text-danger hover:bg-danger/25',
                warning: 'bg-warning/15 text-warning hover:bg-warning/25',
                info: 'bg-info/15 text-info hover:bg-info/25',
                default: 'bg-muted text-foreground hover:bg-muted/80',
            }[type] || 'bg-muted text-foreground hover:bg-muted/80';
        },

        progressTrackClass(item, fallback) {
            const variant = this.resolvedVariant(item, fallback);
            const type = item.type || 'default';

            if (variant === 'solid') {
                return 'bg-black/10';
            }

            return {
                success: 'bg-success/15',
                danger: 'bg-danger/15',
                warning: 'bg-warning/15',
                info: 'bg-info/15',
                default: 'bg-muted',
            }[type] || 'bg-muted';
        },

        progressBarClass(item, fallback) {
            const variant = this.resolvedVariant(item, fallback);
            const type = item.type || 'default';

            if (variant === 'solid') {
                return 'bg-current opacity-50';
            }

            return {
                success: 'bg-success',
                danger: 'bg-danger',
                warning: 'bg-warning',
                info: 'bg-info',
                default: 'bg-foreground/40',
            }[type] || 'bg-foreground/40';
        },

        dismissClass(item, fallback) {
            return this.resolvedVariant(item, fallback) === 'solid'
                ? 'hover:bg-black/10'
                : 'hover:bg-muted';
        },

        show(options) {
            const id = this.nextId++;
            const type = options.type ?? 'default';
            const duration = options.duration ?? 5000;

            const item = {
                id,
                type,
                variant: options.variant ?? null,
                icon: options.icon !== undefined ? options.icon : this.defaultIcon(type),
                title: options.title ?? null,
                message: options.message ?? '',
                dismissible: options.dismissible ?? true,
                duration,
                position: options.position ?? 'top-right',
                actions: options.actions ?? [],
                progress: 100,
                remaining: duration,
                paused: false,
            };

            this.items.push(item);
            this.startTicker();

            return id;
        },

        success(message, options = {}) {
            return this.show({ ...options, type: 'success', message });
        },

        danger(message, options = {}) {
            return this.show({ ...options, type: 'danger', message });
        },

        warning(message, options = {}) {
            return this.show({ ...options, type: 'warning', message });
        },

        info(message, options = {}) {
            return this.show({ ...options, type: 'info', message });
        },

        defaultIcon(type) {
            return {
                success: 'bi-check-circle-fill',
                danger: 'bi-x-circle-fill',
                warning: 'bi-exclamation-triangle-fill',
                info: 'bi-info-circle-fill',
            }[type] ?? null;
        },

        dismiss(id) {
            this.items = this.items.filter((item) => item.id !== id);

            if (this.items.length === 0) {
                this.stopTicker();
            }
        },

        clear(position = null) {
            this.items = position ? this.items.filter((item) => item.position !== position) : [];

            if (this.items.length === 0) {
                this.stopTicker();
            }
        },

        pause(id) {
            const item = this.items.find((candidate) => candidate.id === id);

            if (item) {
                item.paused = true;
            }
        },

        resume(id) {
            const item = this.items.find((candidate) => candidate.id === id);

            if (item) {
                item.paused = false;
            }
        },

        startTicker() {
            if (this.tickerId) {
                return;
            }

            this.tickerId = setInterval(() => this.tick(), TICK_MS);
        },

        stopTicker() {
            clearInterval(this.tickerId);
            this.tickerId = null;
        },

        tick() {
            this.items.forEach((item) => {
                if (item.paused || item.duration <= 0) {
                    return;
                }

                item.remaining = Math.max(0, item.remaining - TICK_MS);
                item.progress = (item.remaining / item.duration) * 100;

                if (item.remaining <= 0) {
                    this.dismiss(item.id);
                }
            });
        },
    });

    // Ponte para toasts disparados a partir do servidor: qualquer componente
    // Livewire pode chamar `$this->dispatch('toast', type: 'success', message: '...')`
    // e o navegador empilha o toast sem o front precisar saber de Livewire.
    window.addEventListener('toast', (event) => {
        Alpine.store('toast').show(event.detail ?? {});
    });
});
