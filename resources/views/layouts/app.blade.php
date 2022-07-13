<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <!-- Scripts -->
    @yield('script')
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm" style="padding: 0 !important">
            <div class="container p-2">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <div class="row mt-2 mb-2 navbar-nav ml-auto w-100 justify-content-between align-items-center ">

                        <!-- Authentication Links -->
                        @guest
                            <div class="col-6 col-lg-9">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    {{-- <img style="width: 60px" src="{{ URL('img/logoBoolBnb.png') }}" alt=""> --}}
                                    logo
                                </a>
                            </div>
                            <div class="col-6 col-lg-3">
                                    <a class="btn btn-light" href="{{ route('login') }}" style="color: #000000"><i class="bi bi-box-arrow-in-right"></i>{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                    <a class="btn btn-light" href="{{ route('register') }}" style="color: #000000"><i class="bi bi-pencil-square"></i> {{ __('Register') }}</a>
                                @endif
                            </div>
                        @else
                            <div class="col-6 col-lg-9">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    {{-- <img style="width: 60px" src="{{ URL('img/logoBoolBnb.png') }}" alt=""> --}}
                                    logo
                                </a>
                            </div>
                            <div class="col-6 col-lg-3">
                                    <a>
                                        {{ Auth::user()->email }}
                                    </a>
                                    <div>
                                        <a class="btn btn-light" href="{{ route('admin.coins.index') }}">
                                            Dashboard
                                        </a>
                                        <a class="btn btn-light" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                            </div>
                        @endguest
                        </div>
                </div>
            </div>
        </nav>

        <main id="app">
            @yield('content')
        </main>
    </div>
</body>

</html>
