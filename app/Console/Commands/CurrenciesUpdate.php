<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CurrenciesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currencies rate';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currencies = new \App\Services\Currency\CurrencyRequest();
        $currencies->updateCurrenciesRate();
        return self::SUCCESS;
    }
}
