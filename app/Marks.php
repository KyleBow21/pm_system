<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
  public function project()
  {
    return $this->BelongsTo('App\Project');
  }
}
