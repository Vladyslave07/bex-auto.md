<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

    Route::get('/cars/{category}', function () {
       return view('html.catalog');
    })->name('category');
});

// Cache delete
Route::get('/clear-all-cache', function ()  {
    Artisan::call("cache:clear");
})->name('clear-cache');

// Роуты на вёрстку
Route::group(['prefix' => 'html'], function () {
    Route::get('/links', function () {return view('html.links');})->name('html.links');
    Route::get('/index', function () {return view('html.index');})->name('html.index');
    Route::get('/catalog', function () {return view('html.catalog');})->name('html.catalog');
    Route::get('/card', function () {return view('html.card');})->name('html.card');
    Route::get('/dealer-services', function () {return view('html.dealer-services');})->name('html.dealer-services');
    Route::get('/new-elektromobili', function () {return view('html.new-elektromobili');})->name('html.new-elektromobili');
    Route::get('/elektromobili', function () {return view('html.elektromobili');})->name('html.elektromobili');
    Route::get('/delivery', function () {return view('html.delivery');})->name('html.delivery');
    Route::get('/news', function () {return view('html.news');})->name('html.news');
    Route::get('/article', function () {return view('html.article');})->name('html.article');
});