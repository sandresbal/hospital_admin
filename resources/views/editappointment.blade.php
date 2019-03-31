@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                        <a href="/user" class="btn btn-primary">Add new Appointment</a>
                        <table class="table">
                            <thead><tr>
                            <td>
                            Patient
                            </td>
                            <td>
                            Start date
                            </td>
                            <td>
                            End date
                            </td>
                            <td>
                            Actions
                            </td>
                            </tr>
                        </thead>
                        <tbody>@foreach($appointments as $appointment)
                            <tr>
                                <td>
                                {{$appointment->user_id}}
                                </td>
                                <td>
                                {{$appointment->date_start}}
                                </td>
                                <td>
                                {{$appointment->date_end}}
                                </td>
                                <td>
                                    <form action="/appointment/{{$appointment->id}}">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>

                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                                        
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                            @endforeach</tbody>
                        </table>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif
               
</div>
@endsection