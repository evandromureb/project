@php
	$message = filled($exception->getMessage())
		? $exception->getMessage()
		: 'Você não tem permissão para acessar este recurso.';
@endphp

<x-layouts::error
	code="403"
	title="403 · Acesso negado"
	heading="Acesso negado"
	:description="$message"
	icon="bi-ban"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
