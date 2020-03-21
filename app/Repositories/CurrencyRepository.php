<?php

namespace App\Repositories;

use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Services\Currencies\CurrencyRates;
use Exception;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    /**
     * @param CurrencyRequest $request
     * @return Currency
     * @throws Exception
     */
    public function store(CurrencyRequest $request): Currency
    {
        $currencyRate = CurrencyRates::getCurrencyRateByCode($request->code);

        if ($currencyRate === null) {
            throw new Exception('There is no currency available in currency rates service');
        }

        return Currency::create([
            'code' => $request->code,
            'symbol' => $request->symbol,
            'rate' => $currencyRate,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function setMain(Currency $currency): bool
    {
        $currentMainCurrency = Currency::main()->first();

        if ($currentMainCurrency) {
            $this->unsetMain($currentMainCurrency);
        }

        return $currency->update(['is_main' => 1]);
    }

    /**
     * @param Currency $currency
     * @return bool
     */
    public function unsetMain(Currency $currency): bool
    {
        return $currency->is_main ? $currency->update(['is_main' => 0]) : false;
    }
}
