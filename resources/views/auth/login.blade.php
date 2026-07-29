<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth')] class extends Component
{
	//
};
?>

<form class="flex flex-col gap-4" @submit.prevent>
	<x-ui.alert color="danger" icon>Ocorreu um erro ao processar sua solicitação.</x-ui.alert>
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
		mode="current"
		placeholder="Digite sua senha"
	/>

	<div class="flex flex-wrap items-center justify-between gap-3">
		<x-forms.checkbox name="remember" label="Lembrar de mim" />

		<x-ui.link href="{{ route('password.request') }}" size="sm" underline="hover">
			Esqueceu a senha?
		</x-ui.link>
	</div>

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Entrar
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		Não tem uma conta?
		<x-ui.link href="{{ route('register') }}" size="sm" underline="hover">
			Cadastre-se
		</x-ui.link>
	</p>
</form>
