<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

Route::name('api.')->group(function () {
    // Employees
    Route::get('employees/search-by-name', 'Api\\EmployeesController@searchByName')->name('employees.search-by-name');
    Route::get('employees/make-datatable', 'Api\\EmployeesController@makeEmployeesDatatable')->name('employees.make-datatable');

    // Positions
    Route::get('positions/search-by-name', 'Api\\PositionsController@searchByName')->name('positions.search-by-name');
    Route::get('positions/make-datatable', 'Api\\PositionsController@makePositionsDatatable')->name('positions.make-datatable');
});

