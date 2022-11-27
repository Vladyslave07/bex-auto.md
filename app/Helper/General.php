<?php


namespace App\Helper;


use Illuminate\Support\Facades\DB;

class General
{

    /**
     * @param $table
     * @param $column
     * @return array
     */
    public static function getEnumValues(string $table, string $column)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"));

        if (!$type) {return [];}

        $enums = $type[0]->Type;
        preg_match('/^enum\((.*)\)$/', $enums, $matches);

        $enum = [];
        foreach(explode(',', $matches[1]) as $value ) {
            $value = trim($value, "'");
            $enum[] = $value;
        }

        return $enum;
    }

    /**
     * return digit numbers
     *
     * ex: $number = 57000, function will return 10000
     *
     * @param $number
     * @return string
     */
    public static function getNumberDigit($number)
    {
        return (int)'1' . str_repeat(0, strlen($number) - 1);
    }

    /**
     * Format min number
     *
     * ex: $number = 57000, function will return 50000
     * $number = 2400, function will return 2000
     *
     * @param $number
     * @return int
     */
    public static function min($number): int
    {
        $digit = General::getNumberDigit((int)$number);
        return (int)$number - $number % $digit;
    }

    /**
     * Format min number
     *
     * ex: $number = 57000, function will return 60000
     * $number = 2400, function will return 3000
     *
     * @param $number
     * @return int
     */
    public static function max($number): int
    {
        $digit = General::getNumberDigit((int)$number);
        return (int)ceil($number / $digit) * $digit;
    }

}