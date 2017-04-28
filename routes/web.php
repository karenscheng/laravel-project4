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

Route::get('/playlists', 'PlaylistController@index'); //get all playlists (not used)
Route::post('/playlists', 'PlaylistController@create'); //create playlist

Route::get('/playlists/{id}', 'PlaylistController@show'); //view playlist with id
Route::get('/playlist/playlists/{id}', 'PlaylistController@show'); //admin permission
Route::get('/edit/playlists/{id}', 'PlaylistController@show'); //permission for /edit route
Route::put('/playlists/{id}', 'PlaylistController@update'); //edit playlist name
Route::delete('/playlists/{id}', 'PlaylistController@destroy'); //delete playlist (not used)

Route::get('/videos', 'VideoController@index'); //get all videos (not used)
Route::get('/playlists/{id}/videos', 'VideoController@view'); //get all videos of a certain playlist
Route::get('/playlist/playlists/{id}/videos', 'VideoController@view');  //admin view permission
Route::get('/edit/playlists/{id}/videos', 'VideoController@view');  //permission for /edit route
Route::post('/playlists/{id}/videos', 'VideoController@create');  //add video to playlist
Route::post('/playlist/playlists/{id}/videos', 'VideoController@create');  //admin view permission
Route::post('/edit/playlists/{id}/videos', 'VideoController@create'); //permission for /edit route

Route::get('/videos/{id}', 'VideoController@show'); //get video with id (not used)
Route::put('/videos/{id}', 'VideoController@update'); //edit video name
Route::put('/playlist/videos/{id}', 'VideoController@update');  //admin view permission
Route::put('/edit/videos/{id}', 'VideoController@update');  //permission for /edit route
Route::delete('/videos/{id}', 'VideoController@destroy'); //delete video
Route::delete('/playlist/videos/{id}', 'VideoController@destroy');  //admin permission
// Route::delete('/edit/videos/{id}', 'VideoController@destroy');

Route::get('/', function () {
    return view('app');
});

Route::get('/styleguide', function () {
    return view('styleguide');
});

Route::get('/create', function () { // route to create playlist
    return view('create');
});

Route::get('/edit/{id}', function ($id) { // route for a user to add videos to existing playlist
    $data = [];
    $playlist = $data['playlist'] = App\Playlist::find($id);
    return view('add', $data);
});

Route::get('/playlist/{id}', function ($id) { // route for admin
    $data = [];
    $playlist = $data['playlist'] = App\Playlist::find($id);
    return view('admin', $data);
});
