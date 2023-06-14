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
    private $carProperties;
    // Во время обработки скрипта в это поле собираются id всех
    // категорий которые нужно привязать к машине по определённой логике клиента
    private array $categories = [];


    public function __construct(CarProperty $carProperty)
    {
        $this->carProperty = $carProperty;
        $this->setProperty();
        $this->setCar();
        $this->setCarProperties();
    }

    public static function apply(CarProperty $carProperty)
    {
        $instance = new self($carProperty);
        $instance->setCarCategories();
    }

    public function setCarCategories()
    {
        // Вызов предустановленных методов для связи с категориями
        foreach ($this->getCarProperties() as $property) {
            if (!$property->pivot->slug) {continue;}
            $method = Str::camel($property->slug);
            if (method_exists($this, $method)) {
                $this->$method($property->pivot->slug);
            }
        }

        $this->setCategoryByCarStatus();

//        dd($this->getCategories());

        $this->getCar()->categories()->sync($this->getCategories());
    }

    public function brand($slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            $brand = Brand::findBySlug($slug);
            $category = $this->createCategory($brand->title);
        }

        $this->addToCategories($category->id);
    }

    public function model($slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            $model = CarModel::findBySlug($slug);
            $category = $this->createCategory($model->title);
        }

        $this->addToCategories($category->id);
    }

    public function carcaseType($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        if (!$category) {
            $property = Property::findBySlug(Property::PROPERTY_CARCASE_TYPE_SLUG);
            $category = $this->createCategory($property->getOptions()[$slug]);
        }
        $this->addToCategories($category->id);
    }

    public function fuel($slug)
    {
        if (!$this->isCar()) {
            return;
        }

        switch ($slug) {
            case 'electro':
                $category = Category::findBySlug('elektromobili');
                $this->addToCategories($category->id);
                // Если статус авто новый и топливо электро - добавлять в категорию новые автомобили
                if ($this->getCarProperties()->where('slug', Property::PROPERTY_STATE_SLUG)->first()?->pivot?->slug == 'new') {
                    $category = Category::findBySlug('novye-elektromobili');
                    $this->addToCategories($category->id);
                }
                // Если страна авто США, то добавить в категорию "электромобили из сша"
                if ($this->getCarProperties()->where('slug', Property::PROPERTY_COUNTRY_SLUG)->first()?->pivot?->slug == 'usa') {
                    $category = Category::findBySlug('elektromobili-iz-ssha');
                    $this->addToCategories($category->id);
                }
                break;
            case 'hybrid':
                $category = Category::findBySlug('gibridy');
                $this->addToCategories($category->id);
                break;
        }
    }

    public function country($slug)
    {
        if (!$this->isCar()) {
            return;
        }
        $category = null;
        switch ($slug){
            case 'usa':
                switch ($this->getCar()->status) {
                    case Car::COPRAT_STATUS:
                        $category = Category::findBySlug('aukcion-avto-iz-ssha');
                        break;
                    case Car::ON_ORDER_STATUS:
                    case Car::SOLD_STATUS:
                        $category = Category::findBySlug('avto-iz-ssha');
                        $auctionCategory = Category::findBySlug('aukcion-avto-iz-ssha');
                        $this->addToCategories($auctionCategory->id);
                        break;
                    default:
                        $category = Category::findBySlug('avto-iz-ssha');
                        break;
                }
                break;
            case 'korea':
                switch ($this->getCar()->status) {
                    case Car::ENCAR_STATUS:
                        $category = Category::findBySlug('aukcion-avto-iz-korei');
                        break;
                    case Car::ON_ORDER_STATUS:
                        $category = Category::findBySlug('avto-iz-korei');
                        $auctionCategory = Category::findBySlug('aukcion-avto-iz-ssha');
                        $this->addToCategories($auctionCategory->id);
                        break;
                    default:
                        $category = Category::findBySlug('avto-iz-korei');
                        break;
                }
                break;
            case 'china':
                $category = Category::findBySlug('avto-iz-kitaya');
                break;
            case 'europe':
                $category = Category::findBySlug('avto-iz-evropy');
                break;
        }

        if ($category) {
            $this->addToCategories($category->id);
        }
    }

    public function setCategoryByCarStatus()
    {
        if (!$this->isCar()) {
            return;
        }

        $status = $this->getCar()->status;
        switch ($status) {
            case Car::IN_STOCK_STATUS:
            case Car::SOLD_STATUS:
                $this->addToCategories(Category::findBySlug('avto-v-ukraine')?->id);
                break;
        }
    }

    public function type($slug)
    {
        $category = null;
        switch ($slug) {
            case 'moto':
                $category = Category::findBySlug('motocikly');
                break;
            case 'truck':
                $category = Category::findBySlug('pogruzchiki');
                break;
            case 'vodnyj-transport':
                $category = Category::findBySlug('boats');
                break;
        }

        if ($category) {
            $this->addToCategories($category->id);
        }
    }

    public function isCar()
    {
        return $this->getCarProperties()->where('slug', Property::PROPERTY_TYPE_SLUG)->first()?->pivot?->slug == 'auto';
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
        if (!in_array($categoryId, $this->getCategories())) {
            $this->categories[] = $categoryId;
        }
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

    public function getCarProperties()
    {
        return $this->carProperties;
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

    public function setCarProperties()
    {
        $this->carProperties = $this->getCar()->properties;
    }

}
