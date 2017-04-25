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

// use Illuminate\Http\Request;

Route::get('/playlists', 'PlaylistController@index');
Route::post('/playlists', 'PlaylistController@create');

Route::get('/playlists/{id}', 'PlaylistController@show');
Route::put('/playlists/{id}', 'PlaylistController@update');
Route::delete('/playlists/{id}', 'PlaylistController@destroy');

Route::get('/videos', 'VideoController@index');
Route::post('/playlists/{id}/videos', 'VideoController@create');

Route::get('/videos/{id}', 'VideoController@show');
Route::put('/videos/{id}', 'VideoController@update');
Route::delete('/videos/{id}', 'VideoController@destroy');

Route::get('/', function () {
    return view('app');
});

Route::get('/styleguide', function () {
    return view('styleguide');
});
