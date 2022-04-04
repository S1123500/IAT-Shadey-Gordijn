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

// Dashboard
Route::get('/', function () {return view('home');});

// Temp curtain details link voor dev
Route::get('/curtain/{id}', function () {return view('details');});

// Curtain details link voor later
// Route::get('/curtains/{$curtain}', function () {return view('details');});
Route::get("/404", function () {return view('404');});