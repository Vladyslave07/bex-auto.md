<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\SeoText;
use Artesaos\SEOTools\Facades\SEOTools;
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
    public function category(Category $category, Request $request, $page = 1)
    {
        SEOTools::setTitle($category->seo_meta_title);
        SEOTools::setDescription($category->seo_meta_description);

        // Popular cars
        $popularCars = Car::popularCars();

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
