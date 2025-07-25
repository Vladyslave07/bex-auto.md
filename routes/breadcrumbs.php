<?php

use App\Models\News;
use App\Models\Service;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Main page
Breadcrumbs::for('index', function ($trail) {
    $trail->push(Lang::get('index.title'), route('index'));
});

// category
Breadcrumbs::for('avto', function ($trail) {
    $category = \App\Models\Category::indexCategory();
    $trail->parent('index');
    $trail->push($category->title, $category->url);
});

// Main category
Breadcrumbs::for('main-category', function ($trail) {
    $category = \App\Models\Category::indexCategory();
    $trail->parent('index');
    $trail->push($category->title, $category->url);
});

// category-filter
Breadcrumbs::for('avto-page', function ($trail, $page) {
    $category = \App\Models\Category::indexCategory();
    $trail->parent('index');
    $trail->push($category->title, $category->url);
});

// category-filter
Breadcrumbs::for('category-filter', function ($trail, \App\Models\Category $category = null) {
    if (!$category) {
        $category = \App\Models\Category::indexCategory();
    }
    $trail->parent('index');
    $trail->push($category->title, $category->url);
});

// category
Breadcrumbs::for('category', function ($trail, \App\Models\Category $category = null) {
    if (!$category) {
        $category = \App\Models\Category::indexCategory();
    }
    $trail->parent('index');
    $trail->push($category->title, $category->url);
});

// products category
Breadcrumbs::for('category_products', function ($trail, \App\Models\Category $category) {
    $trail->parent('index');
    $trail->push($category->title, $category->url);
});

// products
Breadcrumbs::for('product_detail', function ($trail, \App\Models\Product $product) {
    $trail->parent('index');
    if ($category = $product->category()->first()) {
        $trail->push($category->title, route('category_products', $category->slug));
    }
    $trail->push($product->title, '');
});

// card
Breadcrumbs::for('car_detail', function ($trail, \App\Models\Car $car) {
    $trail->parent('index');
    if ($category = $car->category()->first()) {
        $trail->push($category->title, route('category', $category->slug));
    }
    $trail->push($car->title, '');
});

// sevice
Breadcrumbs::for('service', function ($trail, Service $service) {
    $trail->parent('index');
    $trail->push(str_replace(['&nbsp;'], '', strip_tags($service->title)), '');
});

// news list
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('index');
//    <li class="breadcrumb-item"><a href="/">Про компанiю</a></li>
    $trail->push(Lang::get('news.breadcrumb'), '');
});

// news detail
Breadcrumbs::for('news_detail', function ($trail, News $article) {
    $trail->parent('index');
//    <li class="breadcrumb-item"><a href="/">Про компанiю</a></li>
    $trail->push(Lang::get('news.breadcrumb'), route('news'));
    $trail->push($article->title, '');
});

// guarantee
Breadcrumbs::for('static.guarantee', function ($trail) {
    $trail->parent('index');
    $trail->push(Lang::get('static.about.breadcrumbs'), '');
    $trail->push(Lang::get('static.guarantee.breadcrumbs'), '');
});

// contacts
Breadcrumbs::for('static.contacts', function ($trail) {
    $trail->parent('index');
    $trail->push(Lang::get('static.about.breadcrumbs'), '');
    $trail->push(Lang::get('static.contacts.breadcrumbs'), '');
});

// privacy
Breadcrumbs::for('static.privacy', function ($trail) {
    $trail->parent('index');
    $trail->push(Lang::get('static.privacy.breadcrumbs'), '');
});

Breadcrumbs::for('search', function ($trail) {
    $trail->parent('index');

    $trail->push(Lang::get('search.breadcrumb', ['query' => request()->get('q')]));
});

// about
Breadcrumbs::for('static.about', function ($trail) {
    $trail->parent('index');
    $trail->push(Lang::get('static.about.breadcrumbs'), '');
});

