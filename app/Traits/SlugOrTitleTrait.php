<?php


namespace App\Traits;


trait SlugOrTitleTrait
{
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return mb_strtolower($this->slug);
        }

        return $this->title;
    }
}
