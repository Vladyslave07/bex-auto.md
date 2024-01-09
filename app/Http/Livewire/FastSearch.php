<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\CarProperty;
use Livewire\Component;

class FastSearch extends Component
{

    public string $query = '';
    public $cars = [];
    public $fastResults = [];
    public $showResults = false;

    public function mount()
    {
        $this->query = htmlspecialchars(request()->get('q'));
        if (mb_strlen($this->query) > 0) {
            $this->updatedQuery($this->query);
        }
        $this->showResults = false;
    }

    public function updatedQuery($value)
    {
        $value = trim(htmlspecialchars($value));
        $this->cars = Car::fastSearch($value);
        $this->showResults = strlen($value) > 2;

        $brand = Brand::query()
            ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '" . strtoupper($value) . "%'")->take(5)->get();

        if ($brand->count() > 0) {
            $brand = $brand->first();
            $models = CarModel::query()->with('brand')
                ->where('brand_id', $brand->id)->take(5)->get();

            // Если не нашли модели по марке авто, то ищем по названию модели
            if ($models->count() <= 0) {
                $models = CarModel::query()
                    ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '" . strtoupper($value) . "%'")
                    ->take(5)->get();
            }
        } else {
            $models = CarModel::query()
                ->whereRaw("UPPER(JSON_UNQUOTE(JSON_EXTRACT(`title`, '$.ru'))) LIKE '" . strtoupper($value) . "%'")->take(5)->get();
        }

        $modelsSlug = $models->pluck('slug')->toArray();

        $properties = CarProperty::query()->where('property_id', 2)
            ->whereIn('slug', $modelsSlug)
            ->whereHas('car', function ($query) {
                $query->active();
            })
            ->get();

        foreach ($models as $model) {
            $model->car_count = $properties->where('slug', $model->slug)->count();
            $model->title = mb_strtolower($model->brand?->title . ' ' . $model->title);
        }

        if ($models->count() > 0) {
            $this->fastResults = $models->sortByDesc('car_count')->take(5);
        } else {
            $this->fastResults = $brand;
        }
    }

    public function render()
    {
        return view('livewire.fast-search');
    }
}
