<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Faq;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        SEOTools::setTitle(Lang::get('search.title', ['query' => $request->get('q')]));
        SEOTools::setDescription(Lang::get('search.title', ['query' => $request->get('q')]));

        // Popular cars
        $popularCars = Car::popularCars();

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        $cars = [];
        if ($q = $request->get('q')) {
            $cars = Car::query()
                ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '%" . strtoupper($q) . "%'")
                ->paginate(CatalogController::COUNT_CARS_ON_PAGE)->withQueryString();
        }


        return view('search', compact('popularCars', 'brands', 'faqs', 'cars'));
    }
}
