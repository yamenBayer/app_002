@extends('welcome')

@section('content')
<div class="container" style="margin-top:70px">
    <div class="d-flex card bg-light text-dark">

      <div  style="display: flex;  justify-content: center;align-items:center;width:50%;">
      <img src="https://media-exp1.licdn.com/dms/image/C4D03AQHaaXwzWrTKTA/profile-displayphoto-shrink_200_200/0/1576884493059?e=1654128000&v=beta&t=u_MQ9ke_CGU-WyvobmTNH1Qfm3bOfRPxm_eSrI5nDAg" alt="" class="rounded-circle" style="width:50%;border-radius: 50%; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.8);">
      </div>
      <div style="display: flex;flex-direction:column;  justify-content: space-between;align-items:center;height:100%;width:50%">
       <div><h1 id="username">{{ $user->username }}</h1></div>
       <div style="display:flex;flex-direction:column;justify-content: center;align-items:center">
       </div>
      </div>

    </div>
</div>
@endsection
