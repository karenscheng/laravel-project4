<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = [];

    public function videos()
    {
      return $this->hasMany('App\Video');
    }
}
