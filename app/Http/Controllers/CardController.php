<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Faq;
use App\Models\SeoText;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Car $car)
    {
        SEOTools::setTitle($car->seo_meta_title);
        SEOTools::setDescription($car->seo_meta_description);

        // Popular cars
        $popularCars = Car::popularCars();

        // Brands
        $brands = Brand::brands();

        $faqs = Faq::defaultFaqs();

        // Seo text category or main seo text
        $seoText = SeoText::mainText();

        // Links for bloc link
        $links = $car->getCarLinks();

        return view('card', compact('car', 'popularCars', 'brands', 'faqs', 'seoText', 'links'));
    }
}
