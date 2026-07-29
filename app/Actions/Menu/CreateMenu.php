<?php

namespace App\Actions\Menu;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\{Rule, ValidationException};

class CreateMenu
{
    /**
     * @param array<string, mixed> $data
     */
    public function handle(array $data): Menu
    {
        $validated = $this->validate($data);

        $parent = null;

        if (!empty($validated['parent_id'])) {
            $parent             = Menu::query()->findOrFail((int) $validated['parent_id']);
            $validated['group'] = $parent->group;
        }

        $group = $validated['group'];

        if (!array_key_exists('sort', $validated) || $validated['sort'] === null) {
            $query = Menu::query()->forGroup($group);

            if ($parent === null) {
                $query->roots();
            } else {
                $query->where('parent_id', $parent->id);
            }

            $validated['sort'] = ((int) $query->max('sort')) + 1;
        }

        $type = $validated['type'] instanceof MenuType
            ? $validated['type']->value
            : (string) $validated['type'];

        $validated['key'] ??= $this->uniqueKey($validated['label'] ?? 'item', $type);

        return Menu::query()->create($validated);
    }

    /**
     * @param  array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function validate(array $data): array
    {
        $validator = Validator::make($data, [
            'group'       => ['required', 'string', 'max:100'],
            'parent_id'   => ['nullable', 'integer', 'exists:menus,id'],
            'sort'        => ['nullable', 'integer', 'min:0'],
            'type'        => ['required', Rule::enum(MenuType::class)],
            'key'         => ['nullable', 'string', 'max:150', 'unique:menus,key'],
            'label'       => ['nullable', 'string', 'max:150'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'route'       => ['nullable', 'string', 'max:150'],
            'url'         => ['nullable', 'string', 'max:255'],
            'permission'  => ['nullable', 'string', 'max:150'],
            'guard'       => ['nullable', 'string', 'max:50'],
            'title'       => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'visible'     => ['sometimes', 'boolean'],
            'enabled'     => ['sometimes', 'boolean'],
            'meta'        => ['nullable', 'array'],
        ]);

        throw_if($validator->fails(), ValidationException::class, $validator);

        return $validator->validated();
    }

    private function uniqueKey(string $label, string $type): string
    {
        $base   = Str::slug($label . '-' . $type) ?: 'item';
        $key    = $base;
        $suffix = 1;

        while (Menu::query()->where('key', $key)->exists()) {
            $key = "{$base}-{$suffix}";
            $suffix++;
        }

        return $key;
    }
}
