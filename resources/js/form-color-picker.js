// Lógica do <x-forms.color-picker> como Alpine.data nomeado (não inline
// no x-data) — comparações e arrows quebrariam wire:navigate se
// ficassem soltas num atributo x-data="{...}". Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formColorPicker', (config = {}) => ({
        value: config.value ?? '',
        format: config.format ?? 'hex',
        alpha: Boolean(config.alpha),
        disabled: Boolean(config.disabled),
        readonly: Boolean(config.readonly),
        floating: Boolean(config.floating),
        clearable: config.clearable !== false,
        closeOnSelect: Boolean(config.closeOnSelect),
        inline: Boolean(config.inline),
        showInput: config.showInput !== false,
        showPresets: config.showPresets !== false,
        showRecent: config.showRecent !== false,
        showEyedropper: config.showEyedropper !== false,
        showCopy: config.showCopy !== false,
        showNative: Boolean(config.showNative),
        presets: Array.isArray(config.presets) ? config.presets : [],
        recentKey: config.recentKey ?? 'forms-color-picker-recent',
        recentLimit: config.recentLimit ?? 8,
        placeholder: config.placeholder ?? '',
        labelActive: config.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: config.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',
        direction: config.direction ?? 'auto',
        align: config.align ?? 'start',

        open: false,
        focused: false,
        hue: 0,
        sat: 100,
        val: 100,
        alphaValue: 1,
        textValue: '',
        recent: [],
        panelStyle: '',
        dragging: null,
        copied: false,
        eyedropperSupported: false,
        _copyTimer: null,

        init() {
            this.eyedropperSupported = typeof window.EyeDropper === 'function';
            this.recent = this.loadRecent();
            this.applyValue(this.value, false);
            this.syncText();

            if (this.inline) {
                this.open = true;
            }

            this.$watch('value', () => {
                this.syncHidden();
                this.$dispatch('color-changed', { value: this.value });
            });

            this.$nextTick(() => this.syncHidden());

            window.addEventListener('scroll', this._onReposition = () => {
                if (this.open && ! this.inline) {
                    this.updatePosition();
                }
            }, true);

            window.addEventListener('resize', this._onResize = () => {
                if (this.open && ! this.inline) {
                    this.updatePosition();
                }
            });

            window.addEventListener('pointermove', this._onPointerMove = (event) => {
                this.onPointerMove(event);
            });

            window.addEventListener('pointerup', this._onPointerUp = () => {
                this.onPointerUp();
            });
        },

        destroy() {
            if (this._onReposition) {
                window.removeEventListener('scroll', this._onReposition, true);
            }

            if (this._onResize) {
                window.removeEventListener('resize', this._onResize);
            }

            if (this._onPointerMove) {
                window.removeEventListener('pointermove', this._onPointerMove);
            }

            if (this._onPointerUp) {
                window.removeEventListener('pointerup', this._onPointerUp);
            }

            if (this._copyTimer) {
                clearTimeout(this._copyTimer);
            }
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get hasValue() {
            return this.value !== '' && this.value !== null && this.value !== undefined;
        },

        get labelFloated() {
            return ! this.floating || this.focused || this.open || this.hasValue;
        },

        get floatingLabelClasses() {
            return {
                [this.labelActive]: this.labelFloated,
                [this.labelRest]: ! this.labelFloated,
            };
        },

        get swatchStyle() {
            if (! this.hasValue) {
                return 'background-image:linear-gradient(45deg,#ccc 25%,transparent 25%),linear-gradient(-45deg,#ccc 25%,transparent 25%),linear-gradient(45deg,transparent 75%,#ccc 75%),linear-gradient(-45deg,transparent 75%,#ccc 75%);background-size:8px 8px;background-position:0 0,0 4px,4px -4px,-4px 0;background-color:#fff';
            }

            return `background-color:${this.cssColor}`;
        },

        get cssColor() {
            const { r, g, b } = this.hsvToRgb(this.hue, this.sat, this.val);

            if (this.alpha) {
                return `rgba(${r}, ${g}, ${b}, ${this.roundAlpha(this.alphaValue)})`;
            }

            return `rgb(${r}, ${g}, ${b})`;
        },

        get hueGradient() {
            return 'linear-gradient(to right, #f00 0%, #ff0 17%, #0f0 33%, #0ff 50%, #00f 67%, #f0f 83%, #f00 100%)';
        },

        get alphaGradient() {
            const { r, g, b } = this.hsvToRgb(this.hue, this.sat, this.val);

            return `linear-gradient(to right, rgba(${r},${g},${b},0), rgb(${r},${g},${b}))`;
        },

        get satValStyle() {
            const hueColor = this.hsvToHex(this.hue, 100, 100);

            return `background:
                linear-gradient(to top, #000, transparent),
                linear-gradient(to right, #fff, ${hueColor})`;
        },

        get pointerStyle() {
            return `left:${this.sat}%; top:${100 - this.val}%`;
        },

        get formatOptions() {
            return ['hex', 'rgb', 'hsl'];
        },

        syncHidden() {
            const hidden = this.$refs.hidden;

            if (! hidden) {
                return;
            }

            const next = this.value ?? '';

            if (hidden.value !== next) {
                hidden.value = next;
                hidden.dispatchEvent(new Event('input', { bubbles: true }));
            }
        },

        toggle() {
            if (! this.canEdit || this.inline) {
                return;
            }

            if (this.open) {
                this.close();
            } else {
                this.openPanel();
            }
        },

        openPanel() {
            if (! this.canEdit || this.inline) {
                return;
            }

            this.panelStyle = 'position:fixed; visibility:hidden; top:0; left:0;';
            this.open = true;
            this.focused = true;

            this.$nextTick(() => {
                requestAnimationFrame(() => {
                    this.updatePosition();
                    this.$refs.hexInput?.focus();
                });
            });
        },

        close() {
            if (this.inline) {
                return;
            }

            this.open = false;
            this.panelStyle = '';
            this.dragging = null;
        },

        closeIfOutside(target) {
            if (! this.open || this.inline) {
                return;
            }

            const root = this.$refs.root;
            const panel = this.$refs.panel;

            if (root?.contains(target) || panel?.contains(target)) {
                return;
            }

            this.close();
        },

        updatePosition() {
            const trigger = this.$refs.trigger;
            const panel = this.$refs.panel;

            if (! trigger || ! panel || this.inline) {
                return;
            }

            const rect = trigger.getBoundingClientRect();
            const panelRect = panel.getBoundingClientRect();
            const gap = 6;
            const vw = window.innerWidth;
            const vh = window.innerHeight;
            const spaceBelow = vh - rect.bottom;
            const spaceAbove = rect.top;

            let placeUp = this.direction === 'up';

            if (this.direction === 'auto') {
                placeUp = spaceBelow < panelRect.height + gap && spaceAbove > spaceBelow;
            } else if (this.direction === 'down') {
                placeUp = false;
            }

            const width = Math.max(rect.width, 280);
            let left = rect.left;

            if (this.align === 'end') {
                left = rect.right - width;
            } else if (this.align === 'center') {
                left = rect.left + (rect.width / 2) - (width / 2);
            }

            left = Math.max(8, Math.min(left, vw - width - 8));

            let style = `position:fixed; width:${width}px; z-index:1080;`;

            if (placeUp) {
                style += `bottom:${vh - rect.top + gap}px; left:${left}px;`;
            } else {
                style += `top:${rect.bottom + gap}px; left:${left}px;`;
            }

            this.panelStyle = style;
        },

        onFocus() {
            this.focused = true;
        },

        onBlur() {
            this.focused = false;
        },

        onTriggerKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            if (event.key === 'Enter' || event.key === ' ' || event.key === 'ArrowDown') {
                event.preventDefault();
                this.openPanel();
            }

            if (event.key === 'Escape') {
                this.close();
            }

            if ((event.key === 'Backspace' || event.key === 'Delete') && this.clearable && this.hasValue) {
                event.preventDefault();
                this.clear();
            }
        },

        clear() {
            if (! this.canEdit || ! this.clearable) {
                return;
            }

            this.value = '';
            this.hue = 0;
            this.sat = 100;
            this.val = 100;
            this.alphaValue = 1;
            this.syncText();
            this.$refs.trigger?.focus();
        },

        setFormat(format) {
            if (! ['hex', 'rgb', 'hsl'].includes(format)) {
                return;
            }

            this.format = format;
            this.syncText();
            this.commitFromHsv(true);
        },

        applyPreset(color) {
            if (! this.canEdit) {
                return;
            }

            this.applyValue(color, true);
            this.remember(this.value);

            if (this.closeOnSelect && ! this.inline) {
                this.close();
            }
        },

        applyValue(raw, commit = true) {
            const parsed = this.parseColor(raw);

            if (! parsed) {
                if (! commit) {
                    this.value = raw ?? '';
                    this.syncText();
                }

                return false;
            }

            this.hue = parsed.h;
            this.sat = parsed.s;
            this.val = parsed.v;
            this.alphaValue = this.alpha ? parsed.a : 1;

            if (commit) {
                this.commitFromHsv(true);
            } else {
                this.value = this.formatValue();
                this.syncText();
            }

            return true;
        },

        commitFromHsv(remember = false) {
            this.value = this.formatValue();
            this.syncText();

            if (remember && this.hasValue) {
                this.remember(this.value);
            }
        },

        syncText() {
            this.textValue = this.hasValue ? this.formatValue() : '';
        },

        onTextInput() {
            if (! this.canEdit) {
                return;
            }

            const parsed = this.parseColor(this.textValue);

            if (! parsed) {
                return;
            }

            this.hue = parsed.h;
            this.sat = parsed.s;
            this.val = parsed.v;
            this.alphaValue = this.alpha ? parsed.a : 1;
            this.value = this.formatValue();
        },

        onTextBlur() {
            if (! this.canEdit) {
                return;
            }

            if (this.textValue.trim() === '') {
                if (this.clearable) {
                    this.clear();
                } else {
                    this.syncText();
                }

                return;
            }

            if (! this.applyValue(this.textValue, true)) {
                this.syncText();
            }
        },

        onTextKeydown(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                this.onTextBlur();

                if (this.closeOnSelect && ! this.inline) {
                    this.close();
                }
            }

            if (event.key === 'Escape') {
                this.syncText();
                this.close();
            }
        },

        onNativeInput(event) {
            if (! this.canEdit) {
                return;
            }

            this.applyValue(event.target.value, true);
        },

        startDrag(area, event) {
            if (! this.canEdit) {
                return;
            }

            event.preventDefault();
            this.dragging = area;
            this.onPointerMove(event);
        },

        onPointerMove(event) {
            if (! this.dragging || ! this.canEdit) {
                return;
            }

            if (this.dragging === 'satval') {
                const el = this.$refs.satval;

                if (! el) {
                    return;
                }

                const rect = el.getBoundingClientRect();
                const x = this.clamp((event.clientX - rect.left) / rect.width, 0, 1);
                const y = this.clamp((event.clientY - rect.top) / rect.height, 0, 1);

                this.sat = Math.round(x * 100);
                this.val = Math.round((1 - y) * 100);
                this.commitFromHsv(false);
            }

            if (this.dragging === 'hue') {
                const el = this.$refs.hue;

                if (! el) {
                    return;
                }

                const rect = el.getBoundingClientRect();
                const x = this.clamp((event.clientX - rect.left) / rect.width, 0, 1);

                this.hue = Math.round(x * 360);
                this.commitFromHsv(false);
            }

            if (this.dragging === 'alpha') {
                const el = this.$refs.alpha;

                if (! el) {
                    return;
                }

                const rect = el.getBoundingClientRect();
                const x = this.clamp((event.clientX - rect.left) / rect.width, 0, 1);

                this.alphaValue = Math.round(x * 100) / 100;
                this.commitFromHsv(false);
            }
        },

        onPointerUp() {
            if (! this.dragging) {
                return;
            }

            this.dragging = null;

            if (this.hasValue) {
                this.remember(this.value);
            }
        },

        async eyedrop() {
            if (! this.canEdit || ! this.eyedropperSupported) {
                return;
            }

            try {
                const dropper = new window.EyeDropper();
                const result = await dropper.open();

                if (result?.sRGBHex) {
                    this.applyValue(result.sRGBHex, true);
                }
            } catch {
                // Usuário cancelou — silencioso.
            }
        },

        async copy() {
            if (! this.hasValue) {
                return;
            }

            try {
                await navigator.clipboard.writeText(this.value);
                this.copied = true;

                if (this._copyTimer) {
                    clearTimeout(this._copyTimer);
                }

                this._copyTimer = setTimeout(() => {
                    this.copied = false;
                }, 1500);
            } catch {
                // Clipboard indisponível.
            }
        },

        formatValue() {
            const { r, g, b } = this.hsvToRgb(this.hue, this.sat, this.val);
            const a = this.roundAlpha(this.alphaValue);

            if (this.format === 'rgb') {
                return this.alpha
                    ? `rgba(${r}, ${g}, ${b}, ${a})`
                    : `rgb(${r}, ${g}, ${b})`;
            }

            if (this.format === 'hsl') {
                const hsl = this.rgbToHsl(r, g, b);

                return this.alpha
                    ? `hsla(${hsl.h}, ${hsl.s}%, ${hsl.l}%, ${a})`
                    : `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
            }

            const hex = this.rgbToHex(r, g, b);

            if (this.alpha && a < 1) {
                return hex + this.alphaToHex(a);
            }

            return hex;
        },

        parseColor(raw) {
            if (raw === null || raw === undefined) {
                return null;
            }

            const input = String(raw).trim();

            if (input === '') {
                return null;
            }

            const hex = input.match(/^#?([0-9a-f]{3}|[0-9a-f]{4}|[0-9a-f]{6}|[0-9a-f]{8})$/i);

            if (hex) {
                let h = hex[1];

                if (h.length === 3 || h.length === 4) {
                    h = h.split('').map((c) => c + c).join('');
                }

                const r = parseInt(h.slice(0, 2), 16);
                const g = parseInt(h.slice(2, 4), 16);
                const b = parseInt(h.slice(4, 6), 16);
                const a = h.length === 8 ? parseInt(h.slice(6, 8), 16) / 255 : 1;
                const hsv = this.rgbToHsv(r, g, b);

                return { ...hsv, a };
            }

            const rgb = input.match(/^rgba?\(\s*([\d.]+)\s*[, ]\s*([\d.]+)\s*[, ]\s*([\d.]+)(?:\s*[,/]\s*([\d.]+%?))?\s*\)$/i);

            if (rgb) {
                const r = this.clamp(Number(rgb[1]), 0, 255);
                const g = this.clamp(Number(rgb[2]), 0, 255);
                const b = this.clamp(Number(rgb[3]), 0, 255);
                const a = rgb[4] === undefined ? 1 : this.parseAlphaToken(rgb[4]);
                const hsv = this.rgbToHsv(r, g, b);

                return { ...hsv, a };
            }

            const hsl = input.match(/^hsla?\(\s*([\d.]+)\s*[, ]\s*([\d.]+)%?\s*[, ]\s*([\d.]+)%?(?:\s*[,/]\s*([\d.]+%?))?\s*\)$/i);

            if (hsl) {
                const h = ((Number(hsl[1]) % 360) + 360) % 360;
                const s = this.clamp(Number(hsl[2]), 0, 100);
                const l = this.clamp(Number(hsl[3]), 0, 100);
                const a = hsl[4] === undefined ? 1 : this.parseAlphaToken(hsl[4]);
                const rgb = this.hslToRgb(h, s, l);
                const hsv = this.rgbToHsv(rgb.r, rgb.g, rgb.b);

                return { ...hsv, a };
            }

            return null;
        },

        parseAlphaToken(token) {
            const value = String(token).trim();

            if (value.endsWith('%')) {
                return this.clamp(Number(value.slice(0, -1)) / 100, 0, 1);
            }

            return this.clamp(Number(value), 0, 1);
        },

        remember(color) {
            if (! this.showRecent || ! color) {
                return;
            }

            const normalized = this.normalizeForRecent(color);
            const next = [normalized, ...this.recent.filter((item) => item !== normalized)]
                .slice(0, this.recentLimit);

            this.recent = next;

            try {
                localStorage.setItem(this.recentKey, JSON.stringify(next));
            } catch {
                // Storage bloqueado.
            }
        },

        loadRecent() {
            if (! this.showRecent) {
                return [];
            }

            try {
                const raw = localStorage.getItem(this.recentKey);
                const parsed = raw ? JSON.parse(raw) : [];

                return Array.isArray(parsed)
                    ? parsed.filter((item) => typeof item === 'string').slice(0, this.recentLimit)
                    : [];
            } catch {
                return [];
            }
        },

        normalizeForRecent(color) {
            const parsed = this.parseColor(color);

            if (! parsed) {
                return color;
            }

            const { r, g, b } = this.hsvToRgb(parsed.h, parsed.s, parsed.v);
            const hex = this.rgbToHex(r, g, b);

            if (this.alpha && parsed.a < 1) {
                return hex + this.alphaToHex(parsed.a);
            }

            return hex;
        },

        isPresetActive(color) {
            if (! this.hasValue) {
                return false;
            }

            return this.normalizeForRecent(color) === this.normalizeForRecent(this.value);
        },

        clamp(value, min, max) {
            return Math.min(max, Math.max(min, value));
        },

        roundAlpha(value) {
            return Math.round(this.clamp(value, 0, 1) * 100) / 100;
        },

        alphaToHex(alpha) {
            return Math.round(this.clamp(alpha, 0, 1) * 255)
                .toString(16)
                .padStart(2, '0')
                .toUpperCase();
        },

        rgbToHex(r, g, b) {
            const to = (n) => Math.round(this.clamp(n, 0, 255))
                .toString(16)
                .padStart(2, '0')
                .toUpperCase();

            return `#${to(r)}${to(g)}${to(b)}`;
        },

        hsvToHex(h, s, v) {
            const { r, g, b } = this.hsvToRgb(h, s, v);

            return this.rgbToHex(r, g, b);
        },

        hsvToRgb(h, s, v) {
            const hh = ((h % 360) + 360) % 360;
            const ss = this.clamp(s, 0, 100) / 100;
            const vv = this.clamp(v, 0, 100) / 100;
            const c = vv * ss;
            const x = c * (1 - Math.abs(((hh / 60) % 2) - 1));
            const m = vv - c;

            let r1 = 0;
            let g1 = 0;
            let b1 = 0;

            if (hh < 60) {
                r1 = c; g1 = x;
            } else if (hh < 120) {
                r1 = x; g1 = c;
            } else if (hh < 180) {
                g1 = c; b1 = x;
            } else if (hh < 240) {
                g1 = x; b1 = c;
            } else if (hh < 300) {
                r1 = x; b1 = c;
            } else {
                r1 = c; b1 = x;
            }

            return {
                r: Math.round((r1 + m) * 255),
                g: Math.round((g1 + m) * 255),
                b: Math.round((b1 + m) * 255),
            };
        },

        rgbToHsv(r, g, b) {
            const rr = this.clamp(r, 0, 255) / 255;
            const gg = this.clamp(g, 0, 255) / 255;
            const bb = this.clamp(b, 0, 255) / 255;
            const max = Math.max(rr, gg, bb);
            const min = Math.min(rr, gg, bb);
            const d = max - min;

            let h = 0;

            if (d !== 0) {
                if (max === rr) {
                    h = ((gg - bb) / d) % 6;
                } else if (max === gg) {
                    h = (bb - rr) / d + 2;
                } else {
                    h = (rr - gg) / d + 4;
                }

                h *= 60;

                if (h < 0) {
                    h += 360;
                }
            }

            const s = max === 0 ? 0 : (d / max) * 100;
            const v = max * 100;

            return {
                h: Math.round(h),
                s: Math.round(s),
                v: Math.round(v),
            };
        },

        rgbToHsl(r, g, b) {
            const rr = this.clamp(r, 0, 255) / 255;
            const gg = this.clamp(g, 0, 255) / 255;
            const bb = this.clamp(b, 0, 255) / 255;
            const max = Math.max(rr, gg, bb);
            const min = Math.min(rr, gg, bb);
            const l = (max + min) / 2;
            const d = max - min;

            let h = 0;
            let s = 0;

            if (d !== 0) {
                s = d / (1 - Math.abs(2 * l - 1));

                if (max === rr) {
                    h = ((gg - bb) / d) % 6;
                } else if (max === gg) {
                    h = (bb - rr) / d + 2;
                } else {
                    h = (rr - gg) / d + 4;
                }

                h *= 60;

                if (h < 0) {
                    h += 360;
                }
            }

            return {
                h: Math.round(h),
                s: Math.round(s * 100),
                l: Math.round(l * 100),
            };
        },

        hslToRgb(h, s, l) {
            const hh = ((h % 360) + 360) % 360;
            const ss = this.clamp(s, 0, 100) / 100;
            const ll = this.clamp(l, 0, 100) / 100;
            const c = (1 - Math.abs(2 * ll - 1)) * ss;
            const x = c * (1 - Math.abs(((hh / 60) % 2) - 1));
            const m = ll - c / 2;

            let r1 = 0;
            let g1 = 0;
            let b1 = 0;

            if (hh < 60) {
                r1 = c; g1 = x;
            } else if (hh < 120) {
                r1 = x; g1 = c;
            } else if (hh < 180) {
                g1 = c; b1 = x;
            } else if (hh < 240) {
                g1 = x; b1 = c;
            } else if (hh < 300) {
                r1 = x; b1 = c;
            } else {
                r1 = c; b1 = x;
            }

            return {
                r: Math.round((r1 + m) * 255),
                g: Math.round((g1 + m) * 255),
                b: Math.round((b1 + m) * 255),
            };
        },
    }));
});
