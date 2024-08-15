<?php

namespace App\Console\Commands;

use App\Models\Redirect;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MakeSlugLowerForNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-slug-lower-for-news {domain?}';

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
        $domainSlug = getenv('UK_APP_URL');
        if ($this->argument('domain') === 'kz') {
            $connection = 'kz_mysql';
            $domainSlug = getenv('KZ_APP_URL');
        }
        Config::set('database.default', $connection);

        $articles = \App\Models\News::whereRaw('slug COLLATE utf8mb4_bin REGEXP "[A-Z]"')->get();
        foreach ($articles as $article) {
            Redirect::create([
                'url_from' => $domainSlug . '/' . $article->slug,
                'url_to' => $domainSlug . '/' . strtolower($article->slug),
                'type' => 301,
            ]);
            $article->slug = strtolower($article->slug);
            $article->save();
        }
    }
}
