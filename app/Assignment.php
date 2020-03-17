<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
  public function modules()
  {
    return $this->belongsToOne('App\Module');
  }
}
