<?php


namespace App\Services\Feeds;

use App\Models\Car;
use App\Models\Property;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class FacebookFeed extends Feed
{
    public function apply(): bool
    {
        app()->setLocale($this->getLocale());

        // delete feed file if exist
        $this->deleteIfExist();

        // header xml file
        $this->header();

        // body xml file
        $this->cars();

        // footer xml file
        $this->footer();

        return true;
    }


    public function header()
    {
        File::append($this->getFileName(), '<?xml version="1.0" encoding="utf-8"?>');
        File::append($this->getFileName(), '<listings>');
        File::append($this->getFileName(), '<title>' . Lang::get('feed.facebook.title') . '</title>');
    }

    public function cars()
    {
        $bodyTypes = Property::query()->where('slug', 'carcase-type')->first();
        $bodyTypes = collect(json_decode($bodyTypes->options, true))->where('value', 'sedan');

        foreach ($this->getCars() as $car) {
            File::append($this->getFileName(), '<listing>');

            File::append($this->getFileName(), '<vehicle_id>' . $car->id . '</vehicle_id>');
            File::append($this->getFileName(), "<description>" .  htmlspecialchars(strip_tags($car->description)) . "</description>");
            File::append($this->getFileName(), '<url>' . LaravelLocalization::getLocalizedUrl($this->getLocale(), route('car_detail', [$car->slug])) . '</url>');
            File::append($this->getFileName(), "<title>" . htmlspecialchars($car->titleWithYear) . "</title>");
            File::append($this->getFileName(), "<price>" . number_format($car->price, 0, '.', ' ') . " USD</price>");
            File::append($this->getFileName(), "<vin>" . $car->vin . "</vin>");

            // Состояние
            $state = $car->properties->where('slug', 'state')->first()?->pivot->slug;
            File::append($this->getFileName(), "<state_of_vehicle>" . $this->getStatus($state) . "</state_of_vehicle>");

            // Год
            $year =  $car->properties->where('slug', 'year')->first()?->pivot->value;
            File::append($this->getFileName(), "<year>" . $year . "</year>");

            // Марка
            $brand = $car->properties->where('slug', 'brand')->first()?->pivot->value;
            File::append($this->getFileName(), "<make>" . htmlspecialchars($brand) . "</make>");

            // Модель
            $model = $car->properties->where('slug', 'model')->first()?->pivot->value;
            File::append($this->getFileName(), "<model>" . htmlspecialchars($model) . "</model>");

            // Тип кузова
            $carBodyType = $car->properties->where('slug', 'carcase-type')->first()?->pivot->slug;
            File::append($this->getFileName(), '<body_style>' . $this->getBodyType($carBodyType) . '</body_style>');

            // Пробег
            $mileage = $car->properties->where('slug', 'mileage')->first()?->pivot->value;
            File::append($this->getFileName(), '<mileage>');
            File::append($this->getFileName(), '<unit>KM</unit>');
            File::append($this->getFileName(), "<value>" . ($mileage ?? 0) . "</value>");
            File::append($this->getFileName(), '</mileage>');

            // Фото
            $previewPicture = Storage::url($car->previewPicture);
            File::append($this->getFileName(), '<image>');
            File::append($this->getFileName(), "<url>" . $previewPicture . "</url>");
            File::append($this->getFileName(), '</image>');

            File::append($this->getFileName(), '<address>' . $this->getCountry($car) . '</address>');
            File::append($this->getFileName(), "<region>" . mb_strtoupper($this->getLocale()) . "</region>");
            File::append($this->getFileName(), "<street_address>" . mb_strtoupper($this->getLocale()) . "</street_address>");
            File::append($this->getFileName(), "<city>" . mb_strtoupper($this->getLocale()) . "</city>");
            File::append($this->getFileName(), "<country>" . $this->getCountry($car) . "</country>");

            // Close item
            File::append($this->getFileName(), '</listing>');
        }
    }

    public function getCountry(Car $car)
    {
        $countries = [1 => 'США', 2 => 'Корея', 4 => 'Китай'];
        foreach ($car->categories as $category) {
            if (key_exists($category->id, $countries)) {
                return $countries[$category->id];
            }
        }
        return 'США';
    }

    public function getBodyType($type): string
    {
        $defaultBodyType = [
            'kabriolet' => 'CONVERTIBLE',
            'coupe' => 'COUPE',
            'crossover' => 'CROSSOVER',
            'universal' => 'ESTATE',
            'hatchback' => 'HATCHBACK',
            'minivan' => 'MINIVAN',
            'pickup' => 'PICKUP',
            'sedan' => 'SEDAN',
            'suv' => 'SUV',
            'gruzovoe' => 'TRUCK',
            'van' => 'VAN',
            'station_wagon' => 'WAGON',
        ];
        if (!$type) {
            return 'NONE';
        }
        if (key_exists($type, $defaultBodyType)) {
            return $defaultBodyType[$type];
        }
        return 'OTHER';
    }

    public function getStatus($status)
    {
        $defaultStatus = ['new' => "NEW", 'used' => "USED"];
        if (key_exists($status, $defaultStatus)) {
            return $defaultStatus[$status];
        }
        return $defaultStatus['used'];
    }

    public function footer()
    {
        File::append($this->getFileName(), '</listings>');
    }

    public function getCars()
    {
        return Car::query()
            ->active()
            ->get();
    }
}
