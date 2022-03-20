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

Route::get('/', 'App\Http\Controllers\MainController@show');
Route::get('/{name}', 'App\Http\Controllers\MainController@details') ->name('posts.details');
// Dashboard
// Route::get('/', function () {return view('home');});

// Temp curtain details link voor dev
// Route::get('/curtain', function () {return view('details');});

// Curtain details link voor later
// Route::get('/curtains/{$curtain}', function () {return view('details');});
