<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index ()
    {
      $videos = Video::all();
      return Response::json($videos);
    }

    public function create (Request $request, $id)
    {
      $playlist = Playlist::find($id);
      $video = $playlist->videos->create($request->all());
    }
}
