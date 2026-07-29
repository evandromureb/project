// <x-ui.example> — Preview / Code + Copy + formatos (Livewire / HTML / JSON).
// Alpine.data nomeado (gotcha wire:navigate).

document.addEventListener('alpine:init', () => {
    Alpine.data(
        'uiExample',
        (
            sources = {},
            copyLabel = 'Copiar',
            copiedLabel = 'Copiado!',
            initialFormat = 'livewire',
        ) => ({
            sources: {
                livewire: String(sources?.livewire ?? ''),
                html: String(sources?.html ?? ''),
                json: String(sources?.json ?? ''),
            },
            copyLabel: copyLabel ?? 'Copiar',
            copiedLabel: copiedLabel ?? 'Copiado!',
            tab: 'preview',
            format: initialFormat,
            // Shiki só monta na 1ª abertura da aba Code (evita N highlights no load).
            codeMounted: false,
            // Cada formato monta o editor na 1ª seleção e permanece no DOM.
            formatsMounted: {
                livewire: false,
                html: false,
                json: false,
            },
            copied: false,
            failed: false,
            _timer: null,

            get availableFormats() {
                return ['livewire', 'html', 'json'].filter(
                    (key) => String(this.sources[key] ?? '').trim() !== '',
                );
            },

            get hasFormatSwitcher() {
                return this.availableFormats.length > 1;
            },

            get activeCode() {
                return String(this.sources[this.format] ?? '');
            },

            get copyButtonLabel() {
                if (this.failed) {
                    return 'Erro ao copiar';
                }

                return this.copied ? this.copiedLabel : this.copyLabel;
            },

            get previewTabClass() {
                return this.tab === 'preview'
                    ? 'bg-card text-foreground shadow-sm'
                    : 'text-muted-foreground hover:text-foreground';
            },

            get codeTabClass() {
                return this.tab === 'code'
                    ? 'bg-card text-foreground shadow-sm'
                    : 'text-muted-foreground hover:text-foreground';
            },

            get copyIconClass() {
                if (this.failed) {
                    return 'bi-x-lg';
                }

                return this.copied ? 'bi-check2' : 'bi-clipboard';
            },

            formatTabClass(key) {
                return this.format === key
                    ? 'bg-card text-foreground shadow-sm'
                    : 'text-muted-foreground hover:text-foreground';
            },

            formatLabel(key) {
                return (
                    {
                        livewire: 'Livewire',
                        html: 'HTML',
                        json: 'JSON',
                    }[key] ?? key
                );
            },

            init() {
                const available = this.availableFormats;

                if (! available.includes(this.format)) {
                    this.format = available[0] ?? 'livewire';
                }
            },

            showPreview() {
                this.tab = 'preview';
            },

            showCode() {
                this.codeMounted = true;
                this.formatsMounted[this.format] = true;
                this.tab = 'code';
            },

            setFormat(key) {
                if (! this.availableFormats.includes(key)) {
                    return;
                }

                this.format = key;
                this.formatsMounted[key] = true;
            },

            destroy() {
                if (this._timer) {
                    clearTimeout(this._timer);
                }
            },

            async copy() {
                const text = String(this.activeCode ?? '');

                if (text === '') {
                    return;
                }

                try {
                    await navigator.clipboard.writeText(text);
                    this.copied = true;
                    this.failed = false;
                    this.$dispatch('example-copy', { value: text, format: this.format });

                    if (this._timer) {
                        clearTimeout(this._timer);
                    }

                    this._timer = setTimeout(() => {
                        this.copied = false;
                    }, 1600);
                } catch {
                    this.failed = true;
                    this.copied = false;

                    if (this._timer) {
                        clearTimeout(this._timer);
                    }

                    this._timer = setTimeout(() => {
                        this.failed = false;
                    }, 1600);
                }
            },
        }),
    );
});
