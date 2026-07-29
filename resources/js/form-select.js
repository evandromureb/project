// Lógica do <x-forms.select> como Alpine.data nomeado (não inline
// no x-data) — comparações e arrows quebrariam wire:navigate se
// ficassem soltas num atributo x-data="{...}". Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formSelect', (config = {}) => ({
        options: Array.isArray(config.options) ? config.options : [],
        value: config.multiple
            ? (Array.isArray(config.value) ? [...config.value.map(String)] : [])
            : (config.value === null || config.value === undefined || config.value === ''
                ? ''
                : String(config.value)),
        multiple: Boolean(config.multiple),
        searchable: Boolean(config.searchable),
        clearable: config.clearable !== false,
        disabled: Boolean(config.disabled),
        readonly: Boolean(config.readonly),
        floating: Boolean(config.floating),
        maxSelected: config.maxSelected ?? null,
        closeOnSelect: config.closeOnSelect !== undefined && config.closeOnSelect !== null
            ? Boolean(config.closeOnSelect)
            : ! Boolean(config.multiple),
        emptyText: config.emptyText ?? 'Nenhum resultado',
        placeholder: config.placeholder ?? 'Selecione…',
        labelActive: config.labelActive ?? 'top-1.5 translate-y-0 text-xs',
        labelRest: config.labelRest ?? 'top-1/2 -translate-y-1/2 text-sm',

        open: false,
        search: '',
        focused: false,
        activeIndex: -1,
        menuStyle: '',
        typeahead: '',
        _typeaheadTimer: null,

        init() {
            this.$watch('value', () => {
                this.syncHidden();
                this.$dispatch('select-changed', {
                    value: this.multiple ? [...this.value] : this.value,
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
        },

        destroy() {
            if (this._onReposition) {
                window.removeEventListener('scroll', this._onReposition, true);
            }

            if (this._onResize) {
                window.removeEventListener('resize', this._onResize);
            }

            if (this._typeaheadTimer) {
                clearTimeout(this._typeaheadTimer);
            }
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get hasValue() {
            if (this.multiple) {
                return this.value.length > 0;
            }

            return this.value !== '' && this.value !== null && this.value !== undefined;
        },

        get count() {
            return this.multiple ? this.value.length : (this.hasValue ? 1 : 0);
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

        get selectedOptions() {
            if (this.multiple) {
                return this.value
                    .map((val) => this.options.find((opt) => String(opt.value) === String(val)))
                    .filter(Boolean);
            }

            const found = this.options.find((opt) => String(opt.value) === String(this.value));

            return found ? [found] : [];
        },

        get selectedLabel() {
            if (this.multiple) {
                return this.selectedOptions.map((opt) => opt.label).join(', ');
            }

            return this.selectedOptions[0]?.label ?? '';
        },

        get displayText() {
            if (! this.hasValue) {
                return this.placeholder;
            }

            if (this.multiple) {
                if (this.selectedOptions.length === 0) {
                    return this.placeholder;
                }

                if (this.selectedOptions.length === 1) {
                    return this.selectedOptions[0].label;
                }

                return `${this.selectedOptions.length} selecionados`;
            }

            return this.selectedLabel || this.placeholder;
        },

        get filteredOptions() {
            const query = this.search.trim().toLowerCase();

            return this.options.filter((opt) => {
                if (query === '') {
                    return true;
                }

                const haystack = [
                    opt.label,
                    opt.description ?? '',
                    opt.value,
                    opt.group ?? '',
                ].join(' ').toLowerCase();

                return haystack.includes(query);
            });
        },

        get visibleItems() {
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

            return items;
        },

        get navigableIndexes() {
            return this.visibleItems
                .map((item, index) => (item.type === 'option' && ! item.option.disabled ? index : -1))
                .filter((index) => index >= 0);
        },

        isSelected(optionValue) {
            const needle = String(optionValue);

            if (this.multiple) {
                return this.value.some((val) => String(val) === needle);
            }

            return String(this.value) === needle;
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

            this.menuStyle = 'position:fixed; visibility:hidden; top:0; left:0;';
            this.open = true;
            this.focused = true;
            this.search = '';
            this.activeIndex = this.firstActiveIndex();

            this.$nextTick(() => {
                requestAnimationFrame(() => {
                    this.updatePosition();

                    if (this.searchable) {
                        this.$refs.search?.focus();
                    } else {
                        this.$refs.trigger?.focus();
                    }
                });
            });
        },

        close() {
            this.open = false;
            this.search = '';
            this.activeIndex = -1;
            this.menuStyle = '';
            this.typeahead = '';
        },

        firstActiveIndex() {
            const indexes = this.navigableIndexes;

            if (indexes.length === 0) {
                return -1;
            }

            const selected = this.visibleItems.findIndex(
                (item) => item.type === 'option' && this.isSelected(item.option.value) && ! item.option.disabled,
            );

            return selected >= 0 ? selected : indexes[0];
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

        selectOption(option) {
            if (! this.canEdit || ! option || option.disabled) {
                return;
            }

            const next = String(option.value);

            if (this.multiple) {
                if (this.isSelected(next)) {
                    this.value = this.value.filter((val) => String(val) !== next);
                } else {
                    if (this.isFull) {
                        return;
                    }

                    this.value = [...this.value, next];
                }

                if (this.closeOnSelect) {
                    this.close();
                    this.$refs.trigger?.focus();
                } else {
                    this.$nextTick(() => {
                        requestAnimationFrame(() => this.updatePosition());
                    });
                }

                return;
            }

            this.value = next;

            if (this.closeOnSelect) {
                this.close();
                this.$refs.trigger?.focus();
            }
        },

        removeValue(optionValue) {
            if (! this.canEdit || ! this.multiple) {
                return;
            }

            const needle = String(optionValue);
            this.value = this.value.filter((val) => String(val) !== needle);
            this.$refs.trigger?.focus();
        },

        clear() {
            if (! this.canEdit || ! this.clearable) {
                return;
            }

            this.value = this.multiple ? [] : '';
            this.close();
            this.$refs.trigger?.focus();
        },

        onSearchInput() {
            this.activeIndex = this.firstActiveIndex();
            this.$nextTick(() => {
                requestAnimationFrame(() => this.updatePosition());
            });
        },

        onTriggerKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            const key = event.key;

            if (key === 'ArrowDown' || key === 'ArrowUp' || key === 'Enter' || key === ' ') {
                event.preventDefault();

                if (! this.open) {
                    this.openMenu();

                    return;
                }

                if (key === 'ArrowDown') {
                    this.moveActive(1);
                } else if (key === 'ArrowUp') {
                    this.moveActive(-1);
                } else {
                    this.activateCurrent();
                }

                return;
            }

            if (key === 'Escape' && this.open) {
                event.preventDefault();
                this.close();

                return;
            }

            if (key === 'Backspace' && this.multiple && this.hasValue && ! this.searchable) {
                event.preventDefault();
                this.value = this.value.slice(0, -1);

                return;
            }

            if (key === 'Home' && this.open) {
                event.preventDefault();
                this.activeIndex = this.navigableIndexes[0] ?? -1;

                return;
            }

            if (key === 'End' && this.open) {
                event.preventDefault();
                const indexes = this.navigableIndexes;
                this.activeIndex = indexes[indexes.length - 1] ?? -1;

                return;
            }

            if (! this.searchable && key.length === 1 && ! event.ctrlKey && ! event.metaKey && ! event.altKey) {
                this.handleTypeahead(key);
            }
        },

        onSearchKeydown(event) {
            const key = event.key;

            if (key === 'ArrowDown') {
                event.preventDefault();
                this.moveActive(1);

                return;
            }

            if (key === 'ArrowUp') {
                event.preventDefault();
                this.moveActive(-1);

                return;
            }

            if (key === 'Enter') {
                event.preventDefault();
                this.activateCurrent();

                return;
            }

            if (key === 'Escape') {
                event.preventDefault();
                this.close();
                this.$refs.trigger?.focus();
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

            if (item?.type === 'option') {
                this.selectOption(item.option);
            }
        },

        scrollActiveIntoView() {
            this.$nextTick(() => {
                const menu = this.$refs.menu;
                const active = menu?.querySelector('[data-active="true"]');

                active?.scrollIntoView({ block: 'nearest' });
            });
        },

        handleTypeahead(char) {
            this.typeahead += char.toLowerCase();

            if (this._typeaheadTimer) {
                clearTimeout(this._typeaheadTimer);
            }

            this._typeaheadTimer = setTimeout(() => {
                this.typeahead = '';
            }, 600);

            const match = this.options.find(
                (opt) => ! opt.disabled && String(opt.label).toLowerCase().startsWith(this.typeahead),
            );

            if (! match) {
                return;
            }

            if (! this.open) {
                this.openMenu();
            }

            this.$nextTick(() => {
                const index = this.visibleItems.findIndex(
                    (item) => item.type === 'option' && String(item.option.value) === String(match.value),
                );

                if (index >= 0) {
                    this.activeIndex = index;
                    this.scrollActiveIntoView();
                }
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

        onFocus() {
            this.focused = true;
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

                if (this.open) {
                    this.close();
                }
            }, 120);
        },

        syncHidden() {
            const hidden = this.$refs.hidden;

            if (! hidden) {
                return;
            }

            hidden.value = this.multiple
                ? JSON.stringify(this.value)
                : String(this.value ?? '');

            hidden.dispatchEvent(new Event('input', { bubbles: true }));
        },
    }));
});
