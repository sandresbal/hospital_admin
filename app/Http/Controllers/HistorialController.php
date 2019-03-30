<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class HistorialController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allusers = User::all();
        $patients =[];
        foreach($allusers as $u){
            $roles = $u->getRoles();
            foreach ($roles as $rol){
                if ($rol = 'patient'){
                    array_push($patients, $u);
                }
            }
        }
        
        array_unique($patients);
        
    	return view('historialadmin',compact('user', 'patients'));
    }


}
