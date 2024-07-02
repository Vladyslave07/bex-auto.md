<?php

namespace App\Console\Commands;

use App\Models\Car;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ClearMetaForCarAndCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meta:clear {domain?}';

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
        $connection = 'mysql';
        if ($this->argument('domain') === 'kz') {
            $connection = 'kz_mysql';
        }

        Config::set('database.default', $connection);

        $excludeCategories = [
            'avto-v-kazahstane',
            'avto-iz-ssha',
            'avto-iz-korei',
            'avto-iz-kitaya',
            'avto-iz-evropy',
            'avto-iz-norvegii',
            'novye-elektromobili',
            'elektromobili',
            'gibridy',
            'elektromobili-iz-ssha',
            'zaryadnye-stancii',
            'pogruzchiki',
            'avto-v-ukraine',
            'avto-pod-remont',
            'aukcion-avto-iz-korei',
            'aukcion-avto-iz-ssha',
        ];

        \App\Models\Car::query()->whereNotNull('meta_title')->chunk(100, function ($cars) {
            foreach ($cars as $car) {
                $car->update([
                    'meta_title' => null,
                    'meta_description' => null,
                ]);
            }
        });

        \App\Models\Category::query()
            ->whereNotIn('slug', $excludeCategories)
            ->chunk(100, function($categories) {
                foreach ($categories as $category) {
                    $category->update([
                        'meta_title' => null,
                        'meta_description' => null,
                        'h1' => null,
                    ]);
                }
            });
    }
}
