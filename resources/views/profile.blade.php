@extends('welcome')

@section('profile')
<div class="container" >
    <div class="card bg-light text-dark p-3">
       <center><h1 id="username"><i class="fas fa-user me-3"></i>{{ $user->username }}</h1></center>
    </div>
    <div>
      <h3></h3>
    </div>
</div>
@endsection
