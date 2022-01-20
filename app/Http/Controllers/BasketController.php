<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Basket\Facades\BasketCache;

class BasketController extends Controller
{
    public function getAllItems()
    {
        $cacheName = 'foods';
        
        $basketItems = BasketCache::all($cacheName);
        
        if( ! $basketItems ){
            alert()->error('سبد خرید شما خالی است!')->persistent('متوجه شدم')->autoclose(3000);
            return redirect(url('/'));
        }

        $totalPrice = 0;

        foreach($basketItems as $item){
            $totalPrice += $item['price'] * $item['count'];
        }

        return view('frontend.basket.index' , compact('basketItems' , 'cacheName' , 'totalPrice'));
    }

    
}
