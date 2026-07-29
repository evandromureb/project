// Lógica do <x-forms.select-tags> como Alpine.data nomeado
// (não inline no x-data) — comparações/arrows quebrariam wire:navigate.
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formSelectTags', (config = {}) => ({
        localOptions: Array.isArray(config.options) ? config.options : [],
        remoteOptions: [],
        value: Array.isArray(config.value) ? [...config.value.map(String)] : [],
        query: '',
        clearable: config.clearable !== false,
        removable: config.removable !== false,
        disabled: Boolean(config.disabled),
        readonly: Boolean(config.readonly),
        floating: Boolean(config.floating),
        allowCreate: Boolean(config.allowCreate),
        openOnFocus: config.openOnFocus !== false,
        highlight: config.highlight !== false,
        hideSelected: config.hideSelected !== false,
        selectAll: Boolean(config.selectAll),
        maxSelected: config.maxSelected ?? null,
        maxVisible: config.maxVisible ?? null,
        minChars: Number(config.minChars ?? 0),
        debounceMs: Number(config.debounce ?? 250),
        limit: config.limit !== null && config.limit !== undefined ? Number(config.limit) : 50,
        url: config.url ? String(config.url) : null,
        queryParam: config.queryParam ? String(config.queryParam) : 'q',
        closeOnSelect: config.closeOnSelect !== undefined && config.closeOnSelect !== null
            ? Boolean(config.closeOnSelect)
            : false,
        emptyText: config.emptyText ?? 'Nenhum resultado',
        minCharsText: config.minCharsText ?? 'Digite para buscar…',
        loadingText: config.loadingText ?? 'Buscando…',
        fullText: config.fullText ?? 'Limite atingido',
        createText: config.createText ?? 'Criar',
        selectAllText: config.selectAllText ?? 'Selecionar todos',
        clearAllText: config.clearAllText ?? 'Limpar',
        moreText: config.moreText ?? 'mais',
        placeholder: config.placeholder ?? 'Buscar e adicionar…',
        instanceId: config.instanceId ?? '',
        labelActive: config.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: config.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',

        open: false,
        focused: false,
        loading: false,
        expanded: false,
        activeIndex: -1,
        menuStyle: '',
        _debounceTimer: null,
        _abortController: null,
        _selectedLabels: {},
        _selectedMeta: {},

        init() {
            this.hydrateSelectedMeta();

            this.$watch('value', () => {
                this.syncHidden();
                this.hydrateSelectedMeta();

                if (this.maxVisible !== null && this.value.length <= this.maxVisible) {
                    this.expanded = false;
                }

                this.$dispatch('select-tags-changed', {
                    value: [...this.value],
                    options: this.selectedOptions,
                });
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

            window.addEventListener('select-tags-results', this._onResults = (event) => {
                const detail = event.detail ?? {};

                if (detail.id && detail.id !== this.instanceId) {
                    return;
                }

                this.applyRemoteOptions(detail.options ?? detail.results ?? []);
            });
        },

        destroy() {
            if (this._onReposition) {
                window.removeEventListener('scroll', this._onReposition, true);
            }

            if (this._onResize) {
                window.removeEventListener('resize', this._onResize);
            }

            if (this._onResults) {
                window.removeEventListener('select-tags-results', this._onResults);
            }

            if (this._debounceTimer) {
                clearTimeout(this._debounceTimer);
            }

            this._abortController?.abort();
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get isRemote() {
            return Boolean(this.url) || this.localOptions.length === 0;
        },

        get hasValue() {
            return this.value.length > 0;
        },

        get count() {
            return this.value.length;
        },

        get isFull() {
            return this.maxSelected !== null && this.value.length >= this.maxSelected;
        },

        get labelFloated() {
            return ! this.floating
                || this.focused
                || this.open
                || this.hasValue
                || this.query.trim() !== '';
        },

        get floatingLabelClasses() {
            return {
                [this.labelActive]: this.labelFloated,
                [this.labelRest]: ! this.labelFloated,
            };
        },

        get sourceOptions() {
            if (this.url || this.localOptions.length === 0) {
                return this.remoteOptions;
            }

            return this.localOptions;
        },

        get selectedOptions() {
            return this.value.map((val) => {
                const found = this.findOption(val);
                const key = String(val);

                if (found) {
                    return found;
                }

                const meta = this._selectedMeta[key] ?? {};

                return {
                    value: key,
                    label: meta.label ?? this._selectedLabels[key] ?? key,
                    icon: meta.icon ?? null,
                    description: meta.description ?? null,
                    disabled: false,
                    group: meta.group ?? null,
                };
            });
        },

        get visibleTags() {
            if (this.expanded || this.maxVisible === null || this.value.length <= this.maxVisible) {
                return this.selectedOptions;
            }

            return this.selectedOptions.slice(0, this.maxVisible);
        },

        get hiddenTagCount() {
            if (this.expanded || this.maxVisible === null) {
                return 0;
            }

            return Math.max(0, this.value.length - this.maxVisible);
        },

        get showMoreChip() {
            return this.hiddenTagCount > 0;
        },

        get needsMinChars() {
            return this.query.trim().length < this.minChars;
        },

        get filteredOptions() {
            if (this.needsMinChars) {
                return [];
            }

            let options = this.sourceOptions;

            if (! this.url) {
                const q = this.query.trim().toLowerCase();

                if (q !== '') {
                    options = options.filter((opt) => {
                        const haystack = [
                            opt.label,
                            opt.description ?? '',
                            opt.value,
                            opt.group ?? '',
                        ].join(' ').toLowerCase();

                        return haystack.includes(q);
                    });
                }
            }

            if (this.hideSelected) {
                options = options.filter((opt) => ! this.isSelected(opt.value));
            }

            if (this.limit !== null && this.limit >= 0) {
                options = options.slice(0, this.limit);
            }

            return options;
        },

        get selectableFiltered() {
            return this.filteredOptions.filter((opt) => ! opt.disabled && ! this.isSelected(opt.value));
        },

        get canSelectAll() {
            return this.selectAll
                && ! this.isRemote
                && ! this.needsMinChars
                && this.selectableFiltered.length > 0
                && ! this.isFull;
        },

        get showCreateOption() {
            if (! this.allowCreate || this.needsMinChars || this.isFull) {
                return false;
            }

            const q = this.query.trim();

            if (q === '') {
                return false;
            }

            const exists = this.sourceOptions.some(
                (opt) => String(opt.label).toLowerCase() === q.toLowerCase()
                    || String(opt.value).toLowerCase() === q.toLowerCase(),
            );

            if (exists) {
                return false;
            }

            if (this.isSelected(q)) {
                return false;
            }

            return true;
        },

        get visibleItems() {
            if (this.isFull && this.hideSelected) {
                return [];
            }

            const items = [];
            let lastGroup = null;

            this.filteredOptions.forEach((opt) => {
                const group = opt.group || null;

                if (group && group !== lastGroup) {
                    items.push({ type: 'group', label: group });
                    lastGroup = group;
                }

                if (! group) {
                    lastGroup = null;
                }

                items.push({ type: 'option', option: opt });
            });

            if (this.showCreateOption) {
                items.push({
                    type: 'create',
                    option: {
                        value: this.query.trim(),
                        label: this.query.trim(),
                        icon: 'bi-plus-lg',
                        description: null,
                        disabled: false,
                        group: null,
                        __create: true,
                    },
                });
            }

            return items;
        },

        get navigableIndexes() {
            return this.visibleItems
                .map((item, index) => (
                    (item.type === 'option' || item.type === 'create')
                    && ! item.option.disabled
                    && ! (this.isFull && ! this.isSelected(item.option.value) && item.type === 'option')
                        ? index
                        : -1
                ))
                .filter((index) => index >= 0);
        },

        get showEmpty() {
            return this.open
                && ! this.loading
                && ! (this.isFull && this.hideSelected)
                && ! this.needsMinChars
                && this.visibleItems.length === 0;
        },

        get showMinChars() {
            return this.open && this.needsMinChars && this.query.trim().length > 0;
        },

        get statusMessage() {
            if (this.loading) {
                return this.loadingText;
            }

            if (this.isFull && this.open && this.hideSelected) {
                return this.fullText;
            }

            if (this.showMinChars) {
                return this.minCharsText;
            }

            if (this.showEmpty) {
                return this.emptyText;
            }

            return '';
        },

        findOption(value) {
            const needle = String(value);

            for (const pool of [this.localOptions, this.remoteOptions]) {
                const found = pool.find((opt) => String(opt.value) === needle);

                if (found) {
                    return found;
                }
            }

            return null;
        },

        hydrateSelectedMeta() {
            this.value.forEach((val) => {
                const key = String(val);
                const found = [...this.localOptions, ...this.remoteOptions]
                    .find((opt) => String(opt.value) === key);

                if (found) {
                    this._selectedLabels[key] = found.label;
                    this._selectedMeta[key] = {
                        label: found.label,
                        icon: found.icon,
                        description: found.description,
                        group: found.group,
                    };
                } else if (! this._selectedLabels[key]) {
                    this._selectedLabels[key] = key;
                    this._selectedMeta[key] = this._selectedMeta[key] ?? {
                        label: key,
                        icon: null,
                        description: null,
                        group: null,
                    };
                }
            });
        },

        isSelected(optionValue) {
            const needle = String(optionValue);

            return this.value.some((val) => String(val) === needle);
        },

        escapeHtml(value) {
            return String(value)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#39;');
        },

        highlightedLabel(label) {
            const text = String(label ?? '');
            const q = this.query.trim();

            if (! this.highlight || q === '') {
                return this.escapeHtml(text);
            }

            const escaped = this.escapeHtml(text);
            const needle = this.escapeHtml(q);
            const pattern = new RegExp(`(${needle.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'ig');

            return escaped.replace(pattern, '<mark class="rounded-sm bg-warning/30 text-inherit p-0">$1</mark>');
        },

        focusInput() {
            if (! this.canEdit) {
                return;
            }

            this.$refs.input?.focus();
        },

        onFocus() {
            if (! this.canEdit) {
                return;
            }

            this.focused = true;

            if (this.openOnFocus) {
                this.openMenu();
            }
        },

        onBlur() {
            setTimeout(() => {
                if (
                    this.$refs.root?.contains(document.activeElement)
                    || this.$refs.menu?.contains(document.activeElement)
                ) {
                    return;
                }

                this.focused = false;
                this.close();
            }, 120);
        },

        onInput() {
            if (! this.canEdit) {
                return;
            }

            this.openMenu();
            this.scheduleSearch();
        },

        scheduleSearch() {
            if (this._debounceTimer) {
                clearTimeout(this._debounceTimer);
            }

            this.activeIndex = -1;

            if (this.needsMinChars) {
                this.remoteOptions = [];
                this.loading = false;
                this._abortController?.abort();

                return;
            }

            this._debounceTimer = setTimeout(() => {
                this.runSearch();
            }, this.debounceMs);
        },

        async runSearch() {
            const q = this.query.trim();

            this.$dispatch('select-tags-search', {
                id: this.instanceId,
                query: q,
            });

            if (! this.url) {
                this.activeIndex = this.firstActiveIndex();
                this.$nextTick(() => {
                    requestAnimationFrame(() => this.updatePosition());
                });

                return;
            }

            this._abortController?.abort();
            this._abortController = new AbortController();
            this.loading = true;

            try {
                const endpoint = new URL(this.url, window.location.origin);
                endpoint.searchParams.set(this.queryParam, q);

                const response = await fetch(endpoint.toString(), {
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    signal: this._abortController.signal,
                });

                if (! response.ok) {
                    throw new Error('Select tags request failed');
                }

                const payload = await response.json();
                const list = Array.isArray(payload)
                    ? payload
                    : (payload.data ?? payload.options ?? payload.results ?? []);

                this.applyRemoteOptions(list);
            } catch (error) {
                if (error?.name === 'AbortError') {
                    return;
                }

                this.remoteOptions = [];
                this.activeIndex = -1;
            } finally {
                this.loading = false;
                this.$nextTick(() => {
                    requestAnimationFrame(() => this.updatePosition());
                });
            }
        },

        applyRemoteOptions(list) {
            this.remoteOptions = (Array.isArray(list) ? list : [])
                .map((item) => this.normalizeIncoming(item))
                .filter(Boolean);

            this.loading = false;
            this.activeIndex = this.firstActiveIndex();
            this.$nextTick(() => {
                requestAnimationFrame(() => this.updatePosition());
            });
        },

        normalizeIncoming(item) {
            if (item === null || item === undefined) {
                return null;
            }

            if (typeof item === 'string' || typeof item === 'number') {
                return {
                    value: String(item),
                    label: String(item),
                    icon: null,
                    description: null,
                    disabled: false,
                    group: null,
                };
            }

            if (typeof item !== 'object') {
                return null;
            }

            const value = item.value ?? item.id ?? null;
            const label = item.label ?? item.text ?? item.name ?? null;

            if (value === null && label === null) {
                return null;
            }

            return {
                value: String(value ?? label),
                label: String(label ?? value),
                icon: item.icon ? String(item.icon) : null,
                description: item.description ? String(item.description) : null,
                disabled: Boolean(item.disabled),
                group: item.group ? String(item.group) : null,
            };
        },

        openMenu() {
            if (! this.canEdit) {
                return;
            }

            if (this.isFull && this.hideSelected) {
                return;
            }

            this.menuStyle = 'position:fixed; visibility:hidden; top:0; left:0;';
            this.open = true;
            this.activeIndex = this.firstActiveIndex();

            this.$nextTick(() => {
                requestAnimationFrame(() => {
                    this.updatePosition();

                    if (! this.needsMinChars && this.isRemote) {
                        this.scheduleSearch();
                    }
                });
            });
        },

        close() {
            this.open = false;
            this.activeIndex = -1;
            this.menuStyle = '';
            this.loading = false;
        },

        firstActiveIndex() {
            const indexes = this.navigableIndexes;

            return indexes.length > 0 ? indexes[0] : -1;
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
            const width = Math.max(rect.width, 180);
            const left = Math.max(8, Math.min(rect.left, vw - width - 8));

            let style = `position:fixed; width:${width}px; z-index:1080;`;

            if (placeUp) {
                style += `bottom:${vh - rect.top + gap}px; left:${left}px;`;
            } else {
                style += `top:${rect.bottom + gap}px; left:${left}px;`;
            }

            this.menuStyle = style;
        },

        rememberOption(option) {
            const next = String(option.value);

            this._selectedLabels[next] = option.label;
            this._selectedMeta[next] = {
                label: option.label,
                icon: option.icon ?? null,
                description: option.description ?? null,
                group: option.group ?? null,
            };
        },

        selectOption(option) {
            if (! this.canEdit || ! option || option.disabled) {
                return;
            }

            const next = String(option.value);

            if (this.isSelected(next)) {
                this.removeValue(next);

                return;
            }

            if (this.isFull) {
                this.close();
                this.$refs.input?.focus();

                return;
            }

            this.rememberOption(option);
            this.value = [...this.value, next];
            this.query = '';

            if (this.closeOnSelect || this.isFull) {
                this.close();
            } else {
                this.$nextTick(() => {
                    this.activeIndex = this.firstActiveIndex();
                    requestAnimationFrame(() => this.updatePosition());
                });
            }

            this.$refs.input?.focus();
        },

        createFromQuery() {
            if (! this.showCreateOption) {
                return;
            }

            this.selectOption({
                value: this.query.trim(),
                label: this.query.trim(),
                icon: null,
                description: null,
                disabled: false,
                group: null,
            });
        },

        selectAllFiltered() {
            if (! this.canEdit || ! this.canSelectAll) {
                return;
            }

            const room = this.maxSelected === null
                ? Number.POSITIVE_INFINITY
                : Math.max(0, this.maxSelected - this.value.length);

            if (room === 0) {
                return;
            }

            const additions = [];

            for (const opt of this.selectableFiltered) {
                if (additions.length >= room) {
                    break;
                }

                this.rememberOption(opt);
                additions.push(String(opt.value));
            }

            if (additions.length === 0) {
                return;
            }

            this.value = [...this.value, ...additions];
            this.query = '';

            if (this.closeOnSelect || this.isFull) {
                this.close();
            } else {
                this.$nextTick(() => {
                    this.activeIndex = this.firstActiveIndex();
                    requestAnimationFrame(() => this.updatePosition());
                });
            }

            this.$refs.input?.focus();
        },

        removeValue(optionValue) {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            const needle = String(optionValue);
            this.value = this.value.filter((val) => String(val) !== needle);
            this.$refs.input?.focus();
        },

        clear() {
            if (! this.canEdit || ! this.clearable) {
                return;
            }

            this.value = [];
            this.query = '';
            this.remoteOptions = [];
            this.expanded = false;
            this.close();
            this.$refs.input?.focus();
        },

        toggleExpanded() {
            this.expanded = ! this.expanded;
            this.$refs.input?.focus();
        },

        onKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            const key = event.key;

            if (key === 'ArrowDown') {
                event.preventDefault();

                if (! this.open) {
                    this.openMenu();
                } else {
                    this.moveActive(1);
                }

                return;
            }

            if (key === 'ArrowUp') {
                event.preventDefault();

                if (! this.open) {
                    this.openMenu();
                } else {
                    this.moveActive(-1);
                }

                return;
            }

            if (key === 'Home' && this.open) {
                event.preventDefault();
                this.activeIndex = this.navigableIndexes[0] ?? -1;
                this.scrollActiveIntoView();

                return;
            }

            if (key === 'End' && this.open) {
                event.preventDefault();
                const indexes = this.navigableIndexes;
                this.activeIndex = indexes[indexes.length - 1] ?? -1;
                this.scrollActiveIntoView();

                return;
            }

            if (key === 'Enter') {
                if (this.open && this.activeIndex >= 0) {
                    event.preventDefault();
                    this.activateCurrent();
                } else if (this.open && this.showCreateOption) {
                    event.preventDefault();
                    this.createFromQuery();
                }

                return;
            }

            if (key === 'Escape') {
                if (this.open) {
                    event.preventDefault();
                    this.close();
                }

                return;
            }

            if (key === 'Backspace' && this.query === '' && this.hasValue && this.removable) {
                event.preventDefault();
                this.value = this.value.slice(0, -1);
            }
        },

        moveActive(delta) {
            const indexes = this.navigableIndexes;

            if (indexes.length === 0) {
                this.activeIndex = -1;

                return;
            }

            const currentPos = indexes.indexOf(this.activeIndex);
            let nextPos;

            if (currentPos < 0) {
                nextPos = delta > 0 ? 0 : indexes.length - 1;
            } else {
                nextPos = (currentPos + delta + indexes.length) % indexes.length;
            }

            this.activeIndex = indexes[nextPos];
            this.scrollActiveIntoView();
        },

        activateCurrent() {
            const item = this.visibleItems[this.activeIndex];

            if (! item) {
                return;
            }

            if (item.type === 'create') {
                this.createFromQuery();

                return;
            }

            if (item.type === 'option') {
                this.selectOption(item.option);
            }
        },

        scrollActiveIntoView() {
            this.$nextTick(() => {
                const active = this.$refs.menu?.querySelector('[data-active="true"]');
                active?.scrollIntoView({ block: 'nearest' });
            });
        },

        closeIfOutside(target) {
            if (
                this.open
                && this.$refs.root
                && ! this.$refs.root.contains(target)
                && (! this.$refs.menu || ! this.$refs.menu.contains(target))
            ) {
                this.close();
                this.focused = false;
            }
        },

        syncHidden() {
            const hidden = this.$refs.hidden;

            if (! hidden) {
                return;
            }

            hidden.value = JSON.stringify(this.value);
            hidden.dispatchEvent(new Event('input', { bubbles: true }));
        },
    }));
});
