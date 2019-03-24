<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Log;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $request->session()->put('user_logged', $user);
        $roles = $user->getRoles();
        $request->session()->put('roles_logged', $roles);
        Log::info('Roles en HomeController:' . $roles);
        return view('home',compact('user_logged', 'roles_logged'));

    }

}
