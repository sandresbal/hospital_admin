@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Department</h1>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Edit info epartment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Edit personal department</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

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
                                <label for="director">Select director: </label>
                                <select id='director' name='director'>
                                    <option value='{{ $department->getDirectorId()}}'>Current:
                                        {{$department->getDirectorName()}}</option>
                                    @foreach($directorData['data'] as $user)
                                    @foreach($user->getRoles() as $rol)
                                    @if ($rol->rol == 'doctor' and $user->id != $department->getDirectorId())
                                    <option value='{{ $user->id }}'>Dr. {{$user->name}}</option>
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

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="POST" action="/user/department/{{$department->id}}">
                <div class="form-group" id="personal" style ="padding-top:50px">
                    Below you can see all the available doctors. <br>
                    If checked, he/she belogs to this department. Please, check all the doctors you want to assign to {{$department->name}} department:<br>
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
    </div>




</div>



@stop
