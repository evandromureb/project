<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Verificar e-mail',
	'heading' => 'Verifique seu e-mail',
	'description' => 'Enviamos um link de verificação para o seu endereço de e-mail.',
])] class extends Component
{
	//
};
?>

<div class="flex flex-col gap-4">
	<x-ui.alert color="info" variant="soft" :icon="true" title="Quase lá">
		Antes de continuar, confirme sua conta pelo link que enviamos.
		Se não encontrar a mensagem, verifique a pasta de spam.
	</x-ui.alert>

	<form class="flex flex-col gap-4" @submit.prevent>
		<x-ui.button type="submit" color="primary" block>
			Reenviar e-mail de verificação
		</x-ui.button>
	</form>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</div>
