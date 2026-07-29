@props([
    'columns' => [],
    'cards' => [],
    'draggable' => true,
    'enforceLimit' => false,
    'showCounts' => true,
    'showEmpty' => true,
    'collapsible' => false,
    'size' => 'md',
    'columnWidth' => 'md',
    'name' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($columnWidth, ['sm', 'md', 'lg'], true)) {
        $columnWidth = 'md';
    }

    $normalizedColumns = collect($columns)->map(function ($column) use ($tokenColors) {
        $color = $column['color'] ?? 'secondary';

        if (! in_array($color, $tokenColors, true)) {
            $color = 'secondary';
        }

        return [
            'id' => (string) ($column['id'] ?? ''),
            'title' => $column['title'] ?? (string) ($column['id'] ?? ''),
            'color' => $color,
            'icon' => $column['icon'] ?? null,
            'limit' => $column['limit'] ?? null,
            'collapsed' => (bool) ($column['collapsed'] ?? false),
        ];
    })->values()->all();

    $normalizedCards = collect($cards)->values()->map(function ($card, $index) {
        return [
            'id' => (string) ($card['id'] ?? $index),
            'column' => (string) ($card['column'] ?? ''),
            'title' => $card['title'] ?? '',
            'description' => $card['description'] ?? '',
            'tags' => $card['tags'] ?? [],
            'priority' => $card['priority'] ?? null,
            'assignee' => $card['assignee'] ?? null,
            'assignees' => $card['assignees'] ?? null,
            'dueDate' => $card['dueDate'] ?? $card['due_date'] ?? null,
            'comments' => $card['comments'] ?? 0,
            'attachments' => $card['attachments'] ?? 0,
            'order' => $card['order'] ?? $index,
        ];
    })->all();

    $config = [
        'columns' => $normalizedColumns,
        'cards' => $normalizedCards,
        'draggable' => (bool) $draggable,
        'enforceLimit' => (bool) $enforceLimit,
    ];

    $columnWidthClasses = match ($columnWidth) {
        'sm' => 'w-64 min-w-64',
        'lg' => 'w-96 min-w-96',
        default => 'w-80 min-w-80',
    };

    $titleSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $cardTitleClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-[0.8125rem]',
    };

    $cardBodyClasses = match ($size) {
        'sm' => 'text-[0.65rem]',
        'lg' => 'text-xs',
        default => 'text-[0.7rem]',
    };

    $cardPaddingClasses = match ($size) {
        'sm' => 'p-2.5 gap-1.5',
        'lg' => 'p-4 gap-2.5',
        default => 'p-3 gap-2',
    };
@endphp

<div
    {{
        $attributes->class([
            'ui-kanban flex w-full gap-4 overflow-x-auto pb-2',
        ])
    }}
    x-data="kanban(@js($config))"
    role="region"
    aria-label="Quadro Kanban"
