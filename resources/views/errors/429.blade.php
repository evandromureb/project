<x-layouts::error
	code="429"
	title="429 · Muitas solicitações"
	heading="Muitas solicitações"
	description="Você fez muitas requisições em pouco tempo. Aguarde um momento e tente novamente."
	icon="bi-hourglass-split"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
