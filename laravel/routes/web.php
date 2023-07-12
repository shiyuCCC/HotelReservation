<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// shows the list of reservations
Route::get('/', 'App\Http\Controllers\ReservationController@home')->name('home');

Route::get('/checkroom', 'App\Http\Controllers\RoomController@index')->name('checkroom');

Route::get('/reservation', 'App\Http\Controllers\ReservationController@index')->name('reservation');

Route::get('/create/{id}', 'App\Http\Controllers\ReservationController@create')->name('create');

Route::post('/store', 'App\Http\Controllers\ReservationController@store')->name('store');

Route::delete('/delete/{id}', 'App\Http\Controllers\ReservationController@delete')->name('delete');

Route::get('/roomlist', 'App\Http\Controllers\RoomController@showlist')->name('roomlist');

Route::post('/upload', 'App\Http\Controllers\RoomController@upload')->name('upload');

Route::delete('/deleteroom/{id}', 'App\Http\Controllers\RoomController@delete')->name('deleteroom');

Route::get('/checkweather', 'App\Http\Controllers\WeatherController@check')->name('checkweather');
