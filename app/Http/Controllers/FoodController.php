<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Modules\Basket\Facades\BasketCache;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('frontend.food.show' , compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
    
    public function addToBasket(Request $request)
    {
        $food = Food::findOrFail($request->id);
        $basketData = [
            'id'        => $food->id,
            'title'     => $food->name,
            'count'     => 1,
            'price'     => $food->price,
            'instance'  => get_class($food)
        ];
        
        BasketCache::add('foods' , get_class($food) , $basketData);

        if($request->ajax()){
            return response()->json([
                'status' => 200,
                'basket_count'  => BasketCache::all('foods') && ! is_null(BasketCache::all('foods')) ? count(BasketCache::all('foods')) : 0
            ]);
        }else{
            return redirect(route('basket.foods'));
        }

        
    }
    
}
