<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// Задача конвертации изображения в webp
class MakeWebp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $images;

    public function __construct($images)
    {
        $this->images = $images;
    }

    public function handle()
    {
        foreach ($this->images as $image) {
            Image::make(Storage::path($image))->interlace()->encode('webp')->save(Storage::path($image).'.webp');
        }
    }
}
