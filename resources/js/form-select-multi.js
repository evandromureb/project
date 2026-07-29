// Lógica do <x-forms.select-multi> como Alpine.data nomeado
// (não inline no x-data) — comparações/arrows quebrariam wire:navigate.
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formSelectMulti', (config = {}) => ({
        localOptions: Array.isArray(config.options) ? config.options : [],
        remoteOptions: [],
        value: Array.isArray(config.value) ? [...config.value.map(String)] : [],
        query: '',
        selectedQuery: '',
        layout: ['dropdown', 'inline', 'transfer'].includes(config.layout)
            ? config.layout
            : 'dropdown',
        display: ['chips', 'count', 'text'].includes(config.display)
            ? config.display
            : 'chips',
        clearable: config.clearable !== false,
        removable: config.removable !== false,
        disabled: Boolean(config.disabled),
        readonly: Boolean(config.readonly),
        floating: Boolean(config.floating),
        searchable: config.searchable !== false,
        openOnFocus: config.openOnFocus !== false,
        highlight: config.highlight !== false,
        hideSelected: Boolean(config.hideSelected),
        stickySelected: Boolean(config.stickySelected),
        selectAll: config.selectAll !== false,
        invertible: Boolean(config.invertible),
        sortable: Boolean(config.sortable),
        maxSelected: config.maxSelected ?? null,
        maxVisible: config.maxVisible ?? null,
        minChars: Number(config.minChars ?? 0),
        debounceMs: Number(config.debounce ?? 250),
        limit: config.limit !== null && config.limit !== undefined ? Number(config.limit) : 100,
        url: config.url ? String(config.url) : null,
        queryParam: config.queryParam ? String(config.queryParam) : 'q',
        closeOnSelect: Boolean(config.closeOnSelect),
        emptyText: config.emptyText ?? 'Nenhum resultado',
        emptySelectedText: config.emptySelectedText ?? 'Nenhum selecionado',
        minCharsText: config.minCharsText ?? 'Digite para buscar…',
        loadingText: config.loadingText ?? 'Buscando…',
        fullText: config.fullText ?? 'Limite atingido',
        selectAllText: config.selectAllText ?? 'Selecionar todos',
        clearAllText: config.clearAllText ?? 'Limpar',
        invertText: config.invertText ?? 'Inverter',
        moreText: config.moreText ?? 'mais',
        availableTitle: config.availableTitle ?? 'Disponíveis',
        selectedTitle: config.selectedTitle ?? 'Selecionados',
        countText: config.countText ?? 'selecionado(s)',
        placeholder: config.placeholder ?? 'Selecione…',
        searchPlaceholder: config.searchPlaceholder ?? 'Buscar…',
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

            if (this.layout === 'inline' || this.layout === 'transfer') {
                this.open = true;
            }

            this.$watch('value', () => {
                this.syncHidden();
                this.hydrateSelectedMeta();

                if (this.maxVisible !== null && this.value.length <= this.maxVisible) {
                    this.expanded = false;
                }

                this.$dispatch('select-multi-changed', {
                    value: [...this.value],
                    options: this.selectedOptions,
                });
            });

            this.$nextTick(() => this.syncHidden());

            window.addEventListener('scroll', this._onReposition = () => {
                if (this.open && this.layout === 'dropdown') {
                    this.updatePosition();
                }
            }, true);

            window.addEventListener('resize', this._onResize = () => {
                if (this.open && this.layout === 'dropdown') {
                    this.updatePosition();
                }
            });

            window.addEventListener('select-multi-results', this._onResults = (event) => {
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
                window.removeEventListener('select-multi-results', this._onResults);
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
            return Boolean(this.url);
        },

        get isDropdown() {
            return this.layout === 'dropdown';
        },

        get isInline() {
            return this.layout === 'inline';
        },

        get isTransfer() {
            return this.layout === 'transfer';
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

        get needsMinChars() {
            return this.minChars > 0 && this.query.trim().length < this.minChars;
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

        get sourceOptions() {
            return this.isRemote ? this.remoteOptions : this.localOptions;
        },

        get optionMap() {
            const map = {};

            for (const opt of this.localOptions) {
                map[String(opt.value)] = opt;
            }

            for (const opt of this.remoteOptions) {
                map[String(opt.value)] = opt;
            }

            for (const [value, meta] of Object.entries(this._selectedMeta)) {
                if (! map[value]) {
                    map[value] = {
                        value,
                        label: meta.label ?? value,
                        icon: meta.icon ?? null,
                        description: meta.description ?? null,
                        disabled: false,
                        group: meta.group ?? null,
                    };
                }
            }

            return map;
        },

        get selectedOptions() {
            return this.value.map((val) => {
                const key = String(val);
                const opt = this.optionMap[key];

                if (opt) {
                    return opt;
                }

                return {
                    value: key,
                    label: this._selectedLabels[key] ?? key,
                    icon: null,
                    description: null,
                    disabled: false,
                    group: null,
                };
            });
        },

        get visibleTags() {
            if (this.display !== 'chips') {
                return [];
            }

            if (this.maxVisible === null || this.expanded) {
                return this.selectedOptions;
            }

            return this.selectedOptions.slice(0, this.maxVisible);
        },

        get hiddenTagCount() {
            if (this.maxVisible === null || this.expanded) {
                return 0;
            }

            return Math.max(0, this.count - this.maxVisible);
        },

        get showMoreChip() {
            return this.display === 'chips' && this.hiddenTagCount > 0;
        },

        get summaryText() {
            if (! this.hasValue) {
                return this.placeholder;
            }

            if (this.display === 'count') {
                return `${this.count} ${this.countText}`;
            }

            if (this.display === 'text') {
                return this.selectedOptions.map((opt) => opt.label).join(', ');
            }

            return '';
        },

        get filteredAvailable() {
            let options = [...this.sourceOptions];

            if (this.hideSelected || this.isTransfer) {
                options = options.filter((opt) => ! this.isSelected(opt.value));
            }

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

            if (this.stickySelected && ! this.hideSelected && ! this.isTransfer) {
                options = [
                    ...options.filter((opt) => this.isSelected(opt.value)),
                    ...options.filter((opt) => ! this.isSelected(opt.value)),
                ];
            }

            if (this.limit !== null && Number.isFinite(this.limit)) {
                options = options.slice(0, this.limit);
            }

            return options;
        },

        get filteredSelected() {
            const q = this.selectedQuery.trim().toLowerCase();
            let options = this.selectedOptions;

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

            return options;
        },

        get visibleItems() {
            const items = [];
            let lastGroup = null;

            for (const option of this.filteredAvailable) {
                const group = option.group ?? null;

                if (group && group !== lastGroup) {
                    items.push({ type: 'group', label: group });
                    lastGroup = group;
                }

                if (! group) {
                    lastGroup = null;
                }

                items.push({ type: 'option', option });
            }

            return items;
        },

        get navigableIndexes() {
            return this.visibleItems
                .map((item, index) => (item.type === 'option' && ! item.option.disabled ? index : -1))
                .filter((index) => index >= 0);
        },

        get selectableFiltered() {
            return this.filteredAvailable.filter((opt) => ! opt.disabled && ! this.isSelected(opt.value));
        },

        get canSelectAll() {
            return this.selectAll
                && this.canEdit
                && this.selectableFiltered.length > 0
                && ! this.isFull;
        },

        get canInvert() {
            return this.invertible && this.canEdit && this.sourceOptions.length > 0;
        },

        get statusMessage() {
            if (this.loading) {
                return this.loadingText;
            }

            if (this.needsMinChars) {
                return this.minCharsText;
            }

            if (this.isFull && this.hideSelected && this.filteredAvailable.length === 0) {
                return this.fullText;
            }

            if (this.filteredAvailable.length === 0) {
                return this.emptyText;
            }

            return '';
        },

        isSelected(optionValue) {
            return this.value.includes(String(optionValue));
        },

        hydrateSelectedMeta() {
            for (const val of this.value) {
                const key = String(val);
                const opt = this.localOptions.find((item) => String(item.value) === key)
                    || this.remoteOptions.find((item) => String(item.value) === key);

                if (opt) {
                    this.rememberOption(opt);
                } else if (! this._selectedLabels[key]) {
                    this._selectedLabels[key] = key;
                    this._selectedMeta[key] = {
                        label: key,
                        icon: null,
                        description: null,
                        group: null,
                    };
                }
            }
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

        syncHidden() {
            const hidden = this.$refs.hidden;

            if (hidden) {
                hidden.value = JSON.stringify(this.value);
            }
        },

        normalizeRemoteItem(item) {
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

        applyRemoteOptions(items) {
            this.remoteOptions = (Array.isArray(items) ? items : [])
                .map((item) => this.normalizeRemoteItem(item))
                .filter(Boolean);
            this.loading = false;
            this.activeIndex = this.firstActiveIndex();
        },

        scheduleSearch() {
            if (this._debounceTimer) {
                clearTimeout(this._debounceTimer);
            }

            this._debounceTimer = setTimeout(() => this.runSearch(), this.debounceMs);
        },

        async runSearch() {
            this.$dispatch('select-multi-search', {
                id: this.instanceId,
                query: this.query,
            });

            if (! this.isRemote) {
                return;
            }

            if (this.needsMinChars) {
                this.remoteOptions = [];
                this.loading = false;

                return;
            }

            this._abortController?.abort();
            this._abortController = new AbortController();
            this.loading = true;

            try {
                const url = new URL(this.url, window.location.origin);
                url.searchParams.set(this.queryParam, this.query.trim());

                const response = await fetch(url.toString(), {
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    signal: this._abortController.signal,
                });

                if (! response.ok) {
                    throw new Error('Request failed');
                }

                const data = await response.json();
                const items = Array.isArray(data)
                    ? data
                    : (data.options ?? data.results ?? data.data ?? []);

                this.applyRemoteOptions(items);
            } catch (error) {
                if (error?.name === 'AbortError') {
                    return;
                }

                this.remoteOptions = [];
                this.loading = false;
            }
        },

        firstActiveIndex() {
            const indexes = this.navigableIndexes;

            return indexes.length > 0 ? indexes[0] : -1;
        },

        openMenu() {
            if (! this.canEdit || ! this.isDropdown) {
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

                    this.$refs.search?.focus();
                });
            });
        },

        close() {
            if (! this.isDropdown) {
                return;
            }

            this.open = false;
            this.activeIndex = -1;
            this.menuStyle = '';
            this.loading = false;
        },

        toggle() {
            if (! this.canEdit || ! this.isDropdown) {
                return;
            }

            if (this.open) {
                this.close();
            } else {
                this.openMenu();
            }
        },

        updatePosition() {
            const trigger = this.$refs.trigger;
            const menu = this.$refs.menu;

            if (! trigger || ! menu || ! this.isDropdown) {
                return;
            }

            const rect = trigger.getBoundingClientRect();
            const menuRect = menu.getBoundingClientRect();
            const gap = 6;
            const vw = window.innerWidth;
            const vh = window.innerHeight;
            const spaceBelow = vh - rect.bottom;
            const placeUp = spaceBelow < menuRect.height + gap && rect.top > spaceBelow;
            const width = Math.max(rect.width, 220);
            const left = Math.max(8, Math.min(rect.left, vw - width - 8));

            let style = `position:fixed; width:${width}px; z-index:1080;`;

            if (placeUp) {
                style += `bottom:${vh - rect.top + gap}px; left:${left}px;`;
            } else {
                style += `top:${rect.bottom + gap}px; left:${left}px;`;
            }

            this.menuStyle = style;
        },

        toggleOption(option) {
            if (! this.canEdit || ! option || option.disabled) {
                return;
            }

            const next = String(option.value);

            if (this.isSelected(next)) {
                this.removeValue(next);

                return;
            }

            if (this.isFull) {
                if (this.isDropdown && this.closeOnSelect) {
                    this.close();
                }

                return;
            }

            this.rememberOption(option);
            this.value = [...this.value, next];

            if (this.isDropdown && (this.closeOnSelect || this.isFull)) {
                this.close();
            } else if (this.isDropdown) {
                this.$nextTick(() => {
                    this.activeIndex = this.firstActiveIndex();
                    requestAnimationFrame(() => this.updatePosition());
                });
            }
        },

        selectAllFiltered() {
            if (! this.canSelectAll) {
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

            if (this.isDropdown && (this.closeOnSelect || this.isFull)) {
                this.close();
            }
        },

        selectGroup(groupLabel) {
            if (! this.canEdit || ! groupLabel) {
                return;
            }

            const room = this.maxSelected === null
                ? Number.POSITIVE_INFINITY
                : Math.max(0, this.maxSelected - this.value.length);

            if (room === 0) {
                return;
            }

            const additions = [];

            for (const opt of this.filteredAvailable) {
                if (additions.length >= room) {
                    break;
                }

                if (opt.disabled || opt.group !== groupLabel || this.isSelected(opt.value)) {
                    continue;
                }

                this.rememberOption(opt);
                additions.push(String(opt.value));
            }

            if (additions.length > 0) {
                this.value = [...this.value, ...additions];
            }
        },

        invertSelection() {
            if (! this.canInvert) {
                return;
            }

            const enabled = this.sourceOptions.filter((opt) => ! opt.disabled);
            let next = enabled
                .filter((opt) => ! this.isSelected(opt.value))
                .map((opt) => {
                    this.rememberOption(opt);

                    return String(opt.value);
                });

            if (this.maxSelected !== null) {
                next = next.slice(0, this.maxSelected);
            }

            this.value = next;
        },

        removeValue(optionValue) {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            const needle = String(optionValue);
            this.value = this.value.filter((val) => String(val) !== needle);
        },

        clear() {
            if (! this.canEdit || ! this.clearable) {
                return;
            }

            this.value = [];
            this.query = '';
            this.selectedQuery = '';
            this.expanded = false;

            if (this.isDropdown) {
                this.close();
            }
        },

        moveSelected(optionValue, direction) {
            if (! this.canEdit || ! this.sortable) {
                return;
            }

            const index = this.value.findIndex((val) => String(val) === String(optionValue));

            if (index < 0) {
                return;
            }

            const target = index + direction;

            if (target < 0 || target >= this.value.length) {
                return;
            }

            const next = [...this.value];
            const [item] = next.splice(index, 1);
            next.splice(target, 0, item);
            this.value = next;
        },

        moveAllAvailable() {
            this.selectAllFiltered();
        },

        removeAllSelected() {
            if (! this.canEdit || ! this.clearable) {
                return;
            }

            if (this.selectedQuery.trim() === '') {
                this.value = [];

                return;
            }

            const removeSet = new Set(this.filteredSelected.map((opt) => String(opt.value)));
            this.value = this.value.filter((val) => ! removeSet.has(String(val)));
        },

        toggleExpanded() {
            this.expanded = ! this.expanded;
        },

        highlightedLabel(label) {
            const text = String(label ?? '');
            const q = this.query.trim();

            if (! this.highlight || q === '') {
                return text;
            }

            const escaped = q.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            const regex = new RegExp(`(${escaped})`, 'ig');

            return text.replace(regex, '<mark class="rounded-sm bg-warning/30 text-inherit">$1</mark>');
        },

        onFocus() {
            this.focused = true;

            if (this.openOnFocus && this.isDropdown) {
                this.openMenu();
            }
        },

        onBlur() {
            this.focused = false;
        },

        onQueryInput() {
            this.activeIndex = this.firstActiveIndex();
            this.scheduleSearch();

            if (this.isDropdown && ! this.open) {
                this.openMenu();
            } else if (this.isDropdown) {
                this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
            }
        },

        onTriggerKeydown(event) {
            if (! this.canEdit || ! this.isDropdown) {
                return;
            }

            if (event.key === 'ArrowDown' || event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                this.openMenu();

                return;
            }

            if (event.key === 'Escape') {
                this.close();
            }
        },

        onPanelKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            const indexes = this.navigableIndexes;

            if (event.key === 'Escape') {
                event.preventDefault();
                this.close();
                this.$refs.trigger?.focus();

                return;
            }

            if (event.key === 'ArrowDown') {
                event.preventDefault();

                if (indexes.length === 0) {
                    return;
                }

                const current = indexes.indexOf(this.activeIndex);
                const next = current < 0 ? 0 : Math.min(indexes.length - 1, current + 1);
                this.activeIndex = indexes[next];
                this.scrollActiveIntoView();

                return;
            }

            if (event.key === 'ArrowUp') {
                event.preventDefault();

                if (indexes.length === 0) {
                    return;
                }

                const current = indexes.indexOf(this.activeIndex);
                const next = current <= 0 ? 0 : current - 1;
                this.activeIndex = indexes[next];
                this.scrollActiveIntoView();

                return;
            }

            if (event.key === 'Home') {
                event.preventDefault();
                this.activeIndex = this.firstActiveIndex();
                this.scrollActiveIntoView();

                return;
            }

            if (event.key === 'End') {
                event.preventDefault();
                this.activeIndex = indexes.length > 0 ? indexes[indexes.length - 1] : -1;
                this.scrollActiveIntoView();

                return;
            }

            if (event.key === 'Enter') {
                event.preventDefault();
                const item = this.visibleItems[this.activeIndex];

                if (item?.type === 'option') {
                    this.toggleOption(item.option);
                }

                return;
            }

            if (event.key === 'Backspace' && this.query === '' && this.hasValue && this.removable && this.isDropdown) {
                event.preventDefault();
                this.removeValue(this.value[this.value.length - 1]);
            }
        },

        scrollActiveIntoView() {
            this.$nextTick(() => {
                const menu = this.$refs.menuList || this.$refs.menu;
                const active = menu?.querySelector?.('[data-active="true"]');

                active?.scrollIntoView?.({ block: 'nearest' });
            });
        },

        closeIfOutside(target) {
            if (! this.isDropdown || ! this.open) {
                return;
            }

            const root = this.$refs.root;
            const menu = this.$refs.menu;

            if (root?.contains(target) || menu?.contains(target)) {
                return;
            }

            this.close();
        },
    }));
});
