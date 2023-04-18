<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveCategoryBinding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:bindings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove all categories bindings';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $catSlug = [
            'aukcion-avto-iz-ssha',
            'avto-iz-korei',
            'avto-iz-ssha',
            'avto-v-ukraine',
            'boats',
            'elektromobili',
            'elektromobili-iz-ssha',
            'gibridy',
            'gruzovye-i-passazhirskie',
            'motocikly',
            'pogruzchiki',
            'aukcion-avto-iz-korei',
            'novye-elektromobili',
            'avto-iz-kitaya',
        ];
        foreach ($catSlug as $slug) {
            $category = \App\Models\Category::query()->where('slug', $slug)->first();
            if (!$category || count($category->cars) <= 0) {
                continue;
            }
            $cars = $category->cars->where('domain_id', 6);

            foreach ($cars as $car) {
                $car->categories()->detach($category->id);
            }
        }
    }
}
