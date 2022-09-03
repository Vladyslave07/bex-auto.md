<?php

namespace App\Http\Livewire;

use App\filters\CarFilter;
use App\Http\Controllers\CatalogController;
use App\Models\Car;
use App\Traits\WithCustomPaginationTrait;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Category extends Component
{
    use WithCustomPaginationTrait;

    public $category;
    public $orderBy = [];
    // todo: Устанавливать строку запроса из чпу
    public $filterQuery = null;

    public $by = 'id';
    public $sort = 'desc';

    protected $cars;

    public $disabled = true;

    const BRAND_SLUG = 'brand';

    public function cars()
    {
        $this->page = $this->pageNum($this->page);
        $this->getSortParams();
        $filterQuery = preg_replace('/\/filter\//', '', $this->filterQuery);
        return $this->category
            ->cars()
            ->with(['properties'])
            ->active()
            ->orderBy($this->by, $this->sort)
            ->filtered($filterQuery)
            ->paginate(CatalogController::COUNT_CARS_ON_PAGE, ['*'], 'page', $this->page)
            ->withQueryString();
    }

    public function sortBy($by, $sort)
    {
        $this->by = $by;
        $this->sort = $sort;
    }

    public function getSortParams()
    {
        $this->orderBy = [
            [
                'title' => Lang::get('category.sort.id_desc'),
                'by' => 'id',
                'sort' => 'desc'
            ],
            [
                'title' => Lang::get('category.sort.price_asc'),
                'by' => 'price',
                'sort' => 'asc'
            ],
            [
                'title' => Lang::get('category.sort.price_desc'),
                'by' => 'price',
                'sort' => 'desc'
            ],
        ];
    }

    /**
     * Setting filter params for usual params like: status:in_stock
     *
     * @param $slug
     * @param $value
     */
    public function setFilter($slug, $value, $multiple = false)
    {
        $value = preg_replace('/_/', '-', $value);
        $this->buildFilterQuery($slug, $value, $multiple);

        if ($slug === self::BRAND_SLUG) {
            $this->disabled = false;
        }

        // set filter url for page
        $this->dispatchBrowserEvent('setPageUrl', ['url' => $this->makeFilterUrl()]);
    }

    /**
     * Method set values for range filter params
     *
     * @param $slug
     * @param $value
     * @param $range
     * @example
     * Set priceFrom = 5 000 (default value setting in method setDefaultValuesForRangeParams())
     * Set priceTo = 45 000 from query
     *
     */
    public function setRangeFilter($slug, $value, $range)
    {
        $fieldName = $slug . ucfirst($range);
        $this->$fieldName = (int)$value;

        $fieldNameFrom = $slug . 'From';
        $fieldNameTo = $slug . 'To';

        if ($this->filterQuery) {
            $propertyValue = $this->$fieldNameFrom . '~' . $this->$fieldNameTo;
            $this->buildFilterQuery($slug, $propertyValue);
        } else {
            $this->filterQuery = $slug . ':' . $this->$fieldNameFrom . '~' . $this->$fieldNameTo;
        }

        // set filter url for page
        $this->dispatchBrowserEvent('setPageUrl', ['url' => $this->makeFilterUrl()]);
    }

    /**
     * Make filter query string for filtered cars
     *
     * @param $propertyKey
     * @param $propertyValue
     */
    public function buildFilterQuery($propertyKey, $propertyValue, $multiple = false)
    {
        $properties = [];
        if ($this->filterQuery) {
            $params = explode('_', $this->filterQuery);
            foreach ($params as $param) {
                [$key, $value] = explode(':', $param);
                $properties[$key] = $value;
            }
        }

        if ($multiple && key_exists($propertyKey, $properties)) {
            $values = explode(';', $properties[$propertyKey]);

            if (!in_array($propertyValue, $values)) {
                $values[] = $propertyValue;
            } else {
                $values = array_diff($values, [$propertyValue]);
            }

            if (empty($values)) {
                unset($properties[$propertyKey]);
            } else {
                $properties[$propertyKey] = implode(';', $values);
            }
        } else {
            $properties[$propertyKey] = $propertyValue;
        }

        // Make filter string from array
        $res = array_map(function ($k, $v) {
            return "$k:$v";
        }, array_keys($properties), $properties);
        $this->filterQuery = implode('_', $res);
    }

    /**
     * Return filter url
     *
     * @return string
     */
    public function makeFilterUrl()
    {
        $categoryUrl = route('category', ['category' => $this->category->slug], false);
        $filterUrl = '';
        if ($this->filterQuery) {
            $filterUrl = CarFilter::FILTER_PREFIX . $this->filterQuery;
        }
        return $categoryUrl . $filterUrl;
    }

    /**
     * Returns filter params
     * @return array
     */
    public function filters()
    {
        return CarFilter::getCurrentPropertiesFilter($this->category, $this->filterQuery);
    }

    /**
     * Default values for range filter params.
     * @example priceFrom = 5 000 priceTo = 50 000
     *
     * Dynamic creation class fields
     */
    public function setDefaultValuesForRangeParams()
    {
        foreach ($this->filters() as $filter) {
            if ($filter['type'] !== CarFilter::FROM_TO_PROPERTY_NAME) {
                continue;
            }

            $propNameFrom = $filter['slug'] . 'From';
            $propNameTo = $filter['slug'] . 'To';
            $this->$propNameFrom = array_key_first($filter['values']['from']);
            $this->$propNameTo = array_key_last($filter['values']['to']);
        }
    }

    public function setFilterQueryFromUrl()
    {
        // todo: Устанавливать текущие параметры в фильтре из чпу
        $currentUrl = URL::current();
        if (str_contains($currentUrl, CarFilter::FILTER_PREFIX)) {
            [$url, $filterQuery] = explode(CarFilter::FILTER_PREFIX, URL::current());
            $this->filterQuery = $filterQuery;
        }
    }

    public function cleanFilters()
    {
        $this->filterQuery = '';
        $this->dispatchBrowserEvent('setPageUrl', ['url' => $this->makeFilterUrl()]);
    }

    public function enableIfExist()
    {
        foreach ($this->filters() as $filter) {
            if ($filter['slug'] === self::BRAND_SLUG) {
                foreach ($filter['values'] as $value) {
                    if ($value['active']) {
                        $this->disabled = false;
                    }
                }
            }
        }
    }

    public function mount()
    {
        $this->setFilterQueryFromUrl();
        $this->setDefaultValuesForRangeParams();
        $this->enableIfExist();
    }

    public function render()
    {
        return view('livewire.category', [
            'cars' => $this->cars(),
            'filters' => $this->filters(),
        ]);
    }
}
