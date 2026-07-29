@props([
	'title' => null,
])

<head {{ $attributes }}>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? config('app.name') }}</title>
	<link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
	<link rel="icon" href="{{ asset('favicon-32.png') }}" type="image/png" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('assets/images/logo/icon-mark.png') }}">
	<script>
		(function () {
			var theme = localStorage.getItem('theme');
			var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
			if (theme ? theme === 'dark' : prefersDark) {
				document.documentElement.classList.add('dark');
			}

			var themeName = localStorage.getItem('theme-name');
			if (themeName && themeName !== 'default') {
				document.documentElement.dataset.theme = themeName;
			}
		})();
	</script>
	@vite(['resources/css/app.css'])
	@livewireStyles
</head>
