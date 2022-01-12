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
    @yield('styles')
</head>
<body>
    <div class="container p-2">
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'فست فود') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                    </ul>
                </div>
              
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarSupportedContent">
                  <form class="form-inline my-2 my-lg-0">
                    <select class="form-control form-control-sm">
                        <option>غذاهای سنتی</option>
                        <option>غذاهای فست فود</option>
                        <option>غذاهای بین الملل</option>
                    </select>
                  </form>
                    <a href="{{ route('basket.foods') }}">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
              </nav>
              
                <div class="card rounded-0">
                    <div class="row m-3">
                        <div class="col-3">
                          <aside class="main-sidebar sidebar-dark-primary elevation-4">
                            @include('admin.inc.sidebar')
                          </aside>
                        </div>
                        <div class="col-9">
                          @yield('content')
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                                
                @yield('scripts')
        </div>
    </div>
</body>
</html>
