<?php

namespace App\Services\Currencies;

use App\Models\Currency;
use App\Services\Cookies\Cookie;
use Carbon\Carbon;
use Exception;

class CurrencyConverter
{
    /**
     * @var array
     */
    private static array $currenciesContainer = [];

    /**
     * @var Currency
     */
    private static Currency $mainCurrency;

    /**
     * Load currencies container with Currency instances.
     * @param bool $forceLoad
     */
    private static function loadCurrenciesContainer(bool $forceLoad = false): void
    {
        if (empty(self::$currenciesContainer) || $forceLoad) {
            $currencies = Currency::get();

            foreach ($currencies as $currency) {
                self::$currenciesContainer[$currency->code] = $currency;
            }
        }
    }

    /**
     * @return array
     */
    public static function getCurrenciesContainer(): array
    {
        return self::$currenciesContainer;
    }

    /**
     * @return Currency
     */
    public static function getMainCurrency(): Currency
    {
        return self::$mainCurrency;
    }

    /**
     * Load main currency.
     * @param bool $forceLoad
     */
    private static function loadMainCurrency(bool $forceLoad = false): void
    {
        if (empty(self::$mainCurrency) || $forceLoad) {
            self::$mainCurrency = Currency::main()->first();
        }
    }

    /**
     * Call loaders.
     * @param bool $forceLoad
     */
    private static function callLoaders(bool $forceLoad = false): void
    {
        self::loadCurrenciesContainer($forceLoad);
        self::loadMainCurrency($forceLoad);
    }

    /**
     * @param $sum
     * @param string|null $originCurrencyCode
     * @param string|null $targetCurrencyCode
     * @return float|int
     * @throws Exception
     */
    public static function convert($sum, string $originCurrencyCode = null, string $targetCurrencyCode = null)
    {
        if (!is_numeric($sum)) {
            throw new \InvalidArgumentException('Value being converted must be numeric');
        }

        self::callLoaders();
        $originCurrency = self::getOriginCurrencyByCode($originCurrencyCode);
        $targetCurrency = self::getTargetCurrencyByCode($targetCurrencyCode);

        if (
            $originCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay() ||
            $targetCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()
        ) {
            CurrencyRates::getRates();
            self::callLoaders(true);
            $originCurrency = self::getOriginCurrencyByCode($originCurrencyCode);
            $targetCurrency = self::getTargetCurrencyByCode($targetCurrencyCode);
        }

        return $sum / $originCurrency->rate * $targetCurrency->rate;
    }

    /**
     * @param string $originCurrencyCode
     * @return CurrencyService
     */
    private static function getOriginCurrencyByCode(string $originCurrencyCode = null): Currency
    {
        return $originCurrencyCode !== null ? self::$currenciesContainer[$originCurrencyCode] : self::$mainCurrency;
    }

    /**
     * @param string $targetCurrencyCode
     * @return CurrencyService
     */
    private static function getTargetCurrencyByCode(string $targetCurrencyCode = null): Currency
    {
        if ($targetCurrencyCode !== null) {
            return $targetCurrency = self::$currenciesContainer[$targetCurrencyCode];
        }

        $targetCurrencyCode = Cookie::has(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME)
            ? Cookie::get(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME)
            : self::$mainCurrency->code;

        return $targetCurrency = self::$currenciesContainer[$targetCurrencyCode];
    }
}
