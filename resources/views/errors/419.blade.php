<x-layouts::error
	code="419"
	title="419 · Página expirada"
	heading="Página expirada"
	description="Sua sessão expirou por inatividade. Atualize a página e tente novamente."
	icon="bi-clock-history"
>
	<x-ui.button type="button" color="primary" icon="bi-arrow-clockwise" onclick="window.location.reload()">
		Atualizar página
	</x-ui.button>
	<x-ui.button :href="url('/')" color="secondary" variant="soft" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
