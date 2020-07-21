<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'email', 'token','locataire_id',
    ];
    public function getLink() {
        return urldecode(route('registerinvit',$this->token));
    }
    public function locataire(){
        return $this->belongsTo('App\Locataire');
    }
}
