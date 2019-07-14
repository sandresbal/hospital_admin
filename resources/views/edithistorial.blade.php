@extends('layouts.app')

@section('content')
<div class="container">
    @if (Auth::check())
    <h1> {{$user->name}}'s historial</h1>
    @if ($user->historial == 'null')
    <p>This user does not have a historial. Contact an administrator</p>
    @else 
    <p> Historial num {{$user->historial}}</p>
    <table class="table">
        <tbody>@foreach($lines as $line)
            <tr>
                <td>
                    {{$line->data}}
                </td>
            </tr>
            @endforeach</tbody>
    </table>
    
    <form action="/line/historial/{{$id_historial}}">
    <textarea rows="5" cols="100" name="linedata" id="data" placeholder="Enter a new line here..." required="true">
    </textarea><br>
        <button id="b" type="submit" name="create" formmethod="POST" class="btn btn-danger" >Add new line</button>

        {{ csrf_field() }}
    </form>
    
    @endif
    @else
    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
    @endif

</div>
@endsection
