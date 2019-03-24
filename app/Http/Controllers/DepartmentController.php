<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;


class DepartmentController extends Controller
{
    public static function getAllDepartments(){
        //$value=DB::table('department')->orderBy('id', 'asc')->get(); 
        $value = Department::all();
        return $value;
      }
}
