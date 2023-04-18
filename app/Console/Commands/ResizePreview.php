<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;

class ResizePreview extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resize:preview';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Изменить размер превью картинок';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cars = \App\Models\Car::query()->get();
        foreach ($cars as $car) {
            $image = $car->preview_image;
            if (!$image || !Storage::exists($image) || str_contains($image, 'webp') || str_contains($image, '24-pvpbjq-kjshlj')) {
                continue;
            }

            try {
                \Image::make(Storage::path($image))->fit(289, 220, function ($constraint) {
                    $constraint->upsize();
                })->interlace()->encode('webp')->save(Storage::path($image).'.webp');
                $res = \App\Models\Car::query()->where('id', $car->id)->update([
                    'preview_image' => $image.'.webp'
                ]);
                $res2 = Storage::delete($image);
                dump($res, $res2);
            } catch (NotReadableException $exception) {
                dump($exception);
            }

        }
    }
}
