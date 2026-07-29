<?php

namespace App\Models;

use App\Enums\MenuType;
use Database\Factories\MenuFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Support\Carbon;

/**
 * @property int                       $id
 * @property string                    $group
 * @property int|null                  $parent_id
 * @property int                       $sort
 * @property MenuType                  $type
 * @property string                    $key
 * @property string|null               $label
 * @property string|null               $icon
 * @property string|null               $route
 * @property string|null               $url
 * @property string|null               $permission
 * @property string|null               $guard
 * @property string|null               $title
 * @property string|null               $description
 * @property bool                      $visible
 * @property bool                      $enabled
 * @property array<string, mixed>|null $meta
 * @property Carbon|null               $created_at
 * @property Carbon|null               $updated_at
 * @property-read Menu|null $parent
 * @property-read Collection<int, Menu> $children
 */
#[Fillable([
    'group',
    'parent_id',
    'sort',
    'type',
    'key',
    'label',
    'icon',
    'route',
    'url',
    'permission',
    'guard',
    'title',
    'description',
    'visible',
    'enabled',
    'meta',
])]
class Menu extends Model
{
    /** @use HasFactory<MenuFactory> */
    use HasFactory;

    /**
     * @var array<string, mixed>
     */
    protected $attributes = [
        'sort'    => 0,
        'visible' => true,
        'enabled' => true,
    ];

    /**
     * @return BelongsTo<Menu, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    /**
     * @return HasMany<Menu, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort');
    }

    /**
     * @return Collection<int, Menu>
     */
    public static function treeForGroup(string $group, int $depth = 4): Collection
    {
        $with = collect(range(1, max(1, $depth)))
            ->map(fn (int $level): string => implode('.', array_fill(0, $level, 'children')))
            ->all();

        return self::query()
            ->forGroup($group)
            ->roots()
            ->orderBy('sort')
            ->with($with)
            ->get();
    }

    /**
     * @return array{name: string, children: list<array{name: string, children: list<mixed>}>}
     */
    public function toTreeNode(): array
    {
        return [
            'name'     => $this->key,
            'children' => array_values($this->children
                ->map(fn (Menu $menu): array => $menu->toTreeNode())
                ->all()),
        ];
    }

    /**
     * @param  Collection<int, Menu>                            $menus
     * @return list<array{name: string, children: list<mixed>}>
     */
    public static function collectionToTree(Collection $menus): array
    {
        return array_values($menus
            ->map(fn (Menu $menu): array => $menu->toTreeNode())
            ->all());
    }

    /**
     * @param  Builder<Menu> $builder
     * @return Builder<Menu>
     */
    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function forGroup(Builder $builder, string $group): Builder
    {
        return $builder->where('group', $group);
    }

    /**
     * @param  Builder<Menu> $builder
     * @return Builder<Menu>
     */
    #[\Illuminate\Database\Eloquent\Attributes\Scope]
    protected function roots(Builder $builder): Builder
    {
        return $builder->whereNull('parent_id');
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type'    => MenuType::class,
            'sort'    => 'integer',
            'visible' => 'boolean',
            'enabled' => 'boolean',
            'meta'    => 'array',
        ];
    }
}
