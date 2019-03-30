@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check())
    <h1> {{$user->name}}'s historial</h1>
    <table class="table">
        <tbody>@foreach($lines as $line)
            <tr>
                <td>
                    {{$line->data}}
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    @else
    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
    @endif

</div>
@endsection
