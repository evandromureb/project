<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();

            $table->enum('status', ['pending', 'active', 'suspended', 'banned'])
                ->default('active');

            $table->timestamp('banned_at')->nullable();
            $table->string('banned_reason')->nullable();

            $table->string('password');

            $table->boolean('two_factor_enabled')->default(false);
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_created_at')->nullable();

            $table->timestamp('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->timestamp('last_activity_at')->nullable();

            $table->json('preferences')->nullable();

            $table->string('photo')->nullable();

            $table->string('locale', 5)->default('pt_BR');
            $table->string('timezone')->default('America/Sao_Paulo');

            $table->timestamp('password_changed_at')->nullable();
            $table->boolean('force_password_change')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'deleted_at']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
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
