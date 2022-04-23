<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Shop.SY</title>

       <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- Bootstrap -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
         <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    
    </head>
    <body class="antialiased">


    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="{{ route('Home') }}">SyriaShop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ route('Home') }}">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('getView', 'Cloth') }}">CLoth</a></li>
            <li><a href="{{ route('getView','Technology') }}">Technology</a></li>
            <li><a href="{{ route('getView','Food') }}">Food</a></li>
          </ul>
        </li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">About</a></li>
      </ul>

       <!-- Authentication Links -->
      @if (Route::has('login'))
      <ul class="nav navbar-nav navbar-right">

     
 


      @auth
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->username }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="{{ url('/profile/1') }}">My Profile</a></li>   
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
          </a></li>
          </ul>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      @else
        <li>
            <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
      @if (Route::has('register'))
        <li>
            <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
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
