<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CarCrudController;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Domain;
use App\Models\Faq;
use App\Models\Product;
use App\Models\SeoText;
use Artesaos\SEOTools\Facades\SEOTools;

class CardController extends Controller
{
    public function index(Car $car)
    {
        if (!$car->forCurrentDomain()) {
            abort(404);
        }
        app('domain')->setDomain(Domain::query()->where('id', Domain::KAZACHSTAN_DOMAIN)->first());

        app('admin-menu')->setModel($car);

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

        return view($car->cardTemplate(), compact('car', 'popularCars', 'brands', 'faqs', 'seoText', 'links'));
    }

    public function product(Product $product)
    {
        if (!$product->forCurrentDomain()) {
            abort(404);
        }

        app('admin-menu')->setModel($product);

        // Popular cars
        $popularCars = Car::popularCars();

        // Brands
        $brands = Brand::brands();

        $faqs = Faq::defaultFaqs();

        // Seo text category or main seo text
        $seoText = SeoText::mainText();

        $car = $product;
        return view('card', compact('car', 'popularCars', 'brands', 'faqs', 'seoText'));

    }
}
