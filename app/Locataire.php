<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Locataire extends Authenticatable
{
    use Notifiable;
    protected $guard = 'locataire';

    protected $fillable = [
        'name','prenom' , 'date','identite', 'tele','email', 'password','adresse',
    ];

    protected $hidden = [
        'password' ,'remember_token',
];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function location(){
        return $this->hasOne('App\Location');
    }
    public function invitation(){
        return $this->hasOne('App\Invitation');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function inboxs(){
        return $this->hasMany('App\Inbox', 'loc_id');
    }


}
