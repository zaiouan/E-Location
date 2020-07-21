<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','adresse','tele'
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

    public function locataires(){
        return $this->hasMany('App\Locataire');
    }
    public function biens(){
        return $this->hasMany('App\Bien');
    }
	public function locations(){
        return $this->hasMany('App\Location');
    }
    public function inboxs(){
        return $this->hasMany('App\Inbox', 'user_id');
    }
    public function interventions(){
        return $this->hasMany('App\Intervention');
    }

}
