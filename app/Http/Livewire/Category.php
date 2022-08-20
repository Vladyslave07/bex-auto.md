<?php

namespace App\Http\Livewire;

use App\filters\CarFilter;
use App\Http\Controllers\CatalogController;
use App\Models\Car;
use App\Traits\WithCustomPaginationTrait;

use Illuminate\Support\Facades\Lang;
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

    public function cars()
    {
        $this->page = $this->pageNum($this->page);
        $this->getSortParams();
        $filterQuery = preg_replace('/\/filter\//', '', $this->filterQuery);
        return $this->category
            ->cars()
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

    public function setFilter($slug, $value)
    {
        $value = preg_replace('/_/', '-', $value);
        $this->filterQuery = '/filter/' .  $slug . ':' . $value . '_brand:bmw';

        // set filter url for page
        $this->dispatchBrowserEvent('setPageUrl', ['url' => $this->makeFilterUrl()]);
    }

    /**
     * Return filter url
     *
     * @return string
     */
    public function makeFilterUrl()
    {
        $categoryUrl = route('category', ['category' => $this->category->slug], false);
        return $categoryUrl . $this->filterQuery;
    }

    /**
     * Returns filter params
     * @todo Доработать изменение параметров фильтра в зависимости от того какие товары находтся на странице
     *
     * @return array
     */
    public function filters()
    {
        $filterProperties = CarFilter::getCurrentPropertiesFilter($this->category);
        return $filterProperties;
    }

    public function render()
    {
        $this->filters();
        return view('livewire.category', [
            'cars' => $this->cars(),
            'filters' => $this->filters(),
        ]);
    }
}
