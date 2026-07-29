<x-layouts::error
	code="502"
	title="502 · Gateway inválido"
	heading="Gateway inválido"
	description="O servidor recebeu uma resposta inválida ao processar sua solicitação. Tente novamente em breve."
	icon="bi-hdd-network"
>
	<x-ui.button :href="url('/')" color="primary" icon="bi-house">
		Voltar ao início
	</x-ui.button>
</x-layouts::error>
