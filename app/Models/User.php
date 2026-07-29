<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array
	{
		return [
			'email_verified_at' => 'datetime',
			'password'          => 'hashed',
			'preferences'       => 'array',
			'otp_secret'        => 'encrypted',
		];
	}

	/**
	 * @param  string|null          $value
	 * @return array<string, mixed>
	 */
	public function getPreferencesAttribute(string|null $value): array
	{
		return array_merge([
			'theme'         => 'dark',
			'notifications' => true,
		], json_decode($value ?? '{}', true));
	}

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        $initials = Str::initials($this->name, true);

        return Str::length($initials) > 1
            ? Str::substr($initials, 0, 1).Str::substr($initials, -1)
            : $initials;
    }
	protected static function boot(): void
	{
		parent::boot();

		static::creating(function (User $user): void {
			$attributes = $user->getAttributes();

			if (!array_key_exists('preferences', $attributes) || $attributes['preferences'] === null) {
				$user->setAttribute('preferences', [
					'theme'         => 'dark',
					'notifications' => true,
				]);
			}
		});
	}

	protected static function booted()
	{
		static::creating(function ($user): void {
			$user->uuid ??= (string) Str::ulid();
		});
	}
}
