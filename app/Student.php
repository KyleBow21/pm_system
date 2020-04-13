<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     public function scheme()
     {
       return $this->belongsTo('App\Scheme');
     }

     public function project()
     {
       return $this->belongsTo('App\Project');
     }

     public function modules()
     {
       return $this->belongsToMany('App\Module');
     }
}
