<x-layouts::error
	code="402"
	title="402 · Pagamento necessário"
	heading="Pagamento necessário"
	description="É necessário concluir o pagamento para continuar."
	icon="bi-credit-card"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
