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

Route::view('/mimity', 'layouts.default');

Route::resource('agenda-items', 'AgendaItemController');
Route::resource('announcements', 'AnnouncementController');

Route::prefix('/screen')->group(function () {
    Route::get('/', 'ScreenController@default');
    Route::get('/agenda-items', 'ScreenController@agendaItems');
});
