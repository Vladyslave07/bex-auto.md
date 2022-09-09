<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Faq;
use App\Models\News;
use App\Models\SeoText;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        SEOTools::setTitle(config('settings.news_meta_title'));
        SEOTools::setDescription(config('settings.news_meta_description'));

        // Brands
        $brands = Brand::brands();

        // default seo text
        $seoText = SeoText::mainText();

        // default faqs
        $faqs = Faq::defaultFaqs();

        return view('news', compact('brands', 'seoText', 'faqs'));
    }

    public function detail(News $article)
    {
        SEOTools::setTitle($article->seo_meta_title);
        SEOTools::setDescription($article->seo_meta_description);

        // Brands
        $brands = Brand::brands();

        // default seo text
        $seoText = SeoText::mainText();

        // default faqs
        $faqs = Faq::defaultFaqs();

        return view('article', compact('article','brands', 'seoText', 'faqs'));
    }
}
