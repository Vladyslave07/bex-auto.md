<?php

namespace App\Observers;

use App\Models\Car;
use App\Models\CarProperty;
use App\Services\Car\SetCarCategoriesService;

class CarPropertyObserve
{
    /**
     * Handle the CarProperty "created" event.
     *
     * @param CarProperty $carProperty
     * @return void
     */
    public function created(CarProperty $carProperty)
    {
        $car = Car::query()->where('id', $carProperty->car_id)->first();
        SetCarCategoriesService::apply($car);
    }

    /**
     * Handle the CarProperty "updated" event.
     *
     * @param CarProperty $carProperty
     * @return void
     */
    public function updated(CarProperty $carProperty)
    {
        $car = Car::query()->where('id', $carProperty->car_id)->first();
        SetCarCategoriesService::apply($car);
    }

}
