<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth')] class extends Component
{
	public string $email = '';

	public string $password = '';

	public bool $remember = false;

	/**
	 * @return array<string, mixed>
	 */
	protected function rules(): array
	{
		return [
			'email' => [
				'required',
				'string',
				'email',
				'max:255',
			],
			'password' => [
				'required',
				'string',
			],
		];
	}

	/**
	 * @return array<string, string>
	 */
	protected function validationAttributes(): array
	{
		return [
			'email' => 'e-mail',
			'password' => 'senha',
		];
	}

	public function login(): void
	{
		$this->validate();

		$this->ensureIsNotRateLimited();

		if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
			RateLimiter::hit($this->throttleKey());

			throw ValidationException::withMessages([
				'email' => 'Estas credenciais não conferem com nossos registros.',
			]);
		}

		RateLimiter::clear($this->throttleKey());
		Session::regenerate();

		$this->redirect(route('dashboard', absolute: false), navigate: true);
	}

	protected function ensureIsNotRateLimited(): void
	{
		if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
			return;
		}

		$seconds = RateLimiter::availableIn($this->throttleKey());

		throw ValidationException::withMessages([
			'email' => "Muitas tentativas de login. Tente novamente em {$seconds} segundos.",
		]);
	}

	protected function throttleKey(): string
	{
		return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
	}
};
?>

<form class="flex flex-col gap-4" wire:submit="login">

	@if (session()->has('status'))
		<x-ui.alert color="primary" icon>
			{{ session('status') }}
		</x-ui.alert>
	@endif

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
		mode="current"
		placeholder="Digite sua senha"
		wire:model="password"
	/>

	<div class="flex flex-wrap items-center justify-between gap-3">
		<x-forms.checkbox name="remember" label="Lembrar de mim" wire:model="remember" />

		<x-ui.link href="{{ route('password.request') }}" size="sm" underline="hover">
			Esqueceu a senha?
		</x-ui.link>
	</div>

	<x-ui.button type="submit" color="primary" block class="mt-1" wire:loading.attr="disabled" wire:target="login">
		Entrar
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		Não tem uma conta?
		<x-ui.link href="{{ route('register') }}" size="sm" underline="hover">
			Cadastre-se
		</x-ui.link>
	</p>
</form>
