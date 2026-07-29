<?php

namespace App\Actions\Menu;

use App\Enums\MenuType;
use App\Models\Menu;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SyncWebRoutesToMenus
{
    /**
     * Ensure every named route from routes/web.php exists as a menu row.
     *
     * @return list<string> Created menu keys
     */
    public function handle(string $group = 'sidebar'): array
    {
        $created = [];
        $existingRoutes = Menu::query()
            ->whereNotNull('route')
            ->pluck('route')
            ->all();

        foreach ($this->webNamedRoutes() as $name) {
            if (in_array($name, $existingRoutes, true)) {
                continue;
            }

            $key = $this->uniqueKey($name);

            Menu::query()->create([
                'group' => $group,
                'parent_id' => null,
                'sort' => (int) Menu::query()->forGroup($group)->roots()->max('sort') + 1,
                'type' => MenuType::HIDDEN,
                'key' => $key,
                'label' => $name,
                'route' => $name,
                'title' => $name,
                'description' => "Rota sincronizada de web.php: {$name}",
                'visible' => false,
                'enabled' => true,
            ]);

            $created[] = $key;
            $existingRoutes[] = $name;
        }

        return $created;
    }

    /**
     * Named routes registered from routes/web.php (and any file it requires,
     * e.g. routes/auth.php), excluding internal routes registered by packages.
     *
     * @return list<string>
     */
    public function webNamedRoutes(): array
    {
        $excludedNamePrefixes = ['livewire.', 'default-livewire.', 'boost.', 'storage.'];

        return collect(Route::getRoutes())
            ->filter(function (RoutingRoute $route) use ($excludedNamePrefixes): bool {
                $name = $route->getName();

                if (! is_string($name) || $name === '') {
                    return false;
                }

                if (! in_array('web', $route->middleware(), true)) {
                    return false;
                }

                foreach ($excludedNamePrefixes as $prefix) {
                    if (str_starts_with($name, $prefix)) {
                        return false;
                    }
                }

                return true;
            })
            ->map(fn (RoutingRoute $route): string => (string) $route->getName())
            ->unique()
            ->values()
            ->all();
    }

    private function uniqueKey(string $routeName): string
    {
        $key = $routeName;

        if (! Menu::query()->where('key', $key)->exists()) {
            return $key;
        }

        $base = 'route-'.Str::slug(str_replace('.', '-', $routeName));
        $key = $base;
        $suffix = 1;

        while (Menu::query()->where('key', $key)->exists()) {
            $key = "{$base}-{$suffix}";
            $suffix++;
        }

        return $key;
    }
}
