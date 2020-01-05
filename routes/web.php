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

Route::prefix('/images')->group(function () {
    Route::get('/', 'ImageController@index')->name('images.index');
    Route::post('/', 'ImageController@upload')->name('images.upload');
    Route::get('/{image}', 'ImageController@show')->name('images.show');
    Route::delete('/{image}', 'ImageController@destroy')->name('images.destroy');
});

Route::prefix('/screen')->group(function () {
    Route::get('/', 'ScreenController@default')->name('screen');
    Route::get('/agenda-items', 'ScreenController@agendaItems')->name('screen.agenda-items');
    Route::get('/announcements', 'ScreenController@announcements')->name('screen.announcements');
    Route::get('/images', 'ScreenController@images')->name('screen.images');
});
