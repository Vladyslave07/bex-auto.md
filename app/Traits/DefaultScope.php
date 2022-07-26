<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait DefaultScope
{
    protected $active = 1;

    /**
     * returns only active branch
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', $this->active);
    }

}