
@props([
	'label'		=> 'Text separator'
])

<p
	data-sidebar-section-label
	class="cursor-default px-2 text-[11px] font-bold uppercase tracking-wider text-sidebar-foreground sidebar-collapsed:hidden"
>
	{{ $label }}
</p>
