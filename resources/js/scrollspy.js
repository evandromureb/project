// Lógica do <x-ui.scrollspy> registrada como Alpine.data nomeado (não inline
// no x-data) — mesma razão do dropdown/tabs: IntersectionObserver, comparações
// e aritmética quebrariam wire:navigate se ficassem soltas num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4) e
// reference/scrollspy.md na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('scrollspy', (defaultSection, offset, smooth, hash, rootMode) => ({
        active: defaultSection,
        offset: Number(offset) || 0,
        smooth: Boolean(smooth),
        hash: Boolean(hash),
        rootMode: rootMode === 'self' ? 'self' : 'window',
        observer: null,
        visible: new Map(),
        clicking: false,
        clickTimer: null,

        init() {
            this.$nextTick(() => {
                this.applyScrollMargin();
                this.setupObserver();

                if (this.hash && window.location.hash) {
                    const name = decodeURIComponent(window.location.hash.slice(1));

                    if (this.sectionEl(name)) {
                        this.active = name;
                        this.scrollTo(name, false);

                        return;
                    }
                }

                if (! this.active) {
                    const [first] = this.sections();

                    if (first) {
                        this.active = first.dataset.scrollspySection;
                    }
                }
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

        rootEl() {
            return this.rootMode === 'self' ? this.$refs.content : null;
        },

        sections() {
            return Array.from(
                this.$refs.content.querySelectorAll('[data-scrollspy-section]'),
            );
        },

        sectionEl(name) {
            return this.$refs.content.querySelector(
                `[data-scrollspy-section="${CSS.escape(name)}"]`,
            );
        },

        applyScrollMargin() {
            this.sections().forEach((el) => {
                el.style.scrollMarginTop = `${this.offset}px`;
            });
        },

        setupObserver() {
            if (this.observer) {
                this.observer.disconnect();
            }

            const root = this.rootEl();
            // Empurra a "linha" de ativação para baixo do offset (header sticky)
            // e favorece a seção do topo quando várias estão visíveis.
            const rootMargin = `-${this.offset + 8}px 0px -55% 0px`;

            this.observer = new IntersectionObserver(
                (entries) => {
                    if (this.clicking) {
                        return;
                    }

                    entries.forEach((entry) => {
                        const name = entry.target.dataset.scrollspySection;

                        if (entry.isIntersecting) {
                            this.visible.set(name, entry.intersectionRatio);
                        } else {
                            this.visible.delete(name);
                        }
                    });

                    this.updateActive();
                },
                {
                    root,
                    rootMargin,
                    threshold: [0, 0.1, 0.25, 0.5, 0.75, 1],
                },
            );

            this.sections().forEach((el) => this.observer.observe(el));
        },

        updateActive() {
            if (this.visible.size === 0) {
                return;
            }

            const name = this.sections()
                .map((el) => el.dataset.scrollspySection)
                .find((section) => this.visible.has(section));

            if (name) {
                this.setActive(name);
            }
        },

        setActive(name) {
            if (this.active === name) {
                return;
            }

            this.active = name;

            if (this.hash) {
                history.replaceState(null, '', `#${encodeURIComponent(name)}`);
            }
        },

        scrollTo(name, updateHash = true) {
            const el = this.sectionEl(name);

            if (! el) {
                return;
            }

            this.clicking = true;
            this.active = name;

            if (updateHash && this.hash) {
                history.replaceState(null, '', `#${encodeURIComponent(name)}`);
            }

            const behavior = this.smooth ? 'smooth' : 'auto';
            const root = this.rootEl();

            if (root) {
                const top = el.offsetTop - this.offset;
                root.scrollTo({ top: Math.max(0, top), behavior });
            } else {
                const top = el.getBoundingClientRect().top + window.scrollY - this.offset;
                window.scrollTo({ top: Math.max(0, top), behavior });
            }

            if (this.clickTimer) {
                clearTimeout(this.clickTimer);
            }

            this.clickTimer = setTimeout(() => {
                this.clicking = false;
                this.clickTimer = null;
            }, this.smooth ? 900 : 80);
        },
    }));
});
