<?php

namespace App\Services\Car;

use App\Helper\General;
use App\Models\BtnText;
use App\Models\Car;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class BtnTextService
{
    const BTN_TEXT_CACHE_KEY = 'btn_text_';

    public string|null $btnText;
    public Car|Product $car;

    public function __construct(Car|Product $car)
    {
        $this->setCar($car);
        $this->btnText();
    }

    public function btnText()
    {
        // Текст кнопки по умолчанию
        $this->btnText = Setting::get('default_btn_text');

        // Текст кнопки по статусу авто
        if ($text = $this->getBtnTextByCarStatus()) {
            $this->setBtnText($text);
        }

        if ($this->getCar() instanceof Car) {
            // Текст кнопки по категории
            if ($text = $this->getBtnTextByCategory()) {
                $this->setBtnText($text);
            }
        }

        // Текст кнопки для конкретного авто
        if ($text = $this->getBtnTextByCar()) {
            $this->setBtnText($text);
        }
    }


    public function getBtnTextByCarStatus()
    {
        return Cache::remember(General::cacheKey(self::BTN_TEXT_CACHE_KEY . $this->getCar()->status), 86400, function () {
            return BtnText::query()->active()->where('car_status', $this->getCar()->status)->orderBy('sort')->first()?->btn_text;
        });
    }

    public function getBtnTextByCategory()
    {
        $categoriesId = $this->getCar()->categories?->pluck('id')->toArray();

        return Cache::remember(General::cacheKey(self::BTN_TEXT_CACHE_KEY . implode('_', $categoriesId) . $this->getCar()->id), 86400, function () use ($categoriesId) {
            return BtnText::query()->active()->whereHas('categories', function ($query) use ($categoriesId) {
                $query->whereIn('category_id', $categoriesId);
            })->orderBy('sort')->first()?->btn_text;
        });
    }

    public function getBtnTextByCar()
    {
        return Cache::remember(General::cacheKey(self::BTN_TEXT_CACHE_KEY . $this->getCar()->id), 86400, function () {
            return BtnText::query()->active()->whereHas('cars', function ($query) {
                $query->where('car_id', $this->getCar()->id);
            })->orderBy('sort')->first()?->btn_text;
        });
    }


    /**
     * @return string|null
     */
    public function getBtnText(): string|null
    {
        return $this->btnText;
    }

    /**
     * @param string|null $btnText
     */
    public function setBtnText(string|null $btnText): void
    {
        $this->btnText = $btnText;
    }

    /**
     * @return Car|Product
     */
    public function getCar(): Car|Product
    {
        return $this->car;
    }

    /**
     * @param Car|Product $car
     */
    public function setCar(Car|Product $car): void
    {
        $this->car = $car;
    }


}
