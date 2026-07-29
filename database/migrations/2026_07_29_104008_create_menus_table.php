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
        Schema::create('menus', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->string('group')->index();
            $blueprint->foreignId('parent_id')->nullable()->constrained('menus')->nullOnDelete();
            $blueprint->unsignedInteger('sort')->default(0);
            $blueprint->string('type');
            $blueprint->string('key')->unique();
            $blueprint->string('label')->nullable();
            $blueprint->string('icon')->nullable();
            $blueprint->string('route')->nullable();
            $blueprint->string('url')->nullable();
            $blueprint->string('permission')->nullable();
            $blueprint->string('guard')->nullable();
            $blueprint->string('title')->nullable();
            $blueprint->text('description')->nullable();
            $blueprint->boolean('visible')->default(true);
            $blueprint->boolean('enabled')->default(true);
            $blueprint->json('meta')->nullable();
            $blueprint->timestamps();

            $blueprint->index(['group', 'parent_id', 'sort']);
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
