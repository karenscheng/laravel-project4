<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PlaylistController extends Controller
{
    public function index ()
    {
      $playlists = Playlist::all();
      return Response::json($playlists);
    }

    public function create (Request $request)
    {
      $playlist = Playlist::create($request->all());
      return Response::json($playlist);
    }

    public function show ($id)
    {
      $playlist = Playlist::find($id);
      return Response::json($playlist);
    }

    public function update (Request $request, $id)
    {
      $playlist = Playlist::find($id);
      $success = $playlist->update($request->all());
      return Response::json(['updated' => $success]);
    }

    public function destroy ($id)
    {
      $playlist = Playlist::find($id);
      $playlist->delete();
      return Response::json(['deleted' => true]);
    }
}
