<?php

namespace App\Services\Currencies;

use App\Services\Cookies\Cookie;
use App\Models\Currency;

class CurrencyService
{
    /**
     * @return Currency
     */
    public static function getCurrentCurrency(): Currency
    {
        if (Cookie::has(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME)) {
            $currentCurrencyCode = Cookie::get(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME);
            $currentCurrency = Currency::byCode($currentCurrencyCode)->first();
        } else {
            $currentCurrency = Currency::main()->first();
        }

        return $currentCurrency;
    }

    /**
     * @param string $currencyCode
     * @return bool
     */
    public static function isCurrent(string $currencyCode): bool
    {
        return Cookie::is(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME, $currencyCode);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function getUnregisteredCurrencies(): array
    {
        $currencies = CurrencyRates::getCurrenciesList();
        $registeredCurrencies = Currency::all('code')
            ->pluck('code')
            ->toArray();

        return array_values(array_diff($currencies, $registeredCurrencies));
    }
}
