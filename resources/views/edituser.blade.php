@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit the User</h1>

    <form method="POST" action="/user/{{ $user->id }}">
    
        <table class="table">
            <div class="form-group">
                <tr>
                    <td>
                        <label for="name">Edit name </label>
                        <input name="name" class="form-control" value="{{$user->name}}">
                    </td>
                </tr>
                <td>
                    <label for="name">Edit email</label>
                    <input name="email" class="form-control" value="{{$user->email}}">
                </td>
                <tr>
                    <td>
                        <label for="name">Edit phone</label>
                        <input type="phone" name="phone" class="form-control" value="{{$user->phone}}"
                            >
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
                        Select new role:<br>
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
