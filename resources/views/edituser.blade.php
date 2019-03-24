@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit the User</h1>

    <form method="POST" action="/user/{{ $user->id }}">
        <table class="table">
            <div class="form-group">
                <tr>
                    <td>
                        Current data
                    </td>
                    <td>
                        New data
                    </td>
                <tr>
                <tr>
                    <td>
                        User name:{{$user->name}}
                    </td>
                    <td>
                        <label for="name">New name </label>
                        <input name="name" class="form-control" placeholder="Your name here" required="true">
                    </td>
                </tr>
                <td>
                    User email:{{$user->email}}
                </td>
                <td>
                    <label for="name">Email</label>
                    <input name="email" class="form-control" placeholder="example@gmail.com" required="true">
                </td>
                <tr>
                    <td>
                        User phone: {{$user->phone}}
                    </td>
                    <td>
                        <label for="name">Phone</label>
                        <input type="phone" name="phone" class="form-control" placeholder="+34636207221"
                            required="true">
                    </td>
                </tr>
                <tr>
                    <td>
                        Current role(s):
                        @foreach($user->getRoles() as $role)
                        {{$role->rol}}
                        @endforeach
                    </td>
                    <td>
                        Select role:<br>
                        <input type="checkbox" name="role[]" value="1">Admin<br>
                        <input type="checkbox" name="role[]" value="2">Doctor<br>
                        <input type="checkbox" name="role[]" value="3">Patient<br>
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
