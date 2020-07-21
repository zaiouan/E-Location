<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable=[
        'montant', 'charge', 'TVA','charge'
    ];
    public function location(){
        return $this->belongsTo('App\Location');
    }
}
