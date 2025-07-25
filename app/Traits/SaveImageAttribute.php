<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Трейт сохранение изображения (image)
trait SaveImageAttribute
{
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = Str::replace('_', '', $this->table);

        if ($value == null) {
            \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
            $this->attributes[$attribute_name] = null;
        } else {
            if (Str::startsWith($value, 'data:image')) {
                $ext = 'jpg';
                if (Str::startsWith($value, 'data:image/png;base64')) $ext = 'png';
                if (Str::startsWith($value, 'data:image/jpeg;base64')) $ext = 'jpeg';
                if (Str::startsWith($value, 'data:image/webp;base64')) $ext = 'webp';

                $image = \Image::make($value);

                if (isset($this::$imageSize) && is_array($this::$imageSize)) {
                    $image = $image->fit($this::$imageSize['width'], $this::$imageSize['height'], function ($constraint) {
                        $constraint->upsize();
                    });
                }

                $image = $image->encode($ext, 90);
                $filename = md5($value . time()) . '.' . $ext;
                \Storage::disk($disk)->put($destination_path . '/' . $filename, $image->stream());

                // Если модель без переводов или если модель с переводом, но атрибут не переводимый - удаляем картинку
                if (!method_exists($this, 'isTranslatableAttribute') ||
                    (method_exists($this, 'isTranslatableAttribute') && !$this->isTranslatableAttribute($attribute_name))) {
                    \Storage::disk($disk)->delete($this->{$attribute_name} ?? '');
                }
                $this->attributes[$attribute_name] = $destination_path . '/' . $filename;
            } else {
                $path = parse_url($value, PHP_URL_PATH);
                if (str_contains($path, 'storage')) {
                    $path = preg_replace('/\/storage\//', '', $path);
                }

                $this->attributes[$attribute_name] = $path;
            }
        }
    }
}
