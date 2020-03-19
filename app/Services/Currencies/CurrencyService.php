<?php

namespace App\Services\Currencies;

use App\Services\Cookies\Cookie;
use App\Models\Currency as CurrencyModel;

class CurrencyService
{
    /**
     * @return CurrencyModel
     */
    public static function getCurrentCurrency(): CurrencyModel
    {
        if (Cookie::has(CurrencyModel::SYSTEM_CURRENCY_CODE_COOKIE_NAME)) {
            $currentCurrencyCode = Cookie::get(CurrencyModel::SYSTEM_CURRENCY_CODE_COOKIE_NAME);
            $currentCurrency = CurrencyModel::byCode($currentCurrencyCode)->first();
        } else {
            $currentCurrency = CurrencyModel::main()->first();
        }

        return $currentCurrency;
    }

    /**
     * @param string $currencyCode
     * @return bool
     */
    public static function isCurrent(string $currencyCode): bool
    {
        return Cookie::is(CurrencyModel::SYSTEM_CURRENCY_CODE_COOKIE_NAME, $currencyCode);
    }
}
