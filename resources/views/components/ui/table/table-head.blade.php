@props([
    'align' => 'start',
    'nowrap' => false,
    'truncate' => false,
    'width' => null,
    'sortable' => false,
    'sort' => null,
    'sticky' => false,
    'scope' => 'col',
])

@aware([
    'size' => 'md',
    'headVariant' => 'muted',
])

@php
    if (! in_array($align, ['start', 'center', 'end'], true)) {
        $align = 'start';
    }

    if (! in_array($scope, ['col', 'row', 'colgroup', 'rowgroup'], true)) {
        $scope = 'col';
    }

    // sort: null|none|asc|desc — null sem sortable = sem indicador;
    // com sortable e null → none (ícone neutro).
    if ($sortable && $sort === null) {
        $sort = 'none';
    }

    if ($sort !== null && ! in_array($sort, ['none', 'asc', 'desc'], true)) {
        $sort = 'none';
    }

    $stickyMode = false;

    if ($sticky === true || $sticky === 1 || $sticky === 'true' || $sticky === '1' || $sticky === 'start') {
        $stickyMode = 'start';
    } elseif ($sticky === 'end') {
        $stickyMode = 'end';
    }

    $alignClasses = match ($align) {
        'center' => 'text-center',
        'end' => 'text-end',
        default => 'text-start',
    };

    $stickyClasses = match ($stickyMode) {
        'start' => 'sticky start-0 z-30 bg-inherit shadow-[1px_0_0_0_var(--border)]',
        'end' => 'sticky end-0 z-30 bg-inherit shadow-[-1px_0_0_0_var(--border)]',
        default => '',
    };

    $ariaSort = match ($sort) {
        'asc' => 'ascending',
        'desc' => 'descending',
        'none' => 'none',
        default => null,
    };

    $sortIcon = match ($sort) {
        'asc' => 'bi-caret-up-fill',
        'desc' => 'bi-caret-down-fill',
        'none' => 'bi-caret-up-fill opacity-30',
        default => null,
    };
@endphp

<th
    data-table-head
    scope="{{ $scope }}"
    @if ($ariaSort) aria-sort="{{ $ariaSort }}" @endif
    @if ($width) style="width: {{ $width }}" @endif
    {{
        $attributes->class([
            'ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground',
            $alignClasses,
            $stickyClasses,
            'whitespace-nowrap' => $nowrap,
            'max-w-0 truncate' => $truncate,
        ])
    }}
>
    @if ($sortable)
        <span class="inline-flex items-center gap-1.5 {{ $align === 'end' ? 'justify-end' : ($align === 'center' ? 'justify-center' : 'justify-start') }} w-full">
            <span class="min-w-0">{{ $slot }}</span>
            @if ($sortIcon)
                <i class="bi {{ $sortIcon }} shrink-0 text-[0.65rem] leading-none" aria-hidden="true"></i>
            @endif
        </span>
    @else
        {{ $slot }}
    @endif
</th>
