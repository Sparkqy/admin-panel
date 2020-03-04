<?php

namespace App\Services\Currencies;

use App\Helpers\Cookies\Cookie;
use App\Models\Currency;
use Intervention\Image\Exception\NotFoundException;

class CurrencyConverter
{
    /**
     * @param $sum
     * @param string|null $originCurrencyCode
     * @param string|null $targetCurrencyCode
     * @return float|int
     */
    public static function convert($sum, string $originCurrencyCode = null, string $targetCurrencyCode = null)
    {
        $mainCurrency = Currency::main()->first();
        $originCurrency = !is_null($originCurrencyCode)
            ? Currency::byCode($originCurrencyCode)->first()
            : $mainCurrency;

        if (!$originCurrency) {
            throw new NotFoundException('Provided origin currency code does not match any currency record in database');
        }

        if ($targetCurrencyCode) {
            $targetCurrency = Currency::byCode($targetCurrencyCode)->first();
        } else {
            $targetCurrencyCode = Cookie::get(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME) ?? $mainCurrency->code;
            $targetCurrency = Currency::byCode($targetCurrencyCode)->first();
        }

        if (!$targetCurrency) {
            throw new NotFoundException('Provided target currency code does not match any currency record in database');
        }

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }
}
