@props([
	'class' => 'h-8 w-auto max-w-40 object-contain object-left',
])

<img
	src="{{ asset('assets/images/logo/light.png') }}"
	alt=""
	aria-hidden="true"
	{{ $attributes->class([$class, 'dark:hidden']) }}
>
<img
	src="{{ asset('assets/images/logo/dark.png') }}"
	alt=""
	aria-hidden="true"
	{{ $attributes->class(['hidden', $class, 'dark:block']) }}
>
