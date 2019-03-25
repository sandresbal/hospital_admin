<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use Auth;
use DB;
use Log;



class DepartmentController extends Controller
{


      public function index()
      {
          $departments = Department::all();
          
        return view('departmentadmin',compact( 'departments'));
      }

      public static function getAllDepartments(){
        $value = Department::all();
        return $value;
      }

      public function edit(Department $department)
      {
        if (Auth::check())
          {       
            $directorData['data'] = User::all();
            return view('editdepartment', compact('department', 'directorData'));
          }           
          else {
               return redirect('/');
           }            	
      }

      public function update(Request $request, Department $department)
      {
              $department->name = $request->name;
              $assignations = $request->get('personal');
              $department->director_id = $request->director;
              $director = DB::table('users')->where('id', $request->director)->first();
              $director->department = $department->id;
              /*foreach($assignations as $assignation){
                Log::info($assignation);
                $doctor = DB::table('users')->where('id', $assignation)->first();
                //$doctor->updateDepartment($department->id);

                Log::info("id doctor antes" . $doctor->id);
                $doctor->department = $department->id;
                Log::info('iddoctordepartment:' . $doctor->department);
                Log::info('iddeptartamento:' . $department->id);
              }*/
          $department->save();
          return redirect('/'); 
        }    	
}  	
      


