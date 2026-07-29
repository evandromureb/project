@php
	$status = method_exists($exception, 'getStatusCode')
		? $exception->getStatusCode()
		: 400;

	$message = filled($exception->getMessage())
		? $exception->getMessage()
		: 'A solicitação não pôde ser processada.';
@endphp

<x-layouts::error
	:code="(string) $status"
	:title="$status.' · Solicitação inválida'"
	heading="Solicitação inválida"
	:description="$message"
	icon="bi-exclamation-triangle"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
