<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function supervisors()
  {
    return $this->hasOne('App\Supervisor');
  }

  public function students()
  {
    return $this->hasMany('App\Student');
  }

  public function marks()
  {
    return $this->hasOne('App\Marks');
  }
}
