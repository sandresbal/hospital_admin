<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Role;
use App\PatientAssignation;
use App\Department;
use Form;


use Log;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        
    	return view('useradmin',compact('user', 'users'));
    }

    public function patientadmin()
    {
        $user = Auth::user();
        $users = User::all();
        
    	return view('patientadmin',compact('user', 'users'));
    }

    public function add()
    {
    	return view('adduser');
    }

    public function create(Request $request)
    {
    	$user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $roles = $request->get('role');
        Log::info('Roles del controlador que nos traemos:' . print_r($roles));

        $user->save();
        
        if (isset($roles)){
        foreach ($roles as $role){
            $user->attachRole($role);
        }
        }

        $user->save();

    	return redirect('/'); 
    }

    public function edit(User $user)
    {
    	if (Auth::check())
        {            
                return view('edituser', compact('user'));
        }           
        else {
             return redirect('/');
         }            	
    }

    public function update(Request $request, User $user)
    {
    	if(isset($_POST['delete'])) {
    		$user->delete();
    		return redirect('/');
    	}
    	else
    	{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $roles = $request->get('role');
                
            if (isset($roles)){
                foreach ($roles as $role){
                    $user->attachRole($role);
                }
                }
            $user->save();
	    	return redirect('/'); 
    	}    	
    }

    public function editassignation(User $user)
    {
    	if (Auth::check())
        {       
                $assignations = $user->getAssignations();
                $departmentData['data'] = DepartmentController::getAllDepartments();
                return view('editpatient', compact('user', 'assignations', 'departmentData'));
        }           
        else {
             return redirect('/');
         }            	
    }


    public function deleteassignation(Request $request, int $pat, int $med){
        $assignation = DB::table('patient_assignations')->where('user_id', $pat)->where('id_user_med', $med);
        $image = $assignation->first();
        Log::info('Se ha llegado a ejecutar el método delete');
        $assignation->delete();
        return redirect('/');
    }

    public function updatepatient(Request $request, User $user)
    {
    	if(isset($_POST['delete'])) {
    		$user->delete();
    		return redirect('/');
    	}
    	else
    	{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $roles = $request->get('role');
            Log::info('Roles del controlador que nos traemos:' . print_r($roles));
                
            foreach ($roles as $role){
                $user->attachRole($role);
            }
            $user->save();
	    	return redirect('/'); 
    	}    	
    }



    //***    @TODO https://medium.com/justlaravel/how-to-implement-ajax-crud-operations-in-laravel-761fbea7e80d
 

    public function addDoctor(Request $request) {
        $rules = array (
                'name' => 'required'
        );
        $validator = Validator::make ( User::all (), $rules );
        if ($validator->fails ())
            return Response::json ( array (
                        
                    'errors' => $validator->getMessageBag ()->toArray ()
            ) );
            else {
                $data = new Data ();
                $data->name = $request->name;
                $data->save ();
                return response ()->json ( $data );
            }
    }
    /*public function deleteassignation(Request $request, User $user)
    {

        $assignations = [];
        if ($this->doctors()) {
            $assignations = $this->doctors()->get();
        }

        $doctors = [];
        foreach($assignations as $iddoctor){
            $doctor = DB::table('users')->where('id', $iddoctor->id_user_med)->first();
            $doctorname = $doctor->name;
            array_push($doctors, $doctorname);
        }    	
    }*/
}
