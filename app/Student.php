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
      return $this-hasOne('App\Project');
    }

    public function modules()
    {
      return $this->hasMany('App\Module');
    }
}
