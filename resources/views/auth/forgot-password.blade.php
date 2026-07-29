<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth', [
	'title' => 'Recuperar senha',
	'heading' => 'Esqueceu sua senha?',
	'description' => 'Informe seu e-mail e enviaremos um link para redefinir a senha.',
])] class extends Component
{
	public string $email = '';

	public bool $linkSent = false;

	public int $secondsRemaining = 0;

	public function mount(): void
	{
		$lastEmail = session('password-reset.last-email');

		if (! is_string($lastEmail) || $lastEmail === '') {
			return;
		}

		$this->email = $lastEmail;
		$this->linkSent = true;
		$this->secondsRemaining = $this->remainingCooldown();
	}

	/**
	 * @return array<string, mixed>
	 */
	protected function rules(): array
	{
		return [
			'email' => ['required', 'string', 'email'],
		];
	}

	/**
	 * @return array<string, string>
	 */
	protected function validationAttributes(): array
	{
		return [
			'email' => 'e-mail',
		];
	}

	public function sendResetLink(): int
	{
		$this->validate();

		$this->secondsRemaining = $this->remainingCooldown();

		if ($this->secondsRemaining > 0) {
			return $this->secondsRemaining;
		}

		Password::sendResetLink(['email' => $this->email]);

		RateLimiter::hit($this->throttleKey(), 60);

		session(['password-reset.last-email' => $this->email]);

		$this->linkSent = true;

		return $this->secondsRemaining = 60;
	}

	protected function remainingCooldown(): int
	{
		return RateLimiter::availableIn($this->throttleKey());
	}

	protected function throttleKey(): string
	{
		return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
	}
};
?>

<div class="flex flex-col gap-4">
	@if (! $linkSent)
		<form class="flex flex-col gap-4" wire:submit="sendResetLink">
			<x-forms.input
				type="email"
				name="email"
				label="E-mail"
				placeholder="voce@empresa.com"
				icon="bi-envelope"
				autocomplete="username"
				wire:model="email"
			/>

			<x-ui.button type="submit" color="primary" block class="mt-1" wire:loading.attr="disabled" wire:target="sendResetLink">
				Enviar link de recuperação
			</x-ui.button>
		</form>
	@else
		<x-ui.alert color="success" variant="soft" :icon="true" title="Link enviado">
			Se o e-mail informado existir em nossa base, enviamos um link de recuperação para <strong>{{ $email }}</strong>.
		</x-ui.alert>

		<div
			class="flex flex-col gap-4"
			x-data="{
				remaining: {{ $secondsRemaining }},
				timer: null,
				startCountdown(seconds) {
					this.remaining = Math.max(0, Number(seconds) || 0);
					clearInterval(this.timer);

					if (this.remaining <= 0) {
						return;
					}

					this.timer = setInterval(() => {
						this.remaining = Math.max(0, this.remaining - 1);

						if (this.remaining <= 0) {
							clearInterval(this.timer);
						}
					}, 1000);
				},
				async resend() {
					if (this.remaining > 0) {
						return;
					}

					this.startCountdown(await $wire.sendResetLink());
				},
			}"
			x-init="startCountdown(remaining)"
		>
			<x-ui.button
				type="button"
				color="primary"
				variant="outline"
				block
				x-bind:disabled="remaining > 0"
				@click="resend"
			>
				<span x-show="remaining <= 0">Reenviar link de recuperação</span>
				<span x-show="remaining > 0" x-cloak>Reenviar em <span x-text="remaining"></span>s</span>
			</x-ui.button>
		</div>
	@endif

	<p class="m-0 text-center text-sm text-muted-foreground">
		Lembrou a senha?
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover">
			Voltar ao login
		</x-ui.link>
	</p>
</div>
