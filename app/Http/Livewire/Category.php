<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CatalogController;
use App\Traits\WithCustomPaginationTrait;

use Livewire\Component;

class Category extends Component
{
    use WithCustomPaginationTrait;

    public $category;

    protected $cars;

    public function cars()
    {
        $this->page = $this->pageNum($this->page);
        return $this->category->cars()->active()->paginate(CatalogController::COUNT_CARS_ON_PAGE, ['*'], 'page', $this->page)->withQueryString();
    }

    public function render()
    {
        return view('livewire.category', [
            'cars' => $this->cars(),
        ]);
    }
}
