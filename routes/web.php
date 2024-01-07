<?php

use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();


Route::controller(HomeController::class)->group(function (){
    Route::get('/',  'chooseRegion')->name('choose-region');
    Route::get('/home/{region?}',  'index')->name('home');
    Route::get('/dashboard',  'dashboard')->name('dashboard')->middleware('auth');
    Route::get('aboutUs','getAboutUs')->name('aboutUs');
    Route::patch('/fcm-token','updateToken')->name('fcmToken');

});

Route::resource('roles', RoleController::class)->middleware(['auth', 'role:Admin']);
Route::get('location',[LocationController::class,'newLocation'])->name('newLocation')->middleware('auth');
Route::post('add_location',[LocationController::class,'add_location'])->name('add_location')->middleware('auth');


Route::controller(ContactUsController::class)->middleware('auth')->group(function (){
    Route::get('contactus','getContactUsPage')->name('contactus');
    Route::post('send_message','send_message')->name('send_message');
    Route::get('show_message','show_message')->name('show_message');
    Route::get('details_message/{id}','details_message')->name('details_message');

});

