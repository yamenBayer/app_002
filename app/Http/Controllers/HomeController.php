<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\game;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

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
 
    public function buyGame($game_id){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $game = game::find($game_id);
        $flag = false;
        //dd($user->points);
        
        if($user->points >= $game->price){
            $user->points -= $game->price;
            $order = new order;
            $order->game_id=$game_id;
            $order->user_id=$user_id;
            $order->buy_price=$game->price;
            $user->save();
            $order->save();
            $flag = true;
            return redirect()->route('my_games')->with('status', 'Game Has been added!');
        }
           return redirect()->route('Store')->with('status', 'You do not have enouph cash!');
     }

    public function my_games(){
        $user_id = Auth::user()->id;
        $user_games = DB::table('games')
        ->join('orders', 'orders.game_id', '=', 'games.id')
        ->where('orders.user_id', $user_id)
        ->get();
        return view('my_games')->with('user_games',$user_games);
    }

    public function uploadGame(Request $request)
    { 
        $name = $request->get('name');
        $url = $request->get('url');
        $price = $request->get('price');
        $desc = $request->get('desc');
        $cat = $request->get('gameType');
        $path = $request->file('image')->store('public/img/games/');
        $catId = DB::table('categories')->select('id')->where('name',  $cat)->get();
 
        $newGame = new game;
 
        $newGame->name = $name;
        $newGame->url = $url;
        $newGame->price = $price;
        $newGame->desc = $desc;
        $newGame->cat_id = $catId[0]->id;
        $newGame->img_url = $path;
 
        $newGame->save();

        return redirect()->route('Store')->with('status', 'Game Has been uploaded');
 
    }


    public function toCategory(String $catName){


        $catId = DB::table('categories')->select('id')->where('name',  $catName)->get();

        $user_id = Auth::user()->id;
        $orders = DB::table('orders')
        ->select('game_id')
        ->where('orders.user_id', $user_id);

        $catGames = DB::table('games')
        ->whereNotIn('id', $orders)
        ->where('cat_id',$catId[0]->id)
        ->get();

        $cats = DB::table('categories')->select('name')->get();
        return view('Category')->with('catName',$catName)->with('catGames',$catGames)->with('cats',$cats);
    }

    public function UploadCat(Request $req){
        $name = $req->get('name');

        $new_Cat = new category;
        $new_Cat->name = $name;
        $new_Cat->save();
        return redirect()->route('Store');
    }

    
    // public function goToCat(String $catName)
    // {
    //     return view('all_categories/'.$catName);
    // }

    public function getStore()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table('orders')
        ->select('game_id')
        ->where('orders.user_id', $user_id);

        $games = DB::table('games')
        ->select('*','categories.name as catname','games.name as gname')
        ->join('categories','categories.id','=','games.cat_id')
        ->whereNotIn('games.id', $orders)
        ->get();


        
        $cats = DB::table('categories')->select('name')->get();
        return view('Store/store')->with('games', $games)->with('cats',$cats);
    }
    public function get_add_Game()
    {
        return view('Store/add_Game');
    }

    
  
}
