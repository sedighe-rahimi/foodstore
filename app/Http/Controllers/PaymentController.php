<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Modules\Basket\Facades\Basket;
use Auth;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payBasket()
    {
        $cacheName = 'foods';
        
        $basketItems = Basket::all($cacheName);

        if( ! $basketItems ){
            alert()->error('سبد خرید شما خالی است!')->persistent('متوجه شدم')->autoclose(3000);
            return redirect(url('/'));
        }

        if( ! Basket::isValid('foods' , 'App\Models\Food') ){
            Basket::setAgain('foods' , 'App\Models\Food');
            alert()->error('اطلاعات برخی از غذاهای سبد خرید شما تغییر کرده است. لطفا تغییرات را بررسی و مجددا اقدام نمایید.')->persistent('متوجه شدم')->autoclose(3000);
            return redirect(route('basket.foods'));
        }

        $totalPrice     = 0;
        $maxWaitingTime = 0;

        foreach($basketItems as $item){
            $food           = Food::findOrFail($item['id']);

            if( $food->count < $item['count'] ){
                alert()->error('موجودی یکی از محصولات سبد خرید کمتر از سفارش شماست.!')->persistent('متوجه شدم')->autoclose(3000);
                return back();
            }

            $totalPrice += $item['price'] * $item['count'];

            if( $food->waiting_time > $maxWaitingTime )
                $maxWaitingTime = $food->waiting_time;
        }

        if( $totalPrice > 0 ){
            $order                  = new Order();
            $order->user_id         = Auth::user()->id;
            $order->address         = Auth::user()->address;
            $order->total_price     = $totalPrice;
            $order->waiting_time    = $maxWaitingTime;
            if($order->save()){
                foreach($basketItems as $item){
                    $food = Food::findOrFail($item['id']);
                    $orderDetail                = new OrderDetail();
                    $orderDetail->order_id      = $order->id;
                    $orderDetail->food_id       = $food->id;
                    $orderDetail->count         = $item['count'];
                    $orderDetail->price         = $food->price;
                    $orderDetail->waiting_time  = $food->waiting_time;
                    if($orderDetail->save()){
                        Basket::deleteBasket('foods');
                        $food->count = $food->count - $item['count'];
                        $food->save();
                    }
                }
            }

            return redirect(route('factor.show' , ['orderId' => $order->id]));
        }

        alert()->error('خطایی رخ داده است!')->persistent('متوجه شدم')->autoclose(3000);
        return back();
    }
}
