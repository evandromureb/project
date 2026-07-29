<header
	id="page-topbar"
	class="rounded-bl-xl border-b border-border bg-header transition-[left,margin] duration-200
	       topbar-fixed:fixed topbar-fixed:inset-x-0 topbar-fixed:top-0 topbar-fixed:z-20
	       topbar-fixed:lg:left-64 topbar-fixed:sidebar-collapsed:lg:left-18
	       topbar-static:relative topbar-static:z-20
	       topbar-static:lg:ml-64 topbar-static:sidebar-collapsed:lg:ml-18"
>
	<div class="navbar-header flex h-16 items-center gap-2 px-3 sm:gap-4 sm:px-4 lg:px-6">
		<button
			type="button"
			data-sidebar-toggle
			class="btn-icon shrink-0"
			aria-label="Alternar menu lateral"
		>
			<i class="bi bi-list text-xl leading-none" aria-hidden="true"></i>
		</button>

		<x-layouts::header.logo />

		<div class="ml-auto flex items-center gap-1 sm:gap-2">
			<x-layouts::header.theme-mode />
			<x-layouts::header.monochrome-mode />
			<x-layouts::header.user._user />
			<x-layouts::header.full-theme />
		</div>
	</div>
</header>
