<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CatalogController;
use App\Traits\WithCustomPaginationTrait;

use Illuminate\Support\Facades\Lang;
use Livewire\Component;

class Category extends Component
{
    use WithCustomPaginationTrait;

    public $category;
    public $orderBy = [];

    public $by = 'id';
    public $sort = 'desc';

    protected $cars;

    public function cars()
    {
        $this->page = $this->pageNum($this->page);
        $this->getSortParams();
        return $this->category
            ->cars()
            ->active()
            ->orderBy($this->by, $this->sort)
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

    public function filters()
    {
        $this->category->cars()->active()->get();
    }

    public function render()
    {
        return view('livewire.category', [
            'cars' => $this->cars(),
            'filters' => $this->filters(),
        ]);
    }
}
