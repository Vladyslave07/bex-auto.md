<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Car;
use App\Models\Category;
use App\Models\PopularRequest;
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

        // Expected cars
        $expectedCars = Car::expectedCars();

        // Popular request
        $popularRequests = PopularRequest::query()->active()->get(['slug', 'title']);

        return view('index', compact('banner', 'carsInStock', 'categories', 'expectedCars', 'popularRequests'));
    }
}
