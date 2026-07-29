<?php

use App\Models\User;
use App\Rules\CompleteNameAndLastname;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth')]
class extends Component {
	public string $name = '';

	public string $email = '';

	public string $password = '';

	public string $password_confirmation = '';

	public bool $terms = false;

	/**
	 * @return array<string, mixed>
	 */
	protected function rules(): array
	{
		return [
			'name' => [
				'required',
				'string',
				'min:5',
				'max:255',
				new CompleteNameAndLastname(),
			],
			'email' => 'required|email|max:255|unique:users,email',
			'password' => [
				'required',
				'confirmed',
				Password::min(10)
					->letters()
					->mixedCase()
					->numbers()
					->symbols()
					->uncompromised(),
			],
			'terms' => 'accepted',
		];
	}

	/**
	 * @return array<string, string>
	 */
	protected function validationAttributes(): array
	{
		return [
			'name' => 'nome completo',
			'email' => 'Seu e-mail',
			'email_confirmation' => 'Confirme seu e-mail',
			'password' => 'Sua senha',
			'password_confirmation' => 'Confirme sua senha',
			'terms' => 'Aceitar os termos de uso',
		];
	}

	public function register(): void
	{
		$validated = $this->validate();

		$user = User::create([
			'name' => $validated['name'],
			'email' => $validated['email'],
			'password' => $validated['password'],
		]);

		event(new Registered($user));

		Auth::login($user);
		Session::regenerate();

		$this->redirect(route('dashboard', absolute: false), navigate: true);
	}
};
?>

<form class="flex flex-col gap-4" wire:submit="register">
	<x-forms.input
		type="text"
		name="name"
		label="Nome"
		placeholder="Seu nome completo"
		icon="bi-person"
		autocomplete="name"
		wire:model="name"
	/>

	<x-forms.input
		type="email"
		name="email"
		label="E-mail"
		placeholder="voce@empresa.com"
		icon="bi-envelope"
		autocomplete="username"
		wire:model="email"
	/>

	<x-forms.input-password
		name="password"
		label="Senha"
		mode="new"
		placeholder="Crie uma senha"
		maxlength="30"
		wire:model="password"
	/>

	<x-forms.input-password
		name="password_confirmation"
		label="Confirmar senha"
		mode="new"
		placeholder="Repita a senha"
		:strength="false"
		:rules="false"
		:generate="false"
		maxlength="30"
		wire:model="password_confirmation"
	/>

	<x-forms.checkbox name="terms" label="Aceito os termos de uso e a política de privacidade" wire:model="terms" />

	<x-ui.button type="submit" color="primary" block class="mt-1" wire:loading.attr="disabled" wire:target="register">
		Criar conta
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		Já tem uma conta?
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover">
			Entrar
		</x-ui.link>
	</p>
</form>
