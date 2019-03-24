
@extends('layouts.app')

@section('content')
<div class="container">
                <h2>Add New User</h2>
               
<form method="POST" action="/user">

    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" class="form-control" placeholder="Your name here" required="true">
        <label for="name">Email</label>
        <input name="email" class="form-control" placeholder="example@gmail.com" required="true">
        <label for="name">Phone</label>
        <input type="phone" name="phone" class="form-control" placeholder="+34636207221" required="true">
        Select role:<br>
            <input type="checkbox" name="role[]" value="1">Admin<br>
            <input type="checkbox" name="role[]" value="2">Doctor<br>
            <input type="checkbox" name="role[]" value="3">Patient<br>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add User</button>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection