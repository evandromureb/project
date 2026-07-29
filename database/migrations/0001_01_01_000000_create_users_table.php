<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->uuid('uuid')->unique();

            $blueprint->string('name');
            $blueprint->string('email')->unique();
            $blueprint->timestamp('email_verified_at')->nullable();

            $blueprint->rememberToken();

            $blueprint->enum('status', ['pending', 'active', 'suspended', 'banned'])
                ->default('active');

            $blueprint->timestamp('banned_at')->nullable();
            $blueprint->string('banned_reason')->nullable();

            $blueprint->string('password');

            $blueprint->boolean('two_factor_enabled')->default(false);
            $blueprint->string('otp_code')->nullable();
            $blueprint->timestamp('otp_created_at')->nullable();

            $blueprint->timestamp('last_login_at')->nullable();
            $blueprint->ipAddress('last_login_ip')->nullable();
            $blueprint->timestamp('last_activity_at')->nullable();

            $blueprint->json('preferences')->nullable();

            $blueprint->string('photo')->nullable();

            $blueprint->string('locale', 5)->default('pt_BR');
            $blueprint->string('timezone')->default('America/Sao_Paulo');

            $blueprint->timestamp('password_changed_at')->nullable();
            $blueprint->boolean('force_password_change')->default(false);
            $blueprint->timestamps();
            $blueprint->softDeletes();

            $blueprint->index(['status', 'deleted_at']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $blueprint): void {
            $blueprint->string('email')->primary();
            $blueprint->string('token');
            $blueprint->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $blueprint): void {
            $blueprint->string('id')->primary();
            $blueprint->foreignId('user_id')->nullable()->index();
            $blueprint->string('ip_address', 45)->nullable();
            $blueprint->text('user_agent')->nullable();
            $blueprint->longText('payload');
            $blueprint->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
