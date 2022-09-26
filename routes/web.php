<?php

use App\Models\Parser;
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

Route::get('/parser', function () {
    // todo: Получать url и token из админки
    $ListUrl = 'http://185.149.40.229/api/v1/lots/list/';
    $detailUrl = 'http://185.149.40.229/api/v1/lots/{lot_id}/detail';
    $token = 'SLhhLv8zfDksTQI56QLnA1cPoi4pCGwTMBt8kszyISgWR4Mu6ICWjGdp1mKDUh5vqbmyqB4JynDOk7cI';


    $parser = new \App\Services\Parser($ListUrl, $detailUrl, $token);
    $parser->apply();
}
)->name('parser');

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

    // Services
    Route::get(
        LaravelLocalization::transRoute('routes.service'),
        [\App\Http\Controllers\ServiceController::class, 'service']
    )->name('service');

    // Categories
    Route::get(
        LaravelLocalization::transRoute('routes.category'),
        [\App\Http\Controllers\HandleRouteController::class, 'index']
    )->name('category');

    Route::group(['prefix' => '/about'], function () {
        // News
        Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');

        // News detail
        Route::get('/news/{article}', [\App\Http\Controllers\NewsController::class, 'detail'])->name('news_detail');

        // Guarantee
        Route::get('/guarantee', [\App\Http\Controllers\IndexController::class, 'staticPage'])->name('static.guarantee');

        // Contacts
        Route::get('/contacts', [\App\Http\Controllers\IndexController::class, 'staticPage'])->name('static.contacts');
    });

});

// Admin actions
Route::group(['middleware' => ['admin']], function() {
    // Cache delete
    Route::get('/clear-all-cache', function () {
        Artisan::call("cache:clear");
    })->name('clear-cache');

    // Parser
    Route::post('/save-parser-info', [\App\Http\Controllers\Admin\ParserController::class, 'save'])->name('save-parser-info');
    Route::get('/download-lots', [\App\Http\Controllers\Admin\ParserController::class, 'download'])->name('download-lots');
});



// Роуты на вёрстку
Route::group(['prefix' => 'html'], function () {
    Route::get('/links', function () {
        return view('html.links');
    })->name('html.links');
    Route::get('/index', function () {
        return view('html.index');
    })->name('html.index');
    Route::get('/catalog', function () {
        return view('html.catalog');
    })->name('html.catalog');
    Route::get('/card', function () {
        return view('html.card');
    })->name('html.card');
    Route::get('/dealer-services', function () {
        return view('html.dealer-services');
    })->name('html.dealer-services');
    Route::get('/new-elektromobili', function () {
        return view('html.new-elektromobili');
    })->name('html.new-elektromobili');
    Route::get('/elektromobili', function () {
        return view('html.elektromobili');
    })->name('html.elektromobili');
    Route::get('/delivery', function () {
        return view('html.delivery');
    })->name('html.delivery');
    Route::get('/news', function () {
        return view('html.news');
    })->name('html.news');
    Route::get('/article', function () {
        return view('html.article');
    })->name('html.article');
    Route::get('/contacts', function () {
        return view('html.contacts');
    })->name('html.contacts');
    Route::get('/guarantee', function () {
        return view('html.guarantee');
    })->name('html.guarantee');
});