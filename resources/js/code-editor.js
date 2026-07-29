// <x-ui.code-editor> — highlight com Shiki (https://shiki.style/).
// Alpine.data nomeado (gotcha wire:navigate). Engine JS (sem WASM).

let highlighterPromise = null;

const THEMES = [
    'monokai',
    'one-dark-pro',
    'dracula',
    'github-dark',
    'github-light',
    'nord',
    'tokyo-night',
    'catppuccin-mocha',
    'catppuccin-latte',
    'vitesse-dark',
    'vitesse-light',
    'rose-pine',
    'material-theme-darker',
    'dark-plus',
    'night-owl',
    'poimandres',
];

const LANGS = [
    'php',
    'blade',
    'javascript',
    'typescript',
    'html',
    'css',
    'scss',
    'json',
    'bash',
    'sql',
    'yaml',
    'python',
    'ruby',
    'go',
    'rust',
    'java',
    'csharp',
    'markdown',
    'diff',
    'docker',
    'nginx',
    'jsx',
    'tsx',
];

const LANG_ALIASES = {
    js: 'javascript',
    ts: 'typescript',
    yml: 'yaml',
    sh: 'bash',
    shell: 'bash',
    markup: 'html',
    txt: 'text',
    plain: 'text',
    plaintext: 'text',
    none: 'text',
};

function normalizeLang(lang) {
    const key = String(lang ?? 'text').trim().toLowerCase();

    return LANG_ALIASES[key] ?? key;
}

function normalizeTheme(theme) {
    const key = String(theme ?? 'monokai').trim().toLowerCase();

    return THEMES.includes(key) ? key : 'monokai';
}

function escapeHtml(value) {
    return String(value)
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;');
}

function getHighlighter() {
    if (! highlighterPromise) {
        highlighterPromise = Promise.all([
            import('shiki'),
            import('shiki/engine/javascript'),
        ]).then(([{ createHighlighter }, { createJavaScriptRegexEngine }]) =>
            createHighlighter({
                themes: ['monokai', 'github-dark', 'github-light'],
                // blade: docs (<x-ui.example>) usam isso na aba Code
                langs: ['php', 'blade', 'javascript', 'html', 'css', 'json', 'bash'],
                engine: createJavaScriptRegexEngine({ forgiving: true }),
            }),
        );
    }

    return highlighterPromise;
}

document.addEventListener('alpine:init', () => {
    Alpine.data('codeEditor', (options = {}) => ({
        code: String(options.code ?? options.value ?? ''),
        language: normalizeLang(options.language ?? 'php'),
        theme: normalizeTheme(options.theme ?? 'monokai'),
        filename: options.filename == null ? null : String(options.filename),
        copyable: options.copyable !== false,
        showHeader: options.showHeader !== false,
        maxHeight: options.maxHeight == null ? '28rem' : String(options.maxHeight),
        copyLabel: options.copyLabel ?? 'Copiar',
        copiedLabel: options.copiedLabel ?? 'Copiado!',

        html: '',
        ready: false,
        copied: false,
        failed: false,
        _token: 0,
        _timer: null,

        get value() {
            return this.code;
        },

        set value(next) {
            this.code = String(next ?? '');
        },

        get languageLabel() {
            return this.language;
        },

        get hasHeader() {
            return this.showHeader && (this.filename || this.copyable);
        },

        get frameStyle() {
            return `--ui-code-max-height: ${this.maxHeight}`;
        },

        init() {
            this.$watch('code', () => this.render());
            this.$watch('language', () => this.render());
            this.$watch('theme', () => this.render());
            this.render();
        },

        destroy() {
            if (this._timer) {
                clearTimeout(this._timer);
            }
        },

        async render() {
            const token = ++this._token;
            const code = String(this.code ?? '');
            const language = normalizeLang(this.language);
            const theme = normalizeTheme(this.theme);

            this.language = language;
            this.theme = theme;

            try {
                const highlighter = await getHighlighter();

                if (token !== this._token) {
                    return;
                }

                if (! highlighter.getLoadedThemes().includes(theme)) {
                    await highlighter.loadTheme(theme);
                }

                if (language !== 'text' && ! highlighter.getLoadedLanguages().includes(language)) {
                    await highlighter.loadLanguage(language);
                }

                if (token !== this._token) {
                    return;
                }

                if (language === 'text') {
                    this.html = `<pre class="shiki" style="background-color:#272822;color:#f8f8f2"><code>${escapeHtml(code)}</code></pre>`;
                } else {
                    this.html = highlighter.codeToHtml(code, {
                        lang: language,
                        theme,
                    });
                }

                // Aplica o background do tema no shell (header acompanha).
                const bg = this.html.match(/background-color:([^;"]+)/)?.[1]?.trim();

                if (bg && this.$el) {
                    this.$el.style.background = bg;
                }

                this.ready = true;
            } catch (error) {
                console.error('[x-ui.code-editor] falha no Shiki', { language, theme, error });

                if (token !== this._token) {
                    return;
                }

                this.html = `<pre class="shiki" style="background-color:#272822;color:#f8f8f2"><code>${escapeHtml(code)}</code></pre>`;
                this.ready = true;
            }
        },

        async copy() {
            const text = String(this.code ?? '');

            if (text === '') {
                return;
            }

            try {
                await navigator.clipboard.writeText(text);
                this.copied = true;
                this.failed = false;
                this.$dispatch('code-copy', { value: text });

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
    }));
});
