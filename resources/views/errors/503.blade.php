<x-layouts::error
	code="503"
	title="503 · Em manutenção"
	heading="Em manutenção"
	description="Estamos realizando melhorias no sistema. Voltamos em breve — obrigado pela paciência."
	icon="bi-tools"
>
	<x-ui.button type="button" color="primary" icon="bi-arrow-clockwise" onclick="window.location.reload()">
		Tentar novamente
	</x-ui.button>
</x-layouts::error>
