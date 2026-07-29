<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Nova senha',
	'heading' => 'Defina sua senha',
	'description' => 'Crie uma senha segura para acessar a sua conta.',
])] class extends Component
{
	//
};
?>

<form class="flex flex-col gap-4" @submit.prevent>
	<input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">

	<x-forms.input-password
		name="password"
		label="Nova senha"
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

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Salvar senha
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</form>
