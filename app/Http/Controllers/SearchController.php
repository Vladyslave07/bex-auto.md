<?php

namespace App\Http\Controllers;

use App\Helper\General;
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
        SEOTools::metatags()->addMeta('robots', 'noindex, nofollow');
        SEOTools::opengraph()->addImage(asset(\App\Helper\ImageHelper::logoPath()));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

        // Popular cars
        $popularCars = Car::popularCars();

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        return view('search', compact('popularCars', 'brands', 'faqs'));
    }
}
