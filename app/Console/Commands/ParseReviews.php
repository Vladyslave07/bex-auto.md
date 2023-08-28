<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class ParseReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:reviews {domain?}';

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
        if ($this->argument('domain') === 'kz') {
            $connection = 'kz_mysql';
        }

        Config::set('database.default', $connection);

        $reviews = new \App\Services\ParseReviews();
        $reviews->parseReviews();
    }
}
