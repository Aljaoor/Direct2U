<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)
    ->prefix('/users')
    ->as('users.')
    ->middleware(['auth','role:Admin'])
    ->group(function (){
        Route::get('/',  'index')->name('index');
        Route::get('/create',  'create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update','update')->name('update');
        Route::get('/delete/{id}','delete')->name('delete');

    });

Route::get('user/register-as-restaurant',[UserController::class,'registerAsRestaurant'])->name('users.register-as-restaurant');
