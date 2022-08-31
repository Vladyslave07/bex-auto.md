<?php


namespace App\filters;


use App\Models\Category;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Lang;

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
                    $filter[] = ['value' => $value, 'type' => $key];
                    break;
                default:
                    if ($property = Property::findBySlug($key)) {
                        $filter[$property->id]['value'] = $property->id . ':' . str_replace([';', ','], '|', $value);
                        $filter[$property->id]['type'] = $property->filter_type;
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
            $query->where('property_id', $propId)->where('car_property.value', array_shift($propValues));
            if (!empty($propValues)) {
                foreach ($propValues as $propValue) {
                    $query->orWhere('car_property.value', $propValue);
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
        $cars = $category->cars()->with('properties')->active()->get();

        //$prepParams = $filterQuery ? self::prepareFilterParams($filterQuery) : [];
        $properties = [];

        // Status
        $properties[self::CAR_STATUS_PROPERTY_SLUG] = self::statusProperty($cars);

        // Price
        $properties[self::FILTER_PRICE_PROPERTY_NAME] = self::priceProperty();

        // Usual properties
        $properties = array_merge($properties, self::usualProperties($cars));

        // Range properties
        $properties = array_merge($properties, self::rangeProperties($cars));

        return $properties;
//        // Установка активности параметров на текущей страницы фильтра
//        foreach ($properties as $key => $property) {
//            foreach ($property['values'] as $k => $value) {
//                foreach (self::filterQueryToArray($filterQuery) as $paramKey => $curParams) {
//                    if ($property['slug'] === $paramKey) {
//                        foreach ($curParams as $param) {
//                            if (mb_strtolower($value['value']) === $param) {
//                                $properties[$key]['values'][$k]['active'] = true;
//                            }
//                        }
//                    }
//                }
//            }
//        }

//        $propertiesFilter['active'] = self::getActiveProperties($propertiesFilter['filters']);
//
//        return $propertiesFilter;
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
                if ($property->filter_type === self::FROM_TO_PROPERTY_NAME) {
                    continue;
                }

                $properties[$property->slug]['name'] = $property->title;
                $properties[$property->slug]['type'] = $property->filter_type;
                $properties[$property->slug]['slug'] = $property->slug;

                if ($property->field_type === 'relation') {
                    $properties[$property->slug]['values'][$property->pivot->slug]['value'] = $property->pivot->value;
                    $properties[$property->slug]['values'][$property->pivot->slug]['active'] = false;
                } else {
                    foreach ($property->getOptions() as $k => $option) {
                        if ($property->pivot->slug == $k) {
                            $properties[$property->slug]['values'][$k]['value'] = $option;
                            $properties[$property->slug]['values'][$k]['active'] = false;
                        }
                    }
                }
            }
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
            $status['values'][$car->status] = $car->status;
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
                if ($property->filter_type !== self::FROM_TO_PROPERTY_NAME) {
                    continue;
                }
                $ranges[$property->slug]['name'] = $property->title;
                $ranges[$property->slug]['type'] = $property->filter_type;
                $ranges[$property->slug]['slug'] = $property->slug;
                $ranges[$property->slug]['values'][] = $property->pivot->value;
            }
        }

        $properties = Property::query()->whereIn('slug', array_column($ranges, 'slug'))->get(['slug', 'prefix', 'step']);

        foreach ($ranges as $key => $range) {
            if ($property = $properties->where('slug', $key)->first()) {
                $range = self::makeValueFroFromToField(range(min($range['values']), max($range['values']), $property->step), $property->prefix);
                $ranges[$key]['values'] = ['from' => $range, 'to' => $range];
            }
        }
        return $ranges;
    }

    /**
     * @return array
     * todo: получать значение из текущих машин
     */
    public static function priceProperty(): array
    {
        $properties['name'] = Lang::get('category.filter.price');
        $properties['type'] = self::FROM_TO_PROPERTY_NAME;
        $properties['slug'] = self::FILTER_PRICE_PROPERTY_NAME;
        $range = self::makeValueFroFromToField(range(5000, 50000, 2500), '$');
        $properties['values'] = ['from' => $range, 'to' => $range];
        // todo: станавливать текущие значени если пользователь перешел на страницу  фильтра
//        $properties['current_value'] = [];
//
//        foreach ($params as $param) {
//            if ($param['type'] === $propertySlug) {
//                $value = explode('~', $param['value']);
//                $properties['current_value'] = ['min' => $value[0], 'max' => $value[1]];
//            }
//        }
        return $properties;
    }

    /**
     * @param $range
     * @param $prefix
     * @return array
     */
    public static function makeValueFroFromToField($range, $prefix)
    {
        $items = array_flip($range);
        $newRange = [];
        foreach ($items as $key => $item) {
            $newRange[$key] = $prefix . ' ' . $key;
        }
        return $newRange;
    }


}