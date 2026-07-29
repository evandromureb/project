<?php

namespace App\Actions\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class DeleteMenu
{
    public function handle(Menu $menu): void
    {
        DB::transaction(function () use ($menu): void {
            $menu->delete();
        });
    }
}
