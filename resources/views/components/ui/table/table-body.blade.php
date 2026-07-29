@props([])

<tbody
    data-table-body
    {{ $attributes->class(['ui-table-body']) }}
>
    {{ $slot }}
</tbody>
