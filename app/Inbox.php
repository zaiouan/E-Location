<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Inbox extends Model
{
    protected $fillable = ['message', 'subject', 'user_id', 'locataire_id'];

    public function user(){
    return $this->belongsTo('App\User','user_id');
    }

    public function locataire(){
        return $this->belongsTo('App\Locataire', 'loc_id');
    }
}
