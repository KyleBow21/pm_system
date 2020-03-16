<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
  public function students()
  {
    return $this->hasMany('App\Student');
  }
}
