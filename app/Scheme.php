<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    public function modules()
    {
      return $this->belongsToMany('App\Module');
    }

    public function users()
    {
      return $this->hasMany('App\User');
    }
}
