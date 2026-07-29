<?php

namespace Database\Seeders;

use App\Actions\Menu\SyncWebRoutesToMenus;
use App\Support\MenuTree;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tree = new MenuTree;

        $sidebar = config('dashboard.sidebar', []);
        $auth = config('dashboard.auth', []);

        if (is_array($sidebar) && $sidebar !== []) {
            $tree->seedFromConfig('sidebar', $sidebar);
        }

        if (is_array($auth) && $auth !== []) {
            $tree->seedFromConfig('auth', $auth);
        }

        app(SyncWebRoutesToMenus::class)->handle('sidebar');
    }
}
