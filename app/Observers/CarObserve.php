<?php

namespace App\Observers;

use App\Models\Car;
use App\Services\Car\SetCarCategoriesService;

class CarObserve
{
    /**
     * Handle the Car "created" event.
     *
     * @param Car $car
     * @return void
     */
    public function created(Car $car)
    {
        SetCarCategoriesService::apply($car);
    }

    /**
     * Handle the Car "updated" event.
     *
     * @param Car $car
     * @return void
     */
    public function updated(Car $car)
    {
        SetCarCategoriesService::apply($car);
    }

}
