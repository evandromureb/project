// Lógica do <x-ui.sticky> registrada como Alpine.data nomeado (não inline
// no x-data) — mesma razão do dropdown/tabs: comparações, timers e
// listeners quebrariam wire:navigate se ficassem soltos num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4) e
// reference/sticky.md na skill ui-components.
//
// Sticky: offset → fixed, wrapper preserva altura,
// activate/release, reverse, classes active/release e variants
// ui-sticky-active: / ui-sticky-release:.
document.addEventListener('alpine:init', () => {
    Alpine.data('sticky', (config = {}) => ({
        name: config.name || '',
        target: config.target || 'body',
        offset: Math.max(0, Number(config.offset ?? 0)),
        top: config.top ?? '',
        bottom: config.bottom ?? '',
        middle: Boolean(config.middle),
        start: config.start ?? '',
        end: config.end ?? '',
        center: Boolean(config.center),
        width: config.width ?? '',
        zindex: config.zindex ?? '40',
        reverse: Boolean(config.reverse),
        activate: config.activate || '',
        release: config.release || '',
        releaseDelay: Math.max(0, Number(config.releaseDelay ?? 0)),
        activeClass: config.activeClass || config.className || '',
        releaseClass: config.releaseClass || '',
        active: false,
        released: false,
        scrollRoot: null,
        wrapperEl: null,
        attributeRoot: '',
        eventTriggerState: true,
        lastScrollTop: 0,
        scrollTimeout: null,
        releaseTimeout: null,
        resizeHandler: null,
        scrollHandler: null,
        isScrolling: false,

        init() {
            // No modo body, o wrapper é o pai (preserva altura no fixed).
            // No modo self, a própria barra carrega data-ui-sticky-wrapper e
            // fica irmã do conteúdo — senão sticky não gruda (pai = altura da barra).
            this.wrapperEl = this.$el.hasAttribute('data-ui-sticky-wrapper')
                ? this.$el
                : (this.$el.closest('[data-ui-sticky-wrapper]') || this.$el.parentElement);
            this.attributeRoot = this.name ? `data-ui-sticky-${this.name}` : '';
            this.scrollRoot = this.resolveScrollRoot();

            this.$el.setAttribute('data-ui-sticky-initialized', 'true');

            // Em container interno, CSS sticky fica ligado o tempo todo; a
            // classe .active só espelha o estado visual (sombra, etc.).
            if (this.scrollRoot) {
                this.applyStickyRootStyles();
            }

            this.$nextTick(() => {
                this.bindHandlers();
                this.process();

                if (! this.scrollRoot) {
                    this.update();
                }
            });
        },

        applyStickyRootStyles() {
            const topValue = this.top === null || this.top === undefined ? '' : String(this.top);
            this.$el.style.position = 'sticky';
            this.$el.style.insetBlockStart = topValue === '' || topValue === 'auto' ? '0px' : `${topValue}px`;

            if (this.zindex !== '' && this.zindex !== null && this.zindex !== undefined) {
                this.$el.style.zIndex = String(this.zindex);
            }
        },

        destroy() {
            this.unbindHandlers();

            if (this.scrollTimeout) {
                clearTimeout(this.scrollTimeout);
                this.scrollTimeout = null;
            }

            if (this.releaseTimeout) {
                clearTimeout(this.releaseTimeout);
                this.releaseTimeout = null;
            }

            this.disable();
            this.clearBodyAttribute();
            this.$el.removeAttribute('data-ui-sticky-initialized');
        },

        resolveScrollRoot() {
            if (! this.target || this.target === 'body') {
                return null;
            }

            if (this.target === 'self' || this.target === 'parent') {
                return this.$el.closest('[data-ui-sticky-root]') || this.$el.parentElement;
            }

            return document.querySelector(this.target);
        },

        getScrollTop() {
            if (this.scrollRoot) {
                return this.scrollRoot.scrollTop;
            }

            return window.pageYOffset || document.documentElement.scrollTop || 0;
        },

        getViewportHeight() {
            if (this.scrollRoot) {
                return this.scrollRoot.clientHeight;
            }

            return window.innerHeight || document.documentElement.clientHeight || 0;
        },

        bindHandlers() {
            this.resizeHandler = () => {
                if (this.scrollTimeout) {
                    clearTimeout(this.scrollTimeout);
                }

                this.scrollTimeout = setTimeout(() => this.update(), 200);
            };

            this.scrollHandler = () => {
                this.isScrolling = true;

                if (this.active) {
                    this.debounceScroll(() => {
                        this.isScrolling = false;
                        this.process();
                    }, 200);
                } else {
                    this.isScrolling = false;
                    this.process();
                }
            };

            window.addEventListener('resize', this.resizeHandler);

            if (this.scrollRoot) {
                this.scrollRoot.addEventListener('scroll', this.scrollHandler, { passive: true });
            } else {
                window.addEventListener('scroll', this.scrollHandler, { passive: true });
            }
        },

        unbindHandlers() {
            if (this.resizeHandler) {
                window.removeEventListener('resize', this.resizeHandler);
                this.resizeHandler = null;
            }

            if (this.scrollHandler) {
                if (this.scrollRoot) {
                    this.scrollRoot.removeEventListener('scroll', this.scrollHandler);
                } else {
                    window.removeEventListener('scroll', this.scrollHandler);
                }

                this.scrollHandler = null;
            }
        },

        debounceScroll(callback, delay = 200) {
            if (this.scrollTimeout) {
                clearTimeout(this.scrollTimeout);
            }

            this.scrollTimeout = setTimeout(callback, delay);
        },

        getActivateElement() {
            return this.activate ? document.querySelector(this.activate) : null;
        },

        getReleaseElement() {
            return this.release ? document.querySelector(this.release) : null;
        },

        getOffset() {
            let offset = this.offset;
            const activateElement = this.getActivateElement();

            if (activateElement) {
                const activateTop = this.offsetTopRelative(activateElement);
                offset = Math.abs(offset - activateTop);
            }

            return offset;
        },

        offsetTopRelative(element) {
            if (! this.scrollRoot) {
                let top = 0;
                let current = element;

                while (current) {
                    top += current.offsetTop;
                    current = current.offsetParent;
                }

                return top;
            }

            const rootRect = this.scrollRoot.getBoundingClientRect();
            const elRect = element.getBoundingClientRect();

            return elRect.top - rootRect.top + this.scrollRoot.scrollTop;
        },

        isPartiallyInViewport(element) {
            if (! element) {
                return false;
            }

            const rect = element.getBoundingClientRect();

            if (this.scrollRoot) {
                const rootRect = this.scrollRoot.getBoundingClientRect();

                return (
                    rect.bottom > rootRect.top &&
                    rect.top < rootRect.bottom &&
                    rect.right > rootRect.left &&
                    rect.left < rootRect.right
                );
            }

            const vh = this.getViewportHeight();
            const vw = window.innerWidth || document.documentElement.clientWidth || 0;

            return rect.bottom > 0 && rect.top < vh && rect.right > 0 && rect.left < vw;
        },

        /**
         * Em scroll container interno: a barra (position:sticky) está grudada
         * quando seu topo encostou no topo do root (com o offset de `top`).
         */
        isStuckInRoot() {
            if (! this.scrollRoot) {
                return false;
            }

            const topValue = this.top === null || this.top === undefined ? '' : String(this.top);
            const topOffset = topValue === '' || topValue === 'auto' ? 0 : (parseInt(topValue, 10) || 0);
            const rootTop = this.scrollRoot.getBoundingClientRect().top;
            const elTop = this.$el.getBoundingClientRect().top;

            return elTop <= rootTop + topOffset + 1;
        },

        process() {
            const offset = this.getOffset();
            const st = this.getScrollTop();
            const releaseEl = this.getReleaseElement();
            const release = releaseEl && this.isPartiallyInViewport(releaseEl);

            // offset 0: no modo self ainda ativa ao grudar; no body exige > 0 .
            let shouldStick = false;

            if (this.scrollRoot) {
                const pastOffset = offset <= 0 ? true : st > offset;
                shouldStick = pastOffset && this.isStuckInRoot() && ! release;
            } else {
                if (offset <= 0) {
                    this.disable();
                    this.lastScrollTop = st;

                    return;
                }

                shouldStick = st > offset && ! release;
            }

            if (shouldStick) {
                if (! this.active) {
                    if (this.enable() === false) {
                        return;
                    }

                    this.setBodyAttribute();
                }

                if (this.eventTriggerState === true) {
                    this.dispatchChange(true);
                    this.eventTriggerState = false;
                }
            } else {
                if (this.active || this.$el.classList.contains('active')) {
                    this.disable();

                    if (release) {
                        this.$el.classList.add('release');
                        this.released = true;
                    }

                    this.clearBodyAttribute();
                }

                if (this.eventTriggerState === false) {
                    this.dispatchChange(false);
                    this.eventTriggerState = true;
                }
            }

            this.lastScrollTop = st;
        },

        enable() {
            const height = this.calculateHeight();
            const topValue = this.top === null || this.top === undefined ? '' : String(this.top);
            const parsedTop = topValue === '' || topValue === 'auto' ? 0 : parseInt(topValue, 10) || 0;

            // Em scroll container interno, fixed sairia do root (viewport).
            // CSS sticky já foi aplicado no init; aqui só o visual .active.
            if (this.scrollRoot) {
                this.applyStickyRootStyles();

                if (this.activeClass) {
                    this.addClasses(this.activeClass);
                }

                if (this.releaseClass) {
                    this.removeClasses(this.releaseClass);
                }

                this.$el.classList.remove('release');
                this.$el.classList.add('active');
                this.active = true;
                this.released = false;

                return true;
            }

            if (height + parsedTop > this.getViewportHeight()) {
                return false;
            }

            let width = this.width;

            if (width) {
                const targetElement = typeof width === 'string' && (width.startsWith('#') || width.startsWith('.'))
                    ? document.querySelector(width)
                    : null;

                if (targetElement) {
                    width = getComputedStyle(targetElement).width;
                } else if (width === 'auto') {
                    width = getComputedStyle(this.$el).width;
                }

                const parsed = parseFloat(width);

                if (! Number.isNaN(parsed)) {
                    this.$el.style.width = `${Math.round(parsed)}px`;
                }
            }

            if (this.middle === true) {
                this.$el.style.insetBlockStart = '50%';
                this.$el.style.transform = this.center ? 'translate(-50%, -50%)' : 'translateY(-50%)';
            } else if (topValue !== '') {
                this.$el.style.insetBlockStart = topValue === 'auto' ? '0px' : `${topValue}px`;
            } else if (this.bottom !== '' && this.bottom !== null && this.bottom !== undefined) {
                const bottomValue = String(this.bottom);
                this.$el.style.insetBlockEnd = bottomValue === 'auto' ? '0px' : `${bottomValue}px`;
            }

            if (this.center === true && this.middle !== true) {
                this.$el.style.insetInlineStart = '50%';
                this.$el.style.transform = 'translateX(-50%)';
            } else if (this.start !== '' && this.start !== null && this.start !== undefined) {
                const startValue = String(this.start);

                if (startValue === 'auto') {
                    const offsetLeft = this.$el.getBoundingClientRect().left;

                    if (offsetLeft >= 0) {
                        this.$el.style.insetInlineStart = `${offsetLeft}px`;
                    }
                } else {
                    this.$el.style.insetInlineStart = `${startValue}px`;
                }
            } else if (this.end !== '' && this.end !== null && this.end !== undefined) {
                const endValue = String(this.end);

                if (endValue === 'auto') {
                    const rect = this.$el.getBoundingClientRect();
                    const vw = window.innerWidth || document.documentElement.clientWidth || 0;
                    const right = vw - rect.right;

                    if (right >= 0) {
                        this.$el.style.insetInlineEnd = `${right}px`;
                    }
                } else {
                    this.$el.style.insetInlineEnd = `${endValue}px`;
                }
            }

            if (this.zindex !== '' && this.zindex !== null && this.zindex !== undefined) {
                this.$el.style.zIndex = String(this.zindex);
                this.$el.style.position = 'fixed';
            }

            if (this.activeClass) {
                this.addClasses(this.activeClass);
            }

            if (this.releaseClass) {
                this.removeClasses(this.releaseClass);
            }

            if (this.wrapperEl) {
                this.wrapperEl.style.height = `${height}px`;
            }

            this.$el.classList.remove('release');
            this.$el.classList.add('active');
            this.active = true;
            this.released = false;

            return true;
        },

        disable() {
            if (this.wrapperEl && ! this.scrollRoot) {
                this.wrapperEl.style.height = '';
            }

            this.$el.classList.remove('active');
            this.$el.classList.add('release');
            this.active = false;
            this.released = true;

            if (this.activeClass) {
                this.removeClasses(this.activeClass);
            }

            if (this.releaseClass) {
                this.addClasses(this.releaseClass);
            }

            // Em scroll root mantemos position:sticky + top para o browser
            // continuar grudando; só tiramos o visual "active".
            if (this.scrollRoot) {
                return;
            }

            if (this.eventTriggerState === false) {
                if (this.releaseDelay > 0 && this.releaseTimeout === null) {
                    this.releaseTimeout = setTimeout(() => {
                        if (this.released) {
                            this.resetStyles();
                        }

                        this.releaseTimeout = null;
                    }, this.releaseDelay);
                } else {
                    this.resetStyles();
                }
            } else {
                this.releaseTimeout = null;
                this.resetStyles();
            }
        },

        resetStyles() {
            this.$el.style.top = '';
            this.$el.style.bottom = '';
            this.$el.style.insetInlineStart = '';
            this.$el.style.insetInlineEnd = '';
            this.$el.style.insetBlockStart = '';
            this.$el.style.insetBlockEnd = '';
            this.$el.style.width = '';
            this.$el.style.left = '';
            this.$el.style.right = '';
            this.$el.style.zIndex = '';
            this.$el.style.position = '';
            this.$el.style.transform = '';
        },

        update() {
            if (this.releaseTimeout) {
                clearTimeout(this.releaseTimeout);
                this.releaseTimeout = null;
            }

            this.eventTriggerState = true;

            if (this.isActive()) {
                this.disable();
                this.enable();
            } else {
                this.disable();
            }
        },

        calculateHeight() {
            const styles = getComputedStyle(this.$el);
            let height = parseFloat(styles.height) || this.$el.offsetHeight || 0;
            height += parseFloat(styles.marginTop) || 0;
            height += parseFloat(styles.marginBottom) || 0;
            height += parseFloat(styles.borderTopWidth) || 0;
            height += parseFloat(styles.borderBottomWidth) || 0;

            return height;
        },

        isActive() {
            return this.$el.classList.contains('active');
        },

        isRelease() {
            return this.$el.classList.contains('release');
        },

        show() {
            const offset = this.getOffset();

            if (offset <= 0) {
                return;
            }

            if (this.enable() === false) {
                return;
            }

            this.setBodyAttribute();
            this.dispatchChange(true);
            this.eventTriggerState = false;
        },

        hide() {
            this.disable();
            this.clearBodyAttribute();
            this.dispatchChange(false);
            this.eventTriggerState = true;
        },

        toggle() {
            if (this.isActive()) {
                this.hide();
            } else {
                this.show();
            }
        },

        setBodyAttribute() {
            if (this.attributeRoot) {
                document.body.setAttribute(this.attributeRoot, 'on');
            }
        },

        clearBodyAttribute() {
            if (this.attributeRoot && document.body.hasAttribute(this.attributeRoot)) {
                document.body.removeAttribute(this.attributeRoot);
            }
        },

        addClasses(list) {
            String(list)
                .split(/\s+/)
                .filter(Boolean)
                .forEach((cls) => this.$el.classList.add(cls));
        },

        removeClasses(list) {
            String(list)
                .split(/\s+/)
                .filter(Boolean)
                .forEach((cls) => this.$el.classList.remove(cls));
        },

        dispatchChange(active) {
            this.$dispatch('sticky-change', { active, name: this.name });

            if (active) {
                this.$dispatch('sticky-show', { name: this.name });
                this.$dispatch('sticky-shown', { name: this.name });
            } else {
                this.$dispatch('sticky-hide', { name: this.name });
                this.$dispatch('sticky-hidden', { name: this.name });
            }
        },
    }));
});
