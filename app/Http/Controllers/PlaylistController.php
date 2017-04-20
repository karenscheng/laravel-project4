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
      return Response::json($books);
    }

    public function create (Request $request)
    {
      Playlist::create($request->all());
      return Response::json(['created' => true]);
    }
}
