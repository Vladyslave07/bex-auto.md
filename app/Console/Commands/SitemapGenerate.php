<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Services\Sitemap\SitemapGeneral;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {domain?}';

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

        $locales = LaravelLocalization::getSupportedLocales();
        // Delete uk lang for kz domain
        if ($domain->id == Domain::DEFAULT_DOMAIN) {
            unset($locales['kz']);
        }

        // Delete kz lang for uk domain
        if ($domain->id == Domain::KAZACHSTAN_DOMAIN) {
            unset($locales['uk']);
        }

        foreach ($locales as $key => $locale) {
            $sitemap = new SitemapGeneral($key);
            $sitemap->generate();
        }
    }
}
