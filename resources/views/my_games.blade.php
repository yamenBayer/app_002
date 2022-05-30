@extends('welcome')

@section('content')

  <div class="container">

     <center> <h1 class="text-danger mt-5">My Games</h1></center>
     <hr width="100%">
  
  
  <div class="row">
    <div class="">
        @if($user_games->isEmpty())
        <center><h1 class="p-5 m-5 text-danger">No Games!</h1></center>
        @endif
        <div class="row mb-5">
          @foreach($user_games as $game)
                   <!-- Game Info Modal -->
         <div class="modal fade" id="gameModal{{$game->id}}">
            <div class="modal-dialog modal-xl">
            <div class="modal-content bg-dark">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">{{$game->gname}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <center>
                    <img class="w-50" src="{{ asset('img/games/game1.png') }}" alt="">
                    <h1 style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">{{ $game->gname }}</h1>
                    <h6 class="border-bottom p-2">{{ $game->catname }}</h6>
                    <p class="p-2" style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">{{ $game->desc }}</p>
                    <p class="p-2" style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">Purchased price: {{ $game->price }}</p>
  
                    <a href="{{ $game->url }}"><button class="btn btn-danger me-2">Download</button></a>      
                </center>
                    </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
        
            </div>
            </div>
        </div>
            <div class="col-sm-6">
                <div class="card border border-danger p-4 mb-3 bg-dark" style="max-width: 100%;">
                    <img class="w-100" src="{{ asset('img/games/game1.png') }}" alt="">
                      <h1 style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">{{ $game->gname }}</h1>
                      <h6 class="border-bottom p-2">{{ $game->catname }}</h6>
                      <p class="p-2" style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">{{ $game->desc }}</p>
                      <p class="p-2" style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">Purchased price: {{ $game->price }}</p>

                      <div class="d-flex align-items-center">
                          <a href="{{ $game->url }}"><button class="btn btn-danger me-2">Download</button></a>      
                          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#gameModal{{$game->id}}">More details</button>
                        </div>
           </div>
       
          </div>
  
        @endforeach     
    </div>
    </div>
  </div>
  </div>

@endsection