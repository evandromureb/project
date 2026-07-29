@props([
    'name' => null,
    'title' => null,
    'tag' => 'section',
])

@php
    if (! in_array($tag, ['section', 'div', 'article'], true)) {
        $tag = 'section';
    }
@endphp

{{--
    id e data-scrollspy-section usam o mesmo "name" (sem slugificar) para
    casar com <x-ui.scrollspy.scrollspy-item target="..."> e com o hash da URL.
    Prefira nomes URL-safe: intro, api, getting-started.
--}}
<{{ $tag }}
    @if ($name) id="{{ $name }}" @endif
    data-scrollspy-section="{{ $name }}"
    {{ $attributes->class(['scroll-mt-4']) }}
>
    @if (filled($title))
        <h3 class="mb-3 text-base font-semibold text-foreground">{{ $title }}</h3>
    @endif

    {{ $slot }}
</{{ $tag }}>
