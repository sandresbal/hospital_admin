@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit the Appointment</h1>

    <form method="POST" action="/appointment/{{ $appointment->id }}">
    
        <table class="table">
            <div class="form-group">
                <tr>
                    <td>
                        <label for="name">Patient </label>
                        <input name="patient" class="form-control" value="{{$appointment->user_id}}">
                    </td>
                </tr>
                <td>
                    <label for="name">Date start</label>
                    <input type="datetime-local" name="date_start" class="form-control" value="{{$appointment->date_start}}">
                </td>
                <tr>
                    <td>
                        <label for="name">Date end</label>
                        <input type="datetime-local" name="date_end" class="form-control" value="{{$appointment->date_end}}"
                            >
                    </td>
                </tr>
            </div>

        </table>
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update user</button>
        </div>
        {{ csrf_field() }}
    </form>




</div>

@stop
