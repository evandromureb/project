<?php

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Livewire;

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    Livewire::test('auth::login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticatedAs($user);
});

test('users cannot authenticate with invalid password', function () {
    $user = User::factory()->create();

    Livewire::test('auth::login')
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('login')
        ->assertHasErrors('email');

    $this->assertGuest();
});

test('login is throttled after 3 failed attempts', function () {
    $user = User::factory()->create();

    foreach (range(1, 3) as $attempt) {
        Livewire::test('auth::login')
            ->set('email', $user->email)
            ->set('password', 'wrong-password')
            ->call('login')
            ->assertHasErrors('email');
    }

    $key = Str::transliterate(Str::lower($user->email).'|127.0.0.1');
    expect(RateLimiter::tooManyAttempts($key, 3))->toBeTrue();

    Livewire::test('auth::login')
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors('email');

    $this->assertGuest();
});
