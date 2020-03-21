<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false, 'verify' => false, 'reset' => false]);

Route::middleware(['auth'])->group(function () {
    // Employees
    Route::redirect('/', '/employees');
    Route::resource('employees', 'EmployeesController');

    // Positions
    Route::resource('positions', 'PositionsController');

    // Currencies
    Route::get('currencies/{currency}/set', 'CurrenciesController@setCurrency')->name('currencies.set-currency');
    Route::resource('currencies', 'CurrenciesController');
});

