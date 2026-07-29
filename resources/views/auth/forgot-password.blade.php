<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Recuperar senha',
	'heading' => 'Esqueceu sua senha?',
	'description' => 'Informe seu e-mail e enviaremos um link para redefinir a senha.',
])] class extends Component
{
	//
};
?>

<form class="flex flex-col gap-4" @submit.prevent>
	<x-forms.input
		type="email"
		name="email"
		label="E-mail"
		placeholder="voce@empresa.com"
		icon="bi-envelope"
		autocomplete="username"
	/>

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Enviar link de recuperação
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		Lembrou a senha?
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover">
			Voltar ao login
		</x-ui.link>
	</p>
</form>
