<?php


use App\Http\Controllers\MealController;
use Illuminate\Support\Facades\Route;


Route::controller(MealController::class)
    ->prefix('meals')
    ->as('meals.')
    ->group(function () {
        Route::group(['middleware' => ['auth','role:Restaurant|Admin']], static function () {
            Route::get('/', 'getCategories')->name('getCategories');
            Route::post('/Store-Category', 'StoreCategory')->name('StoreCategory');
            Route::get('/delete-category/{id}', 'deleteCategory')->name('deleteCategory');
            Route::get('/filter-categories/{id}', 'filterCategories')->name('filter-categories');

//            meals
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/delete/{id}', 'delete')->name('delete');


        });

    });
