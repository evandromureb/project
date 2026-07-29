@props([
    'paginator' => null,
    'current' => 1,
    'total' => 1,
    'perPage' => 10,
    'totalItems' => null,
    'from' => null,
    'to' => null,
    'urls' => [],
    'prevUrl' => null,
    'nextUrl' => null,
    'mode' => 'full',
    'variant' => 'outline',
    'size' => 'md',
    'color' => 'primary',
    'align' => 'center',
    'rounded' => false,
    'icons' => true,
    'showInfo' => false,
    'showFirstLast' => false,
    'showPrevNext' => true,
    'showJump' => false,
    'showPerPage' => false,
    'perPageOptions' => [10, 25, 50, 100],
    'siblings' => 1,
    'boundaries' => 1,
    'interactive' => true,
    'disabled' => false,
    'prevLabel' => 'Anterior',
    'nextLabel' => 'Próximo',
    'firstLabel' => 'Primeira',
    'lastLabel' => 'Última',
    'label' => 'Paginação',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($mode, ['full', 'simple', 'compact'], true)) {
        $mode = 'full';
    }

    if (! in_array($variant, ['outline', 'soft', 'solid', 'ghost', 'flat'], true)) {
        $variant = 'outline';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($align, ['start', 'center', 'end', 'between'], true)) {
        $align = 'center';
    }

    // Extrai estado de um LengthAwarePaginator / Paginator do Laravel.
    if ($paginator) {
        $current = method_exists($paginator, 'currentPage') ? $paginator->currentPage() : $current;
        $total = method_exists($paginator, 'lastPage') ? $paginator->lastPage() : $total;
        $perPage = method_exists($paginator, 'perPage') ? $paginator->perPage() : $perPage;
        $totalItems = method_exists($paginator, 'total') ? $paginator->total() : $totalItems;
        $from = method_exists($paginator, 'firstItem') ? $paginator->firstItem() : $from;
        $to = method_exists($paginator, 'lastItem') ? $paginator->lastItem() : $to;
        $prevUrl = method_exists($paginator, 'previousPageUrl') ? $paginator->previousPageUrl() : $prevUrl;
        $nextUrl = method_exists($paginator, 'nextPageUrl') ? $paginator->nextPageUrl() : $nextUrl;

        if (method_exists($paginator, 'url') && method_exists($paginator, 'lastPage')) {
            $urls = [];

            for ($page = 1; $page <= $paginator->lastPage(); $page++) {
                $urls[(string) $page] = $paginator->url($page);
            }
        }
    }

    $lastPage = max(1, (int) $total);
    $currentPage = min(max(1, (int) $current), $lastPage);
    $resolvedTotalItems = $totalItems !== null ? (int) $totalItems : 0;

    $alignClasses = match ($align) {
        'start' => 'justify-start',
        'end' => 'justify-end',
        'between' => 'justify-between',
        default => 'justify-center',
    };

    $sizeBtnClasses = match ($size) {
        'sm' => 'h-8 min-w-8 px-2 text-xs gap-1',
        'lg' => 'h-11 min-w-11 px-3.5 text-sm gap-1.5',
        default => 'h-9 min-w-9 px-2.5 text-sm gap-1',
    };

    $sizeIconClasses = match ($size) {
        'sm' => 'text-[0.7rem]',
        'lg' => 'text-sm',
        default => 'text-xs',
    };

    $radiusClasses = $rounded ? 'rounded-full' : 'rounded-md';

    // Classes literais por token — scanner do Tailwind precisa ver cada string.
    $idleClasses = match ($variant) {
        'soft' => match ($color) {
            'primary' => 'border border-transparent bg-primary/10 text-primary hover:bg-primary/20',
            'secondary' => 'border border-transparent bg-secondary/10 text-secondary hover:bg-secondary/20',
            'success' => 'border border-transparent bg-success/10 text-success hover:bg-success/20',
            'warning' => 'border border-transparent bg-warning/10 text-warning hover:bg-warning/20',
            'danger' => 'border border-transparent bg-danger/10 text-danger hover:bg-danger/20',
            'info' => 'border border-transparent bg-info/10 text-info hover:bg-info/20',
        },
        'solid' => 'border border-border bg-card text-foreground hover:bg-muted',
        'ghost' => 'border border-transparent bg-transparent text-foreground hover:bg-muted',
        'flat' => 'border-y border-border bg-card text-foreground first:border-s last:border-e hover:bg-muted -ms-px first:ms-0',
        default => 'border border-border bg-card text-foreground hover:bg-muted',
    };

    $activeClasses = match ($variant) {
        'soft' => match ($color) {
            'primary' => 'border border-transparent bg-primary text-primary-foreground hover:bg-primary',
            'secondary' => 'border border-transparent bg-secondary text-secondary-foreground hover:bg-secondary',
            'success' => 'border border-transparent bg-success text-success-foreground hover:bg-success',
            'warning' => 'border border-transparent bg-warning text-warning-foreground hover:bg-warning',
            'danger' => 'border border-transparent bg-danger text-danger-foreground hover:bg-danger',
            'info' => 'border border-transparent bg-info text-info-foreground hover:bg-info',
        },
        'ghost' => match ($color) {
            'primary' => 'border border-transparent bg-primary/15 text-primary hover:bg-primary/15',
            'secondary' => 'border border-transparent bg-secondary/15 text-secondary hover:bg-secondary/15',
            'success' => 'border border-transparent bg-success/15 text-success hover:bg-success/15',
            'warning' => 'border border-transparent bg-warning/15 text-warning hover:bg-warning/15',
            'danger' => 'border border-transparent bg-danger/15 text-danger hover:bg-danger/15',
            'info' => 'border border-transparent bg-info/15 text-info hover:bg-info/15',
        },
        'flat' => match ($color) {
            'primary' => 'border-y border-primary bg-primary text-primary-foreground hover:bg-primary -ms-px first:ms-0 first:border-s last:border-e z-[1]',
            'secondary' => 'border-y border-secondary bg-secondary text-secondary-foreground hover:bg-secondary -ms-px first:ms-0 first:border-s last:border-e z-[1]',
            'success' => 'border-y border-success bg-success text-success-foreground hover:bg-success -ms-px first:ms-0 first:border-s last:border-e z-[1]',
            'warning' => 'border-y border-warning bg-warning text-warning-foreground hover:bg-warning -ms-px first:ms-0 first:border-s last:border-e z-[1]',
            'danger' => 'border-y border-danger bg-danger text-danger-foreground hover:bg-danger -ms-px first:ms-0 first:border-s last:border-e z-[1]',
            'info' => 'border-y border-info bg-info text-info-foreground hover:bg-info -ms-px first:ms-0 first:border-s last:border-e z-[1]',
        },
        default => match ($color) {
            'primary' => 'border border-primary bg-primary text-primary-foreground hover:bg-primary',
            'secondary' => 'border border-secondary bg-secondary text-secondary-foreground hover:bg-secondary',
            'success' => 'border border-success bg-success text-success-foreground hover:bg-success',
            'warning' => 'border border-warning bg-warning text-warning-foreground hover:bg-warning',
            'danger' => 'border border-danger bg-danger text-danger-foreground hover:bg-danger',
            'info' => 'border border-info bg-info text-info-foreground hover:bg-info',
        },
    };

    $ellipsisClasses = match ($variant) {
        'flat' => 'border-y border-border bg-card text-muted-foreground -ms-px',
        'ghost', 'soft' => 'border border-transparent text-muted-foreground',
        default => 'border border-border bg-card text-muted-foreground',
    };

    $groupRadius = $variant === 'flat'
        ? ($rounded
            ? '[&>[data-page]:first-child]:rounded-s-full [&>[data-page]:last-child]:rounded-e-full'
            : '[&>[data-page]:first-child]:rounded-s-md [&>[data-page]:last-child]:rounded-e-md')
        : '';

    $itemBase = "inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 {$sizeBtnClasses}";

    $infoSizeClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-[0.8125rem]',
    };

    $selectSizeClasses = match ($size) {
        'sm' => 'h-8 text-xs',
        'lg' => 'h-11 text-sm',
        default => 'h-9 text-sm',
    };

    $inputSizeClasses = match ($size) {
        'sm' => 'h-8 w-12 text-xs',
        'lg' => 'h-11 w-14 text-sm',
        default => 'h-9 w-12 text-sm',
    };

    $config = [
        'current' => $currentPage,
        'lastPage' => $lastPage,
        'perPage' => (int) $perPage,
        'total' => $resolvedTotalItems,
        'from' => $from,
        'to' => $to,
        'urls' => $urls ?: new \stdClass,
        'prevUrl' => $prevUrl,
        'nextUrl' => $nextUrl,
        'mode' => $mode,
        'siblings' => (int) $siblings,
        'boundaries' => (int) $boundaries,
        'perPageOptions' => array_values(array_map('intval', (array) $perPageOptions)),
        'interactive' => $interactive,
        'disabled' => (bool) $disabled,
        'idleClasses' => $idleClasses,
        'activeClasses' => $activeClasses,
    ];
