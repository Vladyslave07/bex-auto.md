<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    const COUNT_CARS_ON_PAGE = 2;

    /**
     * Category method handle
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category, $page = 1)
    {
        $cars = Car::query()->whereHas('categories', function ($query) use ($category) {
           return $query->where('category_id', $category->id);
        })->active()->paginate(self::COUNT_CARS_ON_PAGE, ['*'], 'page', $this->pageNum($page))->withQueryString();

        return view('category', compact('category', 'cars', 'page'));
    }

    public function pageNum($page)
    {
        return preg_replace('/[^0-9]/', '$1', $page);
    }
}
