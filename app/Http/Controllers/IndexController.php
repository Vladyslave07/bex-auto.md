<?php

namespace App\Http\Controllers;

use App\Helper\General;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\City;
use App\Models\Faq;
use App\Models\PopularRequest;
use App\Models\Review;
use App\Models\SeoText;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    public function index(City $city = null)
    {
        SEOTools::setTitle($city?->seoMetaTitle ?? Setting::get('index_meta_title'));
        SEOTools::setDescription($city?->seoMetaDescription ?? Setting::get('index_meta_description'));
        SEOTools::opengraph()->addImage(asset(\App\Helper\ImageHelper::logoPath()));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

        $banner = Banner::banner();

        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories);

        // Expected cars
        $expectedCars = Car::expectedCars();

        // Popular request
        $popularRequests = PopularRequest::popularRequests();

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        // Seo text
        $seoText = $city?->text ?? SeoText::mainText();

        // Reviews
        $reviews = Review::reviews();

        return view('index', compact('banner', 'carsInStock', 'categories', 'expectedCars', 'popularRequests', 'brands', 'faqs', 'seoText', 'reviews'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function staticPage()
    {
        $routeName = \Request::route()->getName();

        SEOTools::setTitle(Setting::get($routeName . '_meta_title'));
        SEOTools::setDescription(Setting::get($routeName . '_meta_description'));
        SEOTools::opengraph()->addImage(asset(\App\Helper\ImageHelper::logoPath()));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        // default seo text
        $seoText = SeoText::mainText();

        return view($routeName, compact('brands', 'faqs', 'seoText'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function thanks()
    {
        SEOTools::setTitle(Lang::get('index.thanks.title'));
        SEOTools::setDescription(Lang::get('index.thanks.description'));
        SEOTools::metatags()->addMeta('robots', 'noindex, nofollow');
        SEOTools::opengraph()->addImage(asset(\App\Helper\ImageHelper::logoPath()));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

        return view('thanks');
    }
}
