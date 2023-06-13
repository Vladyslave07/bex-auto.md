<?php

namespace App\Services\Car;

use App\Models\Car;

class SetCarCategoriesService
{
    private Car $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public static function apply(Car $car)
    {
        $instance = new self($car);
        $instance->setCarCategories();
    }



    public function setCarCategories()
    {
        dd($this->getCar());
    }

    public function getCar(): Car
    {
        return $this->car;
    }

}
