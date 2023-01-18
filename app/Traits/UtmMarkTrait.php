<?php


namespace App\Traits;


trait UtmMarkTrait
{
    public function addUtmMarks($data)
    {
        if (session('checked_utm')) {
            $utm_marks = json_decode(session('utm_marks'), true);
            $data = array_merge($data, $utm_marks);

            // Clean utm_marks after provides
            session(['utm_marks' => []]);
            session(['checked_utm' => false]);
        }

        return $data;
    }

}