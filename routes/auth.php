<?php

use Illuminate\Support\Facades\Route;

Route::livewire('auth/login', 'auth::login')->name('login');
Route::livewire('auth/register', 'auth::register')->name('register');
Route::livewire('auth/forgot-password', 'auth::forgot-password')->name('password.request');
Route::livewire('auth/reset-password/{token?}', 'auth::reset-password')->name('password.reset');
Route::livewire('auth/verify-email', 'auth::verify-email')->name('verification.notice');
Route::livewire('auth/confirm-password', 'auth::confirm-password')->name('password.confirm');
Route::livewire('auth/new-password', 'auth::new-password')->name('password.new');
Route::livewire('auth/otp', 'auth::otp')->name('otp');
Route::livewire('auth/blocked', 'auth::blocked')->name('blocked');
Route::livewire('auth/inactive', 'auth::inactive')->name('inactive');
