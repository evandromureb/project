// <x-ui.carousel> — Alpine.data nomeado (não x-data inline), mesmo motivo do
// dropdown/tabs/accordion: a lógica de autoplay/loop/swipe usa comparações e
// aritmética, que quebrariam wire:navigate se ficassem soltas num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4) na skill
// ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', (interval, loop, pauseOnHover) => ({
        active: 0,
        slides: [],
        paused: false,
        timer: null,
        touchStartX: undefined,

        init() {
            const count = this.$refs.track.children.length;
            this.slides = Array.from({ length: count }, (_, i) => i);
            this.scheduleNext();
        },

        currentInterval() {
            const slide = this.$refs.track.children[this.active];
            const custom = slide && slide.dataset.interval;
            return custom ? parseInt(custom, 10) : interval;
        },

        scheduleNext() {
            this.stopAutoplay();

            if (!interval) {
                return;
            }

            this.timer = setTimeout(() => {
                if (!this.paused) {
                    this.next();
                }

                this.scheduleNext();
            }, this.currentInterval());
        },

        stopAutoplay() {
            if (this.timer) {
                clearTimeout(this.timer);
            }
        },

        next() {
            const last = this.slides.length - 1;

            if (this.active >= last) {
                this.active = loop ? 0 : last;
            } else {
                this.active += 1;
            }

            this.scheduleNext();
        },

        prev() {
            const last = this.slides.length - 1;

            if (this.active <= 0) {
                this.active = loop ? last : 0;
            } else {
                this.active -= 1;
            }

            this.scheduleNext();
        },

        goTo(index) {
            this.active = index;
            this.scheduleNext();
        },

        onTouchStart(event) {
            this.touchStartX = event.touches[0].clientX;
        },

        onTouchEnd(event) {
            if (this.touchStartX === undefined) {
                return;
            }

            const delta = event.changedTouches[0].clientX - this.touchStartX;
            const threshold = 50;

            if (delta > threshold) {
                this.prev();
            } else if (delta < -threshold) {
                this.next();
            }

            this.touchStartX = undefined;
        },
    }));
});
