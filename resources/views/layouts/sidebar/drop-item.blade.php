
@props([
	'route'		=> 'dashboard',
	'href'		=> null,
	'spa'		=> true,
	'icon'		=> 'bi-info-circle',
	'label'		=> 'Item text',
	'active'	=> false
])

@php
	if (is_null($href)) {
		$href = route($route);
	}
	if (request()->url() === route($route)) {
		$active = true;
	}
@endphp

<li class="nav-item @if($active) active @endif">
	<a
		href="{{ $href }}"
		class="menu-link"
		@if($spa) wire:navigate @endif
	>
		<span class="menu-label">
			{{ $label }}
		</span>
	</a>
</li>
