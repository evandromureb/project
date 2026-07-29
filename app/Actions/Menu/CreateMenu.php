<?php

namespace App\Actions\Menu;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CreateMenu
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function handle(array $data): Menu
    {
        $validated = $this->validate($data);

        $parent = null;

        if (! empty($validated['parent_id'])) {
            $parent = Menu::query()->findOrFail($validated['parent_id']);
            $validated['group'] = $parent->group;
        }

        $group = $validated['group'];

        if (! array_key_exists('sort', $validated) || $validated['sort'] === null) {
            $maxSort = Menu::query()
                ->forGroup($group)
                ->when(
                    $parent === null,
                    fn ($query) => $query->roots(),
                    fn ($query) => $query->where('parent_id', $parent->id),
                )
                ->max('sort');

            $validated['sort'] = ((int) $maxSort) + 1;
        }

        $validated['key'] ??= $this->uniqueKey($group, $validated['label'] ?? 'item');

        return Menu::query()->create($validated);
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function validate(array $data): array
    {
        $validator = Validator::make($data, [
            'group' => ['required', 'string', 'max:100'],
            'parent_id' => ['nullable', 'integer', 'exists:menus,id'],
            'sort' => ['nullable', 'integer', 'min:0'],
            'type' => ['required', Rule::enum(MenuType::class)],
            'key' => ['nullable', 'string', 'max:150', 'unique:menus,key'],
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

    private function uniqueKey(string $group, string $label): string
    {
        $base = Str::slug($label) ?: 'item';
        $key = "{$group}-{$base}";
        $suffix = 1;

        while (Menu::query()->where('key', $key)->exists()) {
            $key = "{$group}-{$base}-{$suffix}";
            $suffix++;
        }

        return $key;
    }
}
