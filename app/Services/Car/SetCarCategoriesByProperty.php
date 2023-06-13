<?php

namespace App\Services\Car;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\CarProperty;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Str;


class SetCarCategoriesByProperty
{

    // todo: Написать скрипт который перегонит значения свойств gruzovye, passazhirskie в gruzovye-i-passazhirskie


    private CarProperty $carProperty;
    private $property;
    private $car;
    // Во время обработки скрипта в это поле собираются id всех
    // категорий которые нужно привязать к машине по определённой логике клиента
    private array $categories = [];


    public function __construct(CarProperty $carProperty)
    {
        $this->carProperty = $carProperty;
        $this->setProperty();
        $this->setCar();
    }

    public static function apply(CarProperty $carProperty)
    {
        $instance = new self($carProperty);
        $instance->setCarCategories();
    }

    public function setCarCategories()
    {
        // Вызов предустановленных методов для связи с категориями
        foreach ($this->getCar()->properties as $property) {
            if (!$property->pivot->slug) {continue;}
            $method = Str::camel($property->slug);
            if (method_exists($this, $method)) {
                $this->$method($property->pivot->slug);
            }
        }

        $this->getCar()->categories()->sync($this->getCategories());
    }

    public function brand($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        if (!$category) {
            $brand = Brand::query()->where('slug', $slug)->first();
            $category = $this->createCategory($brand->title);
        }

        $this->addToCategories($category->id);
    }

    public function model($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        if (!$category) {
            $model = CarModel::query()->where('slug', $slug)->first();
            $category = $this->createCategory($model->title);
        }

        $this->addToCategories($category->id);
    }

    public function carcaseType($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        if (!$category) {
            $property = Property::query()->where('slug', Property::PROPERTY_CARCASE_TYPE_SLUG)->first();
            $category = $this->createCategory($property->getOptions()[$slug]);
        }
        $this->addToCategories($category->id);
    }

    public function createCategory(string $title)
    {
        return Category::create([
            'title' => Str::ucfirst($title),
            'slug' => $this->getCarProperty()->slug,
            'active' => 1,
        ]);
    }

    public function addToCategories($categoryId)
    {
        $this->categories[] = $categoryId;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getCarProperty(): CarProperty
    {
        return $this->carProperty;
    }

    public function getCar()
    {
        return $this->car;
    }

    public function getProperty()
    {
        return $this->property;
    }

    public function setProperty()
    {
        $this->property = Property::query()->where('id', $this->getCarProperty()->property_id)->first();
    }

    public function setCar()
    {
        $this->car = Car::query()->where('id', $this->getCarProperty()->car_id)->first();
    }

}
