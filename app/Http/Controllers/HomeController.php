<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function uploadGame(Request $request)
    {
     
 
        $name = $request->get('name');
        $url = $request->get('url');
        $type = $request->get('gameType');
        $path = $request->file('image')->store('public/img/games/');
 
 
        $newGame = new game;
 
        $newGame->name = $name;
        $newGame->url = $url;
        $newGame->type = $type;
        $newGame->img_url = $path;
 
        $newGame->save();

        return redirect()->route('Store')->with('status', 'Game Has been uploaded');
 
    }
    public function goToCat(String $catName)
    {
        return view('all_category/'.$catName);
    }
    public function getStore()
    {
        return view('Store/store');
    }
    public function get_add_Game()
    {
        return view('Store/add_Game');
    }

    
  
}
