<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkingForm extends Model
{
    public function project() 
    {
        return $this->hasOne('App\Project');
    }
}
