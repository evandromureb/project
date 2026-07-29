@props([])

<tfoot
    data-table-footer
    {{
        $attributes->class([
            'ui-table-footer bg-muted/40 font-medium text-foreground',
        ])
    }}
>
    {{ $slot }}
</tfoot>
