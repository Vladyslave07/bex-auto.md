<?php

namespace App\Http\Controllers;

use App\Helper\General;
use App\Models\Benefit;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Faq;
use App\Models\SeoText;
use App\Models\Service;
use Artesaos\SEOTools\Facades\SEOTools;

class ServiceController extends Controller
{
    public function service(Service $service)
    {
        SEOTools::setTitle($service->seo_meta_title);
        SEOTools::setDescription($service->seo_meta_description);
        SEOTools::opengraph()->addImage(asset(\App\Helper\ImageHelper::logoPath()));
        SEOTools::opengraph()->addProperty('locale', General::getOgLocale());
        SEOTools::opengraph()->addProperty('url', request()->url());

        app('admin-menu')->setModel($service);

        // Categories which selected for show in slider
        $categories = Category::selectedCategory();

        // Cars in Stock
        $carsInStock = Car::carsInStock($categories);

        // Benefits
        $benefits = Benefit::allBenefits();

        // Brands
        $brands = Brand::brands();

        $employees = [];
        $service->dealer_page = false;
        if ($service->id === 1) {
            $service->dealer_page = true;
            $employees = Employee::employees();

        }

        // Show default seo text if current not exist
        if (!$service->seo_text) {
            $service->seo_text = SeoText::mainText();
        }

        // Show default faqs if current not exists
        if (count($service->faqs) <= 0) {
            $service->faqs = Faq::defaultFaqs();
        }

        return view($this->getTemplate($service->dealer_page), compact('service', 'categories', 'carsInStock', 'benefits', 'brands', 'employees'));
    }

    public function getTemplate($isDealerPage)
    {
        return $isDealerPage ? 'dealer_service' : 'service';
    }
}
