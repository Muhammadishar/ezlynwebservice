<?php

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

Route::get('/gethalte', 'PenumpangController@getAllHalte');
Route::post('/getrute', 'PenumpangController@getRute');
Route::post('/belitiket', 'PenumpangController@buyTicket');
Route::post('/login', 'PenumpangController@loginCheck');
Route::post('/insert', 'PenumpangController@insertPengguna');