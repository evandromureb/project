<x-layouts::error
	code="500"
	title="500 · Erro interno"
	heading="Erro interno do servidor"
	description="Ocorreu um problema inesperado. Nossa equipe já foi notificada — tente novamente em instantes."
	icon="bi-exclamation-octagon"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
