<?php

use App\Models\Service;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Lang;

// Main page
Breadcrumbs::for('index', function ($trail) {
    $trail->push(Lang::get('index.title'), route('index'));
});

// category
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('index');
    $category = (new App\Models\Category)->findBySlug($category);
    $trail->push($category->title, $category->url);
});

// category
Breadcrumbs::for('service', function ($trail, Service $service) {
    $trail->parent('index');
    $trail->push(str_replace(['&nbsp;'], '', strip_tags($service->title)), '');
});

