<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::latest()->get();
        return view('admin.food.index' , compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name'          => 'required',
            'waiting_time'  => 'required|numeric',
            'price'         => 'required|numeric',
            'count'         => 'required|numeric',
            'food_type_id'  => 'required',
            'description'   => 'nullable|min:20',
            'image_url'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $food = new Food();
        $food->name         = $validateData['name'];
        $food->waiting_time = $validateData['waiting_time'];
        $food->user_id      = Auth::user()->id;
        $food->price        = $validateData['price'];
        $food->count        = $validateData['count'];
        $food->food_type_id = $validateData['food_type_id'];
        $food->description  = $validateData['description'];


        $imageName = time().'.'.$request->image_url->extension();  
     
        $request->image_url->move(public_path('images'), $imageName);

        $food->image_url    = '\\images\\'.$imageName;

        if($food->save()){
            return redirect(route('foods.index'));
        }else{
            return back()->withErrors(['error'=> 'Food is not stored successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('admin.food.edit' , compact('food'));
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
        $validateData = $request->validate([
            'name'          => 'required',
            'waiting_time'  => 'required|numeric',
            'price'         => 'required|numeric',
            'count'         => 'required|numeric',
            'food_type_id'  => 'required',
            'description'   => 'nullable|min:20',
            'image_url'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $food->name         = $validateData['name'];
        $food->waiting_time = $validateData['waiting_time'];
        $food->user_id      = Auth::user()->id;
        $food->price        = $validateData['price'];
        $food->count        = $validateData['count'];
        $food->food_type_id = $validateData['food_type_id'];
        $food->description  = $validateData['description'];
        
        if( isset($request->image_url) ){
            $imageName = time().'.'.$request->image_url->extension();  
            $request->image_url->move(public_path('images'), $imageName);
            $food->image_url = '\\images\\'.$imageName;
        }
        

        if($food->save()){
            return redirect(route('foods.index'));
        }else{
            return back()->withErrors(['error'=> 'Food is not updated successfuly!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect(route('foods.index'));
    }

    public function addCount(Request $request)
    {
        $validateData = $request->validate([
            'id'        => 'required'
        ]);

        $food = Food::findOrFail($request->id);

        $request->validate([
            'add_count' => 'required|numeric|min:'.($food->count * -1)
        ],
        [
            'add_count.min' => 'فیلد موجودی نمی تواند کمتر از صفر شود!'
        ]);

        $food->count = $food->count + $request->add_count;

        if( $food->count >= 0 && $food->save() ){
            return back();
        }

        return back()->withErrors(['error' => 'خطایی رخ داده است!']);
    }
}
