<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Services\Sitemap\SitemapGeneral;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SetCategoryForExpectedCars extends Command
{
    const AUTO_V_UKRAINE_CATEGORY_ID = 170;
    const AUTO_V_KAZAHSTANE_CATEGORY_ID = 175;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:set-category-for-expected-cars {domain?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categoryId = self::AUTO_V_UKRAINE_CATEGORY_ID;
        $connection = 'mysql';
        if ($this->argument('domain') === 'kz') {
            $connection = 'kz_mysql';
            $categoryId = self::AUTO_V_KAZAHSTANE_CATEGORY_ID;
        }
        Config::set('database.default', $connection);

        $cars = \App\Models\Car::query()
            ->where('status', \App\Models\Car::EXPECTED_STATUS)
            ->whereDoesntHave('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->get();
        foreach ($cars as $car) {
            dump($car->id, $categoryId);
            $car->categories()->attach($categoryId);
        }
    }
}
