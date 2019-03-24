@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search a doctor for medical specialization:</h1>
        <div class="form-group">
        <select name=special>
            
        </select>


        </div>

        <table class="table">
            <div class="form-group">
                <tr>
                    <td>
                        User name:{{$user->name}}
                    <td>
                </tr>
                <tr>
                    <td>
                        Doctors:
                    </td>
                </tr>
                @foreach($assignations as $doctor)
                <td>
                    Dr. {{$doctor->name}}
                </td>
                <td>
                <form action="/patientassignationedit/{{$user->id}}/delete/{{$doctor->id}}" method="post">
                    <button type="submit"  class="btn btn-danger" value="{{ csrf_token() }}">Delete</button>
                    {{ csrf_field() }}
                </td>
                </tr>
                @endforeach

            </div>

        </table>


    <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary">Assign a doctor</button>
    </div>
    {{ csrf_field() }}
    </form>



</div>

@stop
