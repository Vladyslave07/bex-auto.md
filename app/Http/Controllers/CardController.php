<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Faq;
use App\Models\SeoText;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Car $car)
    {
        // Popular cars
        $popularCars = Car::query()->active()->orderBy('pin', 'desc')->orderBy('sort')->take(12)->get();

        // Brands
        $brands = Brand::brands();

        $faqs = Faq::defaultFaqs();

        // Seo text category or main seo text
        $seoText = SeoText::mainText();

        return view('card', compact('car', 'popularCars', 'brands', 'faqs', 'seoText'));
    }
}
