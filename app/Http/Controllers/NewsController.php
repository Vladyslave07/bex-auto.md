<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Faq;
use App\Models\News;
use App\Models\SeoText;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Brands
        $brands = Brand::brands();

        // default seo text
        $seoText = SeoText::mainText();

        // default faqs
        $faqs = Faq::defaultFaqs();

        return view('news', compact('brands', 'seoText', 'faqs'));
    }
}
