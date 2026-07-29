@props([
    'name' => null,
    'label' => null,
    'title' => null,
    'icon' => null,
    'iconOpen' => null,
    'badge' => null,
    'disabled' => false,
    'href' => null,
    'open' => false,
    'active' => false,
    'checked' => false,
    'disableDrag' => false,
])

@aware([
    'color' => 'primary',
    'size' => 'md',
    'indicator' => 'chevron',
    'selectable' => false,
    'checkable' => false,
    'lines' => false,
    'draggable' => false,
])

@php
    $label = $label ?? $title;
    $hasChildren = $slot->isNotEmpty();
    $isLink = filled($href);
    $itemDraggable = (bool) $draggable && ! $disableDrag && ! $disabled;
    $showGroup = $hasChildren || (bool) $draggable;

    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($indicator, ['chevron', 'plus', 'caret'], true)) {
        $indicator = 'chevron';
    }

    $hasStartSlot = isset($start) && $start->isNotEmpty();
    $hasEndSlot = isset($end) && $end->isNotEmpty();

    // Folhas sem ícone explícito usam arquivo; ramos usam pasta (abre/fecha).
    if (! filled($icon) && ! $hasStartSlot) {
        $icon = $hasChildren ? 'bi-folder' : 'bi-file-earmark';
    }

    if ($hasChildren && ! filled($iconOpen) && $icon === 'bi-folder') {
        $iconOpen = 'bi-folder2-open';
    }

    $paddingClasses = match ($size) {
        'sm' => 'gap-1.5 px-1.5 py-1 text-xs',
        'lg' => 'gap-2.5 px-2.5 py-2 text-base',
        default => 'gap-2 px-2 py-1.5 text-sm',
    };

    $selectedClasses = match ($color) {
        'primary' => 'bg-primary/10 text-primary',
        'secondary' => 'bg-secondary/10 text-secondary',
        'success' => 'bg-success/10 text-success',
        'warning' => 'bg-warning/10 text-warning',
        'danger' => 'bg-danger/10 text-danger',
        'info' => 'bg-info/10 text-info',
    };

    $iconColorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
    };

    $dropInsideClasses = match ($color) {
        'primary' => 'bg-primary/10 ring-1 ring-inset ring-primary/40',
        'secondary' => 'bg-secondary/10 ring-1 ring-inset ring-secondary/40',
        'success' => 'bg-success/10 ring-1 ring-inset ring-success/40',
        'warning' => 'bg-warning/10 ring-1 ring-inset ring-warning/40',
        'danger' => 'bg-danger/10 ring-1 ring-inset ring-danger/40',
        'info' => 'bg-info/10 ring-1 ring-inset ring-info/40',
    };

    $indicatorIcon = match ($indicator) {
        'plus' => null,
        'caret' => 'bi-caret-right-fill',
        default => 'bi-chevron-right',
    };
@endphp

<li
    data-treeview-node
    role="none"
    class="ui-treeview-node relative"
    x-bind:class="isDragging(@js($name)) ? 'opacity-50' : ''"
