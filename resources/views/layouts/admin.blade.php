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
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ps-3 justify-content-between"
      style="position: fixed; top: 0; width: 100%">
      <a href="{{ url('/') }}">
        {{-- <img src="{{ asset('img/logoBoolBnb.png') }}" alt="logo" class=""style="width: 50px"> --}}
        logo
    </a>

      <ul class="list-unstyled me-5 d-lg-none">
        <li>
          <a id="bottone-navbar" class="btn btn-danger text-white" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre="">
            Admin
          </a>

          <div class="right me-5" style="left: -34px">
            <a href="{{ url('/') }}">
              Home
            </a>
            <a href="{{ route('admin.coins.index') }}">
              Mie Monete
            </a>
            <a href="{{ route('admin.apartments.create') }}">
              Aggiungi Moneta
            </a>
            <a href="http://127.0.0.1:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
          </div>
        </li>
      </ul>

    </nav>
    <main>
      <div class="container-fluid" style="padding-top: 6em;">
        <div class='row'>
          <nav id='sidebarMenu' class='col-sm-12 col-md-12 col-lg-2 bg-light sidebar me-5'>
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light border border-danger rounded-3"
              style="position: fixed; height: 80%">
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                  <a href="{{ url('/') }}" class="nav-link text-danger" aria-current="page">
                    <i class="bi bi-house" style="color:#03306D"></i>
                    Home
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.coins.index') }}" class="nav-link text-danger">
                    <i class="bi bi-grid" style="color:#03306D"></i>
                    Mie Monete
                  </a>
                </li>
                <li>
                  <a href="{{ route('admin.coins.create') }}" class="nav-link text-danger">
                    <i class="bi bi-plus-square" style="color:#03306D"></i>
                    Aggiungi Moneta
                  </a>
                </li>
              </ul>
              <hr>

              <div>
                <a href="#" class="d-flex align-items-center text-decoration-none text-danger"
                  id="dropdownUser1" aria-expanded="false">
                  {{-- <img src="{{ asset('img/logoBoolBnb.png') }}" alt="" width="32" height="32"
                    class="rounded-circle me-2"> --}}
                    loho
                  <strong style="color:#03306D">{{ Auth::user()->name }}</strong>
                </a>
                <ul class="text-small shadow" aria-labelledby="dropdownUser1">
                  <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class='col-9'>
            @yield('content')
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>
