<?php

Route::prefix('loan')->name('loan.')->group(function () {
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::prefix('other_incoming')->name('other_incoming.')->group(function () {
            Route::get('create/{param_id?}', 'LoanReceiptController@other_incoming')->name('create');
        });

        Route::prefix('extraordinary_charge')->name('extraordinary_charge.')->group(function () {
            Route::get('create/{param_id?}', 'LoanReceiptController@extraordinary_charge')->name('create');
        });

        /**param_id = customer_id or loan_id */
        Route::get('create/{param_id?}', 'LoanReceiptController@payment')->name('create');
        Route::post('', 'LoanReceiptController@store')->name('store');
    });
});

Route::resource('loan', 'LoanController');
