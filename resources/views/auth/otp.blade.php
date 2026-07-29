<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Código de verificação',
	'heading' => 'Verificação',
	'description' => 'Digite o código de 6 dígitos enviado para o seu e-mail ou celular.',
])] class extends Component
{
	//
};
?>

<form class="flex flex-col gap-4" @submit.prevent>
	<x-forms.input-otp
		name="otp"
		label="Código de verificação"
		:length="6"
		:group="3"
		separator="–"
		resend
		:resend-seconds="60"
		resend-label="Reenviar código"
		center
		autofocus
	/>

	<x-ui.button type="submit" color="primary" block class="mt-1">
		Verificar
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</form>
