<?php


namespace App\Services\Sitemap;


use App\Models\Car;

class SitemapImagesGenerate
{
    public function generate()
    {
        // Машины
        SitemapImages::create()
            ->add(Car::query()->active()->get())
            ->writeToFile(public_path($this->getSavePath('images')));
    }

    public static function getFileName($filename)
    {
        return app('domain')->getDomainUrl() . '/' . $filename . '_' . app('domain')->getDomain()->slug . '.xml';
    }

    public static function getSavePath($filename)
    {
        return $filename . '_' . app('domain')->getDomain()->slug . '.xml';
    }
}
