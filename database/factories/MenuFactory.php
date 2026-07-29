<?php

namespace Database\Factories;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group' => 'sidebar',
            'parent_id' => null,
            'sort' => 0,
            'type' => MenuType::ITEM,
            'key' => fake()->unique()->slug(3),
            'label' => fake()->words(2, true),
            'icon' => null,
            'route' => null,
            'url' => null,
            'permission' => null,
            'guard' => null,
            'title' => null,
            'description' => null,
            'visible' => true,
            'enabled' => true,
            'meta' => null,
        ];
    }

    public function drop(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => MenuType::DROP,
        ]);
    }

    public function dropItem(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => MenuType::DROP_ITEM,
        ]);
    }

    public function separator(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => MenuType::SEPARATOR,
            'label' => fake()->word(),
            'route' => null,
            'url' => null,
        ]);
    }

    public function hidden(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => MenuType::HIDDEN,
            'visible' => false,
        ]);
    }

    public function root(): static
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => null,
        ]);
    }

    public function childOf(Menu $parent): static
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => $parent->id,
            'group' => $parent->group,
        ]);
    }
}
