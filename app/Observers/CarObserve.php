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

    /**
     * Handle the Car "deleted" event.
     *
     * @param Car $car
     * @return void
     */
    public function deleted(Car $car)
    {
        //
    }

    /**
     * Handle the Car "restored" event.
     *
     * @param Car $car
     * @return void
     */
    public function restored(Car $car)
    {
        //
    }

    /**
     * Handle the Car "force deleted" event.
     *
     * @param Car $car
     * @return void
     */
    public function forceDeleted(Car $car)
    {
        //
    }
}
