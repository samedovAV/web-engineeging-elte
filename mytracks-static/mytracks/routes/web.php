<?php

use Illuminate\Support\Facades\Auth;
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
    return view('main', [
        'number_of_tracks' => 123,
    ]);
});

Auth::routes();
Route::get('/transposer', 'TransposerController@transpose')->name('transposer');

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', 'ProjectController');
    Route::resource('projects.tracks', 'TrackController')->shallow()->except(['index', 'show']);
});
