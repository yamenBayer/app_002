@extends('welcome')

@section('content')

<div class="container">


<!-- The Modal -->
  <div class="modal fade" id="catModal">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add category</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('UploadCat') }}" method="POST">
                @csrf
    
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                </div>
    
                <br>
                <center><button type="submit" class="btn btn-primary">Add</button></center>
     
    
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>



  <!-- The Modal -->
<div class="modal fade" id="addGame">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Game</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
         <form action="{{ route('UploadGame') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-white text-md-end">Name: </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control text-white bg-transparent" name="name" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="Type" class="col-md-4 col-form-label text-white text-md-end">Type: </label>

                <div class="col-md-6">
                    <select class="form-select text-white bg-transparent" id="gameType" name="gameType">
                        @foreach($cats as $cat)
                        <option class="text-dark">{{$cat->name}}</option>
                        @endforeach
                      </select>      
                </div>

            </div>

            <div class="row mb-3">
                <label for="desc" class="col-md-4 col-form-label text-white text-md-end">Description: </label>

                <div class="col-md-6">
                    <textarea name="desc" class="form-control text-white bg-transparent" id="desc" cols="30" rows="5" autocomplete="desc" autofocus></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-md-4 col-form-label text-white text-md-end">Poster: </label>

            <div class="col-md-3">
                <div class="form-group">
                    <input type="file" name="image" placeholder="Choose image" id="image">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-md-4 col-form-label text-white text-md-end">Price: </label>

            <div class="col-md-6">
                <input id="price" type="number" class="form-control text-white bg-transparent" name="price" required autocomplete="name" autofocus>
            </div>
        </div>
        <div class="row mb-3">
            <label for="url" class="col-md-4 col-form-label text-white text-md-end">Download URL: </label>

            <div class="col-md-6">
                <input id="url" type="url" class="form-control text-white bg-transparent" name="url" required autocomplete="url" autofocus>
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-danger w-50">
                    Add
                </button>
            </div>
        </div>
        </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
  @if(session('status'))
  <div class="alert alert-success bg-dark alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
    {{ session('status') }}
  </div>
@endif
    <!-- Button to Open the Modal -->
    
    {{-- @if (Auth::user()->isAdmin) --}}
    <button class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#addGame">Add Game</button>
    {{-- @endif --}}
    
    <button class="btn btn-danger float-end dropdown-toggle me-2" role="button" data-bs-toggle="dropdown">Show Categories</button>
        <ul class="dropdown-menu">
            @foreach($cats as $cat)
            <li><a class="dropdown-item" href="{{ route('toCategory', $cat->name) }}">{{$cat->name}}</a></li>
            @endforeach
             @if (Auth::user()->isAdmin) 
            <li><a type="button" class="dropdown-item bg-danger text-white" data-bs-toggle="modal" data-bs-target="#catModal">
                Add category
            </a></li>
             @endif 
        </ul>
 
    <center>

        <h1 class="border-bottom w-25 p-2 m-5">Latest Games</h1>
        
    </center>
    <div class="row">
        <div class="">
            @if($games->isEmpty())
            <center><h1 class="p-5 m-5 text-danger">No Games!</h1></center>
            @endif
            <div class="row mb-5">
            @foreach($games as $game)

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
                            <p class="p-2" style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">Price: {{ $game->price }}</p>

                            <button onclick="buy()" class="btn btn-danger btn-lg me-2">Buy</button>   
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
                          <p class="p-2" style="text-overflow: ellipsis;overflow: hidden;width: 100%; white-space: nowrap; ">Price: {{ $game->price }}</p>
                          <div class="d-flex align-items-center">
                                <button onclick="buy('{{$game->id}}')" class="btn btn-danger me-2">Buy</button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#gameModal{{$game->id}}">More details</button>
                            </div>
               </div>
           
              </div>
              <script>
                  function buy(id){
                      if(confirm('Are you sure, you want to buy this game?\nPrice: '+'{{$game->price}}') == true){
                      
                        
                        var url = '{{ route("buyGame", ":id") }}';
                        url = url.replace(':id', id);
                        window.location.href = url;
                      }
                  }
              </script>
   
            @endforeach     
        </div>
        </div>
    </div>
</div>

@endsection
