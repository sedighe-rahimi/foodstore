<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
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
        $validateData = $request->validate([
            'name'          => 'required',
            'waiting_time'  => 'required|numeric',
            'price'         => 'required|numeric',
            'count'         => 'required|numeric',
            'type'          => 'required',
            'description'   => 'nullable|min:20'
        ]);

        $food = new Food();
        $food->name         = $validateData['name'];
        $food->waiting_time = $validateData['waiting_time'];
        $food->user_id      = Auth::user()->id;
        $food->price        = $validateData['price'];
        $food->count        = $validateData['count'];
        $food->type         = $validateData['type'];
        $food->description  = $validateData['description'];
        if($food->save()){
            return redirect(route('foods.index'));
        }else{
            return back()->withErrors(['error'=> 'Food is not stored successfuly!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
