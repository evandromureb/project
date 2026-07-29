@props([
    'align' => 'start',
    'nowrap' => false,
    'truncate' => false,
    'width' => null,
    'sticky' => false,
    'mono' => false,
    'muted' => false,
    'strong' => false,
    'color' => null,
    'colspan' => null,
    'rowspan' => null,
    'as' => 'td',
])

@aware([
    'size' => 'md',
    'verticalAlign' => 'middle',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($align, ['start', 'center', 'end'], true)) {
        $align = 'start';
    }

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($as, ['td', 'th'], true)) {
        $as = 'td';
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
        'start' => 'sticky start-0 z-10 bg-card shadow-[1px_0_0_0_var(--border)]',
        'end' => 'sticky end-0 z-10 bg-card shadow-[-1px_0_0_0_var(--border)]',
        default => '',
    };

    $colorClasses = match ($color) {
        'primary' => 'bg-primary/10 text-primary',
        'secondary' => 'bg-secondary/10 text-secondary',
        'success' => 'bg-success/10 text-success',
        'warning' => 'bg-warning/10 text-warning',
        'danger' => 'bg-danger/10 text-danger',
        'info' => 'bg-info/10 text-info',
        default => '',
    };
@endphp

<{{ $as }}
    data-table-cell
    @if ($colspan) colspan="{{ $colspan }}" @endif
    @if ($rowspan) rowspan="{{ $rowspan }}" @endif
    @if ($width) style="width: {{ $width }}" @endif
    @if ($color) data-color="{{ $color }}" @endif
    {{
        $attributes->class([
            'ui-table-cell',
            $alignClasses,
            $stickyClasses,
            $colorClasses,
            'whitespace-nowrap' => $nowrap,
            'max-w-0 truncate' => $truncate,
            'font-mono text-[0.8125rem] tabular-nums' => $mono,
            'text-muted-foreground' => $muted && $color === null,
            'font-medium text-foreground' => $strong,
        ])
    }}
>
    {{ $slot }}
</{{ $as }}>
