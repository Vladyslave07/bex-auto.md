<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{


    public function category(Category $category)
    {
        return view('category', compact('category'));
    }
}
