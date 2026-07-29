<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate([
            'email' => 'adm@adm.com',
        ], [
            'uuid' => Str::uuid(),

            'name'              => 'Administrador do sistema',
            'email_verified_at' => now(),

            'status' => 'active',

            'password' => Hash::make('Pa$$w0rd!@123@!'),

            'two_factor_enabled' => false,
            'otp_code'           => null,
            'otp_created_at'     => null,

            'preferences' => [
                'theme'         => 'dark',
                'notifications' => true,
            ],

            'locale'   => 'pt_BR',
            'timezone' => 'America/Sao_Paulo',

            'force_password_change' => false,
            'password_changed_at'   => now(),

            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
