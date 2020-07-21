<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = ['tdb','description','ndc','adresse','surface',];

    public function location(){
        return $this->hasOne('App\Location','bien_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
