@php
	$data = Cache::get('sidebarMenu');
@endphp

<div
    data-sidebar-overlay
    class="fixed inset-0 z-30 hidden bg-foreground/50 sidebar-open:block lg:hidden"
>
</div>

<aside
    class="app-menu fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col
           bg-sidebar transition-all duration-200 sidebar-open:translate-x-0
           lg:translate-x-0 sidebar-collapsed:w-18"
    aria-label="Menu principal"
>
    <div class="navbar-brand-box flex h-16 shrink-0 items-center justify-center px-4 sidebar-collapsed:px-2">
        <a href="{{ route('dashboard') }}" class="flex items-center overflow-hidden" aria-label="Página inicial">
            <span data-sidebar-brand-logo class="flex items-center sidebar-collapsed:hidden">
                <x-layouts::brand-logo class="h-9 w-auto max-w-[11rem] shrink-0 object-contain object-left" />
            </span>
            <img
                src="{{ asset('assets/images/logo/icon-mark.png') }}"
                alt="{{ config('app.name') }}"
                data-sidebar-brand-mark
                class="hidden size-9 shrink-0 object-contain sidebar-collapsed:block"
            >
        </a>
    </div>

    <nav id="scrollbar" class="flex-1 overflow-y-auto px-3 py-4" aria-label="Navegação da aplicação">
		@foreach($data as $item)
			<ul class="sidebar-menu">
				@if($item['type'] === 'separator')
					<x-layouts::sidebar.text-separator
						label="{{ $item['text'] }}"
					/>
				@endif
				@if($item['type'] === 'item')
					<x-layouts::sidebar.item
						label="{{ $item['label'] }}"
						route="{{ $item['route'] }}"
						icon="{{ $item['icon'] }}"
					/>
				@endif
				@if($item['type'] === 'drop')
					@php
						$dropOpen = sidebarDropContainsActiveRoute($item['items'] ?? []);
					@endphp
					<x-layouts::sidebar.drop
						:label="$item['label']"
						:icon="$item['icon'] ?? null"
						:open="$dropOpen"
					>
						<x-layouts::sidebar.drop-children :items="$item['items'] ?? []" />
					</x-layouts::sidebar.drop>
				@endif
			</ul>
		@endforeach
    </nav>
</aside>
