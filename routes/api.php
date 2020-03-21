<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    // Employees
    Route::get('employees/search-by-name', 'Api\\EmployeesController@searchByName')->name('employees.search-by-name');
    Route::get('employees/make-datatable', 'Api\\EmployeesController@makeEmployeesDatatable')->name('employees.make-datatable');

    // Positions
    Route::get('positions/search-by-name', 'Api\\PositionsController@searchByName')->name('positions.search-by-name');
    Route::get('positions/make-datatable', 'Api\\PositionsController@makePositionsDatatable')->name('positions.make-datatable');
});

