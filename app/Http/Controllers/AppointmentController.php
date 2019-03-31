<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DB;
use App\Appointment;
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

    public function patientadmin()
    {
        $user = Auth::user();
        $appointments = DB::table('appointments')->where('id_med', $user->id)->get();
        
    	return view('appointmentadmin',compact('user', 'appointments'));
    }
}
