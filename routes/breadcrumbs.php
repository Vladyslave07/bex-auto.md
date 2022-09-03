<?php
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

