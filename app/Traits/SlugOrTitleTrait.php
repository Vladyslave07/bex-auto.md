<?php


namespace App\Traits;


trait SlugOrTitleTrait
{
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }
}