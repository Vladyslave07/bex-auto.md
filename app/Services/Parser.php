<?php


namespace App\Services;


use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Property;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\SlugService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Parser
{
    public string $listUrl;
    public string $detailUrl;
    public string $token;
    public string $categoryId;

    // Car properties
    public $propertyBrand;
    public $propertyModel;
    public $propertyCarcaseType;
    public $propertyCarcaseTypeOptions;
    public $propertyFuel;
    public $propertyFuelOptions;
    public $propertyDriveUnit;
    public $propertyDriveUnitOptions;
    public $propertyEngineType;
    public $propertyType;
    public $propertyTypeOptions;

    const FIRST_PAGE = 1;

    public function __construct(string $listUrl, string $detailUrl, string $token, $categoryId = null)
    {
        $this->setListUrl($listUrl);
        $this->setDetailUrl($detailUrl);
        $this->setToken($token);
        $this->setCategoryId($categoryId);

        // Set car properties
        $this->setPropertyBrand(Property::getBySlug('brand'));
        $this->setPropertyModel(Property::getBySlug('model'));
        $this->setPropertyCarcaseType(Property::getBySlug('carcase_type'));
        $this->setPropertyFuel(Property::getBySlug('fuel'));
        $this->setPropertyDriveUnit(Property::getBySlug('drive_unit'));
        $this->setPropertyEngineType(Property::getBySlug('engine_type'));
        $this->setPropertyType(Property::getBySlug('type'));

        // Set default property options
        $this->setPropertyCarcaseTypeOptions();
        $this->setPropertyFuelOptions();
        $this->setPropertyDriveUnitOptions();
        $this->setPropertyTypeOptions();
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
        $engineType = key_exists('engine_type', $info) ? $info['engine_type'] : '';

        $brand = Brand::getBrandByTitle($brandInfo['title'] ?? '') ?: Brand::createBrand($brandInfo['title']);
        $model = CarModel::getModelByTitle($modelInfo['title'] ?? '') ?: CarModel::createModel($modelInfo['title'], $brand->id);

        $car = Car::create([
            'active' => 1,
            'status' => Car::EXPECTED_STATUS,
            'title' => $title,
            'lot_id' => $info['id'],
            // todo: Выводить это свойство в фильтр
            'year' => $info['year'],
            'price' => $price,
            'mileage' => $mileage,
            'vin' => $vin,
        ]);

        if (key_exists('images', $info) && count($info['images']) > 0) {
            $images = [];
            foreach ($info['images'] as $key => $image) {
                $src = file_get_contents('http://185.149.40.229' . $image['image']);
                $imageName = basename($image['image']);
                $imagePath = 'products/' . $car->id .'/' . $imageName;
                $images[] = $imagePath;
                Storage::disk('public')->put($imagePath, $src);
            }
            $car->update([
                'images' => $images,
            ]);
        }

        // Set properties for car

        $carcaseType = $this->getPropertyValue('carcase_type', $info, $this->getPropertyCarcaseTypeOptions());
        $fuel = $this->getPropertyValue('fuel', $info, $this->getPropertyFuelOptions());
        $driveUnit = $this->getPropertyValue('drive_unit', $info, $this->getPropertyDriveUnitOptions());
        $carTypes = $this->getPropertyValue('type', $info, $this->getPropertyTypeOptions());

        if ($brand) {
            $car->properties()->attach($this->getPropertyBrand()->id, ['slug' => $brand->slug, 'value' => $brand->slug]);
        }
        if ($model) {
            $car->properties()->attach($this->getPropertyModel()->id, ['slug' => $model->slug, 'value' => $model->slug]);
        }
        if ($carcaseType) {
            $car->properties()->attach($this->getPropertyCarcaseType()->id, ['slug' => $carcaseType, 'value' => $carcaseType]);
        }
        if ($fuel) {
            $car->properties()->attach($this->getPropertyFuel()->id, ['slug' => $fuel, 'value' => $fuel]);
        }
        if ($driveUnit) {
            $car->properties()->attach($this->getPropertyDriveUnit()->id, ['slug' => $driveUnit, 'value' => $driveUnit]);
        }
        if ($carTypes) {
            $car->properties()->attach($this->getPropertyType()->id, ['slug' => $carTypes, 'value' => $carTypes]);
        }
        if (strlen($engineType) > 0) {
            $engineType = preg_replace('/(.*)[L|l].*/', '$1', $engineType);
            $car->properties()->attach($this->getPropertyEngineType()->id, ['slug' => $engineType, 'value' => $engineType]);
        }
        if (strlen($engineType) > 0) {
            $engineType = preg_replace('/(.*)[L|l].*/', '$1', $engineType);
            $car->properties()->attach($this->getPropertyEngineType()->id, ['slug' => $engineType, 'value' => $engineType]);
        }
        if ($this->getCategoryId() > 0) {
            $car->categories()->attach($this->getCategoryId());
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
     * Method return property value or create new one and return created value
     *
     * @param string $propertySlug
     * @param array $carInfo
     * @param $options
     * @return mixed|string|null
     */
    public function getPropertyValue(string $propertySlug, array $carInfo, $options)
    {
        $propertyOptionValue = null;

        // If in car info from parser not exist return null
        if (!key_exists($propertySlug, $carInfo) || !$carInfo[$propertySlug]) {
            return null;
        }

        $propertyValue = $carInfo[$propertySlug];
        if (is_array($carInfo[$propertySlug]) && key_exists('title', $carInfo[$propertySlug])) {
            $propertyValue = $carInfo[$propertySlug]['title'];
        }

        $optionValues = array_column($options, 'value');
        $optionSlug = $this->makeSlug($propertyValue);

        if (!$optionSlug) {
            return null;
        }

        if (in_array($optionSlug, $optionValues)) {
            foreach ($options as $option) {
                if ($optionSlug === $option['value']) {
                    $propertyOptionValue = $option['value'];
                }
            }
        } else {
            // Create new option
            $propertyOptionValue = Property::addOptionToProperty($propertySlug, $propertyValue);

            // Set new option to current entity
            $options[] = ['name' => $propertyValue, 'value' => $propertyOptionValue];

            $methodName = $this->makeMethodName($propertySlug);
            if (method_exists($this, $methodName)) {
                $this->$methodName($options);
            }
        }

        return $propertyOptionValue;
    }

    /**
     * Make slug from title
     *
     * @param $title
     * @return string
     */
    public function makeSlug($title)
    {
        return SlugService::createSlug(Property::class, 'slug', $title, ['unique' => false]);
    }

    /**
     * Returns name of method like: setPropertyFuelOptions
     *
     * @param $str
     * @return string
     */
    public function makeMethodName($str)
    {
        return 'setProperty' . Str::ucfirst(Str::camel($str)) . 'Options';
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

    /**
     * @return mixed
     */
    public function getPropertyDriveUnit()
    {
        return $this->propertyDriveUnit;
    }

    /**
     * @param mixed $propertyDriveUnit
     */
    public function setPropertyDriveUnit($propertyDriveUnit): void
    {
        $this->propertyDriveUnit = $propertyDriveUnit;
    }

    /**
     * @return mixed
     */
    public function getPropertyDriveUnitOptions()
    {
        return $this->propertyDriveUnitOptions;
    }

    /**
     * @param mixed $propertyDriveUnitOptions
     */
    public function setPropertyDriveUnitOptions($propertyDriveUnitOptions = [])
    {
        if (empty($propertyDriveUnitOptions)) {
            $driveUnits = json_decode($this->getPropertyDriveUnit()->options, true) ?: [];
            return $this->propertyDriveUnitOptions = $driveUnits;
        }
        return $this->propertyDriveUnitOptions = $propertyDriveUnitOptions;

    }

    /**
     * @return mixed
     */
    public function getPropertyEngineType()
    {
        return $this->propertyEngineType;
    }

    /**
     * @param mixed $propertyEngineType
     */
    public function setPropertyEngineType($propertyEngineType): void
    {
        $this->propertyEngineType = $propertyEngineType;
    }

    /**
     * @return mixed
     */
    public function getPropertyType()
    {
        return $this->propertyType;
    }

    /**
     * @param mixed $propertyType
     */
    public function setPropertyType($propertyType): void
    {
        $this->propertyType = $propertyType;
    }

    /**
     * @return mixed
     */
    public function getPropertyTypeOptions()
    {
        return $this->propertyTypeOptions;
    }

    /**
     * @param mixed $propertyTypeOptions
     */
    public function setPropertyTypeOptions($propertyTypeOptions = [])
    {
        if (empty($propertyTypeOptions)) {
            $carTypes = json_decode($this->getPropertyType()->options, true) ?: [];
            return $this->propertyTypeOptions = $carTypes;
        }
        return $this->propertyTypeOptions = $propertyTypeOptions;
    }

    /**
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @param null $categoryId
     */
    public function setCategoryId($categoryId = null)
    {
        if (!$categoryId) {
            $selectedCategory = \App\Models\Parser::query()->where('slug', 'category')->first();
            return $this->categoryId = $selectedCategory->id;
        }

        return $this->categoryId = $categoryId;
    }



}