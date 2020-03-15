<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Services\Cookies\Cookie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurrenciesController extends Controller
{
    /**
     * @var CurrencyRepositoryInterface $currencyRepository
     */
    private CurrencyRepositoryInterface $currencyRepository;

    /**
     * CurrenciesController constructor.
     * @param CurrencyRepositoryInterface $currencyRepository
     */
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $currencies = Currency::all();

        return \view('currencies.index', compact('currencies'));
    }

    public function setCurrency(Currency $currency)
    {
        Cookie::set(Currency::SYSTEM_CURRENCY_CODE_COOKIE_NAME, strtoupper($currency->code));

        return redirect()
            ->route('currencies.index')
            ->with('success', 'Currency ' . $currency->code . ' was set as system currency.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Currency $currency
     * @return void
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return void
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Currency $currency
     * @return void
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Currency $currency
     * @return void
     */
    public function destroy(Currency $currency)
    {
        //
    }
}
