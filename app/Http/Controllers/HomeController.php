<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
 
    public function save(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/img/games');
 
 
        $save = new Photo;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();
 
        return redirect('add_Game')->with('status', 'Image Has been uploaded');
 
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
