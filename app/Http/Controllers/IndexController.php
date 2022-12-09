<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\PopularRequest;
use App\Models\Review;
use App\Models\SeoText;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Lang;

class IndexController extends Controller
{

    public function index()
    {
        SEOTools::setTitle(config('settings.index_meta_title'));
        SEOTools::setDescription(config('settings.index_meta_description'));

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
        $seoText = SeoText::seoTextBySlug(SeoText::MAIN_PAGE_SEO_TEXT_SLUG);

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

        SEOTools::setTitle(config('settings.' . $routeName . '_meta_title'));
        SEOTools::setDescription(config('settings.' . $routeName . '_meta_description'));

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

        return view('thanks');
    }
}
