<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  public function project()
  {
    return $this->hasOne('App\Module');
  }

  public function assignments()
    {
      return $this->hasMany('App\Assignment');
    }

}
