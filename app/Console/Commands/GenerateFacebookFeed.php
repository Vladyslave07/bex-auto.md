<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Services\Feeds\FacebookFeed;
use App\Services\Sitemap\SitemapGeneral;
use Illuminate\Console\Command;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GenerateFacebookFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:facebook';

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
        $domains = Domain::query()->whereIn('id', [Domain::DEFAULT_DOMAIN, Domain::KAZACHSTAN_DOMAIN])->get(['slug', 'id']);

        foreach ($domains as $domain) {
            app('domain')->setDomain($domain);

            $locale = 'ru';
            if ($domain->slug == Domain::DEFAULT_SLUG_DOMAIN) {
                $locale = 'uk';
            }
            $fileName = sprintf('public/facebook_feed_%s.xml', $domain->slug);
            $feed = new FacebookFeed($fileName, $locale);
            $feed->apply();

        }
    }
}
