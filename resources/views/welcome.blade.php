<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Shop.SY</title>

        <!-- Scripts -->


        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
         <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    
    </head>
    <body class="antialiased">


    <nav class="navbar  navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('Home') }}">SyriaShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('Home') }}">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categories</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('getView', 'Cloth') }}">CLoth</a></li>
            <li><a class="dropdown-item" href="{{ route('getView','Technology') }}">Technology</a></li>
            <li><a class="dropdown-item" href="{{ route('getView','Food') }}">Food</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>  
        <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
      </ul>
  



       <!-- Authentication Links -->
      @if (Route::has('login'))
      <ul class="nav navbar-nav navbar-right">
      @auth
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ Auth::user()->username }}</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/profile/1') }}">My Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a></li>
          </ul>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      @else
        <li>
            <a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
      @if (Route::has('register'))
        <li>
            <a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
        </li>
        @endif
        @endauth
      </ul>
      @endif


    </div>
  </div>
</nav>

 
<main class="py-4">
            @yield('content')
        </main>
        <main class="py-4">
            @yield('content3')
        </main>
        <main class="py-4">
            @yield('content4')
        </main>
        <main class="py-4">
            @yield('content5')
</main>                  
                        

    </body>
</html>
