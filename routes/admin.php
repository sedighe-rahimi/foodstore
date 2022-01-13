<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::middleware(['auth','is.admin'])->group(function () {
    Route::get('/panel', 'HomeController@panel');
    Route::resource('/foods' , 'FoodController');
    Route::patch('/food/addCount' , 'FoodController@addCount')->name('food.add.count');
    Route::resource('/orders' , 'OrderController')->only(['index' , 'show' , 'destroy']);
    Route::resource('/order_details' , 'OrderdetailController')->only(['update']);
});