<?php


namespace App\Services\Feeds;

use App\Models\Car;
use App\Models\Property;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FacebookCsvFeed extends Feed
{
    private $file;

    public function apply(): bool
    {
        app()->setLocale($this->getLocale());

        // delete feed file if exist
        $this->deleteIfExist();

        // Init csv file for write
        $this->initFile();

        // Header csv file
        $this->header();

        // Fill csv file
        $this->cars();

        return true;
    }

    public function initFile()
    {
        $this->setFile(fopen($this->getFileName(), 'w'));
    }


    public function header()
    {
        fputcsv($this->getFile(), ['id', 'availability', 'condition', 'description', 'image_link', 'link',
            'title', 'price', 'brand', 'additional_image_link', 'gender']);
    }

    public function cars()
    {
        foreach ($this->getCars() as $car) {
            fputcsv($this->getFile(), [
                $car->id,
                $this->carStatus($car),
                $this->carCondition($car),
                str_replace(["\r\n", "\r", "\n", "\t"], '', strip_tags($car->description)),
                $this->carPreviewImage($car),
                route('car_detail', $car->slug),
                $car->titleWithYear,
                $car->price . ' USD',
                $this->carBrand($car),
                $this->carAdditionalImages($car),
                'unisex',
            ]);
        }
    }

    /**
     * @param Car $car
     * @return string
     */
    public function carStatus(Car $car): string
    {
        $statuses = [
            'in_stock' => 'in stock',
            'sold' => 'out of stock',
            'expect' => 'available for order',
            'on_order' => 'available for order',
            'on_order_usa' => 'available for order',
            'on_order_korea' => 'available for order',
        ];

        return $statuses[$car->status] ?? 'out of stock';
    }

    /**
     * @param Car $car
     * @return string
     */
    public function carCondition(Car $car): string
    {
        $carCondition = $car->properties->where('slug', Property::PROPERTY_STATE_SLUG)->first()?->pivot->slug;
        $conditions = ['new' => "new", 'used' => "used"];

        return $conditions[$carCondition] ?? $conditions['used'];
    }

    /**
     * @param Car $car
     * @return string
     */
    public function carPreviewImage(Car $car): string
    {
        if ($car->preview_image) {
            return Storage::url($car->preview_image);
        }

        if(isset($car->images)) {
            foreach($car->images as $key => $image) {
                if($key == 0){
                    return Storage::url($image);
                }
            }
        }

        return '';
    }

    /**
     * @param Car $car
     * @return string
     */
    public function carAdditionalImages(Car $car): string
    {
        $images = [];
        if(isset($car->images)) {
            foreach($car->images as $key => $image) {
                if($key == 0){
                    $images[] = Storage::url($image);
                }
            }
        }

        return implode(',', $images);
    }

    /**
     * @param Car $car
     * @return string
     */
    public function carBrand(Car $car): string
    {
        return $car->properties->where('slug', Property::PROPERTY_BRAND_SLUG)->first()?->pivot->value ?? '';
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
        return Car::query()->active()->whereHas('categories', function ($query) {
            $query->where('add_to_feed', 1);
        })->get();
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
}
