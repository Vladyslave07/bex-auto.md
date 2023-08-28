<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class CurrenciesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update {domain?}';

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
        $connection = 'mysql';
        if ($this->argument('domain') === 'kz') {
            $connection = 'kz_mysql';
        }

        Config::set('database.default', $connection);

        $currencies = new \App\Services\Currency\CurrencyRequest();
        $currencies->updateCurrenciesRate();
        return self::SUCCESS;
    }
}
