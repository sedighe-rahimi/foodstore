@extends('layouts.app')

@section('content')
    @foreach ($foodsType as $foodType)
    @php
        $foodType = \App\Models\FoodType::find($foodType);
        if( is_null($foodType) )    continue;
    @endphp

    <div class="alert alert-dark w-100" role="alert">
        <h4>غذاهای {{ $foodType->title }}</h4>
    </div>
    <div id="owl-carousel{{ $loop->index+1 }}" class="owl-carousel p-3">
        @foreach ($foodType->foods as $food)
            <div>
                <div class="card">
                    <img src="{{ $food->image_url }}" style="height:150px" alt="" class="card-img-top">
                    <div class="card-body text-justify">
                        <h3>{{ $food->name }}</h3>
                        <p>{{ $food->description }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="col-12 d-flex justify-content-between">
                            <span>{{ $food->price }} تومان</span>
                            <span>موجودی: {{ $food->count }}</span>
                        </div>
                        <div class="col-12 mt-2">
                            @php
                                $foodInBasket = Basket::get('foods' , $food->id);
                            @endphp
                            @if( ! is_null($foodInBasket) && $foodInBasket['count'] >= $food->count && $food->count > 0 )
                                <span class="badge badge-danger w-100 text-center py-2">تمام موجودی به سبد اضافه شد</span>
                            @elseif($food->count > 0)
                                <a class="badge badge-info w-100 text-center py-2" href="" onclick="event.preventDefault();addToCart({{ $food->id }})">افزودن به سبد</a>
                            @else
                                <span class="badge badge-danger w-100 text-center py-2">تمام شد</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>      
    @endforeach
@endsection

@section('styles')
    <link rel="stylesheet" href="/owl-carousel/owl.carousel.min.css">
    <link href="/css/style.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/owl-carousel/owl.carousel.min.js"></script>
    <script src="/js/scripts.js"></script>

    <script>
        function addToCart(id)
        {
            $.post('{{ route('food.add.to.basket') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
                $('#basket-badge').html(data['basket_count']);
            });
        }
    </script>
@endsection