<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

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

    protected static function boot()
    {
        parent::boot();

        static::saved(function($event)
        {
            Artisan::call("cache:clear");
        });
    }

}
