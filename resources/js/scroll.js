// Lógica do <x-ui.scroll> registrada como Alpine.data nomeado (não inline
// no x-data) — mesma razão do dropdown/tabs: ResizeObserver, comparações e
// aritmética quebrariam wire:navigate se ficassem soltas num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4) e
// reference/scroll.md na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('scrollArea', (config = {}) => ({
        orientation: config.orientation || 'vertical',
        smooth: config.smooth !== false,
        offset: Math.max(0, Number(config.offset ?? 8)),
        atStart: true,
        atEnd: true,
        atTop: true,
        atBottom: true,
        atLeft: true,
        atRight: true,
        canScrollY: false,
        canScrollX: false,
        percentY: 0,
        percentX: 0,
        resizeObserver: null,
        rafId: null,
        wasAtTop: true,
        wasAtBottom: true,
        wasAtLeft: true,
        wasAtRight: true,

        init() {
            this.$nextTick(() => {
                this.update();
                this.setupObserver();
            });
        },

        destroy() {
            if (this.resizeObserver) {
                this.resizeObserver.disconnect();
                this.resizeObserver = null;
            }

            if (this.rafId !== null) {
                cancelAnimationFrame(this.rafId);
                this.rafId = null;
            }
        },

        viewport() {
            return this.$refs.viewport;
        },

        setupObserver() {
            if (typeof ResizeObserver === 'undefined') {
                return;
            }

            this.resizeObserver = new ResizeObserver(() => this.scheduleUpdate());

            const viewport = this.viewport();

            if (viewport) {
                this.resizeObserver.observe(viewport);
            }

            if (this.$refs.content) {
                this.resizeObserver.observe(this.$refs.content);
            }
        },

        scheduleUpdate() {
            if (this.rafId !== null) {
                return;
            }

            this.rafId = requestAnimationFrame(() => {
                this.rafId = null;
                this.update();
            });
        },

        onScroll() {
            this.scheduleUpdate();
        },

        update() {
            const el = this.viewport();

            if (! el) {
                return;
            }

            const maxY = Math.max(0, el.scrollHeight - el.clientHeight);
            const maxX = Math.max(0, el.scrollWidth - el.clientWidth);
            const top = el.scrollTop;
            const left = el.scrollLeft;

            this.canScrollY = maxY > 1;
            this.canScrollX = maxX > 1;

            this.atTop = top <= this.offset;
            this.atBottom = ! this.canScrollY || top >= maxY - this.offset;
            this.atLeft = left <= this.offset;
            this.atRight = ! this.canScrollX || left >= maxX - this.offset;

            this.percentY = maxY > 0 ? Math.min(100, Math.max(0, (top / maxY) * 100)) : 0;
            this.percentX = maxX > 0 ? Math.min(100, Math.max(0, (left / maxX) * 100)) : 0;

            if (this.orientation === 'horizontal') {
                this.atStart = this.atLeft;
                this.atEnd = this.atRight;
            } else {
                this.atStart = this.atTop;
                this.atEnd = this.atBottom;
            }

            this.$dispatch('scroll-change', {
                top,
                left,
                percentY: this.percentY,
                percentX: this.percentX,
                atTop: this.atTop,
                atBottom: this.atBottom,
                atLeft: this.atLeft,
                atRight: this.atRight,
            });

            if (this.atTop && ! this.wasAtTop && this.canScrollY) {
                this.$dispatch('scroll-top');
            }

            if (this.atBottom && ! this.wasAtBottom && this.canScrollY) {
                this.$dispatch('scroll-bottom');
            }

            if (this.atLeft && ! this.wasAtLeft && this.canScrollX) {
                this.$dispatch('scroll-start');
            }

            if (this.atRight && ! this.wasAtRight && this.canScrollX) {
                this.$dispatch('scroll-end');
            }

            this.wasAtTop = this.atTop;
            this.wasAtBottom = this.atBottom;
            this.wasAtLeft = this.atLeft;
            this.wasAtRight = this.atRight;
        },

        showStartFade() {
            if (this.orientation === 'horizontal') {
                return this.canScrollX && ! this.atLeft;
            }

            if (this.orientation === 'both') {
                return (this.canScrollY && ! this.atTop) || (this.canScrollX && ! this.atLeft);
            }

            return this.canScrollY && ! this.atTop;
        },

        showEndFade() {
            if (this.orientation === 'horizontal') {
                return this.canScrollX && ! this.atRight;
            }

            if (this.orientation === 'both') {
                return (this.canScrollY && ! this.atBottom) || (this.canScrollX && ! this.atRight);
            }

            return this.canScrollY && ! this.atBottom;
        },

        showStartButton() {
            return this.showStartFade();
        },

        showEndButton() {
            return this.showEndFade();
        },

        scrollBehavior() {
            return this.smooth ? 'smooth' : 'auto';
        },

        scrollToStart() {
            const el = this.viewport();

            if (! el) {
                return;
            }

            if (this.orientation === 'horizontal') {
                el.scrollTo({ left: 0, behavior: this.scrollBehavior() });

                return;
            }

            el.scrollTo({ top: 0, left: this.orientation === 'both' ? 0 : el.scrollLeft, behavior: this.scrollBehavior() });
        },

        scrollToEnd() {
            const el = this.viewport();

            if (! el) {
                return;
            }

            if (this.orientation === 'horizontal') {
                el.scrollTo({ left: el.scrollWidth, behavior: this.scrollBehavior() });

                return;
            }

            el.scrollTo({
                top: el.scrollHeight,
                left: this.orientation === 'both' ? el.scrollWidth : el.scrollLeft,
                behavior: this.scrollBehavior(),
            });
        },

        scrollToTop() {
            const el = this.viewport();

            if (! el) {
                return;
            }

            el.scrollTo({ top: 0, behavior: this.scrollBehavior() });
        },

        scrollToBottom() {
            const el = this.viewport();

            if (! el) {
                return;
            }

            el.scrollTo({ top: el.scrollHeight, behavior: this.scrollBehavior() });
        },

        scrollBy(x = 0, y = 0) {
            const el = this.viewport();

            if (! el) {
                return;
            }

            el.scrollBy({ left: Number(x) || 0, top: Number(y) || 0, behavior: this.scrollBehavior() });
        },

        scrollTo(options = {}) {
            const el = this.viewport();

            if (! el) {
                return;
            }

            el.scrollTo({
                top: options.top,
                left: options.left,
                behavior: options.behavior || this.scrollBehavior(),
            });
        },
    }));
});
