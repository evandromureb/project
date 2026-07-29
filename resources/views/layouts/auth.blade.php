<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-layouts::base.head :title="$title ?? null" />

	<body class="bg-background text-foreground antialiased">
		<div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden px-4 py-10">
			<div class="pointer-events-none absolute inset-0" aria-hidden="true">
				<div class="absolute -left-24 -top-24 size-72 rounded-full bg-primary/10 blur-3xl"></div>
				<div class="absolute -bottom-28 -right-20 size-80 rounded-full bg-info/10 blur-3xl"></div>
			</div>

			<div class="absolute right-4 top-4 z-10 sm:right-6 sm:top-6">
				<x-layouts::header.theme-mode />
			</div>

			<div class="relative z-10 flex w-full max-w-md flex-col items-center gap-6">
				<a href="{{ route('dashboard') }}" class="flex items-center justify-center" aria-label="{{ config('app.name') }}">
					<x-layouts::brand-logo class="h-10 w-auto max-w-xs object-contain sm:h-12" />
				</a>
				<div class="card w-full shadow-card">
					<div class="card-body flex flex-col gap-6 p-6 sm:p-8">
						@if (filled(getCurrentTitle(Route::currentRouteName() ?? '') ?? null) || filled(getCurrentTitle(Route::currentRouteName() ?? '') ?? null))
							<div class="flex flex-col gap-2 text-center">
								@if (filled(getCurrentTitle(Route::currentRouteName() ?? '') ?? null))
									<h1 class="m-0 text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
										{{ getCurrentTitle(Route::currentRouteName() ?? '') }}
									</h1>
								@endif

								@if (filled(getCurrentDescription(Route::currentRouteName() ?? '') ?? null))
									<p class="m-0 text-sm leading-relaxed text-muted-foreground">
										{{ getCurrentDescription(Route::currentRouteName() ?? '') }}
									</p>
								@endif
							</div>
						@endif

						{{ $slot }}
					</div>
				</div>

				<p class="m-0 text-center text-xs text-muted-foreground">
					&copy; {{ now()->year }} {{ config('app.name') }}
				</p>
			</div>
		</div>

		<x-layouts::base.scripts />
	</body>
</html>
