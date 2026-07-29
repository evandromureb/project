<x-layouts::error
	code="404"
	title="404 · Página não encontrada"
	heading="Página não encontrada"
	description="O endereço que você tentou acessar não existe ou foi movido."
	icon="bi-search"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
