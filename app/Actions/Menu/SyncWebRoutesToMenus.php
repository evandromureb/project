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
     * @return list<string>
     */
    public function webNamedRoutes(): array
    {
        return collect(Route::getRoutes())
            ->filter(function (RoutingRoute $route): bool {
                $name = $route->getName();

                if (! is_string($name) || $name === '') {
                    return false;
                }

                $action = $route->getAction();
                $file = $action['file'] ?? null;

                if (is_string($file)) {
                    return str_ends_with(str_replace('\\', '/', $file), '/routes/web.php');
                }

                // Fallback: named livewire/app routes that look like web.php entries.
                return in_array($name, [
                    'dashboard',
                    'app',
                    'app1',
                    'app2',
                    'app3',
                    'app4',
                    'settings.sidebar',
                ], true);
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
