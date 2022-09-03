<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\SeoText;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    const COUNT_CARS_ON_PAGE = 9;

    /**
     * Category method handle
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category($category, Request $request, $page = 1)
    {

        // Popular cars
        $popularCars = $category->cars()->active()->orderBy('pin', 'desc')->orderBy('sort')->take(12)->get();

        // Brands
        $brands = Brand::brands();

        // Selected categories
        $categories = Category::selectedCategory();

        // Faq
        $faqs = Faq::categoryFaqs($category);

        // Seo text category or main seo text
        $seoText = $category->seoText ?? SeoText::mainText();

        return view('category', compact('category', 'page', 'popularCars', 'brands', 'seoText', 'categories', 'faqs'));
    }

}
