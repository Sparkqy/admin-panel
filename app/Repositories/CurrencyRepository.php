<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;

class CurrencyRepository implements CurrencyRepositoryInterface
{
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
