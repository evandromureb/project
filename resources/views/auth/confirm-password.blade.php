<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Confirmar senha',
	'heading' => 'Confirme sua senha',
	'description' => 'Esta é uma área segura. Confirme sua senha antes de continuar.',
])] class extends Component
{
	//
};
?>

<form class="flex flex-col gap-4" @submit.prevent>
	<input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">

	<x-forms.input-password
		name="password"
		label="Senha"
		mode="current"
		placeholder="Digite sua senha"
	/>

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Confirmar
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</form>
