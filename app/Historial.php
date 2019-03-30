<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    public function patient()
    {
        return $this->belongsTo('App\User');
    }

    public function line()
    {
        return $this->hasMany('App\Line');
    }

}
