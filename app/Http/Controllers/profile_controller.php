<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class profile_controller extends Controller
{
    public function index($user)
    {
        $user = User::find($user);
        return view('profile',[
            'user' => $user,
        ]);
    }
}
