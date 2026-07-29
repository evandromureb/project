<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Redefinir senha',
	'heading' => 'Redefinir senha',
	'description' => 'Escolha uma nova senha para a sua conta.',
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

	<x-forms.input-password
		name="password"
		label="Nova senha"
		mode="new"
		placeholder="Crie uma nova senha"
	/>

	<x-forms.input-password
		name="password_confirmation"
		label="Confirmar senha"
		mode="new"
		placeholder="Repita a nova senha"
		:strength="false"
		:rules="false"
		:generate="false"
	/>

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Redefinir senha
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</form>
