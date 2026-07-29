<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Redefinir senha',
])] class extends Component
{
	public string $token = '';

	public string $email = '';

	public string $password = '';

	public string $password_confirmation = '';

	public function mount(?string $token = null): void
	{
		$this->token = $token ?? '';
		$this->email = (string) request()->query('email', '');
	}

	/**
	 * @return array<string, mixed>
	 */
	protected function rules(): array
	{
		return [
			'token' => ['required', 'string'],
			'email' => ['required', 'string', 'email', 'max:255'],
			'password' => [
				'required',
				'confirmed',
				PasswordRule::min(10)
					->letters()
					->mixedCase()
					->numbers()
					->symbols()
					->uncompromised(),
			],
		];
	}

	/**
	 * @return array<string, string>
	 */
	protected function validationAttributes(): array
	{
		return [
			'token' => 'token',
			'email' => 'e-mail',
			'password' => 'senha',
			'password_confirmation' => 'confirmação de senha',
		];
	}

	public function resetPassword(): void
	{
		$this->validate();

		$status = Password::reset(
			[
				'email' => $this->email,
				'password' => $this->password,
				'password_confirmation' => $this->password_confirmation,
				'token' => $this->token,
			],
			function ($user): void {
				$user->forceFill([
					'password' => $this->password,
					'remember_token' => Str::random(60),
				])->save();

				event(new PasswordReset($user));
			},
		);

		if ($status !== Password::PASSWORD_RESET) {
			$this->addError('email', $this->statusMessage($status));

			return;
		}

		Session::forget('password-reset.last-email');
		Session::flash('status', 'Senha redefinida com sucesso. Faça login com a nova senha.');

		$this->redirect(route('login', absolute: false), navigate: true);
	}

	protected function statusMessage(string $status): string
	{
		return match ($status) {
			Password::INVALID_TOKEN => 'Este link de redefinição é inválido ou expirou.',
			Password::INVALID_USER => 'Não encontramos um usuário com este e-mail.',
			Password::RESET_THROTTLED => 'Aguarde antes de tentar novamente.',
			default => 'Não foi possível redefinir a senha. Solicite um novo link.',
		};
	}
};
?>

<form class="flex flex-col gap-4" wire:submit="resetPassword">
	@if ($token === '')
		<x-ui.alert color="danger" variant="soft" :icon="true" title="Link inválido">
			Este link de redefinição está incompleto. Solicite um novo link de recuperação.
		</x-ui.alert>
	@endif
	@error('email')
		<x-ui.alert color="warning" icon>
			{{ $message }}
		</x-ui.alert>
	@enderror

	<input type="hidden" wire:model="token" />
	<input type="hidden" wire:model="email" />

	<x-forms.input-password
		name="password"
		label="Nova senha"
		mode="new"
		placeholder="Crie uma nova senha"
		:min-length="10"
		maxlength="30"
		wire:model="password"
	/>

	<x-forms.input-password
		name="password_confirmation"
		label="Confirmar senha"
		mode="new"
		placeholder="Repita a nova senha"
		:strength="false"
		:rules="false"
		:generate="false"
		maxlength="30"
		wire:model="password_confirmation"
	/>

	<x-ui.button
		type="submit"
		color="primary"
		block
		class="mt-1"
		wire:loading.attr="disabled"
		wire:target="resetPassword"
		:disabled="$token === ''"
	>
		Redefinir senha
	</x-ui.button>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</form>
