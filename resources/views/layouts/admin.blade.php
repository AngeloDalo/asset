<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm w-100" style="padding: 0 !important">
            <div class="container p-2">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <div class="row mt-2 mb-2 navbar-nav ml-auto w-100 justify-content-between align-items-center ">
                        <div class="col-6 col-lg-9">
                            <a class="navbar-brand" href="{{ url('/coin') }}">
                                {{-- <img style="width: 60px" src="{{ URL('img/logoBoolBnb.png') }}" alt=""> --}}
                                logo
                            </a>
                        </div>
                        <div class="col-6 col-lg-3">
                            <a>
                                {{ Auth::user()->email }}
                            </a>
                            <div>
                                <a class="btn btn-light" href="{{ url('/coin') }}">
                                    Home
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
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="row">
                <div class="d-none d-lg-block col-lg-3 h-100">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100vh;">
                        <a href="/coin"
                            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <svg class="bi me-2" width="40" height="32">
                                <use xlink:href="#bootstrap"></use>
                            </svg>
                            <span class="fs-4">Menu'</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a href="{{ url('/coin') }}" class="nav-link text-white" aria-current="page">
                                    <i class="bi bi-house" style="color:#03306D"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.summary.index') }}" class="nav-link text-white">
                                    <i class="bi bi-house" style="color:#03306D"></i>
                                    Riassunto
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.coins.index') }}" class="nav-link text-white">
                                    <i class="bi bi-grid" style="color:#03306D"></i>
                                    Mie Monete
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.coins.create') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Aggiungi Moneta
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.stocks.index') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Mie Stocks
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.transactions.index') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Mie Transazioni Stocks
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.transactions.create') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Aggiungi Transazione Stocks
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.stocks.create') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Aggiungi Stocks
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.money.index') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Mia Liquidit&agrave;
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.money.create') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Aggiungi Liquidit&agrave;
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.trends.index') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Trend
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.trends.create') }}" class="nav-link text-white">
                                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                                    Aggiungi Trend
                                </a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-9">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
