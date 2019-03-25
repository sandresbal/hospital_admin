@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                        <a href="/user" class="btn btn-primary">Add new Department</a>
                        <table class="table">
                        <thead>
                            <tr>
                            <td>
                            Department name
                            </td>
                            <td>
                            Director name
                            </td>
                            </tr>
                        </thead>
                        <tbody>@foreach($departments as $department)
                            <tr>
                                <td>
                                    {{$department->name}}
                                </td>
                                <td>
                                    Dr. {{$department->getDirectorName()}}
                                </td>
                                <td>
                                    <form action="/department/{{$department->id}}">
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