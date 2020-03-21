<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    /**
     * @param CurrencyRequest $request
     * @return Currency
     */
    public function store(CurrencyRequest $request): Currency;

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
