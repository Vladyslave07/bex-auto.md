<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\PopularRequest;
use App\Models\Review;
use App\Models\SeoText;
use App\Services\GoogleSearch;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Lang;

class IndexController extends Controller
{

    public function index()
    {
        SEOTools::setTitle(config('settings.index_meta_title'));
        SEOTools::setDescription(config('settings.index_meta_description'));

        $banner = Banner::banner();

        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories);

        // Expected cars
        $expectedCars = Car::expectedCars();

        // Popular request
        $popularRequests = PopularRequest::popularRequests();

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        // Seo text
        $seoText = SeoText::seoTextBySlug(SeoText::MAIN_PAGE_SEO_TEXT_SLUG);

        // Reviews
        $reviews = Review::reviews();

        return view('index', compact('banner', 'carsInStock', 'categories', 'expectedCars', 'popularRequests', 'brands', 'faqs', 'seoText', 'reviews'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function staticPage()
    {
        $routeName = \Request::route()->getName();

        SEOTools::setTitle(config('settings.' . $routeName . '_meta_title'));
        SEOTools::setDescription(config('settings.' . $routeName . '_meta_description'));

        // Brands
        $brands = Brand::brands();

        // Faq
        $faqs = Faq::defaultFaqs();

        // default seo text
        $seoText = SeoText::mainText();

        return view($routeName, compact('brands', 'faqs', 'seoText'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function thanks()
    {
        SEOTools::setTitle(Lang::get('index.thanks.title'));
        SEOTools::setDescription(Lang::get('index.thanks.description'));

        return view('thanks');
    }

    /**
     * Fill reviews
     *
     * @param null $page
     */
    public static function getReviews($page = null)
    {
        // Одесса 0x40c631c0a5479ceb:0xe82bc8d3a1454024
        // Харьков 0x4127a1657b4a5bbf:0xed649ecaa8a66490
        // Киев 0x40d4c5701a8d5f63:0xae2c74b47a9d4866

        $query = [
            "engine" => "google_maps_reviews",
            "hl" => 'ru',
            "data_id" => "0x40c631c0a5479ceb:0xe82bc8d3a1454024",
        ];

        if ($page) {
            $query['next_page_token'] = $page;
        }

        $search = new GoogleSearch('49016cb9f61f2a8ea1593e08c80a03bbd98632700e5ee7b68dd0b83b71530f10');
        $result = $search->get_json($query);

        $reviews = $result->reviews;
        foreach ($reviews as $review) {
            if (!strlen($review->snippet) > 0) {
                continue;
            }
            \App\Models\Review::create([
                'text' => $review->snippet,
                'rating' => $review->rating,
                'date_created_review' => $review->date,
                'user_name' => $review->user->name,
                'user_icon' => $review->user->thumbnail,
            ]);
        }

        if (Review::query()->count() !== 200) {
            self::getReviews($result->serpapi_pagination->next_page_token);
        }

    }

}
