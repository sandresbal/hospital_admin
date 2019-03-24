@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check())
    <table class="table">
        <thead>
            <tr>
                <td>
                    User list
                </td>
                <td>
                    Email
                </td>
                <td>
                    Options
                </td>
            </tr>
        </thead>
        <tbody>@foreach($users as $user)
            @foreach($user->getRoles() as $role)
            @if($role->rol == 'patient')
            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                </td>
                <td>

                    <form action="/patientassignationedit/{{$user->id}}">
                        <button type="submit" name="edit" class="btn btn-primary">Edit current doctors</button>

                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
            @endforeach</tbody>
    </table>
    @else
    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
    @endif

</div>
@endsection
