// Lógica do <x-forms.repeater> como Alpine.data nomeado (não inline no
// x-data) — listas, DnD, clone e comparações quebrariam wire:navigate se
// ficassem soltas num atributo x-data="{...}". Ver reference/dropdown.md
// (gotcha #4) e reference/forms-repeater.md na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('formRepeater', (config = {}) => ({
        items: [],
        keys: [],
        collapsed: {},
        name: config.name ? String(config.name) : '',
        min: Number.isFinite(Number(config.min)) ? Math.max(0, Number(config.min)) : 0,
        max: config.max === null || config.max === undefined || config.max === ''
            ? null
            : Math.max(0, Number(config.max)),
        defaultItem: config.defaultItem && typeof config.defaultItem === 'object' && ! Array.isArray(config.defaultItem)
            ? { ...config.defaultItem }
            : {},
        fields: Array.isArray(config.fields) ? config.fields : [],
        itemLabel: config.itemLabel ? String(config.itemLabel) : 'Item :number',
        addLabel: config.addLabel ? String(config.addLabel) : 'Adicionar item',
        emptyText: config.emptyText ? String(config.emptyText) : 'Nenhum item ainda.',
        addPosition: ['top', 'bottom', 'both'].includes(config.addPosition)
            ? config.addPosition
            : 'bottom',
        addable: config.addable !== false,
        removable: config.removable !== false,
        cloneable: Boolean(config.cloneable),
        reorderable: config.reorderable !== false,
        reorderWithButtons: config.reorderWithButtons !== false,
        collapsible: Boolean(config.collapsible),
        collapsedByDefault: Boolean(config.collapsed),
        confirmDelete: Boolean(config.confirmDelete),
        confirmDeleteText: config.confirmDeleteText
            ? String(config.confirmDeleteText)
            : 'Remover este item?',
        disabled: Boolean(config.disabled),
        readonly: Boolean(config.readonly),
        loading: Boolean(config.loading),
        dragIndex: null,
        dropIndex: null,

        init() {
            const initial = Array.isArray(config.items) ? config.items : [];
            const defaultCount = Number.isFinite(Number(config.defaultItems))
                ? Math.max(0, Number(config.defaultItems))
                : 0;

            if (initial.length > 0) {
                initial.forEach((raw) => this.pushItem(raw, false));
            } else {
                for (let i = 0; i < defaultCount; i++) {
                    this.pushItem(this.blankItem(), false);
                }
            }

            this.ensureMinItems();

            this.$watch('items', () => {
                this.$dispatch('repeater-changed', {
                    items: this.exportItems(),
                    count: this.items.length,
                });
            }, { deep: true });

            this.$el.addEventListener('repeater-add', () => this.add());
            this.$el.addEventListener('repeater-clear', () => this.clear());
            this.$el.addEventListener('repeater-set', (event) => {
                const next = event.detail?.items ?? event.detail;

                if (Array.isArray(next)) {
                    this.replaceItems(next);
                }
            });
        },

        get count() {
            return this.items.length;
        },

        get isEmpty() {
            return this.items.length === 0;
        },

        get isFull() {
            return this.max !== null && this.items.length >= this.max;
        },

        get isAtMin() {
            return this.items.length <= this.min;
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly && ! this.loading;
        },

        get canAdd() {
            return this.canEdit && this.addable && ! this.isFull;
        },

        get canRemove() {
            return this.canEdit && this.removable && ! this.isAtMin;
        },

        get canClone() {
            return this.canEdit && this.cloneable && ! this.isFull;
        },

        get canReorder() {
            return this.canEdit && this.reorderable && this.items.length > 1;
        },

        get counterLabel() {
            if (this.max === null) {
                return String(this.items.length);
            }

            return `${this.items.length} / ${this.max}`;
        },

        isFirst(index) {
            return Number(index) === 0;
        },

        isLast(index) {
            return Number(index) === this.items.length - 1;
        },

        isCollapsed(key) {
            return Boolean(this.collapsed[key]);
        },

        isDragging(index) {
            return this.dragIndex !== null && Number(this.dragIndex) === Number(index);
        },

        isDropTarget(index) {
            return this.dropIndex !== null
                && Number(this.dropIndex) === Number(index)
                && Number(this.dragIndex) !== Number(index);
        },

        uid() {
            if (typeof crypto !== 'undefined' && typeof crypto.randomUUID === 'function') {
                return crypto.randomUUID();
            }

            return `r-${Date.now().toString(36)}-${Math.random().toString(36).slice(2, 9)}`;
        },

        blankItem() {
            const item = { ...this.defaultItem };

            this.fields.forEach((field) => {
                const key = field?.name;

                if (! key || Object.prototype.hasOwnProperty.call(item, key)) {
                    return;
                }

                if (Object.prototype.hasOwnProperty.call(field, 'default')) {
                    item[key] = field.default;

                    return;
                }

                if (field.type === 'checkbox') {
                    item[key] = false;

                    return;
                }

                if (field.type === 'select' && field.multiple) {
                    item[key] = [];

                    return;
                }

                item[key] = '';
            });

            return item;
        },

        normalizeItem(raw) {
            const base = this.blankItem();
            const source = raw && typeof raw === 'object' && ! Array.isArray(raw) ? raw : {};

            Object.keys(source).forEach((key) => {
                if (key === '__key' || key === '__collapsed' || key === '_key' || key === '_collapsed') {
                    return;
                }

                base[key] = source[key];
            });

            return base;
        },

        pushItem(raw, dispatch = true) {
            const key = this.uid();
            this.keys.push(key);
            this.items.push(this.normalizeItem(raw));

            if (this.collapsible && this.collapsedByDefault) {
                this.collapsed[key] = true;
            }

            if (dispatch) {
                this.$dispatch('repeater-added', {
                    index: this.items.length - 1,
                    item: this.exportItem(this.items.length - 1),
                    count: this.items.length,
                });
            }

            return key;
        },

        ensureMinItems() {
            while (this.items.length < this.min) {
                this.pushItem(this.blankItem(), false);
            }
        },

        replaceItems(list) {
            this.items = [];
            this.keys = [];
            this.collapsed = {};

            (Array.isArray(list) ? list : []).forEach((raw) => {
                this.pushItem(raw, false);
            });

            this.ensureMinItems();
        },

        exportItem(index) {
            const item = this.items[index];

            if (! item) {
                return null;
            }

            return { ...item };
        },

        exportItems() {
            return this.items.map((_, index) => this.exportItem(index));
        },

        fieldName(field, index) {
            const i = Number(index);

            if (! this.name) {
                return String(field);
            }

            return `${this.name}[${i}][${field}]`;
        },

        fieldId(field, index) {
            const i = Number(index);
            const prefix = this.name ? `${this.name}` : 'repeater';

            return `${prefix}_${i}_${field}`.replace(/[^a-zA-Z0-9_-]/g, '_');
        },

        resolveItemLabel(item, index) {
            const template = this.itemLabel || 'Item :number';
            const number = String(Number(index) + 1);

            return template.replace(/:([a-zA-Z_][a-zA-Z0-9_]*)/g, (_, token) => {
                if (token === 'index' || token === 'number') {
                    return number;
                }

                if (token === 'count') {
                    return String(this.items.length);
                }

                const value = item?.[token];

                if (value === null || value === undefined || value === '') {
                    return template.includes(`:${token}`) && (token !== 'index' && token !== 'number')
                        ? `Item ${number}`
                        : number;
                }

                return String(value);
            });
        },

        add(afterIndex = null) {
            if (! this.canAdd) {
                return;
            }

            const before = new CustomEvent('repeater-before-add', {
                bubbles: true,
                cancelable: true,
                detail: { count: this.items.length },
            });

            if (! this.$el.dispatchEvent(before)) {
                return;
            }

            const item = this.blankItem();
            const key = this.uid();
            let insertAt = this.items.length;

            if (afterIndex !== null && afterIndex !== undefined && afterIndex !== '') {
                insertAt = Math.min(this.items.length, Math.max(0, Number(afterIndex) + 1));
            } else if (this.addPosition === 'top') {
                insertAt = 0;
            }

            this.items.splice(insertAt, 0, item);
            this.keys.splice(insertAt, 0, key);

            if (this.collapsible && this.collapsedByDefault) {
                this.collapsed[key] = true;
            }

            this.$dispatch('repeater-added', {
                index: insertAt,
                item: this.exportItem(insertAt),
                count: this.items.length,
            });

            this.$nextTick(() => {
                this.focusItem(insertAt);

                if (this.collapsible) {
                    this.expand(key);
                }
            });
        },

        remove(index) {
            if (! this.canRemove) {
                return;
            }

            const i = Number(index);

            if (i < 0 || i >= this.items.length) {
                return;
            }

            if (this.confirmDelete && ! window.confirm(this.confirmDeleteText)) {
                return;
            }

            const before = new CustomEvent('repeater-before-remove', {
                bubbles: true,
                cancelable: true,
                detail: {
                    index: i,
                    item: this.exportItem(i),
                    count: this.items.length,
                },
            });

            if (! this.$el.dispatchEvent(before)) {
                return;
            }

            const [removed] = this.items.splice(i, 1);
            const [key] = this.keys.splice(i, 1);

            if (key) {
                const nextCollapsed = { ...this.collapsed };
                delete nextCollapsed[key];
                this.collapsed = nextCollapsed;
            }

            this.$dispatch('repeater-removed', {
                index: i,
                item: removed,
                count: this.items.length,
            });
        },

        clone(index) {
            if (! this.canClone) {
                return;
            }

            const i = Number(index);
            const source = this.exportItem(i);

            if (! source) {
                return;
            }

            const key = this.uid();
            this.items.splice(i + 1, 0, this.normalizeItem(source));
            this.keys.splice(i + 1, 0, key);

            if (this.collapsible && this.collapsedByDefault) {
                this.collapsed[key] = true;
            }

            this.$dispatch('repeater-cloned', {
                index: i + 1,
                from: i,
                item: this.exportItem(i + 1),
                count: this.items.length,
            });

            this.$nextTick(() => this.focusItem(i + 1));
        },

        move(index, direction) {
            if (! this.canReorder) {
                return;
            }

            const from = Number(index);
            const to = from + Number(direction);

            if (to < 0 || to >= this.items.length) {
                return;
            }

            this.swap(from, to);
        },

        moveUp(index) {
            this.move(index, -1);
        },

        moveDown(index) {
            this.move(index, 1);
        },

        swap(from, to) {
            const items = [...this.items];
            const keys = [...this.keys];
            const [item] = items.splice(from, 1);
            const [key] = keys.splice(from, 1);

            items.splice(to, 0, item);
            keys.splice(to, 0, key);

            this.items = items;
            this.keys = keys;

            this.$dispatch('repeater-reordered', {
                from,
                to,
                items: this.exportItems(),
            });
        },

        clear() {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            if (this.confirmDelete && this.items.length > 0 && ! window.confirm(this.confirmDeleteText)) {
                return;
            }

            this.items = [];
            this.keys = [];
            this.collapsed = {};
            this.ensureMinItems();

            this.$dispatch('repeater-cleared', { count: this.items.length });
        },

        toggle(key) {
            if (! this.collapsible) {
                return;
            }

            this.collapsed = {
                ...this.collapsed,
                [key]: ! this.collapsed[key],
            };
        },

        expand(key) {
            if (! this.collapsible) {
                return;
            }

            const next = { ...this.collapsed };
            delete next[key];
            this.collapsed = next;
        },

        collapse(key) {
            if (! this.collapsible) {
                return;
            }

            this.collapsed = {
                ...this.collapsed,
                [key]: true,
            };
        },

        expandAll() {
            this.collapsed = {};
        },

        collapseAll() {
            if (! this.collapsible) {
                return;
            }

            const next = {};
            this.keys.forEach((key) => {
                next[key] = true;
            });
            this.collapsed = next;
        },

        focusItem(index) {
            const root = this.$el.querySelector(`[data-repeater-index="${index}"]`);

            if (! root) {
                return;
            }

            const focusable = root.querySelector(
                'input:not([type="hidden"]):not([disabled]), select:not([disabled]), textarea:not([disabled])',
            );

            focusable?.focus();
        },

        onDragStart(event, index) {
            if (! this.canReorder) {
                event.preventDefault();

                return;
            }

            this.dragIndex = Number(index);
            this.dropIndex = Number(index);

            if (event.dataTransfer) {
                event.dataTransfer.effectAllowed = 'move';
                event.dataTransfer.setData('text/plain', String(index));
            }
        },

        onDragOver(event, index) {
            if (! this.canReorder || this.dragIndex === null) {
                return;
            }

            event.preventDefault();
            this.dropIndex = Number(index);

            if (event.dataTransfer) {
                event.dataTransfer.dropEffect = 'move';
            }
        },

        onDragLeave(index) {
            if (Number(this.dropIndex) === Number(index)) {
                this.dropIndex = null;
            }
        },

        onDrop(event, index) {
            event.preventDefault();

            if (! this.canReorder || this.dragIndex === null) {
                this.resetDrag();

                return;
            }

            const from = Number(this.dragIndex);
            const to = Number(index);

            if (from !== to) {
                this.swap(from, to);
            }

            this.resetDrag();
        },

        onDragEnd() {
            this.resetDrag();
        },

        resetDrag() {
            this.dragIndex = null;
            this.dropIndex = null;
        },
    }));
});
