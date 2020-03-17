<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
  public function students()
  {
    return $this->hasMany('App\Student');
  }

  public function projects()
  {
    return $this->hasMany('App\Project');
  }

  public function modules()
  {
    return $this-hasMany('App\Module');
  }
}
