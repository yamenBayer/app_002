@extends('welcome')

@section('store')

<div class="container">

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
                    <select class="form-select text-white bg-transparent" id="sel1" name="gameType">
                        <option class="text-dark">Fantasy</option>
                        <option class="text-dark">Adventure</option>
                        <option class="text-dark">Action</option>
                      </select>      
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
    <button class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#addGame">Add Game</button>
  
    <center>

        <h1 class="border-bottom w-25 p-2 m-5">Letest Games</h1>
        
    </center>
</div>

@endsection