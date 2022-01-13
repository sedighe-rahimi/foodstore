@extends('layouts.app')

@section('styles')
@endsection

@section('scripts')

@endsection

@section('content')

<div class="alert alert-dark w-100" role="alert">
    <h4>فاکتور</h4>
</div>
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
                @foreach( $order->orderDetails as $orderDetail )
                    <div class="row col-12 d-flex py-1 {{ ! $loop->last ? ' border-bottom' : '' }}">
                        <div class="col-12 col-md-2 align-self-center">
                            <img style="width:100px" class="img-thumbnail ml-2" src="{{ $orderDetail->food->image_url }}">
                        </div>
                        <div class="col-12 col-md-4 align-self-center">
                            <a href="{{ route('user.food.show' , $orderDetail->food) }}">
                                {{ $orderDetail->food->name }}
                            </a>
                        </div>
                        <div class="col-12 col-md-2 align-self-center">
                            {{ $orderDetail->count }}
                        </div>
                        <div class="col-12 col-md-3 align-self-center"> {{ number_format($orderDetail->price ) }}</div>
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
                <div class="col-12 col-md-6 px-0">قیمت کل</div>
                <div class="col-12 col-md-6 px-0"> {{ number_format($order->total_price) }} تومان</div>
            </div>
            <div class="col-12 d-flex">
                <div class="col-12 col-md-6 px-0">زمان آماده سازی</div>
                <div class="col-12 col-md-6 px-0"> {{ $order->waiting_time }} دقیقه</div>
            </div>
        </div>
    </div>
</div>



    {{-- <div class="col-12 d-flex">
        <div class="col-12 col-md-8">
                <div class="col-12 d-flex mb-3 font-weight-bold">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-2">عنوان</div>
                    <div class="col-12 col-md-2">تعداد</div>
                    <div class="col-12 col-md-2">قیمت</div>
                    <div class="col-12 col-md-4">قیمت کل</div>
                </div>
                <div class="col-12">
                    @foreach( $order->orderDetails as $orderDetail )
                        <div class="row col-12 d-flex border-bottom py-1">
                            <div class="col-12 col-md-2">
                                <img style="width:100px" src="{{ $orderDetail->food->image_url }}">
                            </div>
                            <div class="col-12 col-md-3">
                                <a href="{{ route('user.food.show' , $orderDetail->food) }}">
                                    {{ $orderDetail->food->name }}
                                </a>
                            </div>
                            <div class="col-12 col-md-2">
                                {{ $orderDetail->count }}
                            </div>
                            <div class="col-12 col-md-2"> {{ number_format($orderDetail->price) }}  تومان</div>
                            <div class="col-12 col-md-3"> {{ number_format($orderDetail->price * $orderDetail->count) }}  تومان</div>
                        </div>
                    @endforeach
                </div>
        </div>
        <div class="col-12 col-md-4">
            <div>
                <h5><b>خلاصه</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="col-12 col-md-6">قیمت کل</div>
                    <div class="col-12 col-md-6 text-right"> {{ number_format($order->total_price) }} تومان</div>
                </div>
                <div class="col-12 d-flex mt-2">
                    <div class="col-12 col-md-6">زمان آماده سازی</div>
                    <div class="col-12 col-md-6 text-right"> {{ $order->waiting_time }} دقیقه</div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection