// Lógica do <x-ui.treeview> registrada como Alpine.data nomeado (não inline
// no x-data) — mesma razão do dropdown/tabs/accordion: navegação por teclado,
// seleção, checkboxes em cascata, expand/collapse e drag-and-drop envolvem
// comparações e arrow functions, que quebrariam wire:navigate se ficassem
// soltas num atributo x-data="{...}" inline. Ver reference/dropdown.md
// (gotcha #4) na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.data('treeview', (config = {}) => ({
        expanded: Array.isArray(config.expanded) ? [...config.expanded] : [],
        selected: config.multiple
            ? (Array.isArray(config.selected) ? [...config.selected] : config.selected ? [config.selected] : [])
            : (Array.isArray(config.selected) ? (config.selected[0] ?? null) : (config.selected ?? null)),
        selectable: Boolean(config.selectable),
        multiple: Boolean(config.multiple),
        checkable: Boolean(config.checkable),
        checked: Array.isArray(config.checked) ? [...config.checked] : [],
        cascade: config.cascade !== false,
        draggable: Boolean(config.draggable),
        focused: null,
        draggingName: null,
        dropTarget: null,
        dropPosition: null,
        didDrag: false,

        init() {
            this.$nextTick(() => {
                const openNames = this.items()
                    .filter((el) => el.hasAttribute('data-treeview-open'))
                    .map((el) => el.dataset.treeviewName);

                if (openNames.length) {
                    this.expanded = [...new Set([...this.expanded, ...openNames])];
                }

                const activeNames = this.items()
                    .filter((el) => el.hasAttribute('data-treeview-active'))
                    .map((el) => el.dataset.treeviewName);

                if (activeNames.length) {
                    if (this.multiple) {
                        this.selected = [...new Set([...this.selected, ...activeNames])];
                    } else if (this.selected === null) {
                        this.selected = activeNames[0];
                    }
                }

                const checkedNames = this.items()
                    .filter((el) => el.hasAttribute('data-treeview-checked'))
                    .map((el) => el.dataset.treeviewName);

                if (checkedNames.length) {
                    this.checked = [...new Set([...this.checked, ...checkedNames])];
                }

                const [first] = this.visibleItems();

                if (first) {
                    this.focused = first.dataset.treeviewName;
                }
            });
        },

        items() {
            return Array.from(this.$refs.tree.querySelectorAll('[data-treeview-item]'));
        },

        visibleItems() {
            return this.items().filter((el) => {
                let node = el.closest('[data-treeview-node]');
                let parent = node?.parentElement?.closest('[data-treeview-node]');

                while (parent) {
                    const parentItem = parent.querySelector(':scope > [data-treeview-item]');
                    const parentName = parentItem?.dataset.treeviewName;

                    if (parentName && ! this.isExpanded(parentName)) {
                        return false;
                    }

                    parent = parent.parentElement?.closest('[data-treeview-node]');
                }

                return true;
            });
        },

        itemEl(name) {
            return this.$refs.tree.querySelector(`[data-treeview-item][data-treeview-name="${CSS.escape(name)}"]`);
        },

        nodeEl(name) {
            return this.itemEl(name)?.closest('[data-treeview-node]') ?? null;
        },

        groupEl(name) {
            if (name === null || name === undefined) {
                return this.$refs.tree;
            }

            return this.nodeEl(name)?.querySelector(':scope > [data-treeview-group]') ?? null;
        },

        isBranch(name) {
            const item = this.itemEl(name);

            if (! item) {
                return false;
            }

            if (item.dataset.treeviewBranch === 'true') {
                return true;
            }

            const group = this.groupEl(name);

            return Boolean(group?.querySelector(':scope > [data-treeview-node]'));
        },

        isDisabled(name) {
            return this.itemEl(name)?.hasAttribute('data-treeview-disabled') ?? false;
        },

        isExpanded(name) {
            return this.expanded.includes(name);
        },

        isSelected(name) {
            if (! this.selectable) {
                return this.itemEl(name)?.hasAttribute('data-treeview-active') ?? false;
            }

            return this.multiple ? this.selected.includes(name) : this.selected === name;
        },

        isChecked(name) {
            return this.checked.includes(name);
        },

        isDragging(name) {
            return this.draggingName === name;
        },

        isDropBefore(name) {
            return this.dropTarget === name && this.dropPosition === 'before';
        },

        isDropAfter(name) {
            return this.dropTarget === name && this.dropPosition === 'after';
        },

        isDropInside(name) {
            return this.dropTarget === name && this.dropPosition === 'inside';
        },

        descendants(name) {
            const node = this.nodeEl(name);

            if (! node) {
                return [];
            }

            return Array.from(node.querySelectorAll('[data-treeview-item]'))
                .filter((el) => el.dataset.treeviewName !== name)
                .map((el) => el.dataset.treeviewName);
        },

        children(name) {
            const group = this.groupEl(name);

            if (! group) {
                return [];
            }

            return Array.from(group.querySelectorAll(':scope > [data-treeview-node] > [data-treeview-item]'))
                .map((el) => el.dataset.treeviewName);
        },

        parentOf(name) {
            const node = this.nodeEl(name);
            const parentNode = node?.parentElement?.closest('[data-treeview-node]');

            return parentNode?.querySelector(':scope > [data-treeview-item]')?.dataset.treeviewName ?? null;
        },

        isIndeterminate(name) {
            if (! this.checkable || ! this.cascade || ! this.isBranch(name)) {
                return false;
            }

            const desc = this.descendants(name).filter((n) => ! this.isDisabled(n));

            if (! desc.length) {
                return false;
            }

            const checkedCount = desc.filter((n) => this.isChecked(n)).length;

            return checkedCount > 0 && checkedCount < desc.length;
        },

        toggleExpand(name) {
            if (! this.isBranch(name) || this.isDisabled(name)) {
                return;
            }

            this.expanded = this.isExpanded(name)
                ? this.expanded.filter((item) => item !== name)
                : [...this.expanded, name];

            this.$dispatch('treeview-expand', {
                name,
                expanded: this.isExpanded(name),
                all: [...this.expanded],
            });
        },

        expand(name) {
            if (! this.isBranch(name) || this.isDisabled(name) || this.isExpanded(name)) {
                return;
            }

            this.expanded = [...this.expanded, name];
            this.$dispatch('treeview-expand', { name, expanded: true, all: [...this.expanded] });
        },

        collapse(name) {
            if (! this.isExpanded(name)) {
                return;
            }

            this.expanded = this.expanded.filter((item) => item !== name);
            this.$dispatch('treeview-expand', { name, expanded: false, all: [...this.expanded] });
        },

        expandAll() {
            this.expanded = this.items()
                .filter((el) => this.isBranch(el.dataset.treeviewName) && ! el.hasAttribute('data-treeview-disabled'))
                .map((el) => el.dataset.treeviewName);

            this.$dispatch('treeview-expand-all', { all: [...this.expanded] });
        },

        collapseAll() {
            this.expanded = [];
            this.$dispatch('treeview-collapse-all', { all: [] });
        },

        select(name) {
            if (! this.selectable || this.isDisabled(name)) {
                return;
            }

            if (this.multiple) {
                this.selected = this.selected.includes(name)
                    ? this.selected.filter((item) => item !== name)
                    : [...this.selected, name];
            } else {
                this.selected = this.selected === name ? null : name;
            }

            this.$dispatch('treeview-select', {
                name,
                selected: this.multiple ? [...this.selected] : this.selected,
            });
        },

        toggleCheck(name) {
            if (! this.checkable || this.isDisabled(name)) {
                return;
            }

            const nextChecked = ! this.isChecked(name);

            this.setChecked(name, nextChecked);

            if (this.cascade) {
                this.descendants(name).forEach((child) => {
                    if (! this.isDisabled(child)) {
                        this.setChecked(child, nextChecked);
                    }
                });

                this.syncAncestors(name);
            }

            this.$dispatch('treeview-check', {
                name,
                checked: this.isChecked(name),
                all: [...this.checked],
            });
        },

        setChecked(name, value) {
            if (value) {
                if (! this.checked.includes(name)) {
                    this.checked = [...this.checked, name];
                }

                return;
            }

            this.checked = this.checked.filter((item) => item !== name);
        },

        syncAncestors(name) {
            let parent = this.parentOf(name);

            while (parent) {
                const kids = this.children(parent).filter((n) => ! this.isDisabled(n));
                const allChecked = kids.length > 0 && kids.every((n) => this.isChecked(n));

                this.setChecked(parent, allChecked);
                parent = this.parentOf(parent);
            }
        },

        activate(name) {
            if (this.didDrag) {
                this.didDrag = false;

                return;
            }

            if (this.isDisabled(name)) {
                return;
            }

            if (this.checkable && ! this.selectable) {
                this.toggleCheck(name);

                return;
            }

            if (this.selectable) {
                this.select(name);

                return;
            }

            if (this.isBranch(name)) {
                this.toggleExpand(name);
            }
        },

        focusItem(name) {
            if (! name || this.isDisabled(name)) {
                return;
            }

            this.focused = name;
            this.itemEl(name)?.focus();
        },

        isFocused(name) {
            return this.focused === name;
        },

        moveFocus(offset) {
            const visible = this.visibleItems().filter((el) => ! el.hasAttribute('data-treeview-disabled'));
            const currentIndex = visible.findIndex((el) => el.dataset.treeviewName === this.focused);
            const nextIndex = currentIndex < 0
                ? 0
                : (currentIndex + offset + visible.length) % visible.length;
            const next = visible[nextIndex];

            if (next) {
                this.focusItem(next.dataset.treeviewName);
            }
        },

        focusFirst() {
            const [first] = this.visibleItems().filter((el) => ! el.hasAttribute('data-treeview-disabled'));

            if (first) {
                this.focusItem(first.dataset.treeviewName);
            }
        },

        focusLast() {
            const visible = this.visibleItems().filter((el) => ! el.hasAttribute('data-treeview-disabled'));
            const last = visible[visible.length - 1];

            if (last) {
                this.focusItem(last.dataset.treeviewName);
            }
        },

        onRight(name) {
            if (this.isBranch(name) && ! this.isExpanded(name)) {
                this.expand(name);

                return;
            }

            const [firstChild] = this.children(name);

            if (firstChild) {
                this.focusItem(firstChild);
            }
        },

        onLeft(name) {
            if (this.isBranch(name) && this.isExpanded(name)) {
                this.collapse(name);

                return;
            }

            const parent = this.parentOf(name);

            if (parent) {
                this.focusItem(parent);
            }
        },

        onKeydown(event, name) {
            const key = event.key;

            if (key === 'ArrowDown') {
                event.preventDefault();
                this.moveFocus(1);

                return;
            }

            if (key === 'ArrowUp') {
                event.preventDefault();
                this.moveFocus(-1);

                return;
            }

            if (key === 'ArrowRight') {
                event.preventDefault();
                this.onRight(name);

                return;
            }

            if (key === 'ArrowLeft') {
                event.preventDefault();
                this.onLeft(name);

                return;
            }

            if (key === 'Home') {
                event.preventDefault();
                this.focusFirst();

                return;
            }

            if (key === 'End') {
                event.preventDefault();
                this.focusLast();

                return;
            }

            if (key === 'Enter' || key === ' ') {
                event.preventDefault();
                this.activate(name);

                return;
            }

            if (key === '*') {
                event.preventDefault();
                const parent = this.parentOf(name);
                const siblings = parent
                    ? this.children(parent)
                    : this.items()
                        .filter((el) => ! this.parentOf(el.dataset.treeviewName))
                        .map((el) => el.dataset.treeviewName);

                siblings.forEach((sibling) => {
                    if (this.isBranch(sibling)) {
                        this.expand(sibling);
                    }
                });
            }
        },

        canDrag(name) {
            return this.draggable
                && ! this.isDisabled(name)
                && ! this.itemEl(name)?.hasAttribute('data-treeview-undraggable');
        },

        canDropOn(targetName) {
            if (! this.draggable || ! this.draggingName || ! targetName) {
                return false;
            }

            if (this.draggingName === targetName) {
                return false;
            }

            if (this.isDisabled(targetName)) {
                return false;
            }

            return ! this.descendants(this.draggingName).includes(targetName);
        },

        onDragStart(event, name) {
            if (! this.canDrag(name)) {
                event.preventDefault();

                return;
            }

            this.draggingName = name;
            this.didDrag = false;
            this.dropTarget = null;
            this.dropPosition = null;
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', name);

            requestAnimationFrame(() => {
                this.nodeEl(name)?.classList.add('opacity-50');
            });
        },

        onDragEnd() {
            this.nodeEl(this.draggingName)?.classList.remove('opacity-50');

            this.didDrag = this.draggingName !== null;
            this.draggingName = null;
            this.dropTarget = null;
            this.dropPosition = null;
        },

        onItemDragOver(event, name) {
            if (! this.draggable || ! this.draggingName) {
                return;
            }

            if (! this.canDropOn(name)) {
                event.dataTransfer.dropEffect = 'none';

                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.dataTransfer.dropEffect = 'move';

            const rect = event.currentTarget.getBoundingClientRect();
            const ratio = (event.clientY - rect.top) / rect.height;
            let position = 'inside';

            if (ratio < 0.28) {
                position = 'before';
            } else if (ratio > 0.72) {
                position = 'after';
            }

            this.dropTarget = name;
            this.dropPosition = position;

            if (position === 'inside') {
                const item = this.itemEl(name);

                if (item) {
                    item.dataset.treeviewBranch = 'true';
                }

                this.expand(name);
            }
        },

        onItemDragLeave(event, name) {
            if (this.dropTarget === name && ! event.currentTarget.contains(event.relatedTarget)) {
                this.dropTarget = null;
                this.dropPosition = null;
            }
        },

        onItemDrop(event, name) {
            event.preventDefault();
            event.stopPropagation();

            if (! this.draggable || ! this.draggingName || ! this.canDropOn(name)) {
                this.clearDropState();

                return;
            }

            const position = this.dropPosition ?? 'inside';
            const dragging = this.draggingName;

            if (position === 'inside') {
                this.moveNode(dragging, name, this.children(name).filter((n) => n !== dragging).length);
            } else {
                const parent = this.parentOf(name);
                const siblings = (parent === null ? this.children(null) : this.children(parent))
                    .filter((n) => n !== dragging);
                let index = siblings.indexOf(name);

                if (index < 0) {
                    index = siblings.length;
                }

                if (position === 'after') {
                    index += 1;
                }

                this.moveNode(dragging, parent, index);
            }

            this.clearDropState();
        },

        onGroupDragOver(event, name) {
            if (! this.draggable || ! this.draggingName || ! this.canDropOn(name)) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
            event.dataTransfer.dropEffect = 'move';

            const item = this.itemEl(name);

            if (item) {
                item.dataset.treeviewBranch = 'true';
            }

            this.dropTarget = name;
            this.dropPosition = 'inside';
            this.expand(name);
        },

        onGroupDrop(event, name) {
            event.preventDefault();
            event.stopPropagation();

            if (! this.draggable || ! this.draggingName || ! this.canDropOn(name)) {
                this.clearDropState();

                return;
            }

            const dragging = this.draggingName;
            this.moveNode(dragging, name, this.children(name).filter((n) => n !== dragging).length);
            this.clearDropState();
        },

        onRootDragOver(event) {
            if (! this.draggable || ! this.draggingName) {
                return;
            }

            if (event.target !== this.$refs.tree) {
                return;
            }

            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
            this.dropTarget = null;
            this.dropPosition = 'root';
        },

        onRootDrop(event) {
            if (! this.draggable || ! this.draggingName) {
                return;
            }

            if (this.dropPosition !== 'root') {
                return;
            }

            event.preventDefault();
            const dragging = this.draggingName;
            this.moveNode(dragging, null, this.children(null).filter((n) => n !== dragging).length);
            this.clearDropState();
        },

        clearDropState() {
            this.draggingName = null;
            this.dropTarget = null;
            this.dropPosition = null;
        },

        ensureGroup(parentName) {
            if (parentName === null || parentName === undefined) {
                return this.$refs.tree;
            }

            const node = this.nodeEl(parentName);
            const item = this.itemEl(parentName);

            if (! node || ! item) {
                return null;
            }

            let group = node.querySelector(':scope > [data-treeview-group]');

            if (! group) {
                group = document.createElement('ul');
                group.setAttribute('role', 'group');
                group.setAttribute('data-treeview-group', '');
                group.className = 'ui-treeview-group m-0 list-none p-0 ps-4';
                node.appendChild(group);
            }

            item.dataset.treeviewBranch = 'true';

            return group;
        },

        moveNode(name, parentName, index) {
            const node = this.nodeEl(name);

            if (! node) {
                return;
            }

            if (parentName === name || this.descendants(name).includes(parentName)) {
                return;
            }

            const fromParent = this.parentOf(name);
            const group = this.ensureGroup(parentName);

            if (! group) {
                return;
            }

            node.remove();

            const siblings = Array.from(group.querySelectorAll(':scope > [data-treeview-node]'));
            const clampedIndex = Math.max(0, Math.min(index, siblings.length));

            if (clampedIndex >= siblings.length) {
                group.appendChild(node);
            } else {
                group.insertBefore(node, siblings[clampedIndex]);
            }

            if (parentName !== null) {
                this.expand(parentName);
            }

            this.$dispatch('treeview-reorder', {
                name,
                from: fromParent,
                parent: parentName,
                index: clampedIndex,
                tree: this.serializeTree(),
            });
        },

        serializeTree(group = null) {
            const root = group ?? this.$refs.tree;

            return Array.from(root.querySelectorAll(':scope > [data-treeview-node]')).map((node) => {
                const item = node.querySelector(':scope > [data-treeview-item]');
                const childGroup = node.querySelector(':scope > [data-treeview-group]');
                const children = childGroup ? this.serializeTree(childGroup) : [];

                return {
                    name: item?.dataset.treeviewName ?? null,
                    children,
                };
            });
        },
    }));
});
