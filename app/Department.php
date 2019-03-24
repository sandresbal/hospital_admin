<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function personal()
    {
        return $this->hasMany('App\User');
    }



}
