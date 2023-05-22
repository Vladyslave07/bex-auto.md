<?php


namespace App\Services\Feeds;


interface BaseFeed
{
    /**
     * Function for make xml feed file
     *
     * @return bool
     */
    public function apply(): bool;

    /**
     * Return file name
     *
     * @return string
     */
    public function getFileName(): string;

    /**
     * Set file name
     *
     * @param string $fileName
     * @return string
     */
    public function setFileName(string $fileName): string;

}