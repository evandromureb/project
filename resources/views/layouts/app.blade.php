@php
    if (!Cache::get('sidebarMenu')) {
		buildSidebarExportTree();
    }
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<x-layouts::base.head :title="$title ?? null" />

    <body
        class="overflow-x-clip bg-sidebar text-foreground antialiased"
        data-app-topbar-fixed="true"
        data-app-footer-fixed="false"
        data-app-sidebar-minimized="false"
    >
        <div id="layout-wrapper" class="min-h-screen">
			<x-layouts::sidebar._sidebar />
			<x-layouts::header._header />
            <div class="main-content flex min-w-0 flex-col transition-[padding] duration-200 lg:pl-64 sidebar-collapsed:lg:pl-18 topbar-fixed:min-h-screen topbar-fixed:pt-16 topbar-static:min-h-[calc(100vh-4rem)] footer-fixed:pb-20 footer-fixed:sm:pb-14">
                @unless (($hidePageHeader ?? false) === true)
                    <div class="page-title-box flex min-h-16 shrink-0 flex-col justify-center gap-3 bg-popover px-4 py-3 sm:min-h-20 sm:flex-row sm:items-center sm:justify-between sm:gap-4 sm:px-6 sm:py-4 dark:bg-sidebar">
                        <div class="flex min-w-0 items-center gap-3 sm:gap-3.5">
                            <span class="flex size-9 shrink-0 items-center justify-center rounded-xl bg-primary/15 text-primary ring-1 ring-primary/15 sm:size-11" aria-hidden="true">
                                <i class="bi bi-grid-1x2-fill text-lg leading-none sm:text-xl"></i>
                            </span>
                            <div class="min-w-0">
                                <h1 class="truncate text-base font-semibold leading-tight tracking-tight text-popover-foreground sm:text-lg dark:text-foreground">
									{{ getCurrentTitle(Route::currentRouteName() ?? '') }}
                                </h1>
								@if (filled(getCurrentDescription(Route::currentRouteName() ?? '')))
									<p class="mt-1 line-clamp-2 text-sm leading-snug text-muted-foreground sm:line-clamp-1 sm:leading-none">
										{{ getCurrentDescription(Route::currentRouteName() ?? '') }}
									</p>
								@endif
                            </div>
                        </div>
                        <div class="page-title-right hidden sm:block">
							<x-ui.breadcrumb variant="soft">
								<x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
								<x-ui.breadcrumb.breadcrumb-item href="#">Projetos</x-ui.breadcrumb.breadcrumb-item>
								<x-ui.breadcrumb.breadcrumb-item active>Board</x-ui.breadcrumb.breadcrumb-item>
							</x-ui.breadcrumb>
                        </div>
                    </div>
                @endunless
                <div class="page-content min-w-0 flex-1 overflow-x-clip bg-background lg:rounded-l-xl">
                    <div class="w-full min-w-0 p-4 sm:p-6">
                        {{ $slot }}
                    </div>
                </div>
				<x-layouts::base.footer />
				<x-layouts::base.scroll-to-top />
            </div>
        </div>
        <x-ui.toast-container />
        <x-layouts::base.scripts />
    </body>
</html>
