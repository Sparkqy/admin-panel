<?php

namespace App\Services\Currencies;

use Exception;
use GuzzleHttp\Client;

class CurrencyRates
{
    /**
     * @throws Exception
     */
    public static function getRates(): void
    {
        $mainCurrency = CurrencyConverter::getMainCurrency();
        $requestUrl = config('currency_rates.api_url') . '/latest?base=' . $mainCurrency->code;
        $client = new Client();

        $requestResponse = $client->request('GET', $requestUrl);

        if ($requestResponse->getStatusCode() !== 200) {
            throw new Exception('There is a problem with currency rates service');
        }

        $rates = json_decode($requestResponse->getBody()->getContents(), true)['rates'];
        $currencies = CurrencyConverter::getCurrenciesContainer();

        foreach ($currencies as $currency) {
            if (!$currency->isMain()) {
                if (!isset($rates[$currency->code])) {
                    throw new Exception('There is a no such currency ' . $currency->code . ' in rates service');
                }

                $currency->update(['rate' => $rates[$currency->code]]);
                $currency->touch();
            }
        }
    }
}
