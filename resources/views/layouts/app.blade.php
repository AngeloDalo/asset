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
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="padding: 0 !important">
        <div class="container">
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <ul class="mb-2 navbar-nav ml-auto w-100 justify-content-between align-items-center ">

              <!-- Authentication Links -->
              @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                  {{-- <img style="width: 60px" src="{{ URL('img/logoBoolBnb.png') }}" alt=""> --}}
                  logo
                </a>
                <div class="d-flex">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" style="color: #dc3545"><i class="bi bi-box-arrow-in-right"></i>{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}" style="color: #dc3545"><i class="bi bi-pencil-square"></i> {{ __('Register') }}</a>
                    </li>
                  @endif
                </div>
              @else
                <a class="navbar-brand" href="{{ url('/') }}">
                  {{-- <img style="width: 60px" src="{{ URL('img/logoBoolBnb.png') }}" alt=""> --}}
                  logo
                </a>
                <li>
                  <a>
                    {{ Auth::user()->name }}
                  </a>
                  <div>
                    <a href="{{ route('admin.coins.index') }}">
                        Dashboard
                    </a>
                    <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>

      <main id="app">
        @yield('content')
      </main>
    </div>
  </body>
</html>
