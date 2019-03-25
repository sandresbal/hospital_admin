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
                    <!--<input name="director" class="form-control" value="{{$department->getDirectorName()}}">-->

                             <!-- Director Dropdown -->
                    Select director: <select id='director' name='director'>
                    <option value='{{ $department->getDirectorId()}}'>Current: {{$department->getDirectorName()}}</option>
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
                Current personal: 
                @foreach{}
                <input type="text" value="İstanbul, Adıyaman, Adana, Urfa" data-role="tagsinput" class="form-control" />
                </tr>
            </div>

        </table>
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update department</button>
        </div>
        {{ csrf_field() }}
    </form>

</div>

@stop
