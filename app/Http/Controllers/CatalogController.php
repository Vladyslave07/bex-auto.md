<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
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
    public function category(Category $category, $page = 1)
    {

        // todo: Кешировать
        $cars = Car::query()->whereHas('categories', function ($query) use ($category) {
           return $query->where('category_id', $category->id);
        })->active()->paginate(self::COUNT_CARS_ON_PAGE, ['*'], 'page', $this->pageNum($page))->withQueryString();


        // todo: Понять выводить машины с текущей категории или из всех категорий
        $popularCars = Car::query()->active()->orderBy('pin', 'desc')->orderBy('sort')->take(12)->get();

        // Brands
        $brands = Brand::brands();

        $seoText = '';

        return view('category', compact('category', 'cars', 'page', 'popularCars', 'brands', 'seoText'));
    }

    public function pageNum($page)
    {
        return preg_replace('/[^0-9]/', '$1', $page);
    }
}
