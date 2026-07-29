@php use App\Support\UiDocsReference;use Illuminate\Support\Str; @endphp
@props([
    'reference' => null,
    'name' => null,
    'component' => null,
    'title' => null,
])

@php
	$key = $reference ?? $name ?? '';
	$data = filled($key) || filled($component)
		? UiDocsReference::load((string) $key, $component, $title)
		: [
			'title' => null,
			'sections' => [],
			'references' => [],
		];
	$sections = $data['sections'] ?? [];
	$references = $data['references'] ?? [];
	$componentTitle = trim((string) ($data['title'] ?? $title ?? ''), '`');
@endphp

@if ($sections !== [] || $references !== [])
	@foreach ($sections as $index => $section)
		<x-ui.docs.section
			:name="$section['id']"
			:title="$section['title']"
			group="component-api"
			:group-label="$index === 0 ? 'Componente de API' : null"
			framed
		>
			@if ($index === 0 && filled($componentTitle))
				<p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
					Referência de API para <code>{{ $componentTitle }}</code>.
				</p>
			@endif

			{!! $section['bodyHtml'] !!}
		</x-ui.docs.section>
	@endforeach

	@foreach ($references as $index => $ref)
		<x-ui.docs.section
			:name="'reference-'.Str::slug($ref['label'])"
			:title="$ref['label']"
			group="references"
			:group-label="$index === 0 ? 'Referência' : null"
			framed
		>
			<p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline">
				<a href="{{ $ref['url'] }}" target="_blank" rel="noopener">{{ $ref['url'] }}</a>
			</p>
		</x-ui.docs.section>
	@endforeach
@endif
