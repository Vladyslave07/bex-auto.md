<?php

namespace App\Services\Currency;

use App\Models\Currency;

class CurrencyRequest
{
    const BASE_URL = 'http://apilayer.net/api/live';
    const DEFAULT_CURRENCY = 'USD';

    public function get()
    {
        $url = self:: BASE_URL . '?' . $this->getQueryParams();

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        return json_decode($response->getBody(), true);
    }

    public function getCurrenciesCode(): string
    {
        $currencies = Currency::query()->get(['bank_code']);
        if ($currencies->isEmpty()) {
            return '';
        }
        return $currencies->implode('bank_code', ',');
    }

    public function getQueryParams(): string
    {
        return http_build_query([
            'access_key' => getenv('ACCESS_KEY'),
            'currencies' => $this->getCurrenciesCode(),
            'source' => self::DEFAULT_CURRENCY,
            'format' => 1,
        ]);
    }

    public function updateCurrenciesRate()
    {
        $response = $this->get();
        if ($response['success'] === false) {
            return;
        }

        $currenciesRate = $response['quotes'];

        foreach ($currenciesRate as $currencyCode => $rate) {
            $currencyCode = str_replace(self::DEFAULT_CURRENCY, '', $currencyCode);
            Currency::query()->where('bank_code', $currencyCode)->update(['exchange_rate' => $rate]);
        }
    }
}
