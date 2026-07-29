<?php

namespace App\Actions\Menu;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdateMenu
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function handle(Menu $menu, array $data): Menu
    {
        $validated = $this->validate($menu, $data);

        $menu->fill($validated)->save();

        return $menu->refresh();
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function validate(Menu $menu, array $data): array
    {
        $validator = Validator::make($data, [
            'type' => ['sometimes', Rule::enum(MenuType::class)],
            'key' => ['sometimes', 'string', 'max:150', Rule::unique('menus', 'key')->ignore($menu->id)],
            'label' => ['nullable', 'string', 'max:150'],
            'icon' => ['nullable', 'string', 'max:100'],
            'route' => ['nullable', 'string', 'max:150'],
            'url' => ['nullable', 'string', 'max:255'],
            'permission' => ['nullable', 'string', 'max:150'],
            'guard' => ['nullable', 'string', 'max:50'],
            'title' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'visible' => ['sometimes', 'boolean'],
            'enabled' => ['sometimes', 'boolean'],
            'meta' => ['nullable', 'array'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
}
