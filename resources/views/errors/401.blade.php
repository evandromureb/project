<x-layouts::error
	code="401"
	title="401 · Não autorizado"
	heading="Não autorizado"
	description="Você precisa autenticar-se para acessar este recurso."
	icon="bi-shield-lock"
>
	<x-ui.button :href="route('login')" color="primary" icon="bi-box-arrow-in-right">
		Fazer login
	</x-ui.button>
	<x-ui.button :href="url('/')" color="secondary" variant="soft" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
