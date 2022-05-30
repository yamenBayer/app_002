<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('Home');

Auth::routes();

Route::get('/store/', [App\Http\Controllers\HomeController::class, 'getStore'])->name('Store');
Route::get('/add_Game/', [App\Http\Controllers\HomeController::class, 'get_add_Game'])->name('Add_Game');
Route::get('/profile/{user}', [App\Http\Controllers\profile_controller::class, 'index'])->name('Profile');
Route::get('/toCategory/{catName}', [App\Http\Controllers\HomeController::class, 'toCategory'])->name('toCategory');
Route::post('uploadGame', [App\Http\Controllers\HomeController::class, 'uploadGame'])->name('UploadGame');
Route::post('/UploadCat', [App\Http\Controllers\HomeController::class, 'UploadCat'])->name('UploadCat');
Route::get('/buyGame/{game_id}', [App\Http\Controllers\HomeController::class, 'buyGame'])->name('buyGame');
Route::get('/my_games', [App\Http\Controllers\HomeController::class, 'my_games'])->name('my_games');

