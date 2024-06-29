<?php

namespace App\Http\Livewire;

use App\filters\CarFilter;
use App\Http\Controllers\CatalogController;
use App\Models\Car;

class SearchPage extends Category
{
    public $q = '';

    public function cars()
    {
        if (!$this->q) {
            return collect([]);
        }

        $this->page = $this->pageNum($this->page);
        $this->getSortParams();
        $this->currentModel = new Car();

        return $this->search((string)$this->q)->get();
    }

    public function carsForCurrentPage()
    {
        $cars = $this->search((string)$this->q)->filtered($this->filterQuery);

        if (strlen($this->by) > 0 && strlen($this->sort) > 0) {
            $cars->orderBy($this->by, $this->sort);
        } else {
            $cars->defaultOrder();
        }

        return $cars->paginate(CatalogController::COUNT_CARS_ON_PAGE, ['*'], 'page', $this->page)->withQueryString();
    }

    public function search(string $q = '')
    {
        // Если запроса нет возвращать невозможный билдер (поправить)
        if (!$q) {
            return Car::query()->where('id', 0);
        }

        return Car::search($q)->active();
    }

    /**
     * Return filter url
     *
     * @return string
     */
    public function makeFilterUrl()
    {
        $categoryUrl = route('search', false);
        $filterUrl = '';
        if ($this->filterQuery) {
            $filterUrl = CarFilter::FILTER_PREFIX . $this->filterQuery;
        }
        return $categoryUrl . $filterUrl . '?q=' . $this->q;
    }


    /**
     * Make a pagination url for category
     * like: /category/page-2
     *
     * @return string
     */
    public function makePaginateUrl(): string
    {
        $page = '';
        if ($this->page != 1) {
            $page = 'page-' . $this->page;
        }

        return preg_replace('/\/\//', '/', route('search', ['page' => $page, 'q' => $this->q, 'filter' => $this->filterQuery], false));
    }

    /**
     * Returns filter params
     * @return array
     */
    public function filters()
    {
        return CarFilter::getCurrentPropertiesFilter($this->category, $this->filterQuery, $this->cars());
    }

    public function render()
    {
        return view('livewire.search-page', [
            'cars' => $this->carsForCurrentPage(),
            'filters' => $this->filters(),
        ]);
    }

}
