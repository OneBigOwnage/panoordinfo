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

use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/init', function () {
    if (Schema::hasTable((new User())->getTable()) && User::count() > 0) {
        return redirect('/login');
    }

    if (!Schema::hasTable((new User)->getTable())) {
        Artisan::call('migrate');
    }

    User::createInitialUser();

    return redirect('/login');
});

Route::get('/login', 'AuthController@loginPage')->name('login');
Route::post('/login', 'AuthController@login');

Route::prefix('/screen')->group(function () {
    Route::get('/', 'ScreenController@default')->name('screen');
    Route::get('/agenda-items', 'ScreenController@agendaItems')->name('screen.agenda-items');
    Route::get('/announcements', 'ScreenController@announcements')->name('screen.announcements');
    Route::get('/images', 'ScreenController@images')->name('screen.images');
});

Route::get('/images/{image}', 'ImageController@show')->name('images.show');

Route::group(['middleware' => ['auth']], function () {
    Route::view('/', 'home')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/users/create', 'AuthController@createUser')->name('users.create');

    Route::resource('agenda-items', 'AgendaItemController');
    Route::resource('announcements', 'AnnouncementController');

    Route::prefix('/images')->group(function () {
        Route::get('/', 'ImageController@index')->name('images.index');
        Route::post('/', 'ImageController@upload')->name('images.upload');
        Route::delete('/{image}', 'ImageController@destroy')->name('images.destroy');
    });

    Route::prefix('/maintenance')->group(function () {
        Route::view('/', 'maintenance')->name('maintenance');
        Route::get('/db-migrate', 'MaintenanceController@DBMigrate')->name('maintenance.db-migrate');
        Route::get('/db-migrate-fresh', 'MaintenanceController@DBMigrateFresh')->name('maintenance.db-migrate-fresh');
    });
});
