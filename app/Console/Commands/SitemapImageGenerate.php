<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Services\Sitemap\SitemapImagesGenerate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class SitemapImageGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:image-generate {domain?}';

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
        $domainSlug = Domain::DEFAULT_SLUG_DOMAIN;
        if ($this->argument('domain') === 'kz') {
            $connection = 'kz_mysql';
            $domainSlug = Domain::KAZACHSTAN_SLUG_DOMAIN;
        }
        Config::set('database.default', $connection);

        $domain = Domain::query()->where('slug', $domainSlug)->first(['slug', 'id']);

        app('domain')->setDomain($domain);

        $sitemap = new SitemapImagesGenerate();
        $sitemap->generate();
    }
}
