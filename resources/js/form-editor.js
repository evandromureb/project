// Lógica do <x-forms.editor> como Alpine.data nomeado (não inline no
// x-data) — createEditor, observers e arrows quebrariam wire:navigate se
// ficassem soltos num atributo x-data="{...}". Ver reference/dropdown.md
// (gotcha #4).
// Motor: BaseLab Editor (https://www.npmjs.com/package/baselabeditor),
// carregado sob demanda no mount (como o ECharts em chart.js).
let baselabEditorPromise = null;

function loadBaselabEditor() {
    if (! baselabEditorPromise) {
        baselabEditorPromise = Promise.all([
            import('baselabeditor'),
            import('baselabeditor/style.css'),
        ]).then(([mod]) => mod);
    }

    return baselabEditorPromise;
}

document.addEventListener('alpine:init', () => {
    Alpine.data('formEditor', (options = {}) => ({
        value: String(options.value ?? ''),
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        loading: Boolean(options.loading),
        focused: false,
        ready: false,
        length: 0,
        words: 0,
        maxLength: options.maxLength === null || options.maxLength === undefined
            ? null
            : Number(options.maxLength),
        showCharCounter: Boolean(options.showCharCounter),
        showWordCounter: Boolean(options.showWordCounter),
        clearable: Boolean(options.clearable),
        preset: typeof options.preset === 'string' ? options.preset : null,
        theme: typeof options.theme === 'string' ? options.theme : 'padrao',
        appearance: typeof options.appearance === 'string' ? options.appearance : null,
        locale: typeof options.locale === 'string' ? options.locale : 'pt',
        plugins: Array.isArray(options.plugins) ? options.plugins : null,
        toolbar: options.toolbar ?? null,
        footer: options.footer !== false,
        responsive: options.responsive !== false,
        persistTheme: Boolean(options.persistTheme),
        persistAppearance: Boolean(options.persistAppearance),
        width: options.width === null || options.width === undefined
            ? null
            : Number(options.width),
        height: options.height === null || options.height === undefined
            ? 320
            : Number(options.height),
        assetBaseUrl: typeof options.assetBaseUrl === 'string' ? options.assetBaseUrl : null,
        imageUploadUrl: typeof options.imageUploadUrl === 'string' ? options.imageUploadUrl : null,
        imageMaxSize: options.imageMaxSize === null || options.imageMaxSize === undefined
            ? null
            : Number(options.imageMaxSize),
        imageMinWidth: options.imageMinWidth ?? null,
        imageMaxWidth: options.imageMaxWidth ?? null,
        imageMinHeight: options.imageMinHeight ?? null,
        imageMaxHeight: options.imageMaxHeight ?? null,
        fontFamilyDefault: typeof options.fontFamilyDefault === 'string'
            ? options.fontFamilyDefault
            : null,
        fontFamilyItems: Array.isArray(options.fontFamilyItems) ? options.fontFamilyItems : null,
        _editor: null,
        _syncing: false,
        _observer: null,
        _appearanceObserver: null,
        _boundDomChange: null,
        _lastHtml: '',

        init() {
            this.refreshStats(this.value);

            this.$watch('value', (next) => {
                if (this._syncing) {
                    return;
                }

                this.refreshStats(next);
                this.pushContentToEditor(next);
            });

            this.$watch('disabled', () => this.applyInteractiveState());
            this.$watch('readonly', () => this.applyInteractiveState());
            this.$watch('loading', () => this.applyInteractiveState());

            this.$nextTick(() => {
                requestAnimationFrame(() => this.mountEditor());
            });
        },

        destroy() {
            this.teardownEditor();
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly && ! this.loading;
        },

        get hasValue() {
            const plain = this.plainText(this.value);

            return plain.length > 0;
        },

        get counterText() {
            const parts = [];

            if (this.showWordCounter) {
                parts.push(`${this.words} ${this.words === 1 ? 'palavra' : 'palavras'}`);
            }

            if (this.showCharCounter) {
                parts.push(
                    this.maxLength === null
                        ? String(this.length)
                        : `${this.length}/${this.maxLength}`,
                );
            }

            return parts.join(' · ');
        },

        get resolvedAppearance() {
            if (this.appearance === 'light' || this.appearance === 'dark') {
                return this.appearance;
            }

            return document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        },

        async mountEditor() {
            const textarea = this.$refs.textarea;
            const root = this.$refs.mount;

            if (! textarea || ! root || this._editor) {
                return;
            }

            textarea.value = this.value ?? '';

            let createEditor;

            try {
                ({ createEditor } = await loadBaselabEditor());
            } catch (error) {
                console.error('[x-forms.editor] falha ao carregar o BaseLab Editor', error);
                this.$dispatch('editor-error', { error });

                return;
            }

            // Teardown pode ter ocorrido durante o await (wire:navigate).
            if (! this.$refs.textarea || ! this.$refs.mount || this._editor) {
                return;
            }

            const editorOptions = {
                textarea,
                root,
                theme: this.theme || 'padrao',
                locale: this.locale || 'pt',
                appearance: this.resolvedAppearance,
                footer: this.footer,
                responsive: this.responsive,
                persistTheme: this.persistTheme,
                persistAppearance: this.persistAppearance,
                height: this.height,
            };

            if (this.preset) {
                editorOptions.preset = this.preset;
            }

            if (this.width !== null && ! Number.isNaN(this.width)) {
                editorOptions.width = this.width;
            }

            if (this.plugins !== null) {
                editorOptions.plugins = this.plugins;
            }

            if (this.toolbar !== null && this.toolbar !== '') {
                editorOptions.toolbar = this.toolbar;
            }

            if (this.assetBaseUrl) {
                editorOptions.assetBaseUrl = this.assetBaseUrl;
            }

            const image = this.buildImageOptions();

            if (image) {
                editorOptions.image = image;
            }

            const fontFamily = this.buildFontFamilyOptions();

            if (fontFamily) {
                editorOptions.fontFamily = fontFamily;
            }

            try {
                this._editor = createEditor(editorOptions);
            } catch (error) {
                console.error('[x-forms.editor] falha ao criar o BaseLab Editor', error);
                this.$dispatch('editor-error', { error });

                return;
            }

            this._lastHtml = this.safeGetHtml();
            this.value = this._lastHtml;
            this.refreshStats(this._lastHtml);
            this.bindDomSync();
            this.bindAppearanceSync();
            this.applyInteractiveState();
            this.ready = true;
            this.$dispatch('editor-ready', { editor: this._editor });
        },

        teardownEditor() {
            this.unbindDomSync();
            this.unbindAppearanceSync();

            if (this._editor) {
                try {
                    this._editor.destroy();
                } catch {
                    // ignore teardown races during wire:navigate
                }
            }

            this._editor = null;
            this.ready = false;
        },

        bindDomSync() {
            const root = this.$refs.mount;

            if (! root) {
                return;
            }

            this._boundDomChange = () => this.pullContentFromEditor();

            root.addEventListener('input', this._boundDomChange, true);
            root.addEventListener('keyup', this._boundDomChange, true);
            root.addEventListener('paste', this._boundDomChange, true);
            root.addEventListener('cut', this._boundDomChange, true);
            root.addEventListener('focusin', () => {
                this.focused = true;
            });
            root.addEventListener('focusout', (event) => {
                if (! root.contains(event.relatedTarget)) {
                    this.focused = false;
                    this.pullContentFromEditor();
                    this.$dispatch('editor-blur', { value: this.value });
                }
            });

            this._observer = new MutationObserver(() => this.pullContentFromEditor());
            this._observer.observe(root, {
                childList: true,
                subtree: true,
                characterData: true,
                attributes: true,
            });
        },

        unbindDomSync() {
            const root = this.$refs.mount;

            if (root && this._boundDomChange) {
                root.removeEventListener('input', this._boundDomChange, true);
                root.removeEventListener('keyup', this._boundDomChange, true);
                root.removeEventListener('paste', this._boundDomChange, true);
                root.removeEventListener('cut', this._boundDomChange, true);
            }

            this._boundDomChange = null;

            if (this._observer) {
                this._observer.disconnect();
                this._observer = null;
            }
        },

        bindAppearanceSync() {
            if (this.appearance === 'light' || this.appearance === 'dark') {
                return;
            }

            this._appearanceObserver = new MutationObserver(() => {
                if (! this._editor) {
                    return;
                }

                const next = this.resolvedAppearance;

                if (this._editor.getAppearance() !== next) {
                    this._editor.setAppearance(next);
                }
            });

            this._appearanceObserver.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class'],
            });
        },

        unbindAppearanceSync() {
            if (this._appearanceObserver) {
                this._appearanceObserver.disconnect();
                this._appearanceObserver = null;
            }
        },

        pullContentFromEditor() {
            if (! this._editor || this._syncing) {
                return;
            }

            const html = this.safeGetHtml();

            if (html === this._lastHtml) {
                return;
            }

            this._syncing = true;
            this._lastHtml = html;
            this.value = html;
            this.refreshStats(html);

            const textarea = this.$refs.textarea;

            if (textarea) {
                textarea.value = html;
                textarea.dispatchEvent(new Event('input', { bubbles: true }));
                textarea.dispatchEvent(new Event('change', { bubbles: true }));
            }

            this.$dispatch('editor-change', { value: html });
            this._syncing = false;
        },

        pushContentToEditor(html) {
            if (! this._editor || this._syncing) {
                return;
            }

            const next = String(html ?? '');
            const current = this.safeGetHtml();

            if (next === current) {
                return;
            }

            this._syncing = true;
            this._editor.setContent(next);
            this._lastHtml = next;

            const textarea = this.$refs.textarea;

            if (textarea) {
                textarea.value = next;
            }

            this._syncing = false;
        },

        safeGetHtml() {
            if (! this._editor) {
                return String(this.value ?? '');
            }

            try {
                return this._editor.getHTML() ?? '';
            } catch {
                return String(this.value ?? '');
            }
        },

        plainText(html) {
            const template = document.createElement('template');
            template.innerHTML = String(html ?? '');

            return (template.content.textContent || '').replace(/\u00a0/g, ' ').trim();
        },

        refreshStats(html) {
            const plain = this.plainText(html);

            this.length = plain.length;
            this.words = plain === ''
                ? 0
                : plain.split(/\s+/).filter(Boolean).length;
        },

        applyInteractiveState() {
            const root = this.$refs.mount;

            if (! root) {
                return;
            }

            root.setAttribute('aria-disabled', this.canEdit ? 'false' : 'true');
            root.classList.toggle('pointer-events-none', ! this.canEdit);
            root.classList.toggle('opacity-60', this.disabled || this.loading);

            const surface = root.querySelector('[contenteditable]');

            if (surface) {
                surface.setAttribute('contenteditable', this.canEdit ? 'true' : 'false');
            }
        },

        clear() {
            if (! this.canEdit) {
                return;
            }

            this.value = '';
            this.pushContentToEditor('');
            this.pullContentFromEditor();
            this.$dispatch('editor-clear');
        },

        focus() {
            const surface = this.$refs.mount?.querySelector('[contenteditable]');

            surface?.focus();
        },

        setTheme(themeId) {
            this.theme = themeId;

            if (this._editor) {
                this._editor.setTheme(themeId);
            }
        },

        setAppearance(appearance) {
            this.appearance = appearance;

            if (this._editor) {
                this._editor.setAppearance(appearance);
            }
        },

        setLocale(locale) {
            this.locale = locale;

            if (this._editor) {
                this._editor.setLocale(locale);
            }
        },

        execCommand(name, payload) {
            return this._editor?.execCommand(name, payload) ?? false;
        },

        getHTML() {
            return this.safeGetHtml();
        },

        setContent(html) {
            this.value = String(html ?? '');
            this.pushContentToEditor(this.value);
        },

        buildImageOptions() {
            const hasUpload = Boolean(this.imageUploadUrl);
            const hasLimits = [
                this.imageMaxSize,
                this.imageMinWidth,
                this.imageMaxWidth,
                this.imageMinHeight,
                this.imageMaxHeight,
            ].some((value) => value !== null && value !== undefined);

            if (! hasUpload && ! hasLimits) {
                return null;
            }

            const image = {};

            if (this.imageMaxSize !== null) {
                image.maxSize = this.imageMaxSize;
            }

            if (this.imageMinWidth !== null) {
                image.minWidth = Number(this.imageMinWidth);
            }

            if (this.imageMaxWidth !== null) {
                image.maxWidth = Number(this.imageMaxWidth);
            }

            if (this.imageMinHeight !== null) {
                image.minHeight = Number(this.imageMinHeight);
            }

            if (this.imageMaxHeight !== null) {
                image.maxHeight = Number(this.imageMaxHeight);
            }

            if (hasUpload) {
                image.upload = (file) => this.uploadImage(file);
            }

            return image;
        },

        buildFontFamilyOptions() {
            if (! this.fontFamilyDefault && ! this.fontFamilyItems) {
                return null;
            }

            const fontFamily = {};

            if (this.fontFamilyDefault) {
                fontFamily.default = this.fontFamilyDefault;
            }

            if (this.fontFamilyItems) {
                fontFamily.items = this.fontFamilyItems;
            }

            return fontFamily;
        },

        async uploadImage(file) {
            this.$dispatch('editor-upload', { file });

            if (! this.imageUploadUrl) {
                throw new Error('imageUploadUrl não configurado');
            }

            const body = new FormData();
            body.append('file', file);
            body.append('image', file);

            const headers = {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            };

            const csrf = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute('content');

            if (csrf) {
                headers['X-CSRF-TOKEN'] = csrf;
            }

            const response = await fetch(this.imageUploadUrl, {
                method: 'POST',
                headers,
                body,
                credentials: 'same-origin',
            });

            if (! response.ok) {
                throw new Error(`Upload falhou (${response.status})`);
            }

            const payload = await response.json();
            const url = payload.url ?? payload.path ?? payload.location;

            if (! url) {
                throw new Error('Resposta de upload sem url');
            }

            if (payload.width || payload.height) {
                return {
                    url,
                    width: payload.width,
                    height: payload.height,
                };
            }

            return url;
        },
    }));
});
