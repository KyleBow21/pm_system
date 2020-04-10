<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   public function Marks()
   {
     return $this->hasOne('App\Marks');
   }

   public function Module()
   {
     return $this->BelongsTo('App\Module');
   }
}
