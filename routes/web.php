<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/food/{food}', 'FoodController@show')->name('user.food.show');
Route::post('/add-to-basket', 'FoodController@addToBasket')->name('food.add.to.basket');
Route::get('/basket-show/foods', 'BasketController@getAllItems')->name('basket.foods');

Route::middleware(['auth'])->group(function () {
    Route::post('/basket/pay' , 'PaymentController@payBasket')->name('pay.basket');
    Route::get('/factor/{orderId}' , 'PaymentController@showFactor')->name('factor.show');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
