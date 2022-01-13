<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'فود استور') }}</title>
    <link rel="stylesheet" href="/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap4/css/bootstrap-rtl.min.css">
    <link href="/fontawesome-free-5.15.4-web/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome-free-5.15.4-web/css/brands.css" rel="stylesheet">
    <link href="/fontawesome-free-5.15.4-web/css/solid.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div class="container p-2">
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'فود استور') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="dropdown mr-3">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          منو
                        </button>
                        <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">

                            @guest
                                @if (Route::has('login'))
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('ورود') }}</a>
                                @endif

                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                                @endif
                            @else
                                @if( Auth::check() && Auth::user()->type == 'admin' )
                                    <a class="dropdown-item" href="{{ route('admin.panel') }}">پنل مدیریت</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('خروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                      </div>
                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                                </li>
                            @endif
                        @else
                            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('خروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul> --}}
                </div>

              
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarSupportedContent">
                  @if(in_array(Route::currentRouteName() ,['homepage']))
                    <form action="{{ route('homepage') }}" class="form-inline my-2 my-lg-0" id="foodtypes">
                        <select name="type" class="form-control form-control-sm" onchange="$('#foodtypes').submit();">
                            <option value="">همه غذاها</option>
                            @foreach(\App\Models\FoodType::whereActive(1)->get() as $type)
                                <option value="{{ $type->id }}" {{ Request('type') && Request('type') == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </form>
                  @endif
                  <a href="{{ route('basket.foods') }}" class="badge badge-primary text-light ml-1">
                    <span class="badge badge-light" id="basket-badge">{{  ! is_null(Basket::all('foods')) && Basket::all('foods') ? count(Basket::all('foods')) : 0 }}</span>
                    <i class="fas fa-shopping-cart"></i>
                  </a>
                </div>
              </nav>
              
                <div class="card rounded-0">
                    <div class="row m-3">
                        @yield('content')
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <script src="{{ asset('/js/app.js') }}"></script>
                @include('sweet::alert')
                @yield('scripts')

                <script>
                    function addToCart(id)
                    {
                        $.post('{{ route('food.add.to.basket') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
                            $('#basket-badge').html(data['basket_count']);
                            if(data['status'] == 200){
                                alert('محصول مورد نظر به سبد خرید شما اضافه شد.');
                            }
                        });
                    }
                </script>
        </div>
    </div>
</body>
</html>
