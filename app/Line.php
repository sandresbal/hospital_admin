<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function historial()
    {
        return $this->belongsTo('App\Historial');
    }
}
