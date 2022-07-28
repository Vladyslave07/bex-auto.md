<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $banner = Banner::banner();

        $carsInStock = Car::carsInStock()->groupBy('category_id');
        $categories = Category::selectedCategory();

        return view('index', compact('banner', 'carsInStock', 'categories'));
    }
}
