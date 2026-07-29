<?php

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Livewire\Livewire;

test('email is verified when visiting a valid signed link', function () {
    Event::fake([Verified::class]);

    $user = User::factory()->unverified()->create();

    $url = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $this->actingAs($user)->get($url)->assertRedirect(route('dashboard', absolute: false));

    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
    Event::assertDispatched(Verified::class);
});

test('email is not verified with an invalid hash', function () {
    $user = User::factory()->unverified()->create();

    $url = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)->get($url)->assertForbidden();

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

test('resend button sends the notification and starts a 60 second cooldown', function () {
    Notification::fake();

    $user = User::factory()->unverified()->create();

    Livewire::actingAs($user)
        ->test('auth::verify-email')
        ->call('resend')
        ->assertSet('secondsRemaining', 60);

    Notification::assertSentTo($user, VerifyEmail::class);
});

test('resend is blocked before the 60 second cooldown elapses', function () {
    Notification::fake();

    $user = User::factory()->unverified()->create();

    $component = Livewire::actingAs($user)->test('auth::verify-email');

    $component->call('resend');
    $component->call('resend');

    Notification::assertSentToTimes($user, VerifyEmail::class, 1);
});
