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
            File::append($this->getFileName(), "<title>" . htmlspecialchars($car->title) . "</title>");
            File::append($this->getFileName(), "<price>" . $car->price . " USD</price>");

            // Тип кузова
            $carBodyType = $bodyTypes->where('value', $car->properties->where('slug', 'carcase-type')->first()?->pivot->slug)->first();
            if ($carBodyType) {
                File::append($this->getFileName(), '<body_style>' . $carBodyType['name'] . '</body_style>');
            }

            // Пробег
            $mileage = $car->properties->where('slug', 'mileage')->first()?->pivot->value;
            if ($mileage) {
                File::append($this->getFileName(), '<mileage>');
                File::append($this->getFileName(), '<unit>КМ</unit>');
                File::append($this->getFileName(), "<value>" . $mileage . "</value>");
                File::append($this->getFileName(), '</mileage>');
            }

            // Фото
            $previewPicture = Storage::url($car->previewPicture);
            if (strlen($previewPicture) > 0) {
                File::append($this->getFileName(), '<image>');
                File::append($this->getFileName(), "<url>" . $previewPicture . "</url>");
                File::append($this->getFileName(), '</image>');
            }

            // Close item
            File::append($this->getFileName(), '</listing>');
        }
    }

    public function footer()
    {
        File::append($this->getFileName(), '</listings>');
    }

    public function getCars()
    {
        return Car::query()
            ->where('domain_id', app('domain')->getDomain()->id)
            ->active()
            ->get();
    }
}
