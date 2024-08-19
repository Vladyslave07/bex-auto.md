<?php

namespace App\Services\Sitemap;


use Spatie\Sitemap\Sitemap;

class SitemapImages extends Sitemap
{
    public function render(): string
    {
        $tags = collect($this->tags)->unique('url')->filter();

        // Удалить теги changeFrequency и priority из всех тегов
        $tags = $tags->map(function ($item, $key) {
            unset($item->priority);
            unset($item->lastModificationDate);
            unset($item->changeFrequency);
            return $item;
        });

        return view('sitemap::sitemap')
            ->with(compact('tags'))
            ->render();
    }
}
