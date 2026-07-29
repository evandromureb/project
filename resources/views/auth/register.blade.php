<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Cadastro',
	'heading' => 'Crie sua conta',
	'description' => 'Preencha os dados abaixo para começar.',
])] class extends Component
{
	//
};
?>

<form class="flex flex-col gap-4" @submit.prevent>
	<x-forms.input
		type="text"
		name="name"
		label="Nome"
		placeholder="Seu nome completo"
		icon="bi-person"
		autocomplete="name"
	/>

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
		label="Senha"
		mode="new"
		placeholder="Crie uma senha"
	/>

	<x-forms.input-password
		name="password_confirmation"
		label="Confirmar senha"
		mode="new"
		placeholder="Repita a senha"
		:strength="false"
		:rules="false"
		:generate="false"
	/>

	<x-forms.checkbox name="terms" label="Aceito os termos de uso e a política de privacidade" />

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Criar conta
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		Já tem uma conta?
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover">
			Entrar
		</x-ui.link>
	</p>
</form>
