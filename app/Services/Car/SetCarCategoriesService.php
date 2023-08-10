<?php

namespace App\Services\Car;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Domain;
use App\Models\Property;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SetCarCategoriesService
{
    // todo: Написать скрипт который перегонит значения свойств gruzovye, passazhirskie в gruzovye-i-passazhirskie

    private Car $car;
    private $carProperties;
    // Во время обработки скрипта в это поле собираются id всех
    // категорий которые нужно привязать к машине по определённой логике клиента
    private array $categories = [];


    public function __construct(Car $car)
    {
        $this->setCar($car);
        $this->setCarProperties();
    }

    public static function apply(Car $car)
    {
        $instance = new self($car);
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

        $categoriesIds = $this->getCategories();
        $this->getCar()->categories()->sync($categoriesIds);
    }

    public function brand($slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            $brand = Brand::findBySlug($slug);
            if ($brand) {
                $category = $this->createCategory($brand->title);
            }
        }

        if ($category) {
            $this->addToCategories($category->id);
        }
    }

    public function model($slug)
    {
        $category = Category::findBySlug($slug);
        if (!$category) {
            $model = CarModel::findBySlug($slug);
            if ($model) {
                $category = $this->createCategory($model->title);
            }
        }

        if ($category) {
            $this->addToCategories($category->id);
        }
    }

    public function carcaseType($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();
        if (!$category) {
            $property = Property::findBySlug(Property::PROPERTY_CARCASE_TYPE_SLUG);
            if (!key_exists($slug, $property->getOptions())) {
                return;
            }
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
                        $auctionCategory = Category::findBySlug('aukcion-avto-iz-korei');
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
                $slug  = 'avto-v-ukraine';
                if (app('domain')->getDomain()->id == Domain::KAZACHSTAN_DOMAIN) {
                    $slug = 'avto-v-kazahstane';
                }

                $this->addToCategories(Category::findBySlug($slug)?->id);
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
        $category = Category::findBySlug(Str::slug($title));
        if (!$category) {
            $category = Category::create([
                'title' => Str::ucfirst($title),
                'slug' => Str::slug($title),
                'active' => 1,
            ]);
        }
        return $category;
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

    public function getCarProperties()
    {
        return $this->carProperties;
    }

    public function getCar()
    {
        return $this->car;
    }

    public function setCar(Car $car)
    {
        $this->car = $car;
    }

    public function setCarProperties()
    {
        $this->carProperties = $this->getCar()->properties;
    }
}
