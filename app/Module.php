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

  public function students()
   {
     return $this->belongsToMany('App\Student');
   }

   public function staff()
    {
      return $this->belongsToMany('App\Staff');
    }

    public function schemes()
     {
       return $this->belongsToMany('App\Scheme');
     }

}
