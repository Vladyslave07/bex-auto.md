<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(Service $service)
    {
        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories);

        // Benefits
        $benefits = Benefit::allBenefits();

        // Brands
        $brands = Brand::brands();

        $service->is_diller_page = false;
        if ($service->id === 1) {
            $service->is_diller_page = true;
        }

        return view('service', compact('service', 'categories', 'carsInStock', 'benefits', 'brands'));
    }
}
