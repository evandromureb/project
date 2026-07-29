// Lógica do <x-ui.countup> registrada como Alpine.data nomeado (não inline
// no x-data) — mesma razão do dropdown/tabs: IntersectionObserver, comparações
// e aritmética quebrariam wire:navigate se ficassem soltas num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4) e
// reference/countup.md na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('countup', (config = {}) => ({
        startValue: Number(config.start ?? 0),
        endValue: Number(config.end ?? 0),
        duration: Math.max(0, Number(config.duration ?? 2000)),
        delay: Math.max(0, Number(config.delay ?? 0)),
        decimals: Math.max(0, Math.min(20, Number(config.decimals ?? 0))),
        decimal: typeof config.decimal === 'string' ? config.decimal : ',',
        separator: typeof config.separator === 'string' ? config.separator : '.',
        grouping: config.grouping !== false,
        prefix: typeof config.prefix === 'string' ? config.prefix : '',
        suffix: typeof config.suffix === 'string' ? config.suffix : '',
        easing: config.easing || 'easeOutExpo',
        trigger: config.trigger || 'visible',
        once: config.once !== false,
        threshold: Math.max(0, Math.min(1, Number(config.threshold ?? 0.4))),
        locale: typeof config.locale === 'string' && config.locale !== '' ? config.locale : null,
        reducedMotion: config.reducedMotion || 'auto',
        current: Number(config.start ?? 0),
        display: '',
        running: false,
        finished: false,
        hasPlayed: false,
        rafId: null,
        observer: null,
        delayTimer: null,
        startedAt: 0,
        fromValue: Number(config.start ?? 0),
        toValue: Number(config.end ?? 0),

        init() {
            this.display = this.format(this.startValue);

            this.$nextTick(() => {
                if (this.shouldSkipAnimation()) {
                    this.jumpToEnd();

                    return;
                }

                if (this.trigger === 'auto') {
                    this.scheduleStart();

                    return;
                }

                if (this.trigger === 'visible') {
                    this.setupObserver();
                }
            });
        },

        destroy() {
            this.cancelAnimation();
            this.teardownObserver();

            if (this.delayTimer) {
                clearTimeout(this.delayTimer);
                this.delayTimer = null;
            }
        },

        busyLabel() {
            return this.running ? 'true' : 'false';
        },

        shouldSkipAnimation() {
            if (this.reducedMotion === 'animate') {
                return false;
            }

            if (this.reducedMotion === 'reduce') {
                return true;
            }

            return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        },

        setupObserver() {
            if (typeof IntersectionObserver === 'undefined') {
                this.scheduleStart();

                return;
            }

            this.observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            if (! this.hasPlayed || ! this.once) {
                                this.scheduleStart();
                            }

                            if (this.once) {
                                this.teardownObserver();
                            }

                            return;
                        }

                        if (! this.once && this.finished) {
                            this.reset({ silent: true });
                        }
                    });
                },
                { threshold: this.threshold },
            );

            this.observer.observe(this.$el);
        },

        teardownObserver() {
            if (this.observer) {
                this.observer.disconnect();
                this.observer = null;
            }
        },

        scheduleStart() {
            if (this.delayTimer) {
                clearTimeout(this.delayTimer);
                this.delayTimer = null;
            }

            if (this.delay <= 0) {
                this.start();

                return;
            }

            this.delayTimer = setTimeout(() => {
                this.delayTimer = null;
                this.start();
            }, this.delay);
        },

        start(options = {}) {
            const from = options.from !== undefined ? Number(options.from) : this.startValue;
            const to = options.to !== undefined ? Number(options.to) : this.endValue;

            this.cancelAnimation();

            this.fromValue = from;
            this.toValue = to;
            this.current = from;
            this.display = this.format(from);
            this.running = true;
            this.finished = false;
            this.hasPlayed = true;
            this.startedAt = 0;

            this.$dispatch('countup-start', {
                from,
                to,
                duration: this.duration,
            });

            if (this.duration <= 0 || from === to || this.shouldSkipAnimation()) {
                this.jumpToEnd(to);

                return;
            }

            this.rafId = requestAnimationFrame((now) => this.tick(now));
        },

        restart() {
            this.reset({ silent: true });
            this.scheduleStart();
        },

        reset(options = {}) {
            this.cancelAnimation();

            if (this.delayTimer) {
                clearTimeout(this.delayTimer);
                this.delayTimer = null;
            }

            this.current = this.startValue;
            this.display = this.format(this.startValue);
            this.running = false;
            this.finished = false;

            if (! options.silent) {
                this.$dispatch('countup-reset', {
                    value: this.startValue,
                });
            }
        },

        jumpToEnd(value = this.endValue) {
            this.cancelAnimation();
            this.current = value;
            this.display = this.format(value);
            this.running = false;
            this.finished = true;
            this.hasPlayed = true;

            this.$dispatch('countup-end', {
                value,
            });
        },

        cancelAnimation() {
            if (this.rafId !== null) {
                cancelAnimationFrame(this.rafId);
                this.rafId = null;
            }

            this.running = false;
        },

        tick(now) {
            if (! this.startedAt) {
                this.startedAt = now;
            }

            const elapsed = now - this.startedAt;
            const progress = Math.min(1, elapsed / this.duration);
            const eased = this.ease(progress);
            const value = this.fromValue + (this.toValue - this.fromValue) * eased;

            this.current = value;
            this.display = this.format(value);

            this.$dispatch('countup-update', {
                value,
                progress,
            });

            if (progress < 1) {
                this.rafId = requestAnimationFrame((next) => this.tick(next));

                return;
            }

            this.rafId = null;
            this.running = false;
            this.finished = true;
            this.current = this.toValue;
            this.display = this.format(this.toValue);

            this.$dispatch('countup-end', {
                value: this.toValue,
            });
        },

        ease(t) {
            switch (this.easing) {
                case 'linear':
                    return t;
                case 'easeIn':
                    return t * t;
                case 'easeOut':
                    return 1 - (1 - t) * (1 - t);
                case 'easeInOut':
                    return t < 0.5
                        ? 2 * t * t
                        : 1 - Math.pow(-2 * t + 2, 2) / 2;
                case 'easeOutCubic':
                    return 1 - Math.pow(1 - t, 3);
                case 'easeInExpo':
                    return t === 0 ? 0 : Math.pow(2, 10 * t - 10);
                case 'easeOutExpo':
                default:
                    return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
            }
        },

        format(value) {
            const number = Number(value);

            if (Number.isNaN(number)) {
                return `${this.prefix}0${this.suffix}`;
            }

            let formatted;

            if (this.locale) {
                formatted = new Intl.NumberFormat(this.locale, {
                    minimumFractionDigits: this.decimals,
                    maximumFractionDigits: this.decimals,
                    useGrouping: this.grouping,
                }).format(number);
            } else {
                const absolute = Math.abs(number);
                const fixed = absolute.toFixed(this.decimals);
                const parts = fixed.split('.');
                let intPart = parts[0];
                const decPart = parts[1];

                if (this.grouping && this.separator !== '') {
                    intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, this.separator);
                }

                formatted = this.decimals > 0
                    ? `${intPart}${this.decimal}${decPart}`
                    : intPart;

                if (number < 0) {
                    formatted = `-${formatted}`;
                }
            }

            return `${this.prefix}${formatted}${this.suffix}`;
        },
    }));
});
