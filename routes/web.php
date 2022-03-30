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

//Dit is de route waar de website je in eerste insantie plaatst
Route::get('/', 'App\Http\Controllers\MainController@show');

//Deze routes worden genomen als je op de vakantie knop klikt. Het gaat ALTIJD naar /vacation, en die bepaalt
//welke route vervolgens genomen wordt.
Route::get('/vacation', 'App\Http\Controllers\ChoosRedirectionController@chooser');     //dez zorgt voor het aanpassen van de database variabele
Route::get('/vacationmaker', 'App\Http\Controllers\VacationController@makevacation');   //deze vult de database met vakantie schedules
Route::get('/vacationyeeter', 'App\Http\Controllers\VacationController@yeetvacation');  //deze haalt de vakantie schedules uit de database

//Het toevoegen van gordijnen en timers voor die gordijnen
Route::post('/addCurtain', 'App\Http\Controllers\AddCurtainController@addCurtain');
Route::post('/curtain/{name}/addTimer', 'App\Http\Controllers\AddCurtainTimerController@addCurtainTimer');

//Deze route wordt genomen als je op een speciefieke curtain klikt
Route::get('/curtain/{name}', 'App\Http\Controllers\DetailsController@details');

//Deze routes worden genomen als je een schedule van een curtain verwijderd, of als je een curtain verwijderd
Route::get('/delete/{name}/{day}', 'App\Http\Controllers\DeleteController@deleteSchedule'); //verwijderd schedule
Route::get('/delete/{name}', 'App\Http\Controllers\DeleteController@deleteCurtain'); //verwijderd curtain zelf

// Update slider met redirect
Route::get('/curtain/{name}/update/{value}', 'App\Http\Controllers\CurtainUpdateController@updateSlider'); 

