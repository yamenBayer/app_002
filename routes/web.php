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
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\profile_controller::class, 'index'])->name('profile.show');
Route::get('/home/Homepage', [App\Http\Controllers\HomeController::class, 'index2'])->name('Homepage');
//Route::get('/home/HomePage', [App\Http\Controllers\HomeController::class, 'index2'])->name('home/Homepage');
