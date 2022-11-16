<?php

use App\Http\Controllers\ReviewsController;
use App\Models\Domain;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// Sub-domains
$domains = Domain::all();
$domains->each(function ($domain) {
    Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'domain' => $domain->slug . env('APP_DOMAIN'),
    ], function () {
        commonRoute();
    });
});

// Main domain
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
], function () {
    commonRoute();
});

function commonRoute() {

    Route::get('br', function() {
        $brands = \App\Models\Brand::all();
        foreach ($brands as $brand) {
            $slug = json_decode($brand->slug, true);
            $brand->update([
                'slug' => $slug['ru']
            ]);
        }
    });

    // Index
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

    // Services
    Route::get('/service/{service}', [\App\Http\Controllers\ServiceController::class, 'service'])->name('service');

    // Car detail
    Route::get('/car-details/{car}', [\App\Http\Controllers\CardController::class, 'index'])->name('car_detail');

    // Categories
    Route::get(
        '/avto/{category}/{page?}/{filer?}',
        [\App\Http\Controllers\CatalogController::class, 'category']
    )->name('category');

    // Search
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

    // Thanks
    Route::get('/thanks', [\App\Http\Controllers\IndexController::class, 'thanks'])->name('thanks');

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

    Route::get('/reviews-list', ReviewsController::class);
}

// Admin actions
Route::group(['middleware' => ['admin']], function () {
    // Cache delete
    Route::get('/clear-all-cache', function () {
        Artisan::call("cache:clear");
    })->name('clear-cache');

    // Parser
    Route::post('/save-parser-info', [\App\Http\Controllers\Admin\ParserController::class, 'save'])->name('save-parser-info');
    Route::get('/download-lots', [\App\Http\Controllers\Admin\ParserController::class, 'download'])->name('download-lots');
    Route::get('/parser-queue-info', [\App\Http\Controllers\Admin\ParserController::class, 'infoForAjax'])->name('parser-queue-info');
    Route::post('/delete-queue', [\App\Http\Controllers\Admin\ParserController::class, 'deleteQueue'])->name('delete-queue');
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
    Route::get('/thanks-order', function () {
        return view('html.thanks-order');
    })->name('html.thanks-order');
    Route::get('/search', function () {
        return view('html.search');
    })->name('html.search');
});