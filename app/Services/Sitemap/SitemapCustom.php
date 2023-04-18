<?php


namespace App\Services\Sitemap;


use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapCustom extends Sitemap
{
    public function render(): string
    {
        $tags = collect($this->tags)->unique('url')->filter();

        // Удалить теги changeFrequency и priority из всех тегов
        $tags = $tags->map(function ($item, $key) {
            unset($item->priority);
            return $item;
        });

        return view('sitemap::sitemap')
            ->with(compact('tags'))
            ->render();
    }
}
