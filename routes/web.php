<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function (): void {
    Route::livewire('/', 'dashboard')->name('dashboard');

    Route::livewire('/app', 'dashboard')->name('app');

    Route::livewire('/app1', 'dashboard')->name('app1');
    Route::livewire('/app2', 'dashboard')->name('app2');
    Route::livewire('/app3', 'dashboard')->name('app3');

    Route::livewire('/app4', 'dashboard')->name('app4');

    Route::livewire('/settings/sidebar', 'settings::sidebar')->name('settings.sidebar');
});

require __DIR__ . '/auth.php';
