<?php

use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;


Route::controller(RestaurantController::class)
    ->prefix('restaurants')
    ->as('restaurants.')
    ->group(function () {
        Route::group(['middleware' => ['auth','role:Restaurant|Admin']], static function () {
            Route::get('/restaurants', 'getRestaurants')->name('get-restaurants');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/get-requests-to-be-restaurants', 'getRequestsToBeRestaurants')->name('get-requests-to-be-restaurants');
            Route::get('/get-request-details/{id}', 'getRequestDetails')->name('get-request-details');
            Route::get('/accept-request/{id}', 'acceptRequest')->name('accept-request');


        });
        Route::post('/register-as-restaurant', 'registerAsRestaurant')->name('register-as-restaurant');
        Route::get('/', 'index')->name('index');
        Route::get('/details//{id}', 'getRestaurantsDetails')->name('get-details')->middleware('auth');
        Route::post('/store-review', 'storeReview')->name('store-review');
        Route::get('/search', 'search')->name('search');
        Route::post('/filter', 'filter')->name('filter');

    });
