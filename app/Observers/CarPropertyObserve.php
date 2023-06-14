<?php

namespace App\Observers;

use App\Models\CarProperty;
use App\Services\Car\SetCarCategoriesByProperty;
use Illuminate\Support\Facades\Log;

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
        SetCarCategoriesByProperty::apply($carProperty);
    }

    /**
     * Handle the CarProperty "updated" event.
     *
     * @param CarProperty $carProperty
     * @return void
     */
    public function updated(CarProperty $carProperty)
    {
        SetCarCategoriesByProperty::apply($carProperty);
    }

}
