<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
   public function projects()
   {
     return $this->belongsToMany('App\Project');
   }

   public function modules()
   {
     return $this->belongsToMany('App\Module');
   }
}
