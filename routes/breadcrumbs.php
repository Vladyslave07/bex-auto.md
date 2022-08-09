<?php
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

