@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Delete one of the doctor assigned</h3>
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    User name:{{$user->name}}
                <td>
            </tr>
            <tr>
                <td>
                    Doctors:
                </td>
            </tr>
            @foreach($assignations as $doctor)
            <td>
                Dr. {{$doctor->name}}
            </td>
            <td>
                <form action="/patientassignationedit/{{$user->id}}/delete/{{$doctor->id}}" method="post">
                    <button type="submit" class="btn btn-danger" value="{{ csrf_token() }}">Delete</button>
                    {{ csrf_field() }}
            </td>
            </tr>
            @endforeach

        </div>

    </table>

    <h4>Or asign a new doctor from a medical specialization</h4>

         <!-- Department Dropdown -->
            Department : <select id='sel_depart' name='sel_depart'>
                <option value='0'>-- Select department --</option>
                @foreach($departmentData['data'] as $department)
                <option value='{{ $department->id }}'>{{$department->name}}</option>
                @endforeach
            
                
    </div>
</div>
<script type="text/javascript">
$("#sel_depart").change(function() {
$.ajax({
        type: 'post',
        url: '/addDoctor',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val()
        },
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        },
    });
    $('#sel_depart').val('');
});
</script>    

</div>

@stop
