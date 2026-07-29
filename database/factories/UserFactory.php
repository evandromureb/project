<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * @var class-string<User>
     */
    protected $model = User::class;

    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-5 years', 'now');

        $status = fake()->randomElement([
            'active',
            'pending',
            'suspended',
            'banned',
        ]);

        $isDeleted = fake()->boolean(10);

        if ($isDeleted) {
            $status = 'suspended';
        }

        $bannedAt     = null;
        $bannedReason = null;

        if ($status === 'banned') {
            $bannedAt     = fake()->dateTimeBetween($createdAt, 'now');
            $bannedReason = fake()->randomElement([
                'Violação de termos',
                'Atividade suspeita',
                'Abuso de sistema',
            ]);
        }

        $twoFactorEnabled = fake()->boolean(30);

        return [
            'uuid' => Str::uuid(),

            'name'  => fake()->name(),
            'email' => fake()->unique()->safeEmail(),

            'email_verified_at' => in_array($status, ['active', 'suspended', 'banned']) &&
            fake()->boolean(85)
                ? fake()->dateTimeBetween($createdAt, 'now')
                : null,

            'status' => $status,

            'banned_at'     => $bannedAt,
            'banned_reason' => $bannedReason,

            'password' => bcrypt('password'),

            'two_factor_enabled' => $twoFactorEnabled,

            'otp_code' => $twoFactorEnabled
                ? str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT)
                : null,

            'otp_created_at' => $twoFactorEnabled
                ? fake()->dateTimeBetween($createdAt, 'now')
                : null,

            'last_login_at' => fake()->boolean(70)
                ? fake()->dateTimeBetween($createdAt, 'now')
                : null,

            'last_login_ip' => fake()->boolean(70)
                ? fake()->ipv4()
                : null,

            'last_activity_at' => fake()->boolean(70)
                ? fake()->dateTimeBetween($createdAt, 'now')
                : null,

            'preferences' => [
                'theme'         => fake()->randomElement(['dark', 'light']),
                'notifications' => fake()->boolean(70),
            ],

            'photo' => null,

            'locale'   => 'pt_BR',
            'timezone' => 'America/Sao_Paulo',

            'password_changed_at' => fake()->boolean(60)
                ? fake()->dateTimeBetween($createdAt, 'now')
                : null,

            'force_password_change' => fake()->boolean(5),

            'created_at' => $createdAt,
            'updated_at' => $createdAt,

            'deleted_at' => $isDeleted
                ? fake()->dateTimeBetween($createdAt, 'now')
                : null,
        ];
    }

    public function active(): static
    {
        return $this->state(fn (): array => [
            'status'     => 'active',
            'deleted_at' => null,
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (): array => [
            'status'            => 'pending',
            'email_verified_at' => null,
            'deleted_at'        => null,
        ]);
    }

    public function suspended(): static
    {
        return $this->state(fn (): array => [
            'status' => 'suspended',
        ]);
    }

    public function banned(string $reason = 'Violação de termos'): static
    {
        return $this->state(fn (): array => [
            'status'        => 'banned',
            'banned_at'     => now()->subDays(rand(1, 365)),
            'banned_reason' => $reason,
            'deleted_at'    => null,
        ]);
    }

    public function deleted(): static
    {
        return $this->state(fn (): array => [
            'status'     => 'suspended',
            'deleted_at' => now()->subDays(rand(1, 365)),
        ]);
    }

    public function withTwoFactor(): static
    {
        return $this->state(fn (): array => [
            'two_factor_enabled' => true,
            'otp_code'           => str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT),
            'otp_created_at'     => now()->subMinutes(rand(1, 10)),
        ]);
    }

    public function withoutTwoFactor(): static
    {
        return $this->state(fn (): array => [
            'two_factor_enabled' => false,
            'otp_code'           => null,
            'otp_created_at'     => null,
        ]);
    }
}
