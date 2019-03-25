@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit the Department</h1>

    <form method="POST" action="/department/{{ $department->id }}">

        <table class="table">
            <div class="form-group">
                <tr>
                    <td>
                        <label for="name">Edit name </label>
                        <input name="name" class="form-control" value="{{$department->name}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="director">Edit director</label>
                        Select director: <select id='director' name='director'>
                            <option value='{{ $department->getDirectorId()}}'>Current:
                                {{$department->getDirectorName()}}</option>
                            @foreach($directorData['data'] as $user)
                            @foreach($user->getRoles() as $rol)
                            @if ($rol->rol == 'doctor' and $user->id != $department->getDirectorId())
                            <option value='{{ $user->id }}'>{{$user->name}}</option>
                            @endif
                            @endforeach
                            @endforeach
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                </tr>
            </div>
        </table>
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update department</button>
        </div>
        {{ csrf_field() }}
    </form>

    <form method="POST" action="/user/department/{{$department->id}}" >
        <div class="form-group" id="personal">
            Current personal:
            @foreach ($directorData['data'] as $user)
            @foreach ($user->getRoles() as $rol)
            @if($rol->rol == 'doctor')
            <input type="checkbox" value="{{$user->id}}" name="personal[]" @if($user->department ==
            $department->id) checked @endif/>
            <label for="{{$user->id}}">{{$user->name}}</label>
            @endif
            @endforeach
            @endforeach
        </div>
        <div class="form-group">
        <button type="submit" name="edit" class="btn btn-primary">Edit personal</button>
        </div>
        {{ csrf_field() }}

    </form>

</div>



@stop
