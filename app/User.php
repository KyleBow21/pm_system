<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

<<<<<<< HEAD







=======
>>>>>>> 29a21b3d6aa01b1dcaeede2c327254342da9e01d
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function project()
   {
     return $this->belongsTo('App\Project');
   }

   public function scheme()
   {
     return $this->belongsTo('App\Scheme');
   }

   public function modules()
   {
     return $this->belongsToMany('App\Module');
   }
}
