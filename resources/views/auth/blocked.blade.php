<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Conta bloqueada',
	'heading' => 'Conta bloqueada',
	'description' => 'O acesso a esta conta foi temporariamente suspenso.',
])] class extends Component
{
	//
};
?>

<div class="flex flex-col gap-4">
	<x-ui.alert color="danger" variant="soft" :icon="true" title="Acesso negado">
		Sua conta está bloqueada. Isso pode acontecer por segurança, violações
		das regras de uso ou solicitação administrativa.
		Entre em contato com o suporte se achar que isso foi um engano.
	</x-ui.alert>

	<x-ui.button href="#" color="primary" variant="outline" block icon="bi-envelope">
		Falar com o suporte
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</div>