>
    @if ($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="boardValue" />
    @endif

    <template x-for="column in columns" x-bind:key="column.id">
        <div
            class="{{ $columnWidthClasses }} flex shrink-0 flex-col rounded-lg border border-border bg-muted/40"
            x-bind:class="{
                'ring-2 ring-primary/40': dragOverColumn === column.id && canDropIn(column.id),
                'ring-2 ring-danger/40': dragOverColumn === column.id && !canDropIn(column.id),
                'opacity-90': isOverLimit(column),
            }"
            x-on:dragover="onColumnDragOver($event, column.id)"
            x-on:dragleave="onColumnDragLeave($event, column.id)"
            x-on:drop="onColumnDrop($event, column.id)"
        >
            {{-- Cabeçalho da coluna --}}
            <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                <span
                    class="size-2 shrink-0 rounded-full"
                    x-bind:class="{
                        'bg-primary': column.color === 'primary',
                        'bg-secondary': column.color === 'secondary',
                        'bg-success': column.color === 'success',
                        'bg-warning': column.color === 'warning',
                        'bg-danger': column.color === 'danger',
                        'bg-info': column.color === 'info',
                    }"
                    aria-hidden="true"
                ></span>

                <template x-if="column.icon">
                    <i class="bi leading-none text-muted-foreground" x-bind:class="column.icon" aria-hidden="true"></i>
                </template>

                <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground {{ $titleSizeClasses }}" x-text="column.title"></h3>

                @if ($showCounts)
                    <span
                        class="inline-flex min-w-5 items-center justify-center rounded-md px-1.5 py-0.5 text-[0.65rem] font-semibold tabular-nums"
                        x-bind:class="{
                            'bg-danger/15 text-danger': isOverLimit(column),
                            'bg-primary/10 text-primary': !isOverLimit(column) && column.color === 'primary',
                            'bg-secondary/10 text-secondary': !isOverLimit(column) && column.color === 'secondary',
                            'bg-success/10 text-success': !isOverLimit(column) && column.color === 'success',
                            'bg-warning/10 text-warning': !isOverLimit(column) && column.color === 'warning',
                            'bg-danger/10 text-danger': !isOverLimit(column) && column.color === 'danger',
                            'bg-info/10 text-info': !isOverLimit(column) && column.color === 'info',
                        }"
                        x-text="column.limit ? (countIn(column.id) + '/' + column.limit) : countIn(column.id)"
                    ></span>
                @endif

                @if ($collapsible)
                    <button
                        type="button"
                        class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                        x-on:click="toggleCollapse(column.id)"
                        x-bind:aria-expanded="!collapsed[column.id]"
                        x-bind:aria-label="collapseLabel(column.id)"
                    >
                        <i
                            class="bi bi-chevron-down text-xs transition-transform duration-200"
                            x-bind:class="{ '-rotate-90': collapsed[column.id] }"
                            aria-hidden="true"
                        ></i>
                    </button>
                @endif
            </div>

            {{-- Lista de cards --}}
            <div
                class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2"
                data-kanban-list
                x-show="!collapsed[column.id]"
            >
                <template x-for="(card, index) in cardsIn(column.id)" x-bind:key="card.id">
                    <article
                        data-kanban-card
                        class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 {{ $cardPaddingClasses }}"
                        x-bind:class="{
                            'cursor-grab active:cursor-grabbing': draggable,
                            'cursor-pointer': !draggable,
                            'opacity-50': draggingId === card.id,
                            'border-primary/40 shadow-md': isDropIndicatorAt(column.id, index),
                            'hover:border-border hover:shadow-md': draggingId !== card.id,
                        }"
                        x-bind:draggable="draggable"
                        x-on:dragstart="onDragStart($event, card)"
                        x-on:dragend="onDragEnd($event)"
                        x-on:click="clickCard(card)"
                        role="listitem"
                    >
                        {{-- Indicador de drop acima do card --}}
                        <div
                            class="pointer-events-none absolute -top-1.5 right-2 left-2 h-0.5 rounded-full bg-primary opacity-0 transition-opacity"
                            x-bind:class="{ 'opacity-100': isDropIndicatorAt(column.id, index) }"
                            aria-hidden="true"
                        ></div>

                        {{-- Tags + prioridade --}}
                        <div class="flex flex-wrap items-center gap-1" x-show="card.tags.length || card.priority">
                            <template x-for="tag in card.tags" x-bind:key="card.id + '-' + tag.label">
                                <span
                                    class="inline-flex items-center rounded px-1.5 py-0.5 text-[0.65rem] font-medium"
                                    x-bind:class="{
                                        'bg-primary/15 text-primary': tag.color === 'primary',
                                        'bg-secondary/15 text-secondary': tag.color === 'secondary',
                                        'bg-success/15 text-success': tag.color === 'success',
                                        'bg-warning/15 text-warning': tag.color === 'warning',
                                        'bg-danger/15 text-danger': tag.color === 'danger',
                                        'bg-info/15 text-info': tag.color === 'info',
                                    }"
                                    x-text="tag.label"
                                ></span>
                            </template>

                            <template x-if="card.priority">
                                <span
                                    class="ms-auto inline-flex items-center gap-1 rounded px-1.5 py-0.5 text-[0.65rem] font-medium"
                                    x-bind:class="{
                                        'bg-secondary/15 text-secondary': card.priority === 'low',
                                        'bg-info/15 text-info': card.priority === 'medium',
                                        'bg-warning/15 text-warning': card.priority === 'high',
                                        'bg-danger/15 text-danger': card.priority === 'urgent',
                                    }"
                                >
                                    <i class="bi bi-flag-fill text-[0.6rem] leading-none" aria-hidden="true"></i>
                                    <span x-text="priorityLabel(card.priority)"></span>
                                </span>
                            </template>
                        </div>

                        <h4 class="m-0 font-semibold text-foreground {{ $cardTitleClasses }}" x-text="card.title"></h4>

                        <p
                            class="m-0 line-clamp-2 text-muted-foreground {{ $cardBodyClasses }}"
                            x-show="card.description"
                            x-text="card.description"
                        ></p>

                        {{-- Meta: prazo, comentários, anexos, assignees --}}
                        <div
                            class="mt-auto flex flex-wrap items-center gap-2 pt-0.5"
                            x-show="card.dueDate || card.comments || card.attachments || card.assignees.length"
                        >
                            <template x-if="card.dueDate">
                                <span
                                    class="inline-flex items-center gap-1 text-[0.65rem] font-medium"
                                    x-bind:class="{
                                        'text-danger': isOverdue(card.dueDate),
                                        'text-warning': isDueSoon(card.dueDate),
                                        'text-muted-foreground': ! isOverdue(card.dueDate) && ! isDueSoon(card.dueDate),
                                    }"
                                >
                                    <i class="bi bi-calendar3 leading-none" aria-hidden="true"></i>
                                    <span x-text="formatDueDate(card.dueDate)"></span>
                                </span>
                            </template>

                            <template x-if="card.comments">
                                <span class="inline-flex items-center gap-1 text-[0.65rem] text-muted-foreground">
                                    <i class="bi bi-chat-left-text leading-none" aria-hidden="true"></i>
                                    <span x-text="card.comments"></span>
                                </span>
                            </template>

                            <template x-if="card.attachments">
                                <span class="inline-flex items-center gap-1 text-[0.65rem] text-muted-foreground">
                                    <i class="bi bi-paperclip leading-none" aria-hidden="true"></i>
                                    <span x-text="card.attachments"></span>
                                </span>
                            </template>

                            <div class="ms-auto flex items-center -space-x-1.5" x-show="card.assignees.length">
                                <template x-for="(person, personIndex) in visibleAssignees(card)" x-bind:key="card.id + '-a-' + personIndex">
                                    <span
                                        class="inline-flex size-6 items-center justify-center rounded-full border-2 border-card text-[0.6rem] font-semibold"
                                        x-bind:class="{
                                            'bg-primary/15 text-primary': person.color === 'primary',
                                            'bg-secondary/15 text-secondary': person.color === 'secondary',
                                            'bg-success/15 text-success': person.color === 'success',
                                            'bg-warning/15 text-warning': person.color === 'warning',
                                            'bg-danger/15 text-danger': person.color === 'danger',
                                            'bg-info/15 text-info': person.color === 'info',
                                        }"
                                        x-bind:title="person.name"
                                    >
                                        <template x-if="person.src">
                                            <img
                                                class="size-full rounded-full object-cover"
                                                x-bind:src="person.src"
                                                x-bind:alt="person.name"
                                            />
                                        </template>
                                        <template x-if="!person.src">
                                            <span x-text="person.initials"></span>
                                        </template>
                                    </span>
                                </template>
                                <template x-if="hasExtraAssignees(card)">
                                    <span class="inline-flex size-6 items-center justify-center rounded-full border-2 border-card bg-muted text-[0.6rem] font-semibold text-muted-foreground">
                                        +<span x-text="extraAssigneeCount(card)"></span>
                                    </span>
                                </template>
                            </div>
                        </div>
                    </article>
                </template>

                {{-- Indicador de drop no final da lista --}}
                <div
                    class="h-0.5 rounded-full bg-primary transition-opacity"
                    x-bind:class="{
                        'opacity-100': isEndDropIndicator(column.id),
                        'opacity-0': !isEndDropIndicator(column.id),
                    }"
                    aria-hidden="true"
                ></div>

                @if ($showEmpty)
                    <div
                        class="flex flex-1 flex-col items-center justify-center gap-1 rounded-md border border-dashed border-border px-3 py-6 text-center"
                        x-show="cardsIn(column.id).length === 0"
                    >
                        <i class="bi bi-inbox text-lg text-muted-foreground/60" aria-hidden="true"></i>
                        <p class="m-0 text-xs text-muted-foreground">Nenhum card</p>
                        <p class="m-0 text-[0.65rem] text-muted-foreground/80" x-show="draggable">Arraste um card para cá</p>
                    </div>
                @endif
            </div>
        </div>
    </template>
</div>
