// Lógica do <x-forms.range> como Alpine.data nomeado (não inline no
// x-data) — comparações e arrows quebrariam wire:navigate se ficassem
// soltas num atributo x-data="{...}". Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formRange', (options = {}) => ({
        dual: Boolean(options.dual),
        min: Number(options.min ?? 0),
        max: Number(options.max ?? 100),
        step: Number(options.step ?? 1),
        decimals: Number(options.decimals ?? 0),
        prefix: String(options.prefix ?? ''),
        suffix: String(options.suffix ?? ''),
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        snap: Boolean(options.snap),
        vertical: Boolean(options.vertical),
        tooltipMode: options.tooltip ?? 'drag',
        marks: Array.isArray(options.marks) ? options.marks : [],
        value: 0,
        valueEnd: 0,
        model: 0,
        focused: false,
        dragging: false,
        activeThumb: 'start',
        showTooltip: false,
        _syncing: false,
        _onPointerMove: null,
        _onPointerUp: null,

        init() {
            this.min = Number.isFinite(this.min) ? this.min : 0;
            this.max = Number.isFinite(this.max) ? this.max : 100;

            if (this.max < this.min) {
                [this.min, this.max] = [this.max, this.min];
            }

            this.step = Number.isFinite(this.step) && this.step > 0 ? this.step : 1;
            this.decimals = Math.max(0, Math.min(20, Math.floor(this.decimals)));

            const initial = this.parseIncoming(options.value, options.valueEnd);
            this.value = initial.start;
            this.valueEnd = initial.end;
            this.syncModel(false);

            this.$watch('model', (next) => {
                if (this._syncing) {
                    return;
                }

                const parsed = this.parseIncoming(next, null, { fallbackToCurrent: true });
                this.value = parsed.start;
                this.valueEnd = parsed.end;
            });

            this._onPointerMove = (event) => this.onPointerMove(event);
            this._onPointerUp = () => this.onPointerUp();

            window.addEventListener('pointermove', this._onPointerMove);
            window.addEventListener('pointerup', this._onPointerUp);
            window.addEventListener('pointercancel', this._onPointerUp);
        },

        destroy() {
            window.removeEventListener('pointermove', this._onPointerMove);
            window.removeEventListener('pointerup', this._onPointerUp);
            window.removeEventListener('pointercancel', this._onPointerUp);
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get rangeSpan() {
            const span = this.max - this.min;

            return span === 0 ? 1 : span;
        },

        get startPercent() {
            return this.toPercent(this.dual ? Math.min(this.value, this.valueEnd) : this.value);
        },

        get endPercent() {
            return this.toPercent(this.dual ? Math.max(this.value, this.valueEnd) : this.value);
        },

        get fillStyle() {
            if (this.vertical) {
                const bottom = this.startPercent;
                const height = Math.max(0, this.endPercent - this.startPercent);

                return `bottom:${bottom}%;height:${height}%`;
            }

            const left = this.startPercent;
            const width = Math.max(0, this.endPercent - this.startPercent);

            return `left:${left}%;width:${width}%`;
        },

        get startThumbStyle() {
            return this.thumbStyle(this.value);
        },

        get endThumbStyle() {
            return this.thumbStyle(this.valueEnd);
        },

        get tooltipVisible() {
            if (this.tooltipMode === false || this.tooltipMode === 'never') {
                return false;
            }

            if (this.tooltipMode === 'always') {
                return true;
            }

            return this.showTooltip || this.dragging || this.focused;
        },

        get formattedValue() {
            return this.format(this.value);
        },

        get formattedValueEnd() {
            return this.format(this.valueEnd);
        },

        get formattedRange() {
            if (! this.dual) {
                return this.formattedValue;
            }

            return `${this.format(Math.min(this.value, this.valueEnd))} – ${this.format(Math.max(this.value, this.valueEnd))}`;
        },

        get markItems() {
            return this.marks.map((mark) => {
                if (mark !== null && typeof mark === 'object') {
                    const value = Number(mark.value);

                    return {
                        value,
                        label: mark.label ?? this.format(value),
                        percent: this.toPercent(value),
                    };
                }

                const value = Number(mark);

                return {
                    value,
                    label: this.format(value),
                    percent: this.toPercent(value),
                };
            }).filter((mark) => Number.isFinite(mark.value));
        },

        thumbStyle(value) {
            const percent = this.toPercent(value);

            if (this.vertical) {
                return `bottom:${percent}%;transform:translate(-50%,50%)`;
            }

            return `left:${percent}%;transform:translate(-50%,-50%)`;
        },

        markStyle(percent) {
            if (this.vertical) {
                return `left:50%;bottom:${percent}%;transform:translate(-50%,50%)`;
            }

            return `top:50%;left:${percent}%;transform:translate(-50%,-50%)`;
        },

        markLabelStyle(percent) {
            return `left:${percent}%`;
        },

        toPercent(value) {
            return ((this.clamp(value) - this.min) / this.rangeSpan) * 100;
        },

        parseIncoming(raw, rawEnd, { fallbackToCurrent = false } = {}) {
            let start = this.min;
            let end = this.dual ? this.max : this.min;

            if (Array.isArray(raw)) {
                start = raw[0];
                end = raw[1] ?? raw[0];
            } else if (raw !== null && raw !== undefined && raw !== '') {
                start = raw;
                end = rawEnd !== null && rawEnd !== undefined && rawEnd !== ''
                    ? rawEnd
                    : (this.dual ? (fallbackToCurrent ? this.valueEnd : this.max) : raw);
            } else if (rawEnd !== null && rawEnd !== undefined && rawEnd !== '') {
                end = rawEnd;
            } else if (fallbackToCurrent) {
                return { start: this.value, end: this.valueEnd };
            }

            start = this.quantize(start);
            end = this.quantize(end);

            if (this.dual && start > end) {
                [start, end] = [end, start];
            }

            return { start, end };
        },

        syncModel(emit = true) {
            this._syncing = true;
            this.model = this.dual ? [this.value, this.valueEnd] : this.value;
            this._syncing = false;

            if (emit) {
                this.$dispatch('range-changed', {
                    value: this.value,
                    valueEnd: this.dual ? this.valueEnd : null,
                    model: this.model,
                });
            }

            this.$nextTick(() => this.syncHidden());
        },

        syncHidden() {
            if (this.$refs.start) {
                this.$refs.start.value = String(this.value);
                this.$refs.start.dispatchEvent(new Event('input', { bubbles: true }));
            }

            if (this.$refs.end) {
                this.$refs.end.value = String(this.valueEnd);
                this.$refs.end.dispatchEvent(new Event('input', { bubbles: true }));
            }
        },

        clamp(value) {
            const number = Number(value);

            if (! Number.isFinite(number)) {
                return this.min;
            }

            return Math.min(this.max, Math.max(this.min, number));
        },

        quantize(value) {
            let next = this.clamp(value);

            if (this.snap && this.marks.length > 0) {
                let best = next;
                let bestDistance = Infinity;

                for (const mark of this.markItems) {
                    const distance = Math.abs(mark.value - next);

                    if (distance < bestDistance) {
                        bestDistance = distance;
                        best = mark.value;
                    }
                }

                next = best;
            }

            const steps = Math.round((next - this.min) / this.step);
            next = this.min + steps * this.step;
            next = this.clamp(next);

            const factor = 10 ** this.displayDecimals();

            return Math.round(next * factor) / factor;
        },

        displayDecimals() {
            if (this.decimals > 0) {
                return this.decimals;
            }

            const stepDecimals = (String(this.step).split('.')[1] || '').replace(/0+$/, '').length;

            return Math.min(20, stepDecimals);
        },

        format(value) {
            const number = Number(value);

            if (! Number.isFinite(number)) {
                return '';
            }

            const decimals = this.displayDecimals();
            const formatted = decimals > 0
                ? number.toFixed(decimals)
                : String(Math.round(number));

            return `${this.prefix}${formatted}${this.suffix}`;
        },

        setThumb(thumb, raw, { emit = true } = {}) {
            if (! this.canEdit) {
                return;
            }

            let next = this.quantize(raw);

            if (this.dual) {
                if (thumb === 'start') {
                    next = Math.min(next, this.valueEnd);
                    this.value = next;
                } else {
                    next = Math.max(next, this.value);
                    this.valueEnd = next;
                }
            } else {
                this.value = next;
                this.valueEnd = next;
            }

            if (emit) {
                this.syncModel(true);
            }
        },

        valueFromPointer(event) {
            const track = this.$refs.track;

            if (! track) {
                return this.min;
            }

            const rect = track.getBoundingClientRect();

            if (this.vertical) {
                const y = event.clientY - rect.top;
                const ratio = 1 - (y / rect.height);

                return this.min + this.clampRatio(ratio) * this.rangeSpan;
            }

            const x = event.clientX - rect.left;
            const ratio = x / rect.width;

            return this.min + this.clampRatio(ratio) * this.rangeSpan;
        },

        clampRatio(ratio) {
            if (! Number.isFinite(ratio)) {
                return 0;
            }

            return Math.min(1, Math.max(0, ratio));
        },

        nearestThumb(raw) {
            if (! this.dual) {
                return 'start';
            }

            const distanceStart = Math.abs(raw - this.value);
            const distanceEnd = Math.abs(raw - this.valueEnd);

            return distanceStart <= distanceEnd ? 'start' : 'end';
        },

        onTrackPointerDown(event) {
            if (! this.canEdit || event.button !== undefined && event.button !== 0) {
                return;
            }

            event.preventDefault();

            const raw = this.valueFromPointer(event);
            this.activeThumb = this.nearestThumb(raw);
            this.dragging = true;
            this.showTooltip = true;
            this.setThumb(this.activeThumb, raw);
            this.focusThumb(this.activeThumb);
        },

        onThumbPointerDown(event, thumb) {
            if (! this.canEdit || event.button !== undefined && event.button !== 0) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            this.activeThumb = thumb;
            this.dragging = true;
            this.showTooltip = true;
            this.focusThumb(thumb);
        },

        onPointerMove(event) {
            if (! this.dragging || ! this.canEdit) {
                return;
            }

            this.setThumb(this.activeThumb, this.valueFromPointer(event));
        },

        onPointerUp() {
            if (! this.dragging) {
                return;
            }

            this.dragging = false;

            if (this.tooltipMode === 'drag') {
                this.showTooltip = this.focused;
            }
        },

        onThumbFocus(thumb) {
            this.activeThumb = thumb;
            this.focused = true;

            if (this.tooltipMode === 'drag' || this.tooltipMode === 'focus') {
                this.showTooltip = true;
            }
        },

        onThumbBlur() {
            this.focused = false;

            if (! this.dragging) {
                this.showTooltip = this.tooltipMode === 'always';
            }
        },

        focusThumb(thumb) {
            this.$nextTick(() => {
                const ref = thumb === 'end' ? this.$refs.thumbEnd : this.$refs.thumbStart;
                ref?.focus({ preventScroll: true });
            });
        },

        onKeydown(event, thumb) {
            if (! this.canEdit) {
                return;
            }

            const current = thumb === 'end' ? this.valueEnd : this.value;
            let next = current;
            const large = this.step * 10;

            switch (event.key) {
                case 'ArrowLeft':
                case 'ArrowDown':
                    next = current - (event.shiftKey ? large : this.step);
                    break;
                case 'ArrowRight':
                case 'ArrowUp':
                    next = current + (event.shiftKey ? large : this.step);
                    break;
                case 'PageDown':
                    next = current - large;
                    break;
                case 'PageUp':
                    next = current + large;
                    break;
                case 'Home':
                    next = this.min;
                    break;
                case 'End':
                    next = this.max;
                    break;
                default:
                    return;
            }

            event.preventDefault();
            this.setThumb(thumb, next);
        },

        onInputChange(event, thumb) {
            if (! this.canEdit) {
                return;
            }

            this.setThumb(thumb, event.target.value);
        },

        jumpToMark(value) {
            if (! this.canEdit) {
                return;
            }

            const thumb = this.nearestThumb(value);
            this.activeThumb = thumb;
            this.setThumb(thumb, value);
            this.focusThumb(thumb);
        },
    }));
});
