<?php


namespace App\filters;

use App\Helper\General;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class CarFilter
{
    protected Builder $query;
    protected array $filterParams;

    const CAR_STATUS_PROPERTY_SLUG = 'status';
    const FILTER_PRICE_PROPERTY_NAME = 'price';
    const FROM_TO_PROPERTY_NAME = 'from_to_select';

    const FILTER_PREFIX = '/filter/';

    public function __construct(Builder $query, string $queryString)
    {
        $this->query = $query;
        $this->filterParams = $this->prepareFilterParams($queryString);
    }

    public function apply()
    {
        foreach ($this->filterParams as $property) {
            $type = $property['type'];
            if (method_exists($this, $type)) {
                $this->$type($property['value']);
            }
        }
        return $this->query;
    }

    /**
     * Логика преобразования строки фильтра в строку запроса
     *
     * @param string $queryString
     * @return array
     */
    public static function prepareFilterParams(string $queryString)
    {
        $filter = [];
        $filters = str_contains($queryString, '_') ? explode('_', $queryString) : [$queryString];
        foreach ($filters as $filterPair) {
            [$key, $value] = explode(':', $filterPair);

            switch ($key) {
                case self::FILTER_PRICE_PROPERTY_NAME:
                case self::CAR_STATUS_PROPERTY_SLUG:
                    $filter[] = ['value' => $value, 'type' => $key, 'slug' => $key];
                    break;
                default:
                    if ($property = Property::findBySlug($key)) {
                        $filter[$property->id]['value'] = $property->id . ':' . str_replace([';', ','], '|', $value);
                        $filter[$property->id]['type'] = $property->filter_type;
                        $filter[$property->id]['slug'] = $property->slug;
                    }
                    break;
            }
        }
        return $filter;
    }

    /**
     * Filtered by status
     *
     * @param string $queryString
     */
    public function status(string $value)
    {
        $value = preg_replace('/-/', '_', $value);
        $this->query->where(self::CAR_STATUS_PROPERTY_SLUG, $value);
    }

    /**
     * Filtered by price
     *
     * @param string $queryString
     */
    public function price(string $queryString)
    {
        if (!str_contains($queryString, '~')) {
            return;
        }

        [$from, $to] = explode('~', $queryString);

        $this->query->whereBetween('price', [$from, $to]);
    }

    public function select_checkbox(string $queryString)
    {
        $this->select($queryString);
    }

    public function select(string $queryString)
    {
        [$propId, $propValue] = explode(':', $queryString);

        $this->query->whereHas('properties', function ($query) use ($propId, $propValue) {
            $propValues = str_contains($propValue, '|') ? explode('|', $propValue) : [$propValue];
            $query->where('property_id', $propId)->where('car_property.slug', array_shift($propValues));
            if (!empty($propValues)) {
                foreach ($propValues as $propValue) {
                    $query->orWhere('car_property.slug', $propValue);
                }
            }
        });
    }

    public function from_to_select(string $queryString)
    {
        if (!str_contains($queryString, '~')) {
            return;
        }

        [$propId, $propValue] = explode(':', $queryString);

        $this->query->whereHas('properties', function ($query) use ($propId, $propValue) {
            [$from, $to] = explode('~', $propValue);
            $to = (int)$to;
            $from = (int)$from;

            $query->where('property_id', $propId)->whereBetween('car_property.value', [$from, $to]);
        });
    }

    public function checkbox(string $queryString)
    {
        [$propId, $propValue] = explode(':', $queryString);

        $this->query->whereHas('properties', function ($query) use ($propId, $propValue) {
            $propValues = str_contains($propValue, '|') ? explode('|', $propValue) : [$propValue];
            $query->where('property_id', $propId)->where('car_property.value', array_shift($propValues));
            if (!empty($propValues)) {
                foreach ($propValues as $propValue) {
                    $query->orWhere('car_property.value', $propValue);
                }
            }
        });
    }


    /**
     * Возвращает параметры фильтра для текущего раздела
     *
     * @param Category $category
     * @param null $filterQuery
     * @return array
     */
    public static function getCurrentPropertiesFilter(Category $category, $filterQuery = null)
    {
        // todo: Кешировать по тегу. Тегом будет выступать строка фильтра
        $cars = $category->cars()->with('properties')->carsForCurrentDomain()->active()->get();

        $properties = [];

        // Status
        $properties[self::CAR_STATUS_PROPERTY_SLUG] = self::statusProperty($cars);

        // Price
        $properties[self::FILTER_PRICE_PROPERTY_NAME] = self::priceProperty($cars);

        // Usual properties
        $properties = array_merge($properties, self::usualProperties($cars));

        // Range properties
        $properties = array_merge($properties, self::rangeProperties($cars));

        // Set models dependents for brand
        if ($filterQuery && (key_exists('model', $properties) && $properties['model']['values'])) {
            $models = self::getCurrentModels($filterQuery, $properties['model']['values']);
            $properties['model']['values'] = $models;
        }

        if (!empty($properties['brand']['values'])) {
            asort($properties['brand']['values']);
        }

        $prepParams = $filterQuery ? self::prepareFilterParams($filterQuery) : [];
        if (count($prepParams) > 0) {
            foreach ($prepParams as $param) {
                foreach ($properties as &$property) {
                    if ($param['slug'] == $property['slug']) {
                        foreach ($property['values'] as $key => $value) {

                            // only for status filter
                            if ($param['slug'] == self::CAR_STATUS_PROPERTY_SLUG) {
                                if (Str::contains(Str::slug($param['value'], '_'), $key)) {
                                    $property['values'][$key]['active'] = true;
                                }
                                continue;
                            }

                            if (str_contains($param['value'], $key)) {
                                $property['values'][$key]['active'] = true;
                            }
                        }
                    }
                }

            }
        }

        return $properties;
    }

    /**
     * Usual properties like: model, brand, type etc...
     *
     * @param $cars
     * @return array
     */
    public static function usualProperties($cars): array
    {
        $properties = [];
        foreach ($cars as $car) {
            foreach ($car->properties as $property) {
                if (!$property->show) {
                    continue;
                }

                if ($property->filter_type === self::FROM_TO_PROPERTY_NAME) {
                    continue;
                }

                $properties[$property->slug]['name'] = $property->title;
                $properties[$property->slug]['type'] = $property->filter_type;
                $properties[$property->slug]['slug'] = $property->slug;

                if ($property->field_type === 'relation') {
                    if (!$property->pivot->value || !$property->pivot->slug) {
                        continue;
                    }
                    $properties[$property->slug]['values'][$property->pivot->slug]['value'] = Str::ucfirst($property->pivot->value);
                    $properties[$property->slug]['values'][$property->pivot->slug]['active'] = false;
                } else {
                    foreach ($property->getOptions() as $k => $option) {
                        if ($property->pivot->slug == $k) {
                            $properties[$property->slug]['values'][$k]['value'] = Str::ucfirst($option);
                            $properties[$property->slug]['values'][$k]['active'] = false;
                        }
                    }
                }
            }
        }

        // sort year properties
        if (key_exists('year', $properties) && key_exists('values', $properties['year']) && count($properties['year']['values']) > 0) {
            krsort($properties['year']['values']);
        }

        return $properties;
    }

    /**
     * Status filter
     *
     * @param $cars
     * @return array
     */
    public static function statusProperty($cars): array
    {
        $status['type'] = self::CAR_STATUS_PROPERTY_SLUG;
        $status['slug'] = self::CAR_STATUS_PROPERTY_SLUG;
        foreach ($cars as $car) {
            $status['values'][$car->status]['value'] = $car->status;
            $status['values'][$car->status]['active'] = false;
        }
        return $status;
    }

    /**
     * Prepare Mileage filter property
     *
     * @param $cars
     * @return array
     */
    public static function rangeProperties($cars): array
    {
        $ranges = [];
        foreach ($cars as $car) {
            foreach ($car->properties as $property) {
                if ($property->filter_type !== self::FROM_TO_PROPERTY_NAME || !$property->pivot->value) {
                    continue;
                }
                $ranges[$property->slug]['name'] = $property->title;
                $ranges[$property->slug]['type'] = $property->filter_type;
                $ranges[$property->slug]['slug'] = $property->slug;
                if ($property->step <= (float)$property->pivot->value) {
                    $ranges[$property->slug]['values'][] = $property->pivot->value;
                }
            }
        }

        $properties = Property::query()->whereIn('slug', array_column($ranges, 'slug'))->get(['slug', 'prefix', 'step']);

        foreach ($ranges as $key => $range) {
            if ($property = $properties->where('slug', $key)->first()) {
                $min = min($range['values']);
                $max = max($range['values']);

                // for filters by power reserve
                if ($key === Property::PROPERTY_POWER_RESERVE) {
                    $max = max($range['values']);
                    $min = $min > 100 ? floor($min / 100) * 100 : 0;
                    $max = $max > 100 ? ceil($max / 10) * 10 : 0;
                }

                // for filters by mileage
                if ($key === Property::FUEL_MILEAGE_OPTION_SLUG) {
                    $min = 0;
                }

                $difference = $max - $min;
                if ($min !== $max && $max > $property->step && $difference > (int)$property->step) {
                    $range = self::makeValueFroFromToField(range((int)$min, (int)$max, (int)$property->step), $property->prefix);
                    $ranges[$key]['values'] = ['from' => $range, 'to' => $range];
                } else {
                    unset($ranges[$key]);
                }
            }
        }
        return $ranges;
    }

    /**
     * @param $cars
     * @return array
     * todo: получать значение из текущих машин
     */
    public static function priceProperty($cars): array
    {
        $properties['name'] = Lang::get('category.filter.price');
        $properties['type'] = self::FROM_TO_PROPERTY_NAME;
        $properties['slug'] = self::FILTER_PRICE_PROPERTY_NAME;

        $min = $cars->min('price') ?? 5000;
        $max = $cars->max('price') ?? 50000;

        $min = $min > 1000 ? floor($min / 1000) * 1000 : 0;

        $step = 2500;
        if ($max < $step) {
            $step = 100;
        }

        $diff = $max - $min;
        if ($max <= 0 || $max <= $step || $diff <= $step) {
            $properties['values'] = [];
        } else {
            $range = self::makeValueFroFromToField(range($min, $max, $step), '$');
            $range[$max] = '$' . $max;
            $properties['values'] = ['from' => $range, 'to' => $range];
        }

        return $properties;
    }

    /**
     * @param string $filterQuery
     * @param array $curModels
     * @return array
     */
    public static function getCurrentModels(string $filterQuery, array $curModels)
    {
        $brand = null;
        $filters = str_contains($filterQuery, '_') ? explode('_', $filterQuery) : [$filterQuery];
        if (count($filters) > 0) {
            foreach ($filters as $filterPair) {
                [$key, $value] = explode(':', $filterPair);
                if ($key === 'brand') {
                    $brand = Brand::query()->where('slug', $value)->first(['id']);
                }
            }
        }

        $currentCategoryModels = [];
        if ($brand) {
            $models = CarModel::query()
                ->whereIn('slug', array_keys($curModels))
                ->where('brand_id', $brand->id)->get();

            foreach ($curModels as $key => $value) {
                $title = $models->where('slug', $key)->first()?->title;
                if (strlen($title) > 0) {
                    $currentCategoryModels[$key]['value'] = $title;
                    $currentCategoryModels[$key]['active'] = $value['active'];
                }
            }
        }
        return $currentCategoryModels;
    }

    /**
     * @param $range
     * @param $prefix
     * @return array
     */
    public static function makeValueFroFromToField($range, $prefix)
    {
        $range = array_map('strval', $range);
        $items = array_flip($range);
        $newRange = [];
        foreach ($items as $key => $item) {
            $newRange[$key] = $prefix . ' ' . $key;
        }
        return $newRange;
    }


}
