<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
  public function projects()
  {
    return $this->hasOne('App\Project');
  }




}
