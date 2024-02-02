<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ResizeImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:resize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'resize all cars images';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sourcePath = public_path('/storage/products');
        // Запускаем обработку изображений в указанной папке и её подпапках
        self::processFolder($sourcePath);

        return self::SUCCESS;
    }

    public function processFolder($folderPath) {
        $files = scandir($folderPath);
        $files = array_diff($files, array('.', '..'));

        foreach ($files as $file) {
            $filePath = $folderPath . '/' . $file;

            try {
                if (is_dir($filePath)) {
                    // Если элемент - папка, рекурсивно обрабатываем её содержимое
                    self::processFolder($filePath);
                } elseif (is_file($filePath)) {
                    $width = getimagesize($filePath)[0];
                    // Если элемент - файл-изображение, обрабатываем его
                    if ($width > 890) {
                        $this->resizeImage($filePath);
                    }
                }
            } catch (\Exception $e) {
                Log::error("Ошибка при обработке файла $filePath: " . $e->getMessage() . "\n");
            }

        }
    }

    // Функция для изменения размеров изображения
    public function resizeImage($imagePath) {
        $newWidth = 890;

        $img = Image::make($imagePath);
        $img->resize($newWidth, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($imagePath);

        Log::info("Изображение $imagePath успешно изменено.\n");
    }
}
