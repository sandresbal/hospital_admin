
@extends('layouts.app')

@section('content')
<div class="container">
                <h2>Add New Department</h2>
    Please, fill the details in the form. You can assign personal to that department using edit option.
               
<form method="POST" action="/department">

    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" class="form-control" placeholder="Name here" required="true">
        <label for="director">Select director</label>
        <select id='director' name='director'>
            @foreach($directors['data'] as $user)
            @foreach($user->getRoles() as $rol)
            @if ($rol->rol == 'doctor')
            <option value='{{ $user->id }}'>{{$user->name}}</option>
            @endif
            @endforeach
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add User</button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection