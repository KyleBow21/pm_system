<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   public function marks()
   {
     return $this->hasOne('App\Marks');
   }

   public function module()
   {
     return $this->BelongsTo('App\Module');
   }

   public function users()
   {
     return $this->hasMany('App\User');
   }

   public function markingForm()
   {
     return $this->hasOne('App\MarkingForm');
   }
}
