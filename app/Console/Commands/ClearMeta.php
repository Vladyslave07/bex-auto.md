<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearMeta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car_meta:clear';

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
        $cars = \App\Models\Car::query()->whereNotNull(['meta_title', 'meta_description'], 'or')->get(['id', 'meta_title', 'meta_description']);

        foreach ($cars as $car) {
            $car->update([
                'meta_title' => null,
                'meta_description' => null,
            ]);
        }
    }
}