>
    @if ($draggable)
        <div
            class="pointer-events-none absolute inset-x-2 top-0 z-10 h-0.5 rounded-full bg-primary"
            x-show="isDropBefore(@js($name))"
            x-cloak
            aria-hidden="true"
        ></div>
        <div
            class="pointer-events-none absolute inset-x-2 bottom-0 z-10 h-0.5 rounded-full bg-primary"
            x-show="isDropAfter(@js($name))"
            x-cloak
            aria-hidden="true"
        ></div>
    @endif

    <div
        role="treeitem"
        data-treeview-item
        data-treeview-name="{{ $name }}"
        data-treeview-branch="{{ $hasChildren ? 'true' : 'false' }}"
        @if ($disabled) data-treeview-disabled @endif
        @if ($disableDrag) data-treeview-undraggable @endif
        @if ($open) data-treeview-open @endif
        @if ($active) data-treeview-active @endif
        @if ($checked) data-treeview-checked @endif
        tabindex="-1"
        x-bind:tabindex="isFocused(@js($name)) ? 0 : -1"
        @if ($hasChildren || $draggable)
            x-bind:aria-expanded="isBranch(@js($name)) ? (isExpanded(@js($name)) ? 'true' : 'false') : null"
        @endif
        @if ($selectable)
            x-bind:aria-selected="isSelected(@js($name)) ? 'true' : 'false'"
        @endif
        @if ($checkable)
            x-bind:aria-checked="isIndeterminate(@js($name)) ? 'mixed' : (isChecked(@js($name)) ? 'true' : 'false')"
        @endif
        @if ($disabled) aria-disabled="true" @endif
        @keydown="onKeydown($event, @js($name))"
        @focus="focused = @js($name)"
        @click="focusItem(@js($name))"
        @if ($draggable)
            @dragover="onItemDragOver($event, @js($name))"
            @dragleave="onItemDragLeave($event, @js($name))"
            @drop="onItemDrop($event, @js($name))"
        @endif
        x-bind:class="(isSelected(@js($name)) ? '{{ $selectedClasses }}' : '') + (isDropInside(@js($name)) ? ' {{ $dropInsideClasses }}' : '')"
        {{
            $attributes->class([
                'ui-treeview-item group relative flex w-full min-w-0 flex-wrap items-center rounded-md outline-none transition-colors focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary',
                $paddingClasses,
                'cursor-not-allowed opacity-50' => $disabled,
                'hover:bg-muted' => ! $disabled,
                'cursor-pointer' => ! $disabled && ($selectable || $checkable || $hasChildren || $isLink || $draggable),
            ])
        }}
    >
        @if ($itemDraggable)
            <button
                type="button"
                draggable="true"
                tabindex="-1"
                class="inline-flex size-5 shrink-0 cursor-grab items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted-foreground/10 hover:text-foreground active:cursor-grabbing"
                @dragstart.stop="onDragStart($event, @js($name))"
                @dragend.stop="onDragEnd()"
                @click.stop
                aria-label="Arrastar item"
            >
                <i class="bi bi-grip-vertical text-sm leading-none" aria-hidden="true"></i>
            </button>
        @endif

        @if ($hasChildren)
            <button
                type="button"
                tabindex="-1"
                class="inline-flex size-5 shrink-0 items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted-foreground/10 hover:text-foreground"
                @click.stop="toggleExpand(@js($name))"
                aria-hidden="true"
            >
                @if ($indicator === 'plus')
                    <i
                        class="bi text-xs leading-none"
                        x-bind:class="isExpanded(@js($name)) ? 'bi-dash-lg' : 'bi-plus-lg'"
                    ></i>
                @else
                    <i
                        class="bi {{ $indicatorIcon }} text-[0.65rem] leading-none transition-transform duration-200"
                        x-bind:class="isExpanded(@js($name)) ? 'rotate-90' : ''"
                    ></i>
                @endif
            </button>
        @elseif ($draggable)
            <button
                type="button"
                tabindex="-1"
                class="inline-flex size-5 shrink-0 items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted-foreground/10 hover:text-foreground"
                x-show="isBranch(@js($name))"
                x-cloak
                @click.stop="toggleExpand(@js($name))"
                aria-hidden="true"
            >
                @if ($indicator === 'plus')
                    <i
                        class="bi text-xs leading-none"
                        x-bind:class="isExpanded(@js($name)) ? 'bi-dash-lg' : 'bi-plus-lg'"
                    ></i>
                @else
                    <i
                        class="bi {{ $indicatorIcon }} text-[0.65rem] leading-none transition-transform duration-200"
                        x-bind:class="isExpanded(@js($name)) ? 'rotate-90' : ''"
                    ></i>
                @endif
            </button>
            <span
                class="inline-flex size-5 shrink-0"
                x-show="! isBranch(@js($name))"
                aria-hidden="true"
            ></span>
        @else
            <span class="inline-flex size-5 shrink-0" aria-hidden="true"></span>
        @endif

        @if ($checkable)
            <input
                type="checkbox"
                tabindex="-1"
                class="size-3.5 shrink-0 rounded border-border text-primary focus:ring-primary/40"
                @disabled($disabled)
                x-bind:checked="isChecked(@js($name))"
                x-effect="$el.indeterminate = isIndeterminate(@js($name))"
                @click.stop="toggleCheck(@js($name))"
                aria-hidden="true"
            />
        @endif

        @if ($hasStartSlot)
            <span class="flex shrink-0 items-center" aria-hidden="true">
                {{ $start }}
            </span>
        @elseif (filled($icon))
            @if (filled($iconOpen))
                <i
                    class="bi shrink-0 text-base leading-none text-muted-foreground"
                    x-bind:class="(isExpanded(@js($name)) ? '{{ $iconOpen }}' : '{{ $icon }}') + (isSelected(@js($name)) ? ' {{ $iconColorClasses }}' : '')"
                    aria-hidden="true"
                ></i>
            @else
                <i
                    class="bi {{ $icon }} shrink-0 text-base leading-none text-muted-foreground"
                    x-bind:class="isSelected(@js($name)) ? '{{ $iconColorClasses }}' : ''"
                    aria-hidden="true"
                ></i>
            @endif
        @endif

        @if ($isLink)
            <a
                href="{{ $href }}"
                @class([
                    'min-w-0 flex-1 truncate text-left no-underline',
                    'pointer-events-none' => $disabled,
                    'text-foreground' => ! $disabled,
                ])
                @if ($disabled) tabindex="-1" aria-disabled="true" @endif
                @click.stop="activate(@js($name))"
            >
                {{ $label }}
            </a>
        @else
            <span
                class="min-w-0 flex-1 truncate text-left"
                @click.stop="activate(@js($name))"
            >{{ $label }}</span>
        @endif

        @if (filled($badge))
            <x-ui.badge size="sm" pill variant="soft" :color="$color">{{ $badge }}</x-ui.badge>
        @endif

        @if ($hasEndSlot)
            <span class="ms-auto flex min-w-0 max-w-full flex-wrap items-center justify-end gap-1">
                {{ $end }}
            </span>
        @endif
    </div>

    @if ($showGroup)
        <ul
            role="group"
            data-treeview-group
            x-show="isExpanded(@js($name))"
            x-collapse
            x-cloak
            @if ($draggable)
                @dragover.prevent="onGroupDragOver($event, @js($name))"
                @drop.prevent="onGroupDrop($event, @js($name))"
            @endif
            @class([
                'ui-treeview-group m-0 list-none p-0 ps-4',
                'ui-treeview-group-lines' => $lines,
            ])
        >
            {{ $slot }}
        </ul>
    @endif
</li>
