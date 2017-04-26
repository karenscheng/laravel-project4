<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
      $video = $playlist->videos()->create($request->all());
      return Response::json($video);
    }

    public function show ($id)
    {
      $video = Video::find($id);
      return Response::json($video);
    }

    public function view (Request $request, $id)
    {
      $playlist = Playlist::find($id);
      $videos = $playlist->videos;
      return Response::json($videos);
    }

    public function update (Request $request, $id)
    {
      $video = Video::find($id);
      $success = $video->update($request->all());
      return Response::json(['updated' => $success]);
    }

    public function destroy ($id)
    {
      $video = Video::find($id);
      $video->delete();
      return Response::json(['deleted' => true]);
    }
}
