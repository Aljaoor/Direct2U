<?php


use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::controller(CheckoutController::class)
    ->prefix('checkout')
    ->as('checkout.')
    ->group(function () {
        Route::group(['middleware' => ['auth']], static function () {
            Route::post('/add-meal-to-card', 'addMealToCard')->name('add-meal-to-card');
            Route::get('/get-cart-page', 'getCartPage')->name('get-card-page');
            Route::get('/checkout', 'getCheckOut')->name('getCheckOut');
            Route::post('/step2', 'step2')->name('step2');
            Route::get('/showLocationById/{id}','showLocationById')->name('showLocationById');
            Route::post('/increase-quantity', 'increaseQuantity')->name('increase-quantity');
            Route::post('/decrease-quantity', 'decreaseQuantity')->name('decrease-quantity');
            Route::post('/remove-meal', 'removeMeal')->name('remove-meal');
            Route::post('/confirm', 'confirm')->name('confirm');

        });
    });



Route::controller(OrderController::class)
    ->prefix('orders')
    ->as('orders.')
    ->group(function () {
        Route::group(['middleware' => ['auth']], static function () {
            Route::get('/get-unprocessed-orders', 'unprocessedOrders')->name('get-unprocessed-orders');
            Route::get('/get-finished-orders', 'finishedOrders')->name('get-finished-orders');
            Route::get('/orders', 'getOrders')->name('data');
            Route::get('/finished-orders-data', 'getFinishedOrdersData')->name('finished-orders-data');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/details/{id}', 'details')->name('details');
            Route::get('/accept/{id}', 'accept')->name('accept');
            Route::get('/start-delivery/{id}', 'startDelivery')->name('start-delivery');
            Route::get('/done/{id}', 'done')->name('done');

        });
    });


