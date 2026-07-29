<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;

test('sidebar cache is populated automatically on first render', function () {
    Cache::forget('sidebarMenu');

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/')
        ->assertOk();

    expect(Cache::get('sidebarMenu'))->toBeArray()->not->toBeEmpty();
});
