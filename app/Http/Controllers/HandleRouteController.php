<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class HandleRouteController extends Controller
{
    public function index($slug, Request $request, $page = 1)
    {
        if ($category = (new Category)->findBySlug($slug)) {
            return (new CatalogController())->category($category, $request, $page);
        }

        if ($car = Car::findBySlug($slug)) {
            return (new CardController())->index($car);
        }

        return abort(404);
    }
}
