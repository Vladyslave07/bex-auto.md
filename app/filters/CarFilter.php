<?php


namespace App\filters;


use App\Models\Category;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Lang;

class CarFilter
{
    protected Builder $query;
    protected array $filterParams;

    const CAR_STATUS_PROPERTY_SLUG = 'status';
    const FILTER_PRICE_PROPERTY_NAME = 'price';
    const FROM_TO_PROPERTY_NAME = 'from_to_select';

    const CAR_FIELD_FILTER_INFO = [
        'brand' => ['relation' => 'brand'],
        'model' => ['relation' => 'carModel']
    ];

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
                //case 'model':
//                    $filter[] = ['value' => str_replace([';', ','], '|', $value), 'type' => 'model'];
//                    break;
//                case 'brand':
//                    $filter[] = ['value' => str_replace([';', ','], '|', $value), 'type' => 'brand'];
//                    break;
//                default:
//                    if ($property = Property::findBySlug($key)) {
//                        $filter[$property->id]['value'] = $property->id . ':' . str_replace([';', ','], '|', $value);
//                        $filter[$property->id]['type'] = $property->filter_type;
//                    }
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

    /**
     * Возвращает параметры фильтра для текущего раздела
     *
     * @param Category $category
     * @param null $filterQuery
     * @param null $products
     * @return array
     */
    public static function getCurrentPropertiesFilter(Category $category, $filterQuery = null)
    {
        $properties = [];

        // todo: Кешировать
        $cars = $category->cars()->get();

        // параметры фильтра из строки запроса
        //$prepParams = $filterQuery ? self::prepareFilterParams($filterQuery) : [];

        foreach ($cars as $car) {
//            $properties['status']['name'] = Lang::get('car.' . $car->status);
            // Марка\Модель
//            foreach (self::MODEL_BRAND_FILTER_INFO as $key => $field) {
//                $relation = $field['relation'];
//                if ($object = $product->$relation) {
//                    $properties[$key]['name'] = Lang::get('filter.' . $key);
//                    $properties[$key]['type'] = $field['type'] ?? 'checkbox';
//                    $properties[$key]['slug'] = $key;
//                    $properties[$key]['values'][$object->slug]['value'] = $object->title;
//                    $properties[$key]['values'][$object->slug]['active'] = false;
//                }
//            }

            $properties['status']['type'] = 'status';
            $properties['status']['slug'] = 'status'; // Field name
            $properties['status']['values'][$car->status] = $car->status;


        }

        $properties[self::FILTER_PRICE_PROPERTY_NAME] = self::preparePriceFilter();


        return $properties;
            // Марка\Модель
//            foreach (self::MODEL_BRAND_FILTER_INFO as $key => $field) {
//                $relation = $field['relation'];
//                if ($object = $product->$relation) {
//                    $properties[$key]['name'] = Lang::get('filter.' . $key);
//                    $properties[$key]['type'] = $field['type'] ?? 'checkbox';
//                    $properties[$key]['slug'] = $key;
//                    $properties[$key]['values'][$object->slug]['value'] = $object->title;
//                    $properties[$key]['values'][$object->slug]['active'] = false;
//                }
//            }
//
//            foreach ($product->properties as $propKey => $property) {
//                $properties[$property->slug]['name'] = $property->name;
//                $properties[$property->slug]['type'] = $property->filter_type;
//                $properties[$property->slug]['slug'] = $property->slug;
//                if ($property->field_type === 'select') {
//                    foreach ($property->getOptions() as $k => $option) {
//                        $properties[$property->slug]['values'][$k]['value'] = $option;
//                        $properties[$property->slug]['values'][$k]['active'] = false;
//                    }
//                } else {
//                    $properties[$property->slug]['values'][$property->pivot->slug]['value'] = $property->pivot->value;
//                    $properties[$property->slug]['values'][$property->pivot->slug]['active'] = false;
//                }
//            }
//        }
//
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

//        $propertiesFilter['filters'] = $properties;
//        $propertiesFilter['filters'][self::FILTER_MADE_YEAR_PROPERTY_NAME] = self::prepareYearFilter($prepParams, $products);
//        $propertiesFilter['filters'][self::FILTER_PRICE_PROPERTY_NAME] = self::preparePriceFilter($prepParams, $products);
//
//        $propertiesFilter['active'] = self::getActiveProperties($propertiesFilter['filters']);
//
//        return $propertiesFilter;
    }

    /**
     * @return array
     */
    public static function preparePriceFilter(): array
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
            $newRange[$key] = $prefix . ' ' .  $key;
        }
        return $newRange;
    }


}