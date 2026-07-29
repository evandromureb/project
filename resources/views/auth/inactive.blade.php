<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Conta inativa',
	'heading' => 'Conta inativa',
	'description' => 'Esta conta está desativada e não pode ser usada no momento.',
])] class extends Component
{
	//
};
?>

<div class="flex flex-col gap-4">
	<x-ui.alert color="warning" variant="soft" :icon="true" title="Conta desativada">
		Sua conta está inativa. Para voltar a usar o sistema, reative a conta
		ou peça ajuda ao suporte.
	</x-ui.alert>

	<form class="flex flex-col gap-3" @submit.prevent>
		<x-ui.button type="submit" color="primary" block>
			Reativar conta
		</x-ui.button>

		<x-ui.button href="#" color="primary" variant="outline" block icon="bi-envelope">
			Falar com o suporte
		</x-ui.button>
	</form>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</div>
