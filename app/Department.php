<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;

class Department extends Model
{
    public function personal()
    {
        return $this->hasMany('App\User');
    }

    public function getDirectorName(){

        $doctor = DB::table('users')->where('id', $this->director_id)->first();
        return $doctor->name;

    }

    public function getDirectorId(){

        $doctor = DB::table('users')->where('id', $this->director_id)->first();
        return $doctor->id;

    }

}
