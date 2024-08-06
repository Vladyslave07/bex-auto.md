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

    public function index(Request $request, $filters, $page = 1)
    {
        $category = Category::indexCategory();

        $category->setSeo();

        // Popular cars
        $popularCars = Car::popularCars();

        // Brands
        $brands = Brand::brands();

        // Selected categories
        $categories = Category::selectedCategory();

        // Faq
        $faqs = Faq::defaultFaqs();

        // Seo text category or main seo text
        $seoText = $category->seoText ?? SeoText::mainText();

        return view('category', compact('category', 'page', 'popularCars', 'brands', 'seoText', 'categories', 'faqs'));
    }

    public function indexPagination(Request $request, $page = 1)
    {
        return $this->index($request, null, $page);
    }

    /**
     * Category method handle
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category, $page = 1)
    {
        if ($category->id > 0 && !$category->active) {
            abort(404);
        }
        if (!$category->id && ($mainCategory = Category::indexCategory())) {
            $category = $mainCategory;
        }

        $category->setSeo();

        app('admin-menu')->setModel($category);

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

    public function filter(Category $category, $filter, $page = 1)
    {
        return $this->category($category, $page);
    }

}
