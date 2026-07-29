@props([
    'name' => null,
    'title' => null,
    'group' => 'examples',
    'groupLabel' => null,
    'framed' => false,
])

@php
    $sectionName = $name ?: ($title ? \Illuminate\Support\Str::slug((string) $title) : null);
@endphp

{{-- Âncora manual para TOC do <x-ui.docs> (API, referências, etc.). --}}
<section
    @if ($sectionName) id="{{ $sectionName }}" data-docs-section="{{ $sectionName }}" @endif
    data-docs-label="{{ $title ?? $sectionName }}"
    data-docs-group="{{ $group }}"
    @if (filled($groupLabel)) data-docs-group-label="{{ $groupLabel }}" @endif
    {{ $attributes->class(['ui-docs-section scroll-mt-24 space-y-3']) }}
>
    @if (filled($title))
        <h3 class="text-lg font-semibold tracking-tight text-foreground">{{ $title }}</h3>
    @endif

    @if ($framed)
        <div class="space-y-4 rounded-xl border border-border bg-card p-5 text-foreground shadow-sm">
            {{ $slot }}
        </div>
    @else
        {{ $slot }}
    @endif
</section>
