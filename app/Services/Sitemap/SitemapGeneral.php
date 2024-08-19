<?php


namespace App\Services\Sitemap;


use App\Models\Car;
use App\Models\Category;
use App\Models\News;
use App\Models\Service;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;

class SitemapGeneral
{
    const SITEMAP_FOLDER_NAME = 'sitemap';

    public $locale;

    public function __construct(string $locale = 'uk')
    {
        $this->locale = $locale;
    }

    public function generate()
    {
        // Установка языковой версии карты сайта
        app()->setLocale($this->locale);

        // Создание индексного файла
        SitemapIndex::create()
            ->add($this->getFileName('index', $this->locale))
            ->add($this->getFileName('categories', $this->locale))
            ->add($this->getFileName('cars', $this->locale))
            ->add($this->getFileName('service', $this->locale))
            ->add($this->getFileName('news', $this->locale))
            ->add(SitemapImagesGenerate::getFileName('images'))
            ->writeToFile(public_path($this->getSavePath('sitemap', $this->locale)));

        // Разделы
        SitemapCustom::create()
            ->add(Url::create(app('domain')->getDomainUrl() . '/' . $this->locale)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS))
            ->writeToFile(public_path($this->getSavePath('index', $this->locale)));

        // Разделы
        SitemapCustom::create()
            ->add(Category::query()->active()->get())
            ->writeToFile(public_path($this->getSavePath('categories', $this->locale)));

        // Машины
        SitemapCustom::create()
            ->add(Car::query()->active()->get())
            ->writeToFile(public_path($this->getSavePath('cars', $this->locale)));

        // Услуги
        SitemapCustom::create()
            ->add(Service::query()->active()->get())
            ->writeToFile(public_path($this->getSavePath('service', $this->locale)));

        // Новости
        SitemapCustom::create()
            ->add(News::query()->active()->get())
            ->writeToFile(public_path($this->getSavePath('news', $this->locale)));
    }

    public static function getFileName($filename, $locale)
    {
        return app('domain')->getDomainUrl() . '/' . $filename . '_' . app('domain')->getDomain()->slug . '_' . $locale . '.xml';
    }

    public static function getSavePath($filename, $locale)
    {
        return $filename . '_' . app('domain')->getDomain()->slug . '_' . $locale . '.xml';
    }
}
