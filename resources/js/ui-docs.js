// <x-ui.docs> — TOC "On This Page" a partir de [data-docs-section].
// Alpine.data nomeado (gotcha wire:navigate).

document.addEventListener('alpine:init', () => {
    const GROUP_LABELS = {
        examples: 'Exemplos',
        'component-api': 'API de componente',
        references: 'Referrências',
    };

    Alpine.data('uiDocs', (offset = 96) => ({
        offset: Number(offset) || 96,
        active: null,
        groups: [],
        observer: null,
        clicking: false,
        clickTimer: null,

        init() {
            this.$nextTick(() => {
                this.buildToc();
                this.setupObserver();
                this.restoreHash();
            });
        },

        destroy() {
            if (this.observer) {
                this.observer.disconnect();
                this.observer = null;
            }

            if (this.clickTimer) {
                clearTimeout(this.clickTimer);
                this.clickTimer = null;
            }
        },

        sections() {
            return Array.from(
                this.$refs.content.querySelectorAll('[data-docs-section]'),
            );
        },

        buildToc() {
            const map = new Map();

            this.sections().forEach((el) => {
                const id = el.getAttribute('data-docs-section') || el.id;
                const label = el.getAttribute('data-docs-label') || id;
                const group = el.getAttribute('data-docs-group') || 'examples';
                const groupLabel =
                    el.getAttribute('data-docs-group-label') ||
                    GROUP_LABELS[group] ||
                    group;

                if (! id) {
                    return;
                }

                el.style.scrollMarginTop = `${this.offset}px`;

                if (! map.has(group)) {
                    map.set(group, { key: group, label: groupLabel, items: [] });
                }

                map.get(group).items.push({ id, label });
            });

            this.groups = Array.from(map.values());

            if (! this.active && this.groups[0]?.items[0]) {
                this.active = this.groups[0].items[0].id;
            }
        },

        setupObserver() {
            if (this.observer) {
                this.observer.disconnect();
            }

            const rootMargin = `-${this.offset + 8}px 0px -55% 0px`;
            const visible = new Map();

            this.observer = new IntersectionObserver(
                (entries) => {
                    if (this.clicking) {
                        return;
                    }

                    entries.forEach((entry) => {
                        const id = entry.target.getAttribute('data-docs-section');

                        if (! id) {
                            return;
                        }

                        if (entry.isIntersecting) {
                            visible.set(id, entry.intersectionRatio);
                        } else {
                            visible.delete(id);
                        }
                    });

                    if (visible.size === 0) {
                        return;
                    }

                    const ordered = this.sections()
                        .map((el) => el.getAttribute('data-docs-section'))
                        .filter((id) => visible.has(id));

                    if (ordered[0]) {
                        this.active = ordered[0];
                    }
                },
                { root: null, rootMargin, threshold: [0, 0.1, 0.25, 0.5, 1] },
            );

            this.sections().forEach((el) => this.observer.observe(el));
        },

        restoreHash() {
            if (! window.location.hash) {
                return;
            }

            const id = decodeURIComponent(window.location.hash.slice(1));
            const el = this.$refs.content.querySelector(
                `[data-docs-section="${CSS.escape(id)}"]`,
            );

            if (el) {
                this.scrollTo(id, false);
            }
        },

        scrollTo(id, smooth = true) {
            const el = this.$refs.content.querySelector(
                `[data-docs-section="${CSS.escape(id)}"]`,
            );

            if (! el) {
                return;
            }

            this.clicking = true;
            this.active = id;

            const top = el.getBoundingClientRect().top + window.scrollY - this.offset;

            window.scrollTo({
                top,
                behavior: smooth ? 'smooth' : 'auto',
            });

            history.replaceState(null, '', `#${id}`);

            if (this.clickTimer) {
                clearTimeout(this.clickTimer);
            }

            this.clickTimer = setTimeout(() => {
                this.clicking = false;
            }, smooth ? 600 : 50);
        },

        itemClass(id) {
            return this.active === id
                ? 'border-primary text-primary'
                : 'border-transparent text-muted-foreground hover:text-foreground';
        },
    }));
});
