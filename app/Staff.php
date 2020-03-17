<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function modules()
    {
      return $this->hasMany('App\Module');
    }

    public function projects()
    {
      return $this->hasMany('App\Project');
    }
}
