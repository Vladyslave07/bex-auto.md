<?php

namespace App\Console\Commands;

use App\Models\Car;
use App\Models\Domain;
use App\Services\Feeds\FacebookFeed;
use App\Services\Sitemap\SitemapGeneral;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GenerateFacebookFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:facebook {domain?}';

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

        $locale = 'ru';
        if ($domainSlug == Domain::DEFAULT_SLUG_DOMAIN) {
            $locale = 'uk';
        }
        $fileName = sprintf('public/facebook_feed_%s.xml', $domain->slug);
        $feed = new FacebookFeed($fileName, $locale);
        $feed->apply();
    }
}
