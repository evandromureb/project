@props([
    'title' => null,
    'code' => null,
    'heading' => null,
    'description' => null,
    'icon' => 'bi-exclamation-triangle',
])

@php
    $pageTitle = $title ?? (filled($code) ? "{$code} · ".config('app.name') : config('app.name'));
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-layouts::base.head :title="$pageTitle" />

<body class="bg-background text-foreground antialiased">
	<div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden px-4 py-10">
		{{-- Atmosphere --}}
		<div class="pointer-events-none absolute inset-0" aria-hidden="true">
			<div class="absolute -left-24 -top-24 size-72 rounded-full bg-primary/10 blur-3xl"></div>
			<div class="absolute -bottom-28 -right-20 size-80 rounded-full bg-danger/10 blur-3xl"></div>
		</div>

		<div class="absolute right-4 top-4 z-10 sm:right-6 sm:top-6">
			<x-layouts::header.theme-mode />
		</div>

		<div class="relative z-10 flex w-full max-w-lg flex-col items-center gap-6 text-center">
			<a href="{{ url('/') }}" class="flex items-center justify-center" aria-label="{{ config('app.name') }}">
				<x-layouts::brand-logo class="h-9 w-auto max-w-48 object-contain" />
			</a>

			<div class="card w-full shadow-card">
				<div class="card-body flex flex-col items-center gap-5 p-6 sm:p-8">
					@if (filled($code))
						<p class="m-0 text-6xl font-semibold tracking-tight text-primary sm:text-7xl" aria-hidden="true">
							{{ $code }}
						</p>
					@elseif (filled($icon))
						<span class="flex size-14 items-center justify-center rounded-2xl bg-primary/15 text-primary ring-1 ring-primary/15" aria-hidden="true">
							<i class="bi {{ $icon }} text-2xl leading-none"></i>
						</span>
					@endif

					@if (filled($heading) || filled($description))
						<div class="flex flex-col gap-2">
							@if (filled($heading))
								<h1 class="m-0 text-xl font-semibold tracking-tight text-foreground sm:text-2xl">
									{{ $heading }}
								</h1>
							@endif

							@if (filled($description))
								<p class="m-0 text-sm leading-relaxed text-muted-foreground">
									{{ $description }}
								</p>
							@endif
						</div>
					@endif

					@if ($slot->isNotEmpty())
						<div class="flex w-full flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
							{{ $slot }}
						</div>
					@else
						<div class="flex w-full flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
							<x-ui.button :href="url('/')" color="primary" icon="bi-house">
								Voltar ao início
							</x-ui.button>
						</div>
					@endif
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
