@props([
    'expanded' => [],
    'selected' => null,
    'selectable' => false,
    'multiple' => false,
    'checkable' => false,
    'checked' => [],
    'cascade' => true,
    'color' => 'primary',
    'size' => 'md',
    'variant' => 'default',
    'lines' => false,
    'indicator' => 'chevron',
    'actions' => false,
    'draggable' => false,
])

@php
    // "color", "size", "variant", "lines", "indicator", "selectable",
    // "multiple", "checkable", "cascade" e "draggable" também viram
    // consumíveis por <x-ui.treeview.treeview-item> via @aware.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'flush', 'bordered'], true)) {
        $variant = 'default';
    }

    if (! in_array($indicator, ['chevron', 'plus', 'caret'], true)) {
        $indicator = 'chevron';
    }

    $expanded = is_array($expanded) ? array_values($expanded) : array_filter([$expanded]);
    $checked = is_array($checked) ? array_values($checked) : array_filter([$checked]);

    $selectedNormalized = $multiple
        ? (is_array($selected) ? array_values($selected) : array_filter([$selected]))
        : (is_array($selected) ? ($selected[0] ?? null) : $selected);

    $variantClasses = match ($variant) {
        'flush' => 'rounded-none border-0',
        default => 'rounded-md border border-border p-2',
    };

    $ariaLabel = $attributes->get('aria-label', 'Árvore');

    $config = [
        'expanded' => $expanded,
        'selected' => $selectedNormalized,
        'selectable' => (bool) $selectable,
        'multiple' => (bool) $multiple,
        'checkable' => (bool) $checkable,
        'checked' => $checked,
        'cascade' => (bool) $cascade,
        'draggable' => (bool) $draggable,
    ];
@endphp

<div
    x-data="treeview(@js($config))"
    data-treeview
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    data-color="{{ $color }}"
    @if ($draggable) data-treeview-draggable @endif
    {{ $attributes->except('aria-label')->class(['ui-treeview w-full', $variantClasses]) }}
>
    @if ($actions)
        <div class="mb-2 flex flex-wrap items-center gap-2 border-b border-border pb-2">
            <button
                type="button"
                class="inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                @click="expandAll()"
            >
                <i class="bi bi-arrows-expand text-sm leading-none" aria-hidden="true"></i>
                Expandir tudo
            </button>
            <button
                type="button"
                class="inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                @click="collapseAll()"
            >
                <i class="bi bi-arrows-collapse text-sm leading-none" aria-hidden="true"></i>
                Recolher tudo
            </button>
        </div>
    @endif

    <ul
        x-ref="tree"
        role="tree"
        aria-label="{{ $ariaLabel }}"
        @if ($draggable)
            @dragover.prevent="onRootDragOver($event)"
            @drop.prevent="onRootDrop($event)"
        @endif
        @class([
            'ui-treeview-root m-0 list-none p-0',
            'ui-treeview-lines' => $lines,
        ])
    >
        {{ $slot }}
    </ul>
</div>
