@extends('layouts.app')

@section('styles')
@endsection

@section('scripts')

@endsection

@section('content')
    <div class="col-12 d-flex">
        <div class="col-12 col-md-9 text-center">
                <div class="col-12 d-flex mb-3 font-weight-bold">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-4">عنوان</div>
                    <div class="col-12 col-md-2">تعداد</div>
                    <div class="col-12 col-md-3">قیمت (تومان)</div>
                    <div class="col-12 col-md-1"></div>
                </div>
                <div class="col-12">
                    @foreach( $basketItems as $item )
                        @php
                            $food = \App\Models\Food::find($item['id']);
                            $cacheName = 'foods';
                        @endphp
                        <div class="row col-12 d-flex py-1 {{ ! $loop->last ? ' border-bottom' : '' }}">
                            <div class="col-12 col-md-2 align-self-center">
                                <img style="width:100px" class="img-thumbnail ml-2" src="{{ $food->image_url }}">
                            </div>
                            <div class="col-12 col-md-4 align-self-center">
                                <a href="{{ route('user.food.show' , $food) }}">
                                    {{ $item['title'] }}
                                </a>
                            </div>
                            <div class="col-12 col-md-2 align-self-center">
                                @if($item['count'] < $food->count)
                                    <a class="num-change" href="{{ route('basket.addCount' , ['cacheName' => $cacheName , 'id' => $item['id']] ) }}">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                @endif
                                <a href="#" class="border num-change text-dark px-2">{{ $item['count'] }}</a>
                                @if($item['count'] > 1)
                                    <a class="num-change" href="{{ route('basket.decCount' , ['cacheName' => $cacheName , 'id' => $item['id'] , 'decCount' => 1] ) }}">
                                        <i class="fas fa-minus"></i>
                                    </a> 
                                @endif
                            </div>
                            <div class="col-12 col-md-3 align-self-center"> {{ number_format($item['price']) }}</div>
                            <div class="col-12 col-md-1 align-self-center">
                                <a  class="text-danger" href="{{ route('basket.decCount' , ['cacheName' => $cacheName , 'id' => $item['id'] , 'decCount' => $item['count']] ) }}">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
        <div class="col-12 col-md-3">
            <div>
                <h5><b>خلاصه</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-12 col-md-5 px-0">قیمت کل</div>
                    <div class="col-12 col-md-7 px-0"> {{ number_format($totalPrice) }} تومان</div>
                </div>
            </div>
            <div class="w-100 mb-5"></div>
            <form action="{{ route('pay.basket') }}" method="post">
                @csrf
                <button class="btn btn-success btn-block">پرداخت</button>
            </form>
        </div>
    </div>

@endsection