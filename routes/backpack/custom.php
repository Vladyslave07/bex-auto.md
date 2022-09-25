<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('setting', 'SettingCrudController');
    Route::crud('menu', 'MenuCrudController');
    Route::crud('branch', 'BranchCrudController');
    Route::crud('banner', 'BannerCrudController');
    Route::crud('form-result', 'FormResultCrudController');
    Route::crud('form-result/' . \App\Http\Livewire\Forms\CallBack::SLUG_FORM, 'FormResultCallBackCrudController');
    Route::crud('form-result/' . \App\Http\Livewire\Forms\BuyAndDeliveryAuto::SLUG_FORM, 'FormResultBuyAndDeliveryAutoCrudController');
    Route::crud('form-result/' . \App\Http\Livewire\Forms\OrderCalculate::SLUG_FORM, 'FormResultOrderCalculationCrudController');
    Route::crud('car', 'CarCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('popular-request', 'PopularRequestCrudController');
    Route::crud('brand', 'BrandCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('seo-text', 'SeoTextCrudController');
    Route::crud('car-model', 'CarModelCrudController');
    Route::crud('property', 'PropertyCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('benefit', 'BenefitCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::get('parser', 'ParserController@index');
}); // this should be the absolute last line of this file