<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DB;
use App\Appointment;
use App\Department;
use App\User;

use Log;


class AppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $appointments = DB::table('appointments')->where('id_med', $user->id)->get();

        $events = [];
        foreach($appointments as $appointment){
            $pac = DB::table('users')->where('id', $appointment->user_id)->first();
            Log::info("LLEGO AQUÍ");
            $events[] = \Calendar::event(
                "App. with ".$pac->name,
                false,//todo el día NO
                $appointment->date_start,
                $appointment->date_end,
                0);
        }

        $calendar = \Calendar::addEvents($events);
        return view('appointmentadmin',compact('user', 'calendar', 'appointments'));
        
    }

    public function indexpatient()
    {
        $user = Auth::user();
        $appointments = DB::table('appointments')->where('user_id', $user->id)->get();

        $events = [];
        foreach($appointments as $appointment){
            $doc = DB::table('users')->where('id', $appointment->id_med)->first();
            Log::info("name med ".$doc->name);
            $id_dep = $doc->department;
            Log::info("id dep ".$id_dep);
            $department = DB::table('departments')->where('id', $id_dep)->first();
            $dep_name = $department->name;
            Log::info("nombre dep ".$id_dep);

            Log::info("LLEGO AQUÍ");
            $events[] = \Calendar::event(
                "Appointment ".$dep_name,
                false,//todo el día NO
                $appointment->date_start,
                $appointment->date_end,
                0);
        }

        $calendar = \Calendar::addEvents($events);
        return view('appointmentadmin',compact('user', 'calendar', 'appointments'));
    }

    public function patientadmin()
    {
        $user = Auth::user();
        $appointments = DB::table('appointments')->where('id_med', $user->id)->get();
        
    	return view('myappointments',compact('user', 'appointments'));
    }

    public function editappointment()
    {
        $user = Auth::user();
        $appointments = DB::table('appointments')->where('id_med', $user->id)->orderBy('date_start', 'asc')->get();

        return view('editappointment',compact('appointments'));
        
    }

    public function edit(Appointment $appointment)
    {
    	if (Auth::check())
        {            
                return view('appointmentdetail', compact('appointment'));
        }           
        else {
             return redirect('/');
         }            	
    }

    public function update(Request $request, Appointment $appointment)
    {
        $user = Auth::user();

    	if(isset($_POST['delete'])) {
    		$appointment->delete();
    		return redirect('/');
    	}
    	else
    	{
            $appointment->user_id = $request->patient;
            $appointment->id_med = $user->id;
            $appointment->date_start = $request->date_start;
            $appointment->date_end = $request->date_end;
            $assignations = DB::table('asignation_roles')->where('id_user', $request->patient)->get();

            //TODO: RECORRER LAS ASIGNACIONES Y SI NINGUNA ES PACIENTE, AÑADIRLA
            $appointment->save();
	    	return redirect('/'); 
    	}    	
    }

    public function add()
    {
        /*$patientData['data']=(array) User::all()->toArray();*/
        //$users['data'] =  DB::table('users');
        $users = User::all();

    	return view('addappointment', compact('users'));
    }

    /*public function add()
    {
    	return view('addappointment');
    }*/

    public function create(Request $request)
    {   $user = Auth::user();
    	$appointment = new Appointment();
        $appointment->user_id = $request->patient;
        $appointment->id_med = $user->id;
        $appointment->date_start = $request->date_start;
        $appointment->date_end = $request->date_end;

        $appointment->save();

    	return redirect('/'); 
    }

}
