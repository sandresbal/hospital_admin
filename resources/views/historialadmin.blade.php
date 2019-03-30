@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                        <table class="table">
                            <thead><tr>
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
                        <tbody>@foreach($patients as $patient)
                            <tr>
                                <td>
                                    {{$patient->name}}
                                </td>
                                <td>
                                    {{$patient->email}}
                                </td>
                                <td>
                                    <form action="/user/{{$user->id}}/historial/">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit historial</button>          
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