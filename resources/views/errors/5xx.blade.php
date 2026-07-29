@php
	$status = method_exists($exception, 'getStatusCode')
		? $exception->getStatusCode()
		: 500;
@endphp

<x-layouts::error
	:code="(string) $status"
	:title="$status.' · Erro do servidor'"
	heading="Erro do servidor"
	description="Ocorreu um problema ao processar sua solicitação. Tente novamente em instantes."
	icon="bi-server"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
