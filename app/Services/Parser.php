<?php


namespace App\Services;


use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Property;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Parser
{
    public string $listUrl;
    public string $detailUrl;
    public string $token;

    // Car properties
    public $propertyBrand;
    public $propertyModel;
    public $propertyCarcaseType;
    public $propertyCarcaseTypeOptions;
    public $propertyFuel;
    public $propertyFuelOptions;

    const FIRST_PAGE = 1;

    public function __construct(string $listUrl, string $detailUrl, string $token)
    {
        $this->setListUrl($listUrl);
        $this->setDetailUrl($detailUrl);
        $this->setToken($token);

        // Set car properties
        $this->setPropertyBrand(Property::getBySlug('brand'));
        $this->setPropertyModel(Property::getBySlug('model'));
        $this->setPropertyCarcaseType(Property::getBySlug('carcase_type'));
        $this->setPropertyFuel(Property::getBySlug('fuel'));

        // Set default property options
        $this->setPropertyCarcaseTypeOptions();
        $this->setPropertyFuelOptions();
    }

    public function apply()
    {
        $countPages = $this->getCountPages();
        for ($page = 1; $page <= $countPages; $page++) {
            $lots = $this->getLots($page);
            foreach ($lots['data'] as $lot) {
                if ($lotId = $lot['id']) {
                    $this->createCar($this->getLotInfo($lotId));
                }
            }
        }
    }

    public function createCar($info)
    {
        if (!$info['id']) {
            return false;
        }
        // If car exist not update it
        if (Car::getCarByLotId($info['id'])) {
            return false;
        }

        $title = key_exists('title', $info) ? $info['title'] ?? '' : '';
        $vin = key_exists('vin', $info) ? $info['vin'] ?? '' : '';
        $price = key_exists('price', $info) ? $info['price'] ?? 0 : 0;
        $brandInfo = key_exists('brand', $info) ? $info['brand'] : [];
        $modelInfo = key_exists('model', $info) ? $info['model'] : [];
        $mileage = key_exists('mileage', $info) ? $info['mileage'] : 0;
        $carcaseType = $this->getCarcaseType($info);
        $fuel = $this->getFuel($info);

        $brand = Brand::query()->where('title->en', $brandInfo['title'] ?? '')->first(['slug']);
        $model = CarModel::query()->where('title->en', $modelInfo['title'] ?? '')->first(['slug']);

        $car = Car::create([
            'title' => $title,
            'lot_id' => $info['id'],
            // todo: Выводить это свойство в фильтр
            'year' => $info['year'],
            'price' => $price,
            'mileage' => $mileage,
            'vin' => $vin,
        ]);

        // Set properties for car
        if ($brand) {
            $car->properties()->attach($this->getPropertyBrand()->id, ['slug' => $brand->slug, 'value' => $brand->slug]);
        }
        if ($model) {
            $car->properties()->attach($this->getPropertyModel()->id, ['slug' => $model->slug, 'value' => $model->slug]);
        }
        if ($carcaseType) {
            $car->properties()->attach($this->getPropertyCarcaseType()->id, ['slug' => $carcaseType, 'value' => $info['carcase_type']]);
        }
        if ($fuel) {
            $car->properties()->attach($this->getPropertyFuel()->id, ['slug' => $fuel, 'value' => $info['fuel']['title']]);
        }



    }

    /**
     * returns lots list
     *
     * @param int $page
     * @return array|mixed
     */
    public function getLots($page = self::FIRST_PAGE)
    {
        return Http::withHeaders(['X-API-Key' => $this->getToken()])->get($this->getListUrl(), [
            'page' => $page,
        ])->json();
    }

    /**
     * returns count pages in lots list
     *
     * @return int|mixed
     */
    public function getCountPages()
    {
        $lotsInfo = $this->getLots();
        if (key_exists('total_pages_count', $lotsInfo)) {
            return $lotsInfo['total_pages_count'];
        }
        return self::FIRST_PAGE;
    }

    /**
     * returns detail info about lot
     *
     * @param $lotId
     * @return array|mixed
     */
    public function getLotInfo($lotId)
    {
        $detailUrl = str_replace('{lot_id}', $lotId, $this->getDetailUrl());
        return Http::withHeaders(['X-API-Key' => $this->getToken()])->get($detailUrl)->json();
    }

    /**
     *
     *
     * @param $carInfo
     * @return mixed|string|null
     */
    public function getCarcaseType($carInfo)
    {
        $carcaseType = null;

        // If in car info from parser not exist return null
        if (!key_exists('carcase_type', $carInfo) || !$carInfo['carcase_type']) {
            return null;
        }

        // Get current carcases types
        $carcaseTypeOptions = $this->getPropertyCarcaseTypeOptions();
        $optionNames = array_column($carcaseTypeOptions, 'name');

        // Check - If in current carcases has value from car info. Else create new option
        if (in_array($carInfo['carcase_type'], $optionNames)) {
            $carcaseName = $carInfo['carcase_type'];
            foreach ($carcaseTypeOptions as $option) {
                if ($carcaseName === $option['name']) {
                    $carcaseType = $option['value'];
                }
            }
        } else {
            // Create new option
            $carcaseType = Property::addOptionToProperty('carcase_type', $carInfo['carcase_type']);

            // Set new option to current entity
            $carcaseTypeOptions[] = ['name' => $carInfo['carcase_type'], 'value' => $carcaseType];
            $this->setPropertyCarcaseTypeOptions($carcaseTypeOptions);
        }

        return $carcaseType;
    }

    public function getFuel($carInfo)
    {
        $fuel = null;

        // If in car info from parser not exist return null
        if (!key_exists('fuel', $carInfo) || !$carInfo['fuel']) {
            return null;
        }

        $fuelOptions = $this->getPropertyFuelOptions();
        $optionNames = array_column($fuelOptions, 'name');
        $fuelName = $carInfo['fuel']['title'];

        if (in_array($fuelName, $optionNames)) {
            foreach ($fuelOptions as $option) {
                if ($fuelName === $option['name']) {
                    $fuel = $option['value'];
                }
            }
        } else {
            // Create new option
            $fuel = Property::addOptionToProperty('fuel', $fuelName);

            // Set new option to current entity
            $carcaseTypeOptions[] = ['name' => $fuelName, 'value' => $fuel];
            $this->setPropertyCarcaseTypeOptions($carcaseTypeOptions);
        }

        return $fuel;
    }

    /**
     * @return string
     */
    public function getListUrl(): string
    {
        return $this->listUrl;
    }

    /**
     * @param string $url
     */
    public function setListUrl(string $url): void
    {
        $this->listUrl = $url;
    }

    /**
     * @return string
     */
    public function getDetailUrl(): string
    {
        return $this->detailUrl;
    }

    /**
     * @param string $url
     */
    public function setDetailUrl(string $url): void
    {
        $this->detailUrl = $url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed
     */
    public function getPropertyBrand(): mixed
    {
        return $this->propertyBrand;
    }

    /**
     * @param \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed $propertyBrand
     */
    public function setPropertyBrand($propertyBrand): void
    {
        $this->propertyBrand = $propertyBrand;
    }

    /**
     * @return mixed
     */
    public function getPropertyModel()
    {
        return $this->propertyModel;
    }

    /**
     * @param mixed $propertyModel
     */
    public function setPropertyModel($propertyModel): void
    {
        $this->propertyModel = $propertyModel;
    }

    /**
     * @return mixed
     */
    public function getPropertyCarcaseType()
    {
        return $this->propertyCarcaseType;
    }

    /**
     * @param mixed $propertyCarcaseType
     */
    public function setPropertyCarcaseType($propertyCarcaseType): void
    {
        $this->propertyCarcaseType = $propertyCarcaseType;
    }

    /**
     * @return mixed
     */
    public function getPropertyCarcaseTypeOptions()
    {
        return $this->propertyCarcaseTypeOptions;
    }

    /**
     * @param mixed $propertyCarcaseTypeOptions
     */
    public function setPropertyCarcaseTypeOptions($propertyCarcaseTypeOptions = [])
    {
        if (empty($propertyCarcaseTypeOptions)) {
            $carcaseTypes = json_decode($this->getPropertyCarcaseType()->options, true) ?: [];
            return $this->propertyCarcaseTypeOptions = $carcaseTypes;
        }
        return $this->propertyCarcaseTypeOptions = $propertyCarcaseTypeOptions;
    }

    /**
     * @return mixed
     */
    public function getPropertyFuel()
    {
        return $this->propertyFuel;
    }

    /**
     * @param mixed $propertyFuel
     */
    public function setPropertyFuel($propertyFuel): void
    {
        $this->propertyFuel = $propertyFuel;
    }

    /**
     * @return mixed
     */
    public function getPropertyFuelOptions()
    {
        return $this->propertyFuelOptions;
    }

    /**
     * @param mixed $propertyFuelOptions
     */
    public function setPropertyFuelOptions($propertyFuelOptions = [])
    {
        if (empty($propertyFuelOptions)) {
            $fuels = json_decode($this->getPropertyFuel()->options, true) ?: [];
            return $this->propertyFuelOptions = $fuels;
        }
        return $this->propertyFuelOptions = $propertyFuelOptions;
    }



}