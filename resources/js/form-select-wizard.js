// Lógica do <x-forms.select-wizard> como Alpine.data nomeado (não inline
// no x-data) — comparações/arrows quebrariam wire:navigate.
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formSelectWizard', (config = {}) => ({
        rawOptions: Array.isArray(config.options) ? config.options : [],
        options: [],
        value: config.multiple
            ? (Array.isArray(config.value) ? config.value.map((item) => (
                Array.isArray(item) ? item.map(String) : String(item)
            )) : [])
            : (Array.isArray(config.value)
                ? config.value.map(String)
                : (config.value === null || config.value === undefined || config.value === ''
                    ? (config.valueMode === 'path' ? [] : '')
                    : String(config.value))),
        multiple: Boolean(config.multiple),
        valueMode: config.valueMode === 'path' ? 'path' : 'leaf',
        display: config.display === 'columns' ? 'columns' : 'panel',
        searchable: Boolean(config.searchable),
        searchDeep: Boolean(config.searchDeep),
        clearable: config.clearable !== false,
        changeOnSelect: Boolean(config.changeOnSelect),
        showPath: config.showPath !== false,
        separator: config.separator ? String(config.separator) : ' / ',
        disabled: Boolean(config.disabled),
        readonly: Boolean(config.readonly),
        floating: Boolean(config.floating),
        maxSelected: config.maxSelected ?? null,
        closeOnSelect: config.closeOnSelect !== undefined && config.closeOnSelect !== null
            ? Boolean(config.closeOnSelect)
            : ! Boolean(config.multiple),
        url: config.url ? String(config.url) : null,
        parentParam: config.parentParam ? String(config.parentParam) : 'parent',
        queryParam: config.queryParam ? String(config.queryParam) : 'q',
        debounceMs: Number(config.debounce ?? 250),
        emptyText: config.emptyText ?? 'Nenhum resultado',
        loadingText: config.loadingText ?? 'Carregando…',
        placeholder: config.placeholder ?? 'Selecione…',
        backText: config.backText ?? 'Voltar',
        rootText: config.rootText ?? 'Início',
        levels: Array.isArray(config.levels) ? config.levels : [],
        instanceId: config.instanceId ?? '',
        labelActive: config.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: config.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',

        open: false,
        focused: false,
        loading: false,
        search: '',
        activeIndex: -1,
        menuStyle: '',
        // Stack of { value, label, option } for the current drill path (parents only).
        stack: [],
        // Parallel columns of options when display === 'columns' (index 0 = root).
        columns: [],
        // Highlighted value per column (for columns mode).
        columnActive: [],
        _debounceTimer: null,
        _abortController: null,
        _pathCache: {},

        init() {
            this.options = this.rawOptions
                .map((item) => this.normalizeNode(item))
                .filter(Boolean);
            this.resetNavigation();
            this.hydratePathCache();

            this.$watch('value', () => {
                this.syncHidden();
                this.hydratePathCache();
                this.$dispatch('select-wizard-changed', {
                    value: this.exportValue(),
                    path: this.primaryPath,
                    paths: this.selectedPaths,
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

            window.addEventListener('select-wizard-results', this._onResults = (event) => {
                const detail = event.detail ?? {};

                if (detail.id && detail.id !== this.instanceId) {
                    return;
                }

                this.applyRemoteChildren(detail.parent ?? null, detail.options ?? detail.results ?? []);
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
                window.removeEventListener('select-wizard-results', this._onResults);
            }

            if (this._debounceTimer) {
                clearTimeout(this._debounceTimer);
            }

            this._abortController?.abort();
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get hasValue() {
            if (this.multiple) {
                return this.value.length > 0;
            }

            if (this.valueMode === 'path') {
                return Array.isArray(this.value) && this.value.length > 0;
            }

            return this.value !== '' && this.value !== null && this.value !== undefined;
        },

        get count() {
            if (this.multiple) {
                return this.value.length;
            }

            return this.hasValue ? 1 : 0;
        },

        get isFull() {
            return this.multiple
                && this.maxSelected !== null
                && this.value.length >= this.maxSelected;
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

        get currentParent() {
            if (this.stack.length === 0) {
                return null;
            }

            return this.stack[this.stack.length - 1];
        },

        get currentOptions() {
            if (this.display === 'columns') {
                return [];
            }

            const parent = this.currentParent;
            const source = parent ? (parent.option.children || []) : this.options;

            return this.filterOptions(source);
        },

        get visibleItems() {
            return this.currentOptions.map((option, index) => ({
                type: 'option',
                option,
                index,
            }));
        },

        get breadcrumb() {
            return this.stack.map((item) => ({
                value: item.value,
                label: item.label,
            }));
        },

        get currentLevelIndex() {
            return this.stack.length;
        },

        get currentLevelLabel() {
            if (this.levels.length === 0) {
                return null;
            }

            return this.levels[this.currentLevelIndex] ?? null;
        },

        get selectedPaths() {
            if (! this.hasValue) {
                return [];
            }

            if (this.multiple) {
                return this.value.map((item) => this.resolvePathForValue(item)).filter(Boolean);
            }

            const path = this.resolvePathForValue(this.value);

            return path ? [path] : [];
        },

        get primaryPath() {
            return this.selectedPaths[0] ?? [];
        },

        get selectedLabel() {
            if (! this.hasValue) {
                return '';
            }

            if (this.multiple) {
                return this.selectedPaths
                    .map((path) => this.formatPath(path))
                    .join(', ');
            }

            return this.formatPath(this.primaryPath);
        },

        get selectedOptions() {
            return this.selectedPaths.map((path) => {
                const leaf = path[path.length - 1];

                return {
                    value: this.valueMode === 'path'
                        ? path.map((node) => node.value)
                        : leaf.value,
                    label: this.formatPath(path),
                    leafLabel: leaf.label,
                    icon: leaf.icon ?? null,
                    path,
                };
            });
        },

        exportValue() {
            if (this.multiple) {
                return this.value.map((item) => (
                    Array.isArray(item) ? [...item] : item
                ));
            }

            if (this.valueMode === 'path') {
                return Array.isArray(this.value) ? [...this.value] : [];
            }

            return this.value;
        },

        formatPath(path) {
            if (! Array.isArray(path) || path.length === 0) {
                return '';
            }

            if (! this.showPath) {
                return path[path.length - 1]?.label ?? '';
            }

            return path.map((node) => node.label).join(this.separator);
        },

        normalizeNode(raw, parentValue = null) {
            if (! raw || typeof raw !== 'object') {
                return null;
            }

            const value = raw.value ?? raw.id ?? null;
            const label = raw.label ?? raw.text ?? raw.name ?? null;

            if (value === null && label === null) {
                return null;
            }

            const resolvedValue = value === null ? String(label) : String(value);
            const childrenRaw = raw.children ?? raw.options ?? null;
            let children = [];

            if (Array.isArray(childrenRaw)) {
                children = childrenRaw
                    .map((child) => this.normalizeNode(child, resolvedValue))
                    .filter(Boolean);
            }

            return {
                value: resolvedValue,
                label: label === null ? resolvedValue : String(label),
                icon: raw.icon ? String(raw.icon) : null,
                description: raw.description ? String(raw.description) : null,
                disabled: Boolean(raw.disabled),
                isLeaf: children.length === 0 && ! Boolean(raw.hasChildren),
                hasChildren: children.length > 0 || Boolean(raw.hasChildren),
                children,
                parent: parentValue,
                loading: false,
            };
        },

        filterOptions(options) {
            const query = this.search.trim().toLowerCase();

            if (query === '') {
                return options;
            }

            if (this.searchDeep) {
                return this.deepFilter(options, query);
            }

            return options.filter((option) => {
                const haystack = [
                    option.label,
                    option.description ?? '',
                    option.value,
                ].join(' ').toLowerCase();

                return haystack.includes(query);
            });
        },

        deepFilter(options, query) {
            const results = [];

            const walk = (nodes, ancestors) => {
                nodes.forEach((node) => {
                    const haystack = [
                        node.label,
                        node.description ?? '',
                        node.value,
                    ].join(' ').toLowerCase();
                    const matches = haystack.includes(query);
                    const nextAncestors = [...ancestors, node];

                    if (matches && (node.isLeaf || this.changeOnSelect)) {
                        results.push({
                            ...node,
                            _matchPath: nextAncestors,
                        });
                    }

                    if (node.children?.length) {
                        walk(node.children, nextAncestors);
                    }
                });
            };

            walk(options, []);

            return results;
        },

        resetNavigation() {
            this.stack = [];
            this.search = '';
            this.activeIndex = -1;
            this.columns = [this.options];
            this.columnActive = [];
        },

        hydratePathCache() {
            this._pathCache = {};

            const walk = (nodes, ancestors) => {
                nodes.forEach((node) => {
                    const path = [...ancestors, {
                        value: node.value,
                        label: node.label,
                        icon: node.icon,
                    }];

                    this._pathCache[node.value] = path;

                    if (node.children?.length) {
                        walk(node.children, path);
                    }
                });
            };

            walk(this.options, []);
        },

        resolvePathForValue(raw) {
            if (Array.isArray(raw)) {
                const path = [];
                let nodes = this.options;

                for (const segment of raw.map(String)) {
                    const found = nodes.find((node) => node.value === segment);

                    if (! found) {
                        // Fallback to cached labels when remote/async.
                        const cached = this._pathCache[segment];

                        if (cached) {
                            return cached;
                        }

                        path.push({ value: segment, label: segment, icon: null });
                        nodes = [];

                        continue;
                    }

                    path.push({
                        value: found.value,
                        label: found.label,
                        icon: found.icon,
                    });
                    nodes = found.children || [];
                }

                return path;
            }

            const key = String(raw);

            if (this._pathCache[key]) {
                return this._pathCache[key];
            }

            return [{ value: key, label: key, icon: null }];
        },

        isSelected(option) {
            if (! this.hasValue) {
                return false;
            }

            if (this.multiple) {
                return this.value.some((item) => this.matchesSelection(item, option));
            }

            return this.matchesSelection(this.value, option);
        },

        matchesSelection(raw, option) {
            if (this.valueMode === 'path') {
                const pathValues = Array.isArray(raw) ? raw.map(String) : [String(raw)];
                const last = pathValues[pathValues.length - 1] ?? null;

                return last === option.value;
            }

            return String(raw) === option.value;
        },

        isPathPrefix(option, columnIndex) {
            return this.selectedPaths.some((path) => {
                const node = path[columnIndex];

                return node && node.value === option.value;
            });
        },

        syncHidden() {
            const el = this.$refs.hidden;

            if (! el) {
                return;
            }

            if (this.multiple || this.valueMode === 'path') {
                el.value = JSON.stringify(this.exportValue());
            } else {
                el.value = this.value === null || this.value === undefined ? '' : String(this.value);
            }
        },

        toggle() {
            if (! this.canEdit) {
                return;
            }

            if (this.open) {
                this.close();
            } else {
                this.openMenu();
            }
        },

        openMenu() {
            if (! this.canEdit) {
                return;
            }

            this.open = true;
            this.resetNavigation();

            // Restore navigation to the current selection path when possible.
            if (this.primaryPath.length > 0 && this.display === 'columns') {
                this.restoreColumnsToPath(this.primaryPath);
            } else if (this.primaryPath.length > 1 && this.display === 'panel') {
                this.restoreStackToPath(this.primaryPath.slice(0, -1));
            }

            this.$nextTick(() => requestAnimationFrame(() => {
                this.updatePosition();

                if (this.searchable) {
                    this.$refs.search?.focus();
                }
            }));
        },

        close() {
            this.open = false;
            this.search = '';
            this.activeIndex = -1;
        },

        closeIfOutside(target) {
            if (! this.open) {
                return;
            }

            const root = this.$refs.root;
            const menu = this.$refs.menu;

            if (root?.contains(target) || menu?.contains(target)) {
                return;
            }

            this.close();
        },

        updatePosition() {
            const trigger = this.$refs.trigger;
            const menu = this.$refs.menu;

            if (! trigger || ! menu) {
                return;
            }

            const rect = trigger.getBoundingClientRect();
            const gap = 4;
            const minWidth = this.display === 'columns'
                ? Math.max(rect.width, 280)
                : rect.width;
            const viewportPadding = 8;
            const menuHeight = menu.offsetHeight || 280;
            const spaceBelow = window.innerHeight - rect.bottom - gap;
            const spaceAbove = rect.top - gap;
            const placeAbove = spaceBelow < menuHeight && spaceAbove > spaceBelow;
            const top = placeAbove
                ? Math.max(viewportPadding, rect.top - menuHeight - gap)
                : rect.bottom + gap;
            const maxWidth = this.display === 'columns'
                ? Math.min(window.innerWidth - viewportPadding * 2, 720)
                : Math.max(minWidth, 240);
            let left = rect.left;

            if (left + maxWidth > window.innerWidth - viewportPadding) {
                left = Math.max(viewportPadding, window.innerWidth - viewportPadding - maxWidth);
            }

            this.menuStyle = [
                'position:fixed',
                `top:${top}px`,
                `left:${left}px`,
                `width:${Math.max(minWidth, Math.min(maxWidth, this.display === 'columns' ? maxWidth : minWidth))}px`,
                `max-width:${maxWidth}px`,
                'z-index:1050',
            ].join(';');
        },

        restoreStackToPath(pathNodes) {
            this.stack = [];
            let nodes = this.options;

            pathNodes.forEach((node) => {
                const found = nodes.find((item) => item.value === node.value);

                if (! found) {
                    return;
                }

                this.stack.push({
                    value: found.value,
                    label: found.label,
                    option: found,
                });
                nodes = found.children || [];
            });
        },

        restoreColumnsToPath(pathNodes) {
            this.columns = [this.options];
            this.columnActive = [];
            let nodes = this.options;

            pathNodes.forEach((node, index) => {
                const found = nodes.find((item) => item.value === node.value);

                if (! found) {
                    return;
                }

                this.columnActive[index] = found.value;

                if (found.children?.length) {
                    this.columns.push(found.children);
                    nodes = found.children;
                }
            });
        },

        async drillInto(option, columnIndex = null) {
            if (option.disabled) {
                return;
            }

            if (this.display === 'columns') {
                await this.expandColumn(option, columnIndex ?? 0);

                return;
            }

            if (! option.hasChildren && ! option.children?.length) {
                this.selectOption(option);

                return;
            }

            if (option.hasChildren && option.children.length === 0) {
                await this.loadChildren(option);
            }

            this.stack.push({
                value: option.value,
                label: option.label,
                option,
            });
            this.search = '';
            this.activeIndex = -1;

            if (this.changeOnSelect) {
                this.commitSelection(option, this.stack.map((item) => item.option));
            }

            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        async expandColumn(option, columnIndex) {
            if (option.disabled) {
                return;
            }

            this.columnActive = this.columnActive.slice(0, columnIndex);
            this.columnActive[columnIndex] = option.value;
            this.columns = this.columns.slice(0, columnIndex + 1);

            if (option.hasChildren && option.children.length === 0) {
                await this.loadChildren(option);
            }

            if (option.children?.length) {
                this.columns.push(option.children);
            }

            if (option.isLeaf || this.changeOnSelect) {
                this.selectOption(option, columnIndex);
            }

            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        goBack(steps = 1) {
            if (this.stack.length === 0) {
                return;
            }

            this.stack = this.stack.slice(0, Math.max(0, this.stack.length - steps));
            this.search = '';
            this.activeIndex = -1;
            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        goToBreadcrumb(index) {
            // index === -1 → root
            if (index < 0) {
                this.stack = [];
            } else {
                this.stack = this.stack.slice(0, index + 1);
            }

            this.search = '';
            this.activeIndex = -1;
            this.$nextTick(() => requestAnimationFrame(() => this.updatePosition()));
        },

        selectOption(option, columnIndex = null) {
            if (option.disabled) {
                return;
            }

            if (option.hasChildren && ! this.changeOnSelect && ! option._matchPath) {
                this.drillInto(option, columnIndex);

                return;
            }

            const pathOptions = option._matchPath
                ? option._matchPath
                : this.buildPathOptions(option, columnIndex);

            this.commitSelection(option, pathOptions);

            if (this.closeOnSelect && (! this.multiple || this.isFull)) {
                this.close();
            }
        },

        buildPathOptions(option, columnIndex = null) {
            if (this.display === 'columns' && columnIndex !== null) {
                const path = [];

                for (let i = 0; i <= columnIndex; i += 1) {
                    const activeValue = this.columnActive[i];
                    const col = this.columns[i] || [];
                    const found = col.find((item) => item.value === (i === columnIndex ? option.value : activeValue));

                    if (found) {
                        path.push(found);
                    }
                }

                if (path.length === 0 || path[path.length - 1]?.value !== option.value) {
                    path.push(option);
                }

                return path;
            }

            return [...this.stack.map((item) => item.option), option];
        },

        commitSelection(option, pathOptions) {
            const pathValues = pathOptions.map((item) => item.value);
            const pathNodes = pathOptions.map((item) => ({
                value: item.value,
                label: item.label,
                icon: item.icon,
            }));

            this._pathCache[option.value] = pathNodes;
            pathValues.forEach((segment, index) => {
                this._pathCache[segment] = pathNodes.slice(0, index + 1);
            });

            const nextValue = this.valueMode === 'path' ? pathValues : option.value;

            if (this.multiple) {
                const exists = this.value.some((item) => this.matchesSelection(item, option));

                if (exists) {
                    this.value = this.value.filter((item) => ! this.matchesSelection(item, option));
                } else if (! this.isFull) {
                    this.value = [...this.value, nextValue];
                }
            } else {
                this.value = nextValue;
            }
        },

        removeValue(raw) {
            if (! this.multiple || ! this.canEdit) {
                return;
            }

            this.value = this.value.filter((item) => {
                if (Array.isArray(raw) && Array.isArray(item)) {
                    return raw.join('\0') !== item.join('\0');
                }

                return String(item) !== String(raw);
            });
        },

        clear() {
            if (! this.canEdit) {
                return;
            }

            this.value = this.multiple
                ? []
                : (this.valueMode === 'path' ? [] : '');
            this.resetNavigation();
        },

        async loadChildren(option) {
            if (! this.url) {
                this.$dispatch('select-wizard-load', {
                    id: this.instanceId,
                    parent: option.value,
                    option,
                });

                return;
            }

            option.loading = true;
            this.loading = true;
            this._abortController?.abort();
            this._abortController = new AbortController();

            try {
                const url = new URL(this.url, window.location.origin);
                url.searchParams.set(this.parentParam, option.value);

                const response = await fetch(url.toString(), {
                    signal: this._abortController.signal,
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (! response.ok) {
                    throw new Error('Failed to load children');
                }

                const payload = await response.json();
                const list = Array.isArray(payload)
                    ? payload
                    : (payload.data ?? payload.options ?? payload.results ?? []);

                this.applyRemoteChildren(option.value, list);
            } catch (error) {
                if (error?.name !== 'AbortError') {
                    option.children = [];
                }
            } finally {
                option.loading = false;
                this.loading = false;
            }
        },

        applyRemoteChildren(parentValue, rawOptions) {
            const children = (Array.isArray(rawOptions) ? rawOptions : [])
                .map((item) => this.normalizeNode(item, parentValue))
                .filter(Boolean);

            const attach = (nodes) => {
                for (const node of nodes) {
                    if (node.value === parentValue) {
                        node.children = children;
                        node.hasChildren = children.length > 0;
                        node.isLeaf = children.length === 0;

                        return true;
                    }

                    if (node.children?.length && attach(node.children)) {
                        return true;
                    }
                }

                return false;
            };

            if (parentValue === null || parentValue === '' || parentValue === undefined) {
                this.options = children;
                this.columns = [this.options];
            } else {
                attach(this.options);
            }

            this.hydratePathCache();

            // Refresh current column/stack reference.
            if (this.currentParent?.value === parentValue) {
                this.currentParent.option.children = children;
                this.currentParent.option.hasChildren = children.length > 0;
            }

            if (this.display === 'columns') {
                const colIndex = this.columnActive.findIndex((value) => value === parentValue);

                if (colIndex >= 0) {
                    this.columns = this.columns.slice(0, colIndex + 1);
                    this.columns.push(children);
                }
            }
        },

        onSearchInput() {
            this.activeIndex = 0;

            if (! this.url || ! this.searchDeep) {
                return;
            }

            if (this._debounceTimer) {
                clearTimeout(this._debounceTimer);
            }

            this._debounceTimer = setTimeout(() => this.searchRemote(), this.debounceMs);
        },

        async searchRemote() {
            if (! this.url) {
                return;
            }

            const query = this.search.trim();
            this.loading = true;
            this._abortController?.abort();
            this._abortController = new AbortController();

            try {
                const url = new URL(this.url, window.location.origin);
                url.searchParams.set(this.queryParam, query);

                if (this.currentParent) {
                    url.searchParams.set(this.parentParam, this.currentParent.value);
                }

                const response = await fetch(url.toString(), {
                    signal: this._abortController.signal,
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (! response.ok) {
                    throw new Error('Search failed');
                }

                const payload = await response.json();
                const list = Array.isArray(payload)
                    ? payload
                    : (payload.data ?? payload.options ?? payload.results ?? []);

                if (this.currentParent) {
                    this.applyRemoteChildren(this.currentParent.value, list);
                } else {
                    this.applyRemoteChildren(null, list);
                }
            } catch (error) {
                if (error?.name !== 'AbortError') {
                    // keep current options
                }
            } finally {
                this.loading = false;
            }
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

            if (event.key === 'ArrowDown' || event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();

                if (! this.open) {
                    this.openMenu();
                } else {
                    this.moveActive(1);
                }

                return;
            }

            if (event.key === 'ArrowUp' && this.open) {
                event.preventDefault();
                this.moveActive(-1);

                return;
            }

            if (event.key === 'Escape' && this.open) {
                event.preventDefault();

                if (this.display === 'panel' && this.stack.length > 0) {
                    this.goBack();
                } else {
                    this.close();
                }

                return;
            }

            if (event.key === 'Backspace' && this.open && this.display === 'panel' && this.search === '' && this.stack.length > 0) {
                event.preventDefault();
                this.goBack();
            }
        },

        onSearchKeydown(event) {
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                this.moveActive(1);

                return;
            }

            if (event.key === 'ArrowUp') {
                event.preventDefault();
                this.moveActive(-1);

                return;
            }

            if (event.key === 'Enter') {
                event.preventDefault();
                const items = this.visibleItems;

                if (this.activeIndex >= 0 && items[this.activeIndex]) {
                    this.selectOption(items[this.activeIndex].option);
                }

                return;
            }

            if (event.key === 'Escape') {
                event.preventDefault();

                if (this.stack.length > 0 && this.search === '') {
                    this.goBack();
                } else if (this.search !== '') {
                    this.search = '';
                } else {
                    this.close();
                }

                return;
            }

            if (event.key === 'Backspace' && this.search === '' && this.stack.length > 0) {
                event.preventDefault();
                this.goBack();
            }
        },

        moveActive(delta) {
            const items = this.visibleItems;

            if (items.length === 0) {
                this.activeIndex = -1;

                return;
            }

            let next = this.activeIndex + delta;

            if (next < 0) {
                next = items.length - 1;
            }

            if (next >= items.length) {
                next = 0;
            }

            this.activeIndex = next;
        },

        columnOptions(columnIndex) {
            const source = this.columns[columnIndex] || [];

            return this.filterOptions(source);
        },
    }));
});
