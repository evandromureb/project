// <x-ui.kanban> — Alpine.data nomeado (não x-data inline). Drag-and-drop,
// WIP limits e reordenação usam comparações/aritmética que quebrariam
// wire:navigate se ficassem soltas num atributo x-data="{...}" inline.
// Ver reference/dropdown.md (gotcha #4) e reference/kanban.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('kanban', (config) => ({
        columns: [],
        cards: [],
        draggable: config.draggable !== false,
        enforceLimit: config.enforceLimit === true,
        draggingId: null,
        dragOverColumn: null,
        dragOverIndex: null,
        didDrag: false,
        collapsed: {},

        init() {
            this.columns = (config.columns ?? []).map((column) => ({
                id: String(column.id),
                title: column.title ?? column.id,
                color: column.color ?? 'secondary',
                icon: column.icon ?? null,
                limit: column.limit ?? null,
                collapsed: column.collapsed === true,
            }));

            this.cards = (config.cards ?? []).map((card, index) => this.normalizeCard(card, index));

            this.columns.forEach((column) => {
                this.collapsed[column.id] = column.collapsed;
            });
        },

        normalizeCard(card, index = 0) {
            const tags = Array.isArray(card.tags)
                ? card.tags.map((tag) => {
                    if (typeof tag === 'string') {
                        return { label: tag, color: 'secondary' };
                    }

                    return {
                        label: tag.label ?? '',
                        color: tag.color ?? 'secondary',
                    };
                })
                : [];

            let assignees = [];

            if (Array.isArray(card.assignees)) {
                assignees = card.assignees;
            } else if (card.assignee) {
                assignees = [card.assignee];
            }

            assignees = assignees.map((person) => {
                if (typeof person === 'string') {
                    return { name: person, initials: this.initialsFrom(person), color: 'primary' };
                }

                return {
                    name: person.name ?? '',
                    initials: person.initials ?? this.initialsFrom(person.name ?? ''),
                    color: person.color ?? 'primary',
                    src: person.src ?? null,
                };
            });

            return {
                id: String(card.id),
                column: String(card.column),
                title: card.title ?? '',
                description: card.description ?? '',
                tags,
                priority: ['low', 'medium', 'high', 'urgent'].includes(card.priority)
                    ? card.priority
                    : null,
                assignees,
                dueDate: card.dueDate ?? card.due_date ?? null,
                comments: Number(card.comments ?? 0),
                attachments: Number(card.attachments ?? 0),
                order: card.order ?? index,
            };
        },

        initialsFrom(name) {
            const parts = String(name).trim().split(/\s+/).filter(Boolean);

            if (parts.length === 0) {
                return '?';
            }

            if (parts.length === 1) {
                return parts[0].slice(0, 1).toUpperCase();
            }

            return (parts[0].slice(0, 1) + parts[1].slice(0, 1)).toUpperCase();
        },

        cardsIn(columnId) {
            return this.cards
                .filter((card) => card.column === columnId)
                .sort((a, b) => a.order - b.order);
        },

        countIn(columnId) {
            return this.cardsIn(columnId).length;
        },

        isOverLimit(column) {
            if (column.limit === null || column.limit === undefined) {
                return false;
            }

            return this.countIn(column.id) > Number(column.limit);
        },

        isAtLimit(column) {
            if (column.limit === null || column.limit === undefined) {
                return false;
            }

            return this.countIn(column.id) >= Number(column.limit);
        },

        isDropIndicatorAt(columnId, index) {
            return this.dragOverColumn === columnId && this.dragOverIndex === index;
        },

        isEndDropIndicator(columnId) {
            const count = this.countIn(columnId);

            return count > 0 && this.isDropIndicatorAt(columnId, count);
        },

        hasExtraAssignees(card) {
            return card.assignees.length > 3;
        },

        extraAssigneeCount(card) {
            return Math.max(0, card.assignees.length - 3);
        },

        visibleAssignees(card) {
            return card.assignees.slice(0, 3);
        },

        canDropIn(columnId) {
            if (!this.enforceLimit) {
                return true;
            }

            const column = this.columns.find((item) => item.id === columnId);

            if (!column || column.limit === null || column.limit === undefined) {
                return true;
            }

            if (this.draggingId) {
                const dragging = this.cards.find((card) => card.id === this.draggingId);

                if (dragging && dragging.column === columnId) {
                    return true;
                }
            }

            return this.countIn(columnId) < Number(column.limit);
        },

        get boardValue() {
            return JSON.stringify({
                columns: this.columns.map((column) => column.id),
                cards: this.cards
                    .slice()
                    .sort((a, b) => {
                        if (a.column === b.column) {
                            return a.order - b.order;
                        }

                        return String(a.column).localeCompare(String(b.column));
                    })
                    .map((card) => ({
                        id: card.id,
                        column: card.column,
                        order: card.order,
                    })),
            });
        },

        priorityLabel(priority) {
            return {
                low: 'Baixa',
                medium: 'Média',
                high: 'Alta',
                urgent: 'Urgente',
            }[priority] ?? priority;
        },

        formatDueDate(iso) {
            if (!iso) {
                return '';
            }

            const [year, month, day] = String(iso).split('-').map(Number);
            const date = new Date(year, month - 1, day);

            return new Intl.DateTimeFormat('pt-BR', {
                day: '2-digit',
                month: 'short',
            }).format(date);
        },

        isOverdue(iso) {
            if (!iso) {
                return false;
            }

            const [year, month, day] = String(iso).split('-').map(Number);
            const due = new Date(year, month - 1, day);
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            return due < today;
        },

        isDueSoon(iso) {
            if (!iso || this.isOverdue(iso)) {
                return false;
            }

            const [year, month, day] = String(iso).split('-').map(Number);
            const due = new Date(year, month - 1, day);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const limit = new Date(today);
            limit.setDate(limit.getDate() + 3);

            return due >= today && due <= limit;
        },

        toggleCollapse(columnId) {
            this.collapsed[columnId] = !this.collapsed[columnId];
        },

        collapseLabel(columnId) {
            return this.collapsed[columnId] ? 'Expandir coluna' : 'Recolher coluna';
        },

        onDragStart(event, card) {
            if (!this.draggable) {
                event.preventDefault();

                return;
            }

            this.draggingId = card.id;
            this.didDrag = false;
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', card.id);

            // Firefox precisa de um payload; o resto usa draggingId no estado.
            requestAnimationFrame(() => {
                event.target.classList.add('opacity-50');
            });
        },

        onDragEnd(event) {
            event.target.classList.remove('opacity-50');
            this.didDrag = this.draggingId !== null;
            this.draggingId = null;
            this.dragOverColumn = null;
            this.dragOverIndex = null;
        },

        onColumnDragOver(event, columnId) {
            if (!this.draggable || !this.draggingId) {
                return;
            }

            if (!this.canDropIn(columnId)) {
                event.dataTransfer.dropEffect = 'none';

                return;
            }

            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
            this.dragOverColumn = columnId;

            const list = event.currentTarget.querySelector('[data-kanban-list]');

            if (!list) {
                this.dragOverIndex = this.cardsIn(columnId).length;

                return;
            }

            const items = [...list.querySelectorAll('[data-kanban-card]')];
            const y = event.clientY;
            let index = items.length;

            for (let i = 0; i < items.length; i += 1) {
                const rect = items[i].getBoundingClientRect();
                const mid = rect.top + rect.height / 2;

                if (y < mid) {
                    index = i;
                    break;
                }
            }

            this.dragOverIndex = index;
        },

        onColumnDragLeave(event, columnId) {
            if (this.dragOverColumn === columnId && !event.currentTarget.contains(event.relatedTarget)) {
                this.dragOverColumn = null;
                this.dragOverIndex = null;
            }
        },

        onColumnDrop(event, columnId) {
            event.preventDefault();

            if (!this.draggable || !this.draggingId) {
                return;
            }

            if (!this.canDropIn(columnId)) {
                this.draggingId = null;
                this.dragOverColumn = null;
                this.dragOverIndex = null;

                return;
            }

            const targetIndex = this.dragOverIndex ?? this.cardsIn(columnId).length;
            this.moveCard(this.draggingId, columnId, targetIndex);

            this.draggingId = null;
            this.dragOverColumn = null;
            this.dragOverIndex = null;
        },

        moveCard(cardId, toColumnId, toIndex) {
            const card = this.cards.find((item) => item.id === cardId);

            if (!card) {
                return;
            }

            const fromColumn = card.column;
            const siblings = this.cardsIn(toColumnId).filter((item) => item.id !== cardId);
            const clampedIndex = Math.max(0, Math.min(toIndex, siblings.length));

            siblings.splice(clampedIndex, 0, card);

            card.column = toColumnId;

            siblings.forEach((item, index) => {
                item.order = index;
            });

            // Reindexa a coluna de origem se o card saiu dela.
            if (fromColumn !== toColumnId) {
                this.cardsIn(fromColumn).forEach((item, index) => {
                    item.order = index;
                });
            }

            this.$dispatch('kanban-change', {
                cardId,
                from: fromColumn,
                to: toColumnId,
                index: clampedIndex,
                cards: this.cards.map((item) => ({
                    id: item.id,
                    column: item.column,
                    order: item.order,
                })),
            });
        },

        clickCard(card) {
            if (this.didDrag) {
                this.didDrag = false;

                return;
            }

            this.$dispatch('kanban-card-click', { card: { ...card } });
        },
    }));
});
