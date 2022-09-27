<?php

namespace App\Console\Commands;

use App\Models\Parser;
use Illuminate\Console\Command;

class ParserRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start download info about lots';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fields = Parser::query()->get();

        $parser = new \App\Services\Parser(
            $fields->where('slug', 'lots_url')->first()->value,
            $fields->where('slug', 'detail_url')->first()->value,
            $fields->where('slug', 'token')->first()->value,
            $fields->where('slug', 'category')->first()->value,
            $fields->where('slug', 'status')->first()->value,
        );
        $parser->apply();
    }
}
