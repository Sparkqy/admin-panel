<?php

namespace App\Services\Currencies;

use Exception;
use GuzzleHttp\Client;

class CurrencyRates
{
    /**
     * @throws Exception
     */
    public static function updateRatesToLatest(): void
    {
        $mainCurrencyCode = CurrencyConverter::getMainCurrency()->code;
        $requestUrl = config('currency_rates.api_url') . '/latest?base=' . $mainCurrencyCode;
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

    /**
     * @return array
     * @throws Exception
     */
    public static function getCurrenciesList(): array
    {
        $mainCurrencyCode = CurrencyService::getCurrentCurrency()->code;
        $requestUrl = config('currency_rates.api_url') . '/latest?base=' . $mainCurrencyCode;
        $client = new Client();
        $requestResponse = $client->request('GET', $requestUrl);

        if ($requestResponse->getStatusCode() !== 200) {
            throw new Exception('There is a problem with currency rates service');
        }

        $currencies = array_keys(json_decode($requestResponse->getBody()->getContents(), true)['rates']);

        return array_merge($currencies, [$mainCurrencyCode]);
    }

    /**
     * @param string $code
     * @return string|null
     * @throws Exception
     */
    public static function getCurrencyRateByCode(string $code): ?string
    {
        $mainCurrencyCode = CurrencyService::getCurrentCurrency()->code;
        $requestUrl = config('currency_rates.api_url') . '/latest?base=' . $mainCurrencyCode;
        $client = new Client();
        $requestResponse = $client->request('GET', $requestUrl);

        if ($requestResponse->getStatusCode() !== 200) {
            throw new Exception('There is a problem with currency rates service');
        }

        $currencies = json_decode($requestResponse->getBody()->getContents(), true)['rates'];

        return $currencies[$code] ?? null;
    }
}
