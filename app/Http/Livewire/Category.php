<?php

namespace App\Http\Livewire;

use App\filters\CarFilter;
use App\Http\Controllers\CatalogController;
use App\Models\Car;
use App\Models\Product;
use App\Traits\WithCustomPaginationTrait;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class Category extends Component
{
    use WithCustomPaginationTrait;

    public \App\Models\Category|null $category = null;
    public $orderBy = [];
    public $filterQuery = null;
    public $by = '';
    public $sort = '';
    public Car|Product $currentModel;
    protected $cars;
    public $disabled = true;
    public $filters = [];

    const BRAND_SLUG = 'brand';

    public function cars()
    {
        $this->page = is_numeric($this->page) ? $this->pageNum($this->page) : 1;
        $this->getSortParams();
        $filterQuery = preg_replace('/\/filter\//', '', $this->filterQuery);

        /** @var Builder $cars */
        if (!$this->category->is_index) {
            $cars = $this->category->carsOrProducts()->filtered($filterQuery);
            $this->currentModel = $cars->getRelated();
        } else {
            $cars = Car::query()->active()->filtered($filterQuery);
            $this->currentModel = new Car();
        }

        if (strlen($this->by) > 0 && strlen($this->sort) > 0) {
            $cars->orderBy($this->by, $this->sort);
        } else {
            $cars = $cars->defaultOrder();
            if (!$this->currentModel instanceof \App\Models\Product) {
                $cars->orderBy('commission_car')->orderBy('status_sort', 'asc');
            }
            $cars->orderBy('created_at', 'desc');
        }

        return $cars->paginate(CatalogController::COUNT_CARS_ON_PAGE, ['*'], 'page', $this->page)->withQueryString();
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
                'by' => '',
                'sort' => ''
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
        $this->$fieldName = $value;

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

        if ($propertyKey === self::BRAND_SLUG) {
            if (key_exists('model', $properties)) {
                unset($properties['model']);
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
            if (key_exists($propertyKey, $properties) && $properties[$propertyKey] === $propertyValue) {
                unset($properties[$propertyKey]);
            } else {
                $properties[$propertyKey] = $propertyValue;
            }
        }

        // Make filter string from array
        $res = array_map(function ($k, $v) {
            return "$k:$v";
        }, array_keys($properties), $properties);
        $this->filterQuery = implode('_', $res);
        $this->page = 1;
    }

    /**
     * Return filter url
     *
     * @return string
     */
    public function makeFilterUrl()
    {
        $categoryUrl = route($this->currentModel->categoryRouteName, ['category' => $this->category->slug], false);

        if ($this->category->slug == \App\Models\Category::INDEX_CATEGORY_SLUG) {
            $page = '';
            if ($this->page > 1) {
                $page = 'page-' . $this->page;
            }
            if ($this->filterQuery) {
                return route('avto', ['filter' => $this->filterQuery, 'page' => $page]);
            }
            return route('avto', ['page' => $page]);
        }

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
        $category = $this->category;
        if ($this->category->slug === \App\Models\Category::INDEX_CATEGORY_SLUG) {
            $category = null;
        }

        return CarFilter::getCurrentPropertiesFilter($category, $this->filterQuery);
    }

    /**
     * Default values for range filter params.
     * @example priceFrom = 5 000 priceTo = 50 000
     *
     * Dynamic creation class fields
     */
    public function setDefaultValuesForRangeParams()
    {
        if (empty($this->filters)) {
            $this->filters = $this->filters();
        }
        foreach ($this->filters as $filter) {
            if ($filter['type'] !== CarFilter::FROM_TO_PROPERTY_NAME || !key_exists('values', $filter) || !$filter['values']) {
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
        $currentUrl = URL::current();
        if (str_contains($currentUrl, CarFilter::FILTER_PREFIX)) {
            [$url, $filterQuery] = explode(CarFilter::FILTER_PREFIX, URL::current());
            $filterQuery = preg_replace('/\/page-(.*)/', '', $filterQuery);
            $this->filterQuery = $filterQuery;
        }
    }

    public function preparePage()
    {
        if (strlen($this->page) > 0 && preg_match('/page-/', $this->page) !== 0) {
            $this->page = preg_replace('/page-(\d+)/', '$1', $this->page);
        }
    }

    public function cleanFilters()
    {
        $this->filterQuery = '';
        $this->dispatchBrowserEvent('setPageUrl', ['url' => $this->makeFilterUrl()]);
    }

    public function enableIfExist()
    {
        if (empty($this->filters)) {
            $this->filters = $this->filters();
        }
        foreach ($this->filters as $filter) {
            if ($filter['slug'] === self::BRAND_SLUG) {
                foreach ($filter['values'] as $value) {
                    if ($value['active']) {
                        $this->disabled = false;
                    }
                }
            }
        }
    }

    public function setNoindex()
    {
        if (strlen($this->filterQuery)) {
            SEOTools::metatags()->addMeta('robots', 'noindex, nofollow');
        }
    }

    public function mount()
    {
        $this->setFilterQueryFromUrl();
        $this->preparePage();
        $this->filters = $this->filters();
        $this->setDefaultValuesForRangeParams();
        $this->enableIfExist();

        // Set noindex for filter, sort pages
        $this->setNoindex();
    }

    public function render()
    {
        return view('livewire.category', [
            'cars' => $this->cars(),
            'filters' => $this->filterQuery ? $this->filters() : $this->filters,
        ]);
    }
}
