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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('group')->index();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->nullOnDelete();
            $table->unsignedInteger('sort')->default(0);
            $table->string('type');
            $table->string('key')->unique();
            $table->string('label')->nullable();
            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->string('url')->nullable();
            $table->string('permission')->nullable();
            $table->string('guard')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('visible')->default(true);
            $table->boolean('enabled')->default(true);
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index(['group', 'parent_id', 'sort']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
