@extends('layouts.app')

@section('image')
    <img class="img-responsive" src="{{ $food->image_url }}" alt="">
@endsection

@section('content')
    <div class="jumbotron w-100 bg-light">
        <div class="media my-4">
            <img style="width:150px;" src="{{ $food->image_url }}" class="img-thumbnail ml-2" alt="...">
            <div class="media-body">
              <h3>{{ $food->name }}</h3>
                <p class="lead">{{ $food->description }}</p>
            </div>
        </div>
        
        <hr class="my-4">
        <div class="col-12 d-flex flex-column">
            @php
                $foodInBasket = \Modules\Basket\Facades\BasketCache::get('foods' , $food->id);
            @endphp
              <div class="col-12 d-flex">
                <div class="col-12 col-md-6">  
                    قیمت : {{ number_format($food->price) }} تومان
                  </div>
                  <div class="col-12 col-md-6">  
                    موجودی : {{ $food->count }}
                  </div>
              </div>
              <div class="col-12 pt-4">
                    @if( ! is_null($foodInBasket) && $foodInBasket['count'] >= $food->count && $food->count > 0 )
                        <span class="alert alert-danger">شما همه موجودی این غذا را به سبد خود اضافه کرده اید!</span>
                    @elseif($food->count > 0)
                        <a href="" onclick="event.preventDefault();addToCart({{ $food->id }})" class="btn btn-primary">افزودن به سبد</a>
                    @endif
              </div>
        </div>
    </div>
@endsection

@section('scripts')   
@endsection