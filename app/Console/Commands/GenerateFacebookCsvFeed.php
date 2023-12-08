<?php

namespace App\Console\Commands;

use App\Models\Domain;
use App\Services\Feeds\FacebookCsvFeed;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class GenerateFacebookCsvFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:facebook-csv';

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
        Config::set('database.default', $connection);

        $domain = Domain::query()->where('slug', $domainSlug)->first(['slug', 'id']);

        app('domain')->setDomain($domain);

        $locale = 'uk';
        $fileName = sprintf('public/facebook_feed_%s.csv', $domain->slug);
        $feed = new FacebookCsvFeed($fileName, $locale);
        $feed->apply();
    }
}
