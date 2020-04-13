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

   public function students()
   {
     return $this->hasMany('App\Student');
   }

   public function staff()
   {
     return $this->belongsToMany('App\Staff');
   }


   }
