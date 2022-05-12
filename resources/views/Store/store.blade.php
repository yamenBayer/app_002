@extends('welcome')

@section('store')

<div class="container">
    <!-- Button to Open the Modal -->
    <button class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#addGame">Add Game</button>
  
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
         <form action="{{ route('Add_Game') }}" method="post">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-white text-md-end">Name: </label>

                <div class="col-md-6">
                    <input id="name" type="name" class="form-control bg-transparent" name="name" required autocomplete="name" autofocus>
                </div>
            </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-danger">
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
    <center>
        <h1 class="border-bottom w-25 p-2 m-5">Letest Games</h1>
        
    </center>
</div>

@endsection