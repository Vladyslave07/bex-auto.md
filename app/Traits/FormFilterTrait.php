<?php

namespace App\Traits;

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Domain;
use App\Models\Property;

trait FormFilterTrait
{
    public function addDomainFilter()
    {
        $this->crud->addFilter([
            'type'  => 'dropdown',
            'name'  => 'domain',
            'label' => 'Домен'
        ], function () {

            $domains = Domain::list();
            $domainsPrepare = [];
            foreach ($domains as $domain) {
                if (!in_array($domain->id, [Domain::DEFAULT_DOMAIN, Domain::KAZACHSTAN_DOMAIN])) {
                    continue;
                }
                $domainsPrepare[$domain->id] = $domain->title;
            }
            return $domainsPrepare;
        }, function ($value) {
            $this->crud->addClause('where', 'domain_id', $value);
        });
    }

    public function addCategoriesFilter()
    {
        $this->crud->addFilter([
            'type'  => 'select2',
            'name'  => 'categories',
            'label' => 'Категория'
        ], function () {

            $categories = Category::query()->get(['id', 'title']);
            $categoriesPrepare = [];
            foreach ($categories as $category) {
                $categoriesPrepare[$category->id] = $category->title;
            }
            return $categoriesPrepare;
        }, function ($value) {
            $this->crud->query = $this->crud->query->whereHas('categories', function ($query) use ($value) {
                $query->where('category_id', $value);
            })->orWhere('category_id', $value);
        });
    }

    public function addBrandsFilter()
    {
        $this->crud->addFilter([
            'type'  => 'select2',
            'name'  => 'brand',
            'label' => 'Марка'
        ], function () {
//            dd(app('request')->toArray());
            $brands = Brand::query()->get(['slug', 'title']);
            $brandsPrepare = [];
            foreach ($brands as $brand) {
                $brandsPrepare[$brand->slug] = $brand->title;
            }
            return $brandsPrepare;
        }, function ($value) {
            $this->crud->query = $this->crud->query->whereHas('properties', function ($query) use ($value) {
                $query
                    ->where('car_property.property_id', Property::query()->where('slug', 'brand')->first()?->id)
                    ->where('car_property.slug', $value);
            });
        });
    }

    public function addModelsFilter()
    {
        $this->crud->addFilter([
            'type'  => 'select2',
            'name'  => 'car-brand',
            'label' => 'Модель'
        ], function () {
            $brand = null; //app('request')->get('brand');

            $models = CarModel::query();

            if ($brand) {
                $brand = Brand::query()->where('slug', $brand)->first(['id']);
                $models->where('brand_id', $brand?->id);
            }

            $models = $models->get(['slug', 'title']);
            $modelsPrepare = [];
            foreach ($models as $model) {
                $modelsPrepare[$model->slug] = $model->title;
            }
            return $modelsPrepare;
        }, function ($value) {
            $this->crud->query = $this->crud->query->whereHas('properties', function ($query) use ($value) {
                $query
                    ->where('car_property.property_id', Property::query()->where('slug', 'model')->first()?->id)
                    ->where('car_property.slug', $value);
            });
        });
    }
}
