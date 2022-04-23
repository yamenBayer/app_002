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
})->name('Home');

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\profile_controller::class, 'index'])->name('profile.show');
Route::get('/all_category/{catName}', [App\Http\Controllers\HomeController::class, 'goToCat'])->name('getView');
