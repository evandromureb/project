@props([
	'label' => 'Drop item text',
	'icon'  => null,
	'open'  => false,
])
<li class="nav-item">
	<details @if ($open) open @endif>
		<summary class="menu-link">
			@if (filled($icon))
				<i class="bi {{ $icon }} menu-icon" aria-hidden="true"></i>
			@endif
			<span @class(['menu-label', 'sidebar-collapsed:hidden' => filled($icon)])>
				{{ $label }}
			</span>
			<i class="bi bi-chevron-right menu-arrow" aria-hidden="true"></i>
		</summary>
		<ul class="nav-submenu">
			{{ $slot }}
		</ul>
	</details>
</li>
