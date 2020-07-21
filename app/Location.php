<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['type','debut','fin'];

    public function locataire(){
        return $this->belongsTo('App\Locataire');
    }
    public function bien(){
        return $this->belongsTo('App\Bien');
    }
    public function finances(){
        return $this->hasMany('App\Finance');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }


}
