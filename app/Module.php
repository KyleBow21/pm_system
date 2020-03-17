<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  public function assignments()
  {
    return $this->hasMany('App\Assignment');
  }

  public function supervisors()
  {
    return $this->belongsToMany('App\Supervisor');
  }

  public function students()
  {
    return $this->hasMany('App\Student');
  }
}
