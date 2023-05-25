<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\Domain;

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
}
