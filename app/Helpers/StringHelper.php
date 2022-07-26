<?php


namespace App\Helpers;


class StringHelper
{

    /**
     * @param string $phone
     * @return string|string[]|null
     */
    public static function preparePhone($phone = '')
    {
        return preg_replace('/[^0-9\+]/', '', $phone);
    }
}