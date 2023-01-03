<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

// Трейт конвертации изображений в webp
trait MakesWebp
{
    static $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png'];

    protected static function bootMakesWebp()
    {
        static::saving(function ($model) {

            //  Подготовка массива изображений
            $imagesToConvert = [];
            foreach ($model::$images as $imageField) {
                $images = is_array($model->{$imageField}) ? $model->{$imageField} : [$model->{$imageField}];
                foreach ($images as $image) {
                    if (strlen($image) > 0 &&
                        Storage::exists($image) &&
                        in_array(mime_content_type(Storage::path($image)), self::$allowedMimeTypes) &&
                        (Storage::exists($image.'.webp') === false || $model->wasChanged($imageField))) {
                        $imagesToConvert[] = $image;
                    }
                }
            }

            // Отправка массива изображений в задачу, которая в фоне переконвертирует изображения в webp
            if (!empty($imagesToConvert)) {
                \App\Jobs\MakeWebp::dispatch($imagesToConvert)->onQueue('MakeWebp');;
            }
        });
    }
}
