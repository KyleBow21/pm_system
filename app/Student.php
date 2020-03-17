<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function schemes()
    {
      return $this->hasOne('App\Scheme');
    }

    public function projects()
    {
      return $this-belongsToOne('App\Project');
    }

    public function modules()
    {
      return $this->belongsToMany('App\Module');
    }
}
