// Lógica do <x-forms.input-tags> como Alpine.data nomeado (não inline
// no x-data) — tags, sugestões, teclado e comparações quebrariam
// wire:navigate se ficassem soltas num atributo x-data="{...}".
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formInputTags', (options = {}) => ({
        tags: Array.isArray(options.tags) ? [...options.tags] : [],
        draft: '',
        focused: false,
        open: false,
        activeIndex: -1,
        menuStyle: '',
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        maxTags: options.maxTags ?? null,
        maxLength: options.maxLength ?? null,
        minLength: Number(options.minLength ?? 1),
        allowDuplicates: Boolean(options.allowDuplicates),
        caseSensitive: Boolean(options.caseSensitive),
        allowCreate: options.allowCreate !== false,
        addOnBlur: options.addOnBlur !== false,
        separators: Array.isArray(options.separators) && options.separators.length > 0
            ? options.separators
            : [','],
        suggestions: Array.isArray(options.suggestions) ? [...options.suggestions] : [],
        removable: options.removable !== false,
        floating: Boolean(options.floating),
        labelActive: options.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: options.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',

        init() {
            this.$watch('tags', () => {
                this.syncHidden();
                this.$dispatch('tags-changed', { tags: [...this.tags] });
            });

            this.$nextTick(() => this.syncHidden());

            window.addEventListener('scroll', this._onReposition = () => {
                if (this.open) {
                    this.updatePosition();
                }
            }, true);

            window.addEventListener('resize', this._onResize = () => {
                if (this.open) {
                    this.updatePosition();
                }
            });
        },

        destroy() {
            if (this._onReposition) {
                window.removeEventListener('scroll', this._onReposition, true);
            }

            if (this._onResize) {
                window.removeEventListener('resize', this._onResize);
            }
        },

        get count() {
            return this.tags.length;
        },

        get hasValue() {
            return this.tags.length > 0 || this.draft.length > 0;
        },

        get isFull() {
            return this.maxTags !== null && this.tags.length >= this.maxTags;
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get labelFloated() {
            return ! this.floating || this.focused || this.hasValue;
        },

        get floatingLabelClasses() {
            return {
                [this.labelActive]: this.labelFloated,
                [this.labelRest]: ! this.labelFloated,
            };
        },

        get filteredSuggestions() {
            if (this.suggestions.length === 0) {
                return [];
            }

            const query = this.normalize(this.draft.trim());

            return this.suggestions.filter((item) => {
                const normalized = this.normalize(String(item));

                if (this.isDuplicate(String(item))) {
                    return false;
                }

                if (query === '') {
                    return true;
                }

                return normalized.includes(query);
            }).slice(0, 8);
        },

        get showSuggestions() {
            return this.open
                && this.canEdit
                && ! this.isFull
                && this.filteredSuggestions.length > 0;
        },

        normalize(value) {
            return this.caseSensitive ? value : value.toLowerCase();
        },

        isDuplicate(value) {
            if (this.allowDuplicates) {
                return false;
            }

            const needle = this.normalize(value);

            return this.tags.some((tag) => this.normalize(tag) === needle);
        },

        sanitize(value) {
            let tag = String(value ?? '').trim();

            if (tag === '') {
                return null;
            }

            if (this.maxLength !== null && tag.length > this.maxLength) {
                tag = tag.slice(0, this.maxLength);
            }

            if (tag.length < this.minLength) {
                return null;
            }

            if (this.isDuplicate(tag)) {
                return null;
            }

            if (this.isFull) {
                return null;
            }

            if (! this.allowCreate) {
                const match = this.suggestions.find(
                    (item) => this.normalize(String(item)) === this.normalize(tag),
                );

                if (! match) {
                    return null;
                }

                return String(match);
            }

            return tag;
        },

        addTag(raw) {
            if (! this.canEdit) {
                return false;
            }

            const tag = this.sanitize(raw);

            if (tag === null) {
                return false;
            }

            this.tags.push(tag);
            this.draft = '';
            this.activeIndex = -1;
            this.openSuggestions();

            return true;
        },

        addDraft() {
            const added = this.addTag(this.draft);
            this.$refs.input?.focus();

            return added;
        },

        removeAt(index) {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            if (index < 0 || index >= this.tags.length) {
                return;
            }

            this.tags.splice(index, 1);
            this.$refs.input?.focus();
        },

        removeLast() {
            if (this.draft !== '' || this.tags.length === 0) {
                return;
            }

            this.removeAt(this.tags.length - 1);
        },

        clear() {
            if (! this.canEdit) {
                return;
            }

            this.tags = [];
            this.draft = '';
            this.activeIndex = -1;
            this.closeSuggestions();
            this.$refs.input?.focus();
        },

        pickSuggestion(index) {
            const item = this.filteredSuggestions[index];

            if (item === undefined) {
                return;
            }

            this.addTag(item);
            this.$refs.input?.focus();
        },

        openSuggestions() {
            if (! this.canEdit || this.isFull || this.suggestions.length === 0) {
                this.open = false;

                return;
            }

            this.menuStyle = 'position:fixed; visibility:hidden; top:0; left:0;';
            this.open = true;
            this.$nextTick(() => {
                requestAnimationFrame(() => this.updatePosition());
            });
        },

        closeSuggestions() {
            this.open = false;
            this.activeIndex = -1;
            this.menuStyle = '';
        },

        updatePosition() {
            const trigger = this.$refs.trigger;
            const menu = this.$refs.menu;

            if (! trigger || ! menu) {
                return;
            }

            const rect = trigger.getBoundingClientRect();
            const menuRect = menu.getBoundingClientRect();
            const gap = 6;
            const vw = window.innerWidth;
            const vh = window.innerHeight;
            const spaceBelow = vh - rect.bottom;
            const placeUp = spaceBelow < menuRect.height + gap && rect.top > spaceBelow;

            let style = `position:fixed; width:${Math.max(rect.width, 180)}px; z-index:1080;`;

            if (placeUp) {
                style += `bottom:${vh - rect.top + gap}px; left:${Math.max(8, Math.min(rect.left, vw - rect.width - 8))}px;`;
            } else {
                style += `top:${rect.bottom + gap}px; left:${Math.max(8, Math.min(rect.left, vw - rect.width - 8))}px;`;
            }

            this.menuStyle = style;
        },

        onFocus() {
            this.focused = true;
            this.openSuggestions();
        },

        onBlur() {
            // Aguarda clique em sugestão (mousedown) antes de fechar/adicionar.
            setTimeout(() => {
                if (this.$refs.root?.contains(document.activeElement)) {
                    return;
                }

                if (this.addOnBlur && this.draft.trim() !== '') {
                    this.addTag(this.draft);
                }

                this.focused = false;
                this.closeSuggestions();
            }, 120);
        },

        onInput() {
            this.openSuggestions();
            this.activeIndex = -1;
        },

        onPaste(event) {
            if (! this.canEdit) {
                return;
            }

            const text = event.clipboardData?.getData('text');

            if (! text || ! this.containsSeparator(text)) {
                return;
            }

            event.preventDefault();
            this.splitAndAdd(text);
        },

        containsSeparator(text) {
            return this.separators.some((sep) => text.includes(sep));
        },

        splitAndAdd(text) {
            const pattern = new RegExp(
                `[${this.separators.map((sep) => this.escapeRegex(sep)).join('')}]+`,
            );

            String(text)
                .split(pattern)
                .map((part) => part.trim())
                .filter(Boolean)
                .forEach((part) => this.addTag(part));

            this.draft = '';
        },

        escapeRegex(value) {
            return String(value).replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        },

        onKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            const key = event.key;

            if (key === 'ArrowDown' && this.showSuggestions) {
                event.preventDefault();
                this.activeIndex = Math.min(
                    this.activeIndex + 1,
                    this.filteredSuggestions.length - 1,
                );

                return;
            }

            if (key === 'ArrowUp' && this.showSuggestions) {
                event.preventDefault();
                this.activeIndex = Math.max(this.activeIndex - 1, 0);

                return;
            }

            if (key === 'Escape') {
                if (this.open) {
                    event.preventDefault();
                    this.closeSuggestions();
                }

                return;
            }

            if (key === 'Enter') {
                event.preventDefault();

                if (this.activeIndex >= 0 && this.showSuggestions) {
                    this.pickSuggestion(this.activeIndex);

                    return;
                }

                this.addDraft();

                return;
            }

            if (key === 'Backspace' && this.draft === '') {
                event.preventDefault();
                this.removeLast();

                return;
            }

            if (key === 'Tab' && this.draft.trim() !== '') {
                // Não impede Tab de sair do campo se não houver draft útil.
                if (this.addDraft()) {
                    event.preventDefault();
                }

                return;
            }

            if (this.separators.includes(key)) {
                event.preventDefault();
                this.addDraft();
            }
        },

        closeIfOutside(target) {
            if (
                this.open
                && this.$refs.root
                && ! this.$refs.root.contains(target)
                && (! this.$refs.menu || ! this.$refs.menu.contains(target))
            ) {
                this.closeSuggestions();
            }
        },

        focusInput() {
            if (! this.canEdit) {
                return;
            }

            this.$refs.input?.focus();
        },

        syncHidden() {
            const hidden = this.$refs.hidden;

            if (! hidden) {
                return;
            }

            // JSON para wire:model / x-modelable; formulários clássicos usam name[].
            hidden.value = JSON.stringify(this.tags);
            hidden.dispatchEvent(new Event('input', { bubbles: true }));
        },
    }));
});
