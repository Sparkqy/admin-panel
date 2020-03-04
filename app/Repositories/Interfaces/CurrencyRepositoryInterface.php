<?php

namespace App\Repositories\Interfaces;

use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    /**
     * @param Currency $currency
     * @return bool
     */
    public function setMain(Currency $currency): bool;

    /**
     * @param Currency $currency
     * @return bool
     */
    public function unsetMain(Currency $currency): bool;
}
