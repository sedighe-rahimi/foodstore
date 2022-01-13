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
                    {{-- <div class="col-12 col-md-2">قیمت (تومان)</div> --}}
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
                            <div class="col-12 col-md-2">
                                <img style="width:100px" class="img-thumbnail ml-2" src="{{ $food->image_url }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="{{ route('user.food.show' , $food) }}">
                                    {{ $item['title'] }}
                                </a>
                            </div>
                            <div class="col-12 col-md-2">
                                @if($item['count'] < $food->count)
                                    <a class="num-change" href="{{ route('basket.addCount' , ['cacheName' => $cacheName , 'id' => $item['id']] ) }}">+</a>
                                @endif
                                <a href="#" class="border num-change">{{ $item['count'] }}</a>
                                @if($item['count'] > 1)
                                    <a class="num-change" href="{{ route('basket.decCount' , ['cacheName' => $cacheName , 'id' => $item['id'] , 'decCount' => 1] ) }}">-</a> 
                                @endif
                            </div>
                            {{-- <div class="col-12 col-md-2"> {{ number_format($item['price']) }}</div> --}}
                            <div class="col-12 col-md-3"> {{ number_format($item['price'] * $item['count']) }}</div>
                            <div class="col-12 col-md-1">
                                <a  class="font-weight-lighter badge badge-danger" href="{{ route('basket.decCount' , ['cacheName' => $cacheName , 'id' => $item['id'] , 'decCount' => $item['count']] ) }}">حذف</a>
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
            <div class="w-100 mb-3"></div>
            <form action="{{ route('pay.basket') }}" method="post">
                @csrf
                <button class="btn btn-success btn-block">پرداخت</button>
            </form>
        </div>
    </div>

@endsection