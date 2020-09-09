<?php

Route::get('/', 'HomeController')->name('home');

Route::get('/dashboard', 'DashboardController')->name('dashboard');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', 'AuthController@login')->name('login');
    Route::post('auth', 'AuthController@auth')->name('auth');
});

Route::middleware('auth')->prefix('auth')->name('auth.')->group(function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::middleware('auth')->prefix('maintenance')->name('maintenance.')->namespace('Maintenance')->group(function () {
    require_once 'web/maintenance/customer.php';
    require_once 'web/maintenance/loan.php';
});


Route::resource('consulta','ConsultController');
Route::get('consulta/excel','ConsultController@excel')->name('consulta.excel');