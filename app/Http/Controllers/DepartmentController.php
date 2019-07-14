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

      public function add()
      {
        $directors['data'] = User::all();
        return view('adddepartment', compact('directors'));
      }
  
      public function create(Request $request)
      {
        $department = new Department();
          $department->name = $request->name;
          $department->director_id = $request->director;  
          $department->save();
  
        return redirect('/'); 
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
        if(isset($_POST['delete'])) {
          $department->delete();
          return redirect('/');
        }
        else{
          $department->name = $request->name;
          $assignations = $request->get('personal');
          $department->director_id = $request->director;
          $director = DB::table('users')->where('id', $request->director)->first();
          $director->department = $department->id;
          $department->save();
          return redirect('/'); 
        }    	
      } 
}  	
      


