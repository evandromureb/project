// <x-ui.pagination> — Alpine.data nomeado (não x-data inline). Cálculo de
// janela/ellipsis, jump e per-page usam comparações/aritmética que quebrariam
// wire:navigate se ficassem soltas num atributo x-data="{...}" inline.
// Ver reference/dropdown.md (gotcha #4) e reference/pagination.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('pagination', (config) => ({
        current: Number(config.current ?? 1),
        lastPage: Number(config.lastPage ?? 1),
        perPage: Number(config.perPage ?? 10),
        total: Number(config.total ?? 0),
        from: config.from ?? null,
        to: config.to ?? null,
        urls: config.urls ?? {},
        prevUrl: config.prevUrl ?? null,
        nextUrl: config.nextUrl ?? null,
        mode: config.mode ?? 'full',
        siblings: Number(config.siblings ?? 1),
        boundaries: Number(config.boundaries ?? 1),
        perPageOptions: config.perPageOptions ?? [],
        interactive: config.interactive !== false,
        disabled: config.disabled === true,
        jumpValue: '',
        idleClasses: config.idleClasses ?? '',
        activeClasses: config.activeClasses ?? '',

        init() {
            this.normalize();
            this.jumpValue = String(this.current);
        },

        normalize() {
            this.lastPage = Math.max(1, Number(this.lastPage) || 1);
            this.current = Math.min(Math.max(1, Number(this.current) || 1), this.lastPage);
            this.perPage = Math.max(1, Number(this.perPage) || 10);
            this.total = Math.max(0, Number(this.total) || 0);

            if (this.total > 0) {
                this.from = ((this.current - 1) * this.perPage) + 1;
                this.to = Math.min(this.current * this.perPage, this.total);
                this.lastPage = Math.max(1, Math.ceil(this.total / this.perPage));
                this.current = Math.min(this.current, this.lastPage);
                this.from = ((this.current - 1) * this.perPage) + 1;
                this.to = Math.min(this.current * this.perPage, this.total);
            } else if (this.from === null || this.to === null) {
                this.from = null;
                this.to = null;
            }
        },

        get isFirst() {
            return this.current <= 1;
        },

        get isLast() {
            return this.current >= this.lastPage;
        },

        get hasPages() {
            return this.lastPage > 1;
        },

        get infoLabel() {
            if (!this.total) {
                return `Página ${this.current} de ${this.lastPage}`;
            }

            if (!this.from || !this.to) {
                return `0 resultados`;
            }

            return `Mostrando ${this.from}–${this.to} de ${this.total}`;
        },

        get compactLabel() {
            return `${this.current} / ${this.lastPage}`;
        },

        /**
         * Janela com ellipsis: [1, '…', 4, 5, 6, '…', 20]
         * Retorna array de { type: 'page'|'ellipsis', page?: number, key: string }
         */
        get elements() {
            const last = this.lastPage;
            const current = this.current;
            const siblings = Math.max(0, this.siblings);
            const boundaries = Math.max(1, this.boundaries);

            if (last <= 1) {
                return [{ type: 'page', page: 1, key: 'p-1' }];
            }

            const pages = new Set();

            for (let page = 1; page <= boundaries; page += 1) {
                pages.add(page);
            }

            for (let page = last - boundaries + 1; page <= last; page += 1) {
                pages.add(page);
            }

            for (let page = current - siblings; page <= current + siblings; page += 1) {
                if (page >= 1 && page <= last) {
                    pages.add(page);
                }
            }

            const sorted = [...pages].filter((page) => page >= 1 && page <= last).sort((a, b) => a - b);
            const items = [];
            let previous = 0;

            sorted.forEach((page) => {
                if (previous) {
                    if (page - previous === 2) {
                        items.push({ type: 'page', page: previous + 1, key: `p-${previous + 1}` });
                    } else if (page - previous > 2) {
                        items.push({ type: 'ellipsis', key: `e-${previous}-${page}` });
                    }
                }

                items.push({ type: 'page', page, key: `p-${page}` });
                previous = page;
            });

            return items;
        },

        urlFor(page) {
            if (!page) {
                return null;
            }

            const key = String(page);

            return this.urls[key] ?? this.urls[page] ?? null;
        },

        canGoTo(page) {
            if (this.disabled) {
                return false;
            }

            const target = Number(page);

            return target >= 1 && target <= this.lastPage && target !== this.current;
        },

        goTo(page, event) {
            if (event) {
                event.preventDefault();
            }

            if (!this.canGoTo(page) && Number(page) !== this.current) {
                return;
            }

            const target = Number(page);
            const url = this.urlFor(target);

            if (url && !this.interactive) {
                window.location.assign(url);

                return;
            }

            if (url && this.interactive === 'navigate') {
                window.location.assign(url);

                return;
            }

            if (target === this.current) {
                return;
            }

            const previous = this.current;
            this.current = target;
            this.normalize();
            this.jumpValue = String(this.current);

            this.$dispatch('pagination-change', {
                page: this.current,
                previous,
                perPage: this.perPage,
                lastPage: this.lastPage,
                total: this.total,
                from: this.from,
                to: this.to,
            });
        },

        prev(event) {
            this.goTo(this.current - 1, event);
        },

        next(event) {
            this.goTo(this.current + 1, event);
        },

        first(event) {
            this.goTo(1, event);
        },

        last(event) {
            this.goTo(this.lastPage, event);
        },

        jump() {
            const page = parseInt(this.jumpValue, 10);

            if (Number.isNaN(page)) {
                this.jumpValue = String(this.current);

                return;
            }

            this.goTo(page);
        },

        changePerPage(value) {
            if (this.disabled) {
                return;
            }

            const next = Number(value);

            if (!next || next === this.perPage) {
                return;
            }

            const previousPerPage = this.perPage;
            this.perPage = next;

            if (this.total > 0) {
                this.lastPage = Math.max(1, Math.ceil(this.total / this.perPage));
            }

            this.current = 1;
            this.normalize();
            this.jumpValue = '1';

            this.$dispatch('pagination-per-page', {
                perPage: this.perPage,
                previous: previousPerPage,
                page: this.current,
                lastPage: this.lastPage,
                total: this.total,
                from: this.from,
                to: this.to,
            });

            this.$dispatch('pagination-change', {
                page: this.current,
                previous: 1,
                perPage: this.perPage,
                lastPage: this.lastPage,
                total: this.total,
                from: this.from,
                to: this.to,
            });
        },

        isCurrent(page) {
            return Number(page) === this.current;
        },

        pageButtonClasses(page) {
            return this.isCurrent(page) ? this.activeClasses : this.idleClasses;
        },

        isPageDisabled(page) {
            return this.disabled || !this.canGoTo(page);
        },
    }));
});
