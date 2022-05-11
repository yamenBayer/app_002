<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>UD</title>


        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="png" href="{{ asset('img/carLogo.png') }}">
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}" >
    
    </head>
    <body class="antialiased">


    <nav class="navbar  navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('Home') }}"><i class="fas fa-infinity fa-2x me-1  p-2" style="color:#AB3215;"> </i> |</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar navbar-nav me-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('Home') }}"><button class="btn btn-danger">Home</button></a>
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

      </ul>
  

        <form class="d-flex me-auto">
        <input class="form-control me-2 bg-transparent" type="text" placeholder="Search">
        <button class="btn btn-danger" type="button">Search</button>
        </form>

       <!-- Authentication Links -->
      @if (Route::has('login'))
      <ul class="nav navbar-nav">
      @auth
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">{{ Auth::user()->username }}</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./profile/{{ Auth::user()->id }}">My Profile</a></li>
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
            <a class="nav-link me-3" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span><i class="fas fa-user-alt " style="color: #AB3215"> |</i> </a>
        </li>
        
      @if (Route::has('register'))
        <li>
            <a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span><i class="fas fa-user-plus " style="color: #AB3215"> |</i></a>
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
