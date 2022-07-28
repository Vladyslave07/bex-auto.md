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

        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories)->groupBy('category_id');

        return view('index', compact('banner', 'carsInStock', 'categories'));
    }
}
