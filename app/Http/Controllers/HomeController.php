<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodType;
use Illuminate\Http\Request;

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
    public function index()
    {
        $foodsType = FoodType::whereActive(1)->get()->pluck('id');

        return view('frontend.index' , compact('foodsType'));
    }
}
