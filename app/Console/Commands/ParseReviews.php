<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ParseReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:reviews';

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
        $reviews = new \App\Services\ParseReviews();
        $reviews->parseReviews();
    }
}
