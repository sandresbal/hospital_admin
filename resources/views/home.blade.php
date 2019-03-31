@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (Auth::check())
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <h6>Welcome!</h6>
                        </div>
                        You are logged in!<br>
                        @if(!empty(Session::has('roles_logged')))
                            <div class="alert alert-danger">
                                Estos son los roles
                                {{ Session::get('roles_logged')}}
                            </div>
                        @endif
                    @if (Session::get('roles_logged') != null)
                        @foreach(Session::get('roles_logged') as $role)
                        @switch($role->rol)
                            @case('admin')
                                <div id="separator" style="margin-bottom:15px">
                                <p>As an admin user you have this options available:</p>
                                <a href="/useradmin">Manage users</a><br>
                                <a href="/departmentadmin">Manage department information</a><br>  
                                <a href="/patientadmin">Manage patient assignations</a><br> 
                                </div> 
                            @break
                            @case('doctor')
                                <div id="separator" style="margin-bottom:15px">
                                <p>As doctor you have this options available:</p>
                                <a href="/historialadmin">Manage historials</a>   <br>        
                                <a href="/appointmentadmin/">See my calendar</a>  <br>
                                <a href="/editappointment/">Edit my appointments</a>  <br>
                                </div>
                            @break
                            @case('patient')
                                <div id="separator" style="margin-bottom:15px">
                                <p>As a patient you have this options available:</p>
                                <a href="/myhistorial">See my historial</a><br>
                                <a href="/myappointments/">See my appointments</a>  <br>
                                </div>
                            @break
                           @default
                           <div id="separator" style="margin-bottom:15px">
                           <p>If you do not see any option, please contact with admin@admin.com</p><br>
                                </div>
                        @endswitch
                        @endforeach
                    @else
                    @endif
                </div>
            @else
            <div class="card-body">
            <p>Please, identify yourself using the <a href="./login">login option</a></p>
            <p>If you do not have credentials to log in, you can <a href="./register">register</a></p>
            </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
