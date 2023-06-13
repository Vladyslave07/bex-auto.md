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
        Log::warning($carProperty->property_id);
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
        Log::warning($carProperty->property_id);
        SetCarCategoriesByProperty::apply($carProperty);
    }

    /**
     * Handle the CarProperty "deleted" event.
     *
     * @param CarProperty $carProperty
     * @return void
     */
    public function deleted(CarProperty $carProperty)
    {
        //
    }

    /**
     * Handle the CarProperty "restored" event.
     *
     * @param CarProperty $carProperty
     * @return void
     */
    public function restored(CarProperty $carProperty)
    {
        //
    }

    /**
     * Handle the CarProperty "force deleted" event.
     *
     * @param CarProperty $carProperty
     * @return void
     */
    public function forceDeleted(CarProperty $carProperty)
    {
        //
    }
}
