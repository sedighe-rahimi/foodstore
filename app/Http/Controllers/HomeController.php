<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodType;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if( isset($request->type) && FoodType::whereId($request->type)->whereActive(1)->first() ){
            $foodsType = FoodType::whereId($request->type)->whereActive(1)->get();
        }else{
            $foodsType = FoodType::whereActive(1)->get();
        }
        
        return view('frontend.index' , compact('foodsType'));
    }

    public function showFactor($orderId)
    {
        $order = Order::findOrFail($orderId);
        if( Auth::check() && Auth::user()->type == 'admin' || $order->user->id == Auth::user()->id)
            return view('frontend.factor' , compact('order'));
        else
            abort(404);
    }
}
