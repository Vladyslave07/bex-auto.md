<?php


namespace App\Helper;


use App\Models\Domain;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageHelper
{

    public static function getPicture($filename, $alt = null, $title = null, $class = null): string
    {
        if (!$filename) {
            return false;
        }
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
            '" title="' . ($title ?? '') .
            '"></picture>';

        return $picture;
    }


    public static function getImageData($filename): array
    {
        $filename = Str::contains($filename, env('UK_APP_URL')) ? Str::replace(env('UK_APP_URL') . '/storage', '', $filename) : $filename;
        $filename = Str::contains($filename, '/storage') ? Str::replace('/storage', '', $filename) : $filename;

        $fileNameWebp = $filename . '.webp';

        if (!Storage::exists($filename) && Storage::exists($fileNameWebp)) {
            $filename = $fileNameWebp;
        }

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

    public static function logoPath(): string
    {
        return app()->getLocale() === 'uk' ? 'img/bex-logo-ua.svg' : 'img/bex-logo-ru.svg';
    }

    public static function alt($alt, $pos = '', $site = ''): string
    {
        $pos = $pos ? "- $pos" : '';
        $site = $site ? "| $site" : '';
        return sprintf('%s %s %s', $alt, $pos, $site);
    }

    public static function title($alt, $pos = ''): string
    {
        $pos = $pos ? "- $pos" : '';
        return sprintf('%s %s', $alt, $pos);
    }

}
