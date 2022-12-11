<?php

use App\Models\News;
use App\Models\Service;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Lang;

// Main page
Breadcrumbs::for('index', function ($trail) {
    $trail->push(Lang::get('index.title'), route('index'));
});

// category
Breadcrumbs::for('category', function ($trail, \App\Models\Category $category) {
    $trail->parent('index');
    $trail->push($category->title, $category->url);
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

Breadcrumbs::for('search', function ($trail) {
    $trail->parent('index');

    $trail->push(Lang::get('search.breadcrumb', ['query' => request()->get('q')]));
});

// about
Breadcrumbs::for('static.about', function ($trail) {
    $trail->parent('index');
    $trail->push(Lang::get('static.about.breadcrumbs'), '');
});

