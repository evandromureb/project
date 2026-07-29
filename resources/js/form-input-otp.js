// Lógica do <x-forms.input-otp> como Alpine.data nomeado (não inline
// no x-data) — comparações / arrow functions quebrariam wire:navigate
// se ficassem soltas num atributo x-data="{...}". Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formInputOtp', (options = {}) => ({
        length: Math.max(1, Math.min(12, Number(options.length ?? 6))),
        digits: [],
        focusedIndex: null,
        mode: ['numeric', 'alpha', 'alphanumeric'].includes(options.mode)
            ? options.mode
            : 'numeric',
        masked: Boolean(options.masked ?? false),
        selectOnFocus: Boolean(options.selectOnFocus ?? true),
        blurOnComplete: Boolean(options.blurOnComplete ?? false),
        autofocus: Boolean(options.autofocus ?? false),
        disabled: Boolean(options.disabled ?? false),
        readonly: Boolean(options.readonly ?? false),
        resend: Boolean(options.resend ?? false),
        resendSeconds: Math.max(0, Number(options.resendSeconds ?? 60)),
        resendCountdown: 0,
        resendTimer: null,
        completedOnce: false,

        init() {
            const initial = String(options.value ?? '');
            this.digits = Array.from({ length: this.length }, (_, index) => {
                const char = initial[index] ?? '';

                return this.isAllowed(char) ? char : '';
            });

            this.syncModel(false);

            if (this.resend && this.resendSeconds > 0) {
                this.startResendCountdown(this.resendSeconds);
            }

            if (this.autofocus && ! this.isBlocked()) {
                this.$nextTick(() => this.focusIndex(0));
            }
        },

        destroy() {
            this.clearResendTimer();
        },

        get value() {
            return this.digits.join('');
        },

        get isComplete() {
            return this.digits.length === this.length && this.digits.every((digit) => digit !== '');
        },

        get filledCount() {
            return this.digits.filter((digit) => digit !== '').length;
        },

        get canResend() {
            return this.resend && this.resendCountdown <= 0 && ! this.disabled;
        },

        // Sempre `text`: PIN mascarado usa CSS text-security (não type=password),
        // senão o Chrome trata N células como form de senha complexo.
        get inputType() {
            return 'text';
        },

        get inputMode() {
            if (this.mode === 'numeric') {
                return 'numeric';
            }

            return 'text';
        },

        get pattern() {
            if (this.mode === 'numeric') {
                return '[0-9]*';
            }

            if (this.mode === 'alpha') {
                return '[A-Za-z]*';
            }

            return '[A-Za-z0-9]*';
        },

        isBlocked() {
            return this.disabled || this.readonly;
        },

        isAllowed(char) {
            if (! char || char.length !== 1) {
                return false;
            }

            if (this.mode === 'numeric') {
                return /^[0-9]$/.test(char);
            }

            if (this.mode === 'alpha') {
                return /^[A-Za-z]$/.test(char);
            }

            return /^[A-Za-z0-9]$/.test(char);
        },

        normalizeChar(char) {
            if (! char) {
                return '';
            }

            const next = String(char).slice(0, 1);

            if (this.mode === 'alpha' || this.mode === 'alphanumeric') {
                return next.toUpperCase();
            }

            return next;
        },

        sanitizeSequence(raw) {
            const text = String(raw ?? '');
            const chars = [];

            for (const char of text) {
                const normalized = this.normalizeChar(char);

                if (this.isAllowed(normalized)) {
                    chars.push(normalized);
                }

                if (chars.length >= this.length) {
                    break;
                }
            }

            return chars;
        },

        cellRef(index) {
            return this.$refs[`cell${index}`] ?? null;
        },

        focusIndex(index) {
            const clamped = Math.max(0, Math.min(this.length - 1, index));
            const cell = this.cellRef(clamped);

            if (! cell) {
                return;
            }

            cell.focus();

            if (this.selectOnFocus) {
                this.$nextTick(() => cell.select?.());
            }
        },

        commitDigits(nextDigits, { emit = true } = {}) {
            this.digits = nextDigits;
            this.syncModel(emit);

            if (emit) {
                this.emitChange();
                this.maybeComplete();
            }
        },

        setDigit(index, char, { move = true } = {}) {
            if (this.isBlocked() || index < 0 || index >= this.length) {
                return;
            }

            const next = this.normalizeChar(char);

            if (next !== '' && ! this.isAllowed(next)) {
                return;
            }

            const digits = [...this.digits];
            digits[index] = next;
            this.commitDigits(digits);

            if (move && next !== '' && index < this.length - 1) {
                this.focusIndex(index + 1);
            }
        },

        clearDigit(index) {
            if (this.isBlocked() || index < 0 || index >= this.length) {
                return;
            }

            const digits = [...this.digits];
            digits[index] = '';
            this.commitDigits(digits);
        },

        fillFrom(chars, startIndex = 0) {
            if (this.isBlocked()) {
                return;
            }

            const digits = [...this.digits];
            let index = startIndex;

            for (const char of chars) {
                if (index >= this.length) {
                    break;
                }

                digits[index] = char;
                index += 1;
            }

            this.commitDigits(digits);

            const focusAt = Math.min(index, this.length - 1);
            this.$nextTick(() => this.focusIndex(focusAt));
        },

        clear() {
            if (this.isBlocked()) {
                return;
            }

            this.completedOnce = false;
            this.commitDigits(Array.from({ length: this.length }, () => ''));
            this.$nextTick(() => this.focusIndex(0));
            this.$dispatch('otp-clear');
        },

        syncModel(dispatch = false) {
            const model = this.$refs.model;

            if (! model) {
                return;
            }

            const next = this.value;

            if (model.value !== next) {
                model.value = next;

                if (dispatch) {
                    model.dispatchEvent(new Event('input', { bubbles: true }));
                    model.dispatchEvent(new Event('change', { bubbles: true }));
                }
            }
        },

        emitChange() {
            this.$dispatch('otp-change', {
                value: this.value,
                complete: this.isComplete,
                filled: this.filledCount,
                length: this.length,
            });
        },

        maybeComplete() {
            if (! this.isComplete) {
                this.completedOnce = false;

                return;
            }

            if (this.completedOnce) {
                return;
            }

            this.completedOnce = true;

            this.$dispatch('otp-complete', { value: this.value });

            if (this.blurOnComplete) {
                this.$nextTick(() => document.activeElement?.blur?.());
            }
        },

        onFocus(index) {
            this.focusedIndex = index;

            if (this.selectOnFocus) {
                this.$nextTick(() => this.cellRef(index)?.select?.());
            }
        },

        onBlur() {
            this.focusedIndex = null;
        },

        onInput(index, event) {
            if (this.isBlocked()) {
                event.target.value = this.digits[index] ?? '';

                return;
            }

            const raw = String(event.target.value ?? '');

            // Autofill / IME pode entregar vários caracteres num único input.
            if (raw.length > 1) {
                const chars = this.sanitizeSequence(raw);
                this.fillFrom(chars, index);
                event.target.value = this.digits[index] ?? '';

                return;
            }

            if (raw === '') {
                this.clearDigit(index);
                event.target.value = '';

                return;
            }

            const next = this.normalizeChar(raw);

            if (! this.isAllowed(next)) {
                event.target.value = this.digits[index] ?? '';

                return;
            }

            this.setDigit(index, next, { move: true });
            event.target.value = next;
        },

        onKeydown(index, event) {
            if (this.isBlocked()) {
                return;
            }

            const key = event.key;

            if (key === 'Backspace') {
                event.preventDefault();

                if (this.digits[index]) {
                    this.clearDigit(index);
                    const cell = this.cellRef(index);

                    if (cell) {
                        cell.value = '';
                    }
                } else if (index > 0) {
                    this.clearDigit(index - 1);
                    this.focusIndex(index - 1);
                    const prev = this.cellRef(index - 1);

                    if (prev) {
                        prev.value = '';
                    }
                }

                return;
            }

            if (key === 'Delete') {
                event.preventDefault();
                this.clearDigit(index);
                const cell = this.cellRef(index);

                if (cell) {
                    cell.value = '';
                }

                return;
            }

            if (key === 'ArrowLeft') {
                event.preventDefault();
                this.focusIndex(index - 1);

                return;
            }

            if (key === 'ArrowRight') {
                event.preventDefault();
                this.focusIndex(index + 1);

                return;
            }

            if (key === 'Home') {
                event.preventDefault();
                this.focusIndex(0);

                return;
            }

            if (key === 'End') {
                event.preventDefault();
                this.focusIndex(this.length - 1);

                return;
            }

            if (key === ' ' || key === 'Spacebar') {
                event.preventDefault();

                return;
            }

            // Substitui o dígito atual ao digitar outro caractere válido.
            if (key.length === 1 && this.isAllowed(this.normalizeChar(key)) && this.digits[index]) {
                event.preventDefault();
                this.setDigit(index, key, { move: true });
                const cell = this.cellRef(index);

                if (cell) {
                    cell.value = this.digits[index];
                }
            }
        },

        onPaste(index, event) {
            if (this.isBlocked()) {
                return;
            }

            event.preventDefault();
            const text = (event.clipboardData || window.clipboardData)?.getData('text') ?? '';
            const chars = this.sanitizeSequence(text);

            if (chars.length === 0) {
                return;
            }

            // Cola a sequência a partir do índice atual (ou do início se
            // o paste parecer um OTP completo).
            const start = chars.length >= this.length ? 0 : index;
            this.fillFrom(chars, start);
        },

        startResendCountdown(seconds = null) {
            this.clearResendTimer();
            this.resendCountdown = Math.max(0, Number(seconds ?? this.resendSeconds));

            if (this.resendCountdown <= 0) {
                return;
            }

            this.resendTimer = setInterval(() => {
                this.resendCountdown = Math.max(0, this.resendCountdown - 1);

                if (this.resendCountdown <= 0) {
                    this.clearResendTimer();
                }
            }, 1000);
        },

        clearResendTimer() {
            if (this.resendTimer) {
                clearInterval(this.resendTimer);
                this.resendTimer = null;
            }
        },

        requestResend() {
            if (! this.canResend) {
                return;
            }

            this.$dispatch('otp-resend');
            this.startResendCountdown(this.resendSeconds);
        },
    }));
});
