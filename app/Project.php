<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function supervisors()
  {
    return $this->belongsToMany('App\Supervisor');
  }

  public function students()
  {
    return $this->hasMany('App\Student');
  }

  public function marks()
  {
    return $this->belongsToOne('App\Marks');
  }

  public function schemes()
  {
    return $this->hasMany('App\Scheme');
  }
}
