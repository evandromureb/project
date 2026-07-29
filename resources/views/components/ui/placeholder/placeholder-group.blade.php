<div
    {{ $attributes->class(['ui-placeholder-group']) }}
    role="status"
    aria-busy="true"
    aria-label="{{ $label }}"
>
    <span class="sr-only">{{ $label }}</span>

    {{ $slot }}
</div>
