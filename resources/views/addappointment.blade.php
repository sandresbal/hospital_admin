@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create the Appointment</h1>

    <form method="POST" action="/appointment/">

        <table class="table">
            <div class="form-group">
                <tr>
                    <td>
                        <label for="patient">Patient </label>
                        <!--<input name="patient" class="form-control">-->
                        <label for="patient">Select patient: </label>
                        <select id='patient' name='patient'>
                            @foreach($users as $user)
                            @foreach($user->getRoles() as $rol)
                            @if ($rol->rol == 'patient')
                            <option value='{{ $user->id }}'>{{$user->name}}</option>
                            @endif
                            @endforeach
                            @endforeach
                    </td>
                </tr>
                <td>
                    <label for="name">Date start</label>
                    <input type="datetime-local" name="date_start" class="form-control">
                </td>
                <tr>
                    <td>
                        <label for="name">Date end</label>
                        <input type="datetime-local" name="date_end" class="form-control">
                    </td>
                </tr>
            </div>

        </table>
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Add appointment</button>
        </div>
        {{ csrf_field() }}
    </form>




</div>

@stop
