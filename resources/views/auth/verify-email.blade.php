<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Component;

return new #[Layout('layouts::auth')] class extends Component
{
	public int $secondsRemaining = 0;

	public function mount(?string $id = null, ?string $hash = null): void
	{
		if ($id !== null && $hash !== null) {
			$this->verify($id, $hash);

			return;
		}

		$this->secondsRemaining = $this->remainingCooldown();
	}

	public function resend(): int
	{
		$this->secondsRemaining = $this->remainingCooldown();

		if ($this->secondsRemaining > 0) {
			return $this->secondsRemaining;
		}

		$user = Auth::user();

		abort_if($user === null, 403);

		$user->sendEmailVerificationNotification();

		RateLimiter::hit($this->throttleKey(), 60);

		$this->dispatch('toast', type: 'success', message: 'E-mail de verificação reenviado.');

		return $this->secondsRemaining = 60;
	}

	protected function verify(string $id, string $hash): void
	{
		$user = Auth::user();

		abort_unless(
			$user !== null
				&& (string) $user->getKey() === $id
				&& hash_equals(sha1($user->getEmailForVerification()), $hash),
			403
		);

		if (! $user->hasVerifiedEmail()) {
			$user->markEmailAsVerified();

			event(new Verified($user));
		}

		$this->redirect(route('dashboard', absolute: false), navigate: true);
	}

	protected function remainingCooldown(): int
	{
		return RateLimiter::availableIn($this->throttleKey());
	}

	protected function throttleKey(): string
	{
		return 'verify-email:'.Auth::id();
	}
};
?>

<div class="flex flex-col gap-4">
	<x-ui.alert color="warning" variant="solid" :icon="true" title="Quase lá">
		Antes de continuar, confirme sua conta pelo link que enviamos.
		Se não encontrar a mensagem, verifique a pasta de spam.
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

				this.startCountdown(await $wire.resend());
			},
		}"
		x-init="startCountdown(remaining)"
	>
		<x-ui.button
			type="button"
			color="primary"
			block
			x-bind:disabled="remaining > 0"
			@click="resend"
		>
			<span x-show="remaining <= 0">Reenviar e-mail de verificação</span>
			<span x-show="remaining > 0" x-cloak>Reenviar em <span x-text="remaining"></span>s</span>
		</x-ui.button>
	</div>

	<p class="m-0 text-center text-sm text-muted-foreground">
		<x-ui.link href="{{ route('login') }}" size="sm" underline="hover" icon="bi-arrow-left">
			Voltar ao login
		</x-ui.link>
	</p>
</div>
