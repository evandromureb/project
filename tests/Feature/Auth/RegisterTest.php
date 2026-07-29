<?php

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;

beforeEach(function () {
    Http::fake([
        'api.pwnedpasswords.com/*' => Http::response('', 200),
    ]);
});

test('users can register using the registration screen', function () {
    Livewire::test('auth::register')
        ->set('name', 'Maria Silva')
        ->set('email', 'maria@example.com')
        ->set('password', 'Str0ng!Passw0rd')
        ->set('password_confirmation', 'Str0ng!Passw0rd')
        ->set('terms', true)
        ->call('register')
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();

    expect(User::query()->where('email', 'maria@example.com')->exists())->toBeTrue();
});

test('registration requires the terms to be accepted', function () {
    Livewire::test('auth::register')
        ->set('name', 'Maria Silva')
        ->set('email', 'maria@example.com')
        ->set('password', 'Str0ng!Passw0rd')
        ->set('password_confirmation', 'Str0ng!Passw0rd')
        ->set('terms', false)
        ->call('register')
        ->assertHasErrors('terms');

    $this->assertGuest();
});

test('registration requires a full name with first and last name', function () {
    Livewire::test('auth::register')
        ->set('name', 'Maria')
        ->set('email', 'maria@example.com')
        ->set('password', 'Str0ng!Passw0rd')
        ->set('password_confirmation', 'Str0ng!Passw0rd')
        ->set('terms', true)
        ->call('register')
        ->assertHasErrors('name');

    $this->assertGuest();
});

test('registration requires matching password confirmation', function () {
    Livewire::test('auth::register')
        ->set('name', 'Maria Silva')
        ->set('email', 'maria@example.com')
        ->set('password', 'Str0ng!Passw0rd')
        ->set('password_confirmation', 'different-password')
        ->set('terms', true)
        ->call('register')
        ->assertHasErrors('password');

    $this->assertGuest();
});

test('registration requires a unique email', function () {
    User::factory()->create(['email' => 'maria@example.com']);

    Livewire::test('auth::register')
        ->set('name', 'Maria Silva')
        ->set('email', 'maria@example.com')
        ->set('password', 'Str0ng!Passw0rd')
        ->set('password_confirmation', 'Str0ng!Passw0rd')
        ->set('terms', true)
        ->call('register')
        ->assertHasErrors('email');

    $this->assertGuest();
});
