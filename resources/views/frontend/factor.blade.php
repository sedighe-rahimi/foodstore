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
        <div class="col-12 col-md-8">
                <div class="col-12 d-flex mb-3 font-weight-bold">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-2">عنوان</div>
                    <div class="col-12 col-md-2">تعداد</div>
                    <div class="col-12 col-md-2">قیمت</div>
                    <div class="col-12 col-md-4">قیمت کل</div>
                </div>
                <div class="col-12 d-flex">
                    @foreach( $order->orderDetails as $orderDetail )
                        <div class="col-12 col-md-2">
                            <img style="width:100px" src="{{ $orderDetail->food->image_url }}">
                        </div>
                        <div class="col-12 col-md-2">
                            <a href="{{ route('user.food.show' , $orderDetail->food) }}">
                                {{ $orderDetail->food->name }}
                            </a>
                        </div>
                        <div class="col-12 col-md-2">
                            {{ $orderDetail->count }}
                        </div>
                        <div class="col-12 col-md-2"> {{ number_format($orderDetail->price) }}  تومان</div>
                        <div class="col-12 col-md-4"> {{ number_format($orderDetail->price * $orderDetail->count) }}  تومان</div>
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
    </div>

@endsection