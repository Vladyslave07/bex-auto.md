<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Route;

class Menu
{
    public static function render()
    {
        if (backpack_user()?->hasPermissionTo('admin')) {
            return view('admin.menu.menu', ['editPath' => app('admin-menu')?->getModel()?->adminEditPath()]);
        }
    }
}
