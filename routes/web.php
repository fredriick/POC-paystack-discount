<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('payment/callback', 'PaymentController@handleGatewayCallback')->name('payment.callback');

