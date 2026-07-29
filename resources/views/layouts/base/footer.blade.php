{{-- Footer: fixed/static via data-app-footer-fixed no <body> --}}
<footer class="footer bg-footer px-4 py-4 text-sm text-footer-foreground transition-[left] duration-200 lg:px-6
               footer-fixed:fixed footer-fixed:inset-x-0 footer-fixed:bottom-0 footer-fixed:z-20
               footer-fixed:border-t footer-fixed:border-border
               footer-fixed:lg:left-64 footer-fixed:sidebar-collapsed:lg:left-18">
	<div class="container-fluid flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
		<span>&copy; {{ now()->year }} {{ config('app.name') }}</span>
		<span>Desenvolvido com Laravel &amp; Livewire</span>
	</div>
</footer>
