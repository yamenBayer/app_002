@extends('welcome')

@section('content')
<div class="container">
    <div style="display: flex; flex-direction: column; justify-content: space-evenly;align-items:center" class="userInfo">

      <div class="pt-5" style="width:70%">
      <center><img src="https://media-exp1.licdn.com/dms/image/C4D03AQHaaXwzWrTKTA/profile-displayphoto-shrink_200_200/0/1576884493059?e=1654128000&v=beta&t=u_MQ9ke_CGU-WyvobmTNH1Qfm3bOfRPxm_eSrI5nDAg" alt="" class="rounded-circle" style="width:40%"></center>
      </div>
      <div class="pt-5" style="width:70%">
      <center>
       <div><h1 id="username">{{ $user->username }}</h1></div>
       <div class="d-flex" style="justify-content: center;align-items:center">
          <div style="padding-right: 60px"><strong>105</strong> posts</div>
          <div><strong>625</strong> friends</div>  
       </div>
      </center>  
      </div>

    </div>
</div>
@endsection
