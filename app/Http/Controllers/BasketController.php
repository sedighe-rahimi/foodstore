<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Basket\Facades\Basket;

class BasketController extends Controller
{
    public function getAllItems()
    {
        $cacheName = 'foods';
        
        $basketItems = Basket::all($cacheName);
        
        if( ! $basketItems )
            return redirect(url('/'));

        $totalPrice = 0;

        foreach($basketItems as $item){
            $totalPrice += $item['price'] * $item['count'];
        }

        return view('frontend.basket.index' , compact('basketItems' , 'cacheName' , 'totalPrice'));
    }

    
}
