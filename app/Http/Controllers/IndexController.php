<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\PopularRequest;
use App\Models\SeoText;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $banner = Banner::banner();

        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories);

        // Expected cars
        $expectedCars = Car::expectedCars();
        // TODO: Проверки на наличие
        // Popular request
        $popularRequests = PopularRequest::popularRequests();

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        // Seo text
        $seoText = SeoText::seoTextBySlug(SeoText::MAIN_PAGE_SEO_TEXT_SLUG);

        return view('index', compact('banner', 'carsInStock', 'categories', 'expectedCars', 'popularRequests', 'brands', 'faqs', 'seoText'));
    }
}
