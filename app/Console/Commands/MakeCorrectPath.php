<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeCorrectPath extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:correct-path';

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
        $cars = \App\Models\Car::query()->where('preview_image', 'like', '%storage%')->get();
        foreach ($cars as $car) {
            $correctPath = preg_replace('/(.*)storage(.*)/', '$2', $car->preview_image);
            $car->preview_image = $correctPath;
            $car->save();
        }
    }
}
