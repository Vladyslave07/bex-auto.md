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

}