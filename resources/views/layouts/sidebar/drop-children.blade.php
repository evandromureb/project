@props([
	'items' => [],
])

@foreach ($items as $item)
	@if (($item['type'] ?? null) === 'drop')
		@php
			$nestedOpen = sidebarDropContainsActiveRoute($item['items'] ?? []);
		@endphp
		<x-layouts::sidebar.drop
			:label="$item['label']"
			:icon="$item['icon'] ?? null"
			:open="$nestedOpen"
		>
			<x-layouts::sidebar.drop-children :items="$item['items'] ?? []" />
		</x-layouts::sidebar.drop>
	@elseif (($item['type'] ?? null) === 'drop-item')
		<x-layouts::sidebar.drop-item
			:label="$item['label']"
			:route="$item['route']"
		/>
	@endif
@endforeach
