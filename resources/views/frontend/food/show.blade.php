@extends('layouts.app')

@section('image')
    <img class="img-responsive" src="{{ $food->image_url }}" alt="">
@endsection

@section('content')
    <div class="jumbotron w-100 bg-light">
        <div class="media my-4">
            <img style="width:150px;" src="{{ $food->image_url }}" class="img-thumbnail ml-2" alt="...">
            <div class="media-body">
              <h5 class="display-4">{{ $food->name }}</h5>
                <p class="lead">{{ $food->description }}</p>
            </div>
        </div>
        
        <hr class="my-4">
        <p>
            @php
                $foodInBasket = \Modules\Basket\Facades\Basket::get('foods' , $food->id);
            @endphp
                موجودی : {{ $food->count }}
        </p>
        @if( ! is_null($foodInBasket) && $foodInBasket['count'] >= $food->count && $food->count > 0 )
            <span class="bg-danger">شما همه موجودی این غذا را به سبد خود اضافه کرده اید!</span>
        @elseif($food->count > 0)
            <a href="{{ route('food.add.to.basket' , $food) }}" class="btn btn-primary">افزودن به سبد</a>
        @endif
    </div>
    
@endsection