@props([
    'colspan' => 1,
    'icon' => 'bi-inbox',
    'title' => null,
    'description' => null,
])

@php
    $hasTitle = filled($title);
    $hasDescription = filled($description);
@endphp

<tr data-table-row data-table-empty-row>
    <td
        data-table-cell
        data-table-empty
        colspan="{{ $colspan }}"
        {{
            $attributes->class([
                'px-4 py-10 text-center',
            ])
        }}
    >
        <div class="mx-auto flex max-w-sm flex-col items-center gap-2">
            @if (filled($icon))
                <span class="flex size-10 items-center justify-center rounded-full bg-muted text-muted-foreground" aria-hidden="true">
                    <i class="bi {{ $icon }} text-lg leading-none"></i>
                </span>
            @endif

            @if ($hasTitle)
                <p class="m-0 text-sm font-medium text-foreground">{{ $title }}</p>
            @endif

            @if ($hasDescription)
                <p class="m-0 text-sm text-muted-foreground">{{ $description }}</p>
            @endif

            @if ($slot->isNotEmpty())
                <div @class(['mt-1' => $hasTitle || $hasDescription || filled($icon)])>
                    {{ $slot }}
                </div>
            @elseif (! $hasTitle && ! $hasDescription)
                <p class="m-0 text-sm text-muted-foreground">Nenhum registro encontrado.</p>
            @endif
        </div>
    </td>
</tr>
