<?php

namespace App\Http\Controllers;

use App\Helper\General;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Faq;
use App\Models\Product;
use App\Models\SeoText;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function index(Car $car)
    {

        app('admin-menu')->setModel($car);

        SEOTools::setTitle($car->seo_meta_title);
        SEOTools::setDescription($car->seo_meta_description);
        SEOTools::opengraph()->addImage(Storage::url($car->preview_picture));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

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

        app('admin-menu')->setModel($product);

        SEOTools::setTitle($product->seo_meta_title);
        SEOTools::setDescription($product->seo_meta_description);
        SEOTools::opengraph()->addImage(Storage::url($product->preview_picture));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

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
