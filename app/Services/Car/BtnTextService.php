<?php

namespace App\Services\Car;

use App\Enums\BtnTextType;
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
    public string $type;

    public function __construct(Car|Product $car, string $type)
    {
        $this->setCar($car);
        $this->setType($type);
        $this->btnText();
    }

    public function btnText()
    {
        $this->btnText = null;

        if ($this->getType() === BtnTextType::BuyBtn->value) {
            // Текст кнопки по умолчанию
            $this->btnText = Setting::get('default_btn_text');
        }

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
        return Cache::remember(General::cacheKey($this->getCacheKey($this->getCar()->status . '_' . app()->getLocale())), 86400, function () {
            return $this->defaultQuery()->where('car_status', $this->getCar()->status)->orderBy('sort')->first()?->btn_text;
        });
    }

    public function getBtnTextByCategory()
    {
        $categoriesId = $this->getCar()->categories?->pluck('id')->toArray();

        return Cache::remember(General::cacheKey($this->getCacheKey(implode('_', $categoriesId) . '_' . app()->getLocale()) . $this->getCar()->id), 86400, function () use ($categoriesId) {
            return $this->defaultQuery()->whereHas('categories', function ($query) use ($categoriesId) {
                $query->whereIn('category_id', $categoriesId);
            })->orderBy('sort')->first()?->btn_text;
        });
    }

    public function getBtnTextByCar()
    {
        return Cache::remember(General::cacheKey($this->getCacheKey($this->getCar()->id . '_' . app()->getLocale())), 86400, function () {
            return $this->defaultQuery()->whereHas('cars', function ($query) {
                $query->where('car_id', $this->getCar()->id);
            })->orderBy('sort')->first()?->btn_text;
        });
    }

    public function getCacheKey($key)
    {
        return self::BTN_TEXT_CACHE_KEY . $key . '_' . $this->getType();
    }

    public function defaultQuery()
    {
        return BtnText::query()->active()->where('btn_type', $this->getType());
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

    public function getType(): string
    {
       return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

}
