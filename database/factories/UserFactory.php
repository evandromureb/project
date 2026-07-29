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
        $createdAt = $this->faker->dateTimeBetween('-5 years', 'now');

        $status = $this->faker->randomElement([
            'active',
            'pending',
            'suspended',
            'banned',
        ]);

        $isDeleted = $this->faker->boolean(10);

        if ($isDeleted) {
            $status = 'suspended';
        }

        $bannedAt = null;
        $bannedReason = null;

        if ($status === 'banned') {
            $bannedAt = $this->faker->dateTimeBetween($createdAt, 'now');
            $bannedReason = $this->faker->randomElement([
                'Violação de termos',
                'Atividade suspeita',
                'Abuso de sistema',
            ]);
        }

        $twoFactorEnabled = $this->faker->boolean(30);

        return [
            'uuid' => Str::uuid(),

            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),

            'email_verified_at' => in_array($status, ['active', 'suspended', 'banned']) &&
            $this->faker->boolean(85)
                ? $this->faker->dateTimeBetween($createdAt, 'now')
                : null,

            'status' => $status,

            'banned_at' => $bannedAt,
            'banned_reason' => $bannedReason,

            'password' => bcrypt('password'),

            'two_factor_enabled' => $twoFactorEnabled,

            'otp_code' => $twoFactorEnabled
                ? str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT)
                : null,

            'otp_created_at' => $twoFactorEnabled
                ? $this->faker->dateTimeBetween($createdAt, 'now')
                : null,

            'last_login_at' => $this->faker->boolean(70)
                ? $this->faker->dateTimeBetween($createdAt, 'now')
                : null,

            'last_login_ip' => $this->faker->boolean(70)
                ? $this->faker->ipv4()
                : null,

            'last_activity_at' => $this->faker->boolean(70)
                ? $this->faker->dateTimeBetween($createdAt, 'now')
                : null,

            'preferences' => [
                'theme' => $this->faker->randomElement(['dark', 'light']),
                'notifications' => $this->faker->boolean(70),
            ],

            'photo' => null,

            'locale' => 'pt_BR',
            'timezone' => 'America/Sao_Paulo',

            'password_changed_at' => $this->faker->boolean(60)
                ? $this->faker->dateTimeBetween($createdAt, 'now')
                : null,

            'force_password_change' => $this->faker->boolean(5),

            'created_at' => $createdAt,
            'updated_at' => $createdAt,

            'deleted_at' => $isDeleted
                ? $this->faker->dateTimeBetween($createdAt, 'now')
                : null,
        ];
    }

    public function active(): static
    {
        return $this->state(fn (): array => [
            'status' => 'active',
            'deleted_at' => null,
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (): array => [
            'status' => 'pending',
            'email_verified_at' => null,
            'deleted_at' => null,
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
            'status' => 'banned',
            'banned_at' => now()->subDays(rand(1, 365)),
            'banned_reason' => $reason,
            'deleted_at' => null,
        ]);
    }

    public function deleted(): static
    {
        return $this->state(fn (): array => [
            'status' => 'suspended',
            'deleted_at' => now()->subDays(rand(1, 365)),
        ]);
    }

    public function withTwoFactor(): static
    {
        return $this->state(fn (): array => [
            'two_factor_enabled' => true,
            'otp_code' => str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT),
            'otp_created_at' => now()->subMinutes(rand(1, 10)),
        ]);
    }

    public function withoutTwoFactor(): static
    {
        return $this->state(fn (): array => [
            'two_factor_enabled' => false,
            'otp_code' => null,
            'otp_created_at' => null,
        ]);
    }
}
