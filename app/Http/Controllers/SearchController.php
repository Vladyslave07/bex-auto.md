<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Faq;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (!strlen($request->get('q')) > 0) {
            return abort(404);
        }

        // Popular cars
        $popularCars = Car::popularCars();

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        $cars = Car::query()
            ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '%" . strtoupper($request->get('q')) . "%'")
            ->paginate(CatalogController::COUNT_CARS_ON_PAGE)->withQueryString();

        return view('search', compact('popularCars', 'brands', 'faqs', 'cars'));
    }
}
