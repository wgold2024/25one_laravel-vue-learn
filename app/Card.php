<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['name'];
   
    /*
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('number');
    }      
    */
}
