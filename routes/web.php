<?php

use App\Http\Controllers\ReviewsController;
use App\Models\Domain;
use App\Services\Sitemap\SitemapGeneral;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('clear-car', function () {
    $domain = app('domain')->getDomain();

    // Первым делом вручную удалить меню

    // Очистка авто для домена
//    $cars = \App\Models\Car::query()->whereNot('domain_id', $domain->id)->get();
//    foreach ($cars as $car) {
//        $car->delete();
//    }
    // Очистка категорий для домена
//    $categories = \App\Models\Category::query()->whereHas('domains', function ($q) use ($domain) {
//        return $q->whereNot('domain_id', $domain->id);
//    })->get();
//    dd($categories);
//
//    foreach ($categories as $category) {
//        $category->delete();
//    }
    // Очистка марок автомобиля
//    $brands = \App\Models\Brand::query()->whereHas('domains', function ($q) use ($domain) {
//        return $q->whereNot('domain_id', $domain->id);
//    })->get();
//    dd($brands);
//    foreach ($brands as $brand) {
//        $brand->delete();
//    }
    // Назначение сео текстов для категорий домена
    // todo: Сделать тоже самое для title и description
//    $categories = \App\Models\Category::all();
//    $key = $domain->slug;
//    foreach ($categories as $category) {
//        $seoTextId = $category->domain_seo_text_id;
//        $category->update([
//            'seo_text_id' => $seoTextId ?: null
//        ]);
//    }
    // Очистка Сео текстов
//    $seoTexts = \App\Models\SeoText::query()->whereHas('domains', function ($q) use ($domain) {
//        return $q->whereNot('domain_id', $domain->id);
//    })->get();
//    dd($seoTexts);
//    foreach ($seoTexts as $seoText) {
//        $seoText->delete();
//    }

    // Очистка Товаров для домена
//    $products = \App\Models\Product::query()->whereNot('domain_id', $domain->id)->get();
//    foreach ($products as $product) {
//        $product->delete();
//    }

    // Очистка филиалов для домена
//    $branches = \App\Models\Branch::query()->whereNot('domain_id', $domain->id)->get();
//    foreach ($branches as $branch) {
//        $branch->delete();
//    }

    // Очистка городов
    // ЗАПУСИТЬ ТОЛЬКО ДЛЯ KZ ДОМЕНА!!!!!
//    $cities = \App\Models\City::all();
//    dd(count($cities));
//    foreach ($cities as $citiy) {
//        $citiy->delete();
//    }

    // Очистка филиалов для домена
//    $branches = \App\Models\Branch::query()->whereNot('domain_id', $domain->id)->get();
//    dd(count($branches));
//    foreach ($branches as $branch) {
//        $branch->delete();
//    }

    // Очистка новостей для домена
//    $news = \App\Models\News::query()->whereNot('domain_id', $domain->id)->get();
//    dd($news->count());
//    foreach ($news as $new) {
//        $new->delete();
//    }

    // Очистка результатов форм для домена
//    $results = \App\Models\FormResult::query()->whereNot('domain_id', $domain->id)->get();
//    dd($results->count());
//    foreach ($results as $result) {
//        $result->delete();
//    }

    // Очистка Отзывов для домена
//    $reviews = \App\Models\Review::query()->whereNot('domain_id', $domain->id)->get();
//    dd($reviews->count());
//    foreach ($reviews as $review) {
//        $review->delete();
//    }

    dd($domain->slug);


});

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


function commonRoute()
{
    Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');

    Route::get('sitemap.xml', function (){
        $xml = file_get_contents(public_path(SitemapGeneral::getSavePath('sitemap', app()->getLocale())));
        return response($xml, 200)->header('Content-Type', 'application/xml');
    });

    // Services
    Route::get('/uslugi/{service}', [\App\Http\Controllers\ServiceController::class, 'service'])->name('service');

    // Car detail
    Route::get('/car-details/{car}', [\App\Http\Controllers\CardController::class, 'index'])->name('car_detail');

    // Categories
    Route::get(
        '/avto/{category}/{page?}/{filter?}',
        [\App\Http\Controllers\CatalogController::class, 'category']
    )->name('category');

    // Product detail
    Route::get('/car-product/{product}', [\App\Http\Controllers\CardController::class, 'product'])->name('product_detail');

    // Product categories
    Route::get(
        '/products/{category}/{page?}/{filter?}',
        [\App\Http\Controllers\CatalogController::class, 'category']
    )->name('category_products');

    // Search
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

    // Thanks
    Route::get('/thanks', [\App\Http\Controllers\IndexController::class, 'thanks'])->name('thanks');

    // About us
    Route::get('/about', [\App\Http\Controllers\IndexController::class, 'staticPage'])->name('static.about');

    // News
    Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');

    // News detail
    Route::get('/news/{article}', [\App\Http\Controllers\NewsController::class, 'detail'])->name('news_detail');

    Route::post('/news/callback', [\App\View\Components\NewsCallBack::class, 'submit'])->name('news-callback');

    // Guarantee
    Route::get('/guarantee', [\App\Http\Controllers\IndexController::class, 'staticPage'])->name('static.guarantee');

    // Contacts
    Route::get('/contacts', [\App\Http\Controllers\IndexController::class, 'staticPage'])->name('static.contacts');

    Route::get('/privacy-policy', [\App\Http\Controllers\IndexController::class, 'staticPage'])->name('static.privacy');

    Route::get('/reviews-list', ReviewsController::class);

    // Index
    Route::get('/{city?}', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
}

// Admin actions
Route::group(['middleware' => ['admin']], function () {
    // Cache delete
    Route::get('/cache/clear', function () {
        Artisan::call("cache:clear");
    })->name('clear-cache');

    // Parser
    Route::post('parser/save', [\App\Http\Controllers\Admin\ParserController::class, 'save'])->name('save-parser-info');
    Route::get('parser/download', [\App\Http\Controllers\Admin\ParserController::class, 'download'])->name('download-lots');
    Route::get('parser/queue-info', [\App\Http\Controllers\Admin\ParserController::class, 'infoForAjax'])->name('parser-queue-info');
    Route::post('parser/delete', [\App\Http\Controllers\Admin\ParserController::class, 'deleteQueue'])->name('delete-queue');
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
    Route::get('/about', function () {
        return view('html.about');
    })->name('html.about');
    Route::get('/new-card', function () {
        return view('html.new-card');
    })->name('html.new-card');
});
