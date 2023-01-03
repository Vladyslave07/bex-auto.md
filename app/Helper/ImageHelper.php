<?php


namespace App\Helper;


use Illuminate\Support\Facades\Storage;

class ImageHelper
{

    public static function getPicture($filename, $alt = null, $class = null): string
    {
        $data = self::getImageData($filename);

        $picture = '<picture' . (isset($class) ? ' class="' . $class . '"' : '') .'>';

        if (key_exists('webp_src', $data) && strlen($data['webp_src'])) {
            $picture .= '<source type="image/webp" srcset="' . $data['webp_src'] . '">';
        }

        $src = key_exists('src', $data) ? $data['src'] : '';

        $picture .= '<img ' . 'src="' . $src . '"' .
            (isset($data['width']) ? ' width="' . $data['width'] . '"' : '') .
            (isset($data['height']) ? ' height="' . $data['height'] . '"' : '') .
            ' alt="' . ($alt ?? '') .
            '"></picture>';

        return $picture;
    }


    public static function getImageData($filename): array
    {
        if (Storage::exists($filename)) {
            $data = ['src' => Storage::url($filename)];

            // Проверка на сущесвтование webp
            if (Storage::exists($filename . '.webp')) {
                $data['webp_src'] = Storage::url($filename . '.webp');
            }

            if (Storage::exists($filename) && str_starts_with(mime_content_type(Storage::path($filename)), 'image/')) {
                list($data['width'], $data['height']) = getimagesize(Storage::path($filename));
            }

            return $data;
        }

        // Если картинка в формате Base64
        if (str_starts_with($filename, 'data:image/')) {
            $data = ['src' => $filename];

            list($data['width'], $data['height']) = getimagesize($filename);

            return $data;
        }

        return [];
    }

}