@endphp

<nav
    {{
        $attributes->class([
            'ui-pagination flex w-full flex-wrap items-center gap-3',
            $alignClasses,
        ])
    }}
    x-data="pagination(@js($config))"
    aria-label="{{ $label }}"
>
    @if ($showInfo || $showPerPage)
        <div class="flex flex-wrap items-center gap-3 {{ $align === 'between' ? 'me-auto' : '' }}">
            @if ($showInfo)
                <p class="m-0 text-muted-foreground {{ $infoSizeClasses }}" x-text="infoLabel"></p>
            @endif

            @if ($showPerPage)
                <label class="inline-flex items-center gap-2 text-muted-foreground {{ $infoSizeClasses }}">
                    <span class="whitespace-nowrap">Por página</span>
                    <select
                        class="rounded-md border border-border bg-card px-2 font-medium text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:opacity-50 {{ $selectSizeClasses }}"
                        x-bind:value="perPage"
                        x-on:change="changePerPage($event.target.value)"
                        x-bind:disabled="disabled"
                    >
                        @foreach ($perPageOptions as $option)
                            <option value="{{ (int) $option }}">{{ (int) $option }}</option>
                        @endforeach
                    </select>
                </label>
            @endif
        </div>
    @endif

    <div class="flex flex-wrap items-center gap-3">
        {{-- Controles de página --}}
        <div
            class="inline-flex items-center {{ $variant === 'flat' ? '' : 'gap-1' }} {{ $groupRadius }}"
            role="list"
        >
            @if ($showFirstLast && $mode !== 'compact')
                <button
                    type="button"
                    data-page
                    class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} {{ $idleClasses }}"
                    x-on:click="first($event)"
                    x-bind:disabled="disabled || isFirst"
                    x-bind:aria-disabled="disabled || isFirst"
                    aria-label="{{ $firstLabel }}"
                >
                    @if ($icons)
                        <i class="bi bi-chevron-double-left {{ $sizeIconClasses }}" aria-hidden="true"></i>
                    @endif
                    <span @class(['sr-only' => $icons])>{{ $firstLabel }}</span>
                </button>
            @endif

            @if ($showPrevNext)
                <button
                    type="button"
                    data-page
                    class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} {{ $idleClasses }}"
                    x-on:click="prev($event)"
                    x-bind:disabled="disabled || isFirst"
                    x-bind:aria-disabled="disabled || isFirst"
                    aria-label="{{ $prevLabel }}"
                >
                    @if ($icons)
                        <i class="bi bi-chevron-left {{ $sizeIconClasses }}" aria-hidden="true"></i>
                    @endif
                    <span @class(['sr-only' => $icons && $mode !== 'simple'])>{{ $prevLabel }}</span>
                </button>
            @endif

            @if ($mode === 'compact')
                <span
                    data-page
                    class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} {{ $ellipsisClasses }} tabular-nums"
                    x-text="compactLabel"
                    aria-current="page"
                ></span>
            @elseif ($mode === 'full')
                <template x-for="item in elements" x-bind:key="item.key">
                    <span class="contents">
                        <template x-if="item.type === 'ellipsis'">
                            <span
                                data-page
                                class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} {{ $ellipsisClasses }} pointer-events-none"
                                aria-hidden="true"
                            >…</span>
                        </template>

                        <template x-if="item.type === 'page'">
                            <button
                                type="button"
                                data-page
                                class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} tabular-nums"
                                x-bind:class="pageButtonClasses(item.page)"
                                x-bind:aria-current="isCurrent(item.page) ? 'page' : null"
                                x-bind:aria-label="'Página ' + item.page"
                                x-bind:disabled="disabled"
                                x-on:click="goTo(item.page, $event)"
                                x-text="item.page"
                            ></button>
                        </template>
                    </span>
                </template>
            @endif

            @if ($showPrevNext)
                <button
                    type="button"
                    data-page
                    class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} {{ $idleClasses }}"
                    x-on:click="next($event)"
                    x-bind:disabled="disabled || isLast"
                    x-bind:aria-disabled="disabled || isLast"
                    aria-label="{{ $nextLabel }}"
                >
                    <span @class(['sr-only' => $icons && $mode !== 'simple'])>{{ $nextLabel }}</span>
                    @if ($icons)
                        <i class="bi bi-chevron-right {{ $sizeIconClasses }}" aria-hidden="true"></i>
                    @endif
                </button>
            @endif

            @if ($showFirstLast && $mode !== 'compact')
                <button
                    type="button"
                    data-page
                    class="{{ $itemBase }} {{ $variant === 'flat' ? '' : $radiusClasses }} {{ $idleClasses }}"
                    x-on:click="last($event)"
                    x-bind:disabled="disabled || isLast"
                    x-bind:aria-disabled="disabled || isLast"
                    aria-label="{{ $lastLabel }}"
                >
                    <span @class(['sr-only' => $icons])>{{ $lastLabel }}</span>
                    @if ($icons)
                        <i class="bi bi-chevron-double-right {{ $sizeIconClasses }}" aria-hidden="true"></i>
                    @endif
                </button>
            @endif
        </div>

        @if ($showJump)
            <form
                class="inline-flex items-center gap-2"
                x-on:submit.prevent="jump()"
            >
                <label class="inline-flex items-center gap-2 text-muted-foreground {{ $infoSizeClasses }}">
                    <span class="whitespace-nowrap">Ir para</span>
                    <input
                        type="number"
                        min="1"
                        x-bind:max="lastPage"
                        x-model="jumpValue"
                        x-bind:disabled="disabled"
                        class="rounded-md border border-border bg-card px-2 text-center font-medium text-foreground tabular-nums focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:opacity-50 {{ $inputSizeClasses }}"
                        aria-label="Número da página"
                    />
                </label>
                <button
                    type="submit"
                    class="{{ $itemBase }} {{ $radiusClasses }} {{ $idleClasses }}"
                    x-bind:disabled="disabled"
                >
                    Ir
                </button>
            </form>
        @endif
    </div>
</nav>
