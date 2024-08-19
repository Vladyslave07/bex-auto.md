<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Menu;

class SitemapController extends Controller
{
    public function index()
    {
        $categories = collect(Menu::query()->where('slug', 'avto')->first()?->children);
        $cars = Category::query()->whereNotIn('slug', array_column($categories->toArray(), 'url'))->active()->get();
        $cities = City::query()->active()->get();
        return view('sitemap', compact('categories', 'cities', 'cars'));
    }

}
