<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

  protected $guarded = [];

  public function playlist()
  {
    return $this->belongsTo('App\Playlist');
  }
}
