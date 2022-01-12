<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::middleware(['auth','is.admin'])->group(function () {
    Route::get('/panel', 'HomeController@panel');
    Route::resource('/foods' , 'FoodController');
    Route::resource('/orders' , 'OrderController')->only(['index' , 'show']);
});