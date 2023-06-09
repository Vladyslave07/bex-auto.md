<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\SeoText;
use App\Models\Service;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(Service $service)
    {
        SEOTools::setTitle($service->seo_meta_title);
        SEOTools::setDescription($service->seo_meta_description);

        app('admin-menu')->setModel($service);

        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories);

        // Benefits
        $benefits = Benefit::allBenefits();

        // Brands
        $brands = Brand::brands();

        $service->is_diller_page = false;
        if ($service->id === 1) {
            $service->is_diller_page = true;
        }

        // Show default seo text if current not exist
        if (!$service->seo_text) {
            $service->seo_text = SeoText::mainText();
        }

        // Show default faqs if current not exists
        if (count($service->faqs) <= 0) {
            $service->faqs = Faq::defaultFaqs();
        }

        return view('service', compact('service', 'categories', 'carsInStock', 'benefits', 'brands'));
    }
}
