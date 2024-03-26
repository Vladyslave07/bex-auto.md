<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ChangeMileage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:mileage {domain?}';

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

        $data = [['Ссылка на автомобиль', 'Пробег до', 'Пробег после']];

        $carProperties = \App\Models\CarProperty::query()->with(['car'])->where('property_id', 7)->where('value', '>=', 250000)->get();
        foreach ($carProperties as $carProperty) {
            $newMileage = rand(56300, 72400);
            if ($carProperty->car) {
                $data[] = [
                    route('car_detail', ['car' => $carProperty->car->slug]),
                    $carProperty->value,
                    $newMileage,
                ];
                $carProperty->update([
                    'value' => $newMileage,
                    'slug' => $newMileage,
                ]);
            } else {
                $carProperty->delete();
            }
        }

        $fileName = sprintf('public/cars_%s.csv', $domain ?? 'uk');
        $file = fopen($fileName, 'w');

        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
    }
}
