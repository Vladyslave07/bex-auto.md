<?php


namespace App\Services\Feeds;


use Illuminate\Support\Facades\File;

abstract class Feed implements BaseFeed
{
    public $fileName;
    public $locale;

    public function __construct(string $fileName, string $locale = 'ru')
    {
         $this->setFileName($fileName);
         $this->setLocale($locale);
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): string
    {
        $this->fileName = $fileName;
        return $this->getFileName();
    }

    /**
     * Get current locale
     *
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * Set current locale
     *
     * @return string
     */
    public function setLocale(string $locale): string
    {
        $this->locale = $locale;
        return $this->getLocale();
    }

    /**
     * Delete xml file if exist
     */
    public function deleteIfExist()
    {
        if (File::exists($this->getFileName())) {
            File::delete($this->getFileName());
        }
    }
}