@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Delete one of the doctor assigned</h3>
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    User name: {{$user->name}}
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
    <div class="form-group">

    Department :
    <select id='sel_depart' name='sel_depart'>
        <option value='0'>-- Select department --</option>
        @foreach($departmentData['data'] as $department)
        <option value='{{ $department->id }}'>{{$department->name}}</option>
        @endforeach
    </select>
    <input type="submit" id="list-personal">
    </div>

    <table id='table-personal' class="table">
       <thead>
        <tr>
          <th>S.no</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
       </thead>
       <tbody></tbody>
     </table>

</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $('#list-personal').click(function () {
            id = $('#sel_depart').val();
            console.log(id)
            getPersonalFromDep(id);
        });

        function getPersonalFromDep(id) {
            $.ajax({
                url: 'getPersonal/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {

                    console.log(response['data']);

                    var len = 0;
                    $('#table-personal tbody').empty(); // Empty <tbody>
                    if (response['data'] != null) {
                        len = response['data'].length;
                        
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i + 1) + "</td>" +
                                "<td align='center'>" + name + "</td>" +
                                "<form action='/patientassignationedit/{{$user->id}}/add/" +  response['data'].id  + "method='post'><button type='submit' class='btn btn-danger'>Add</button></td>" +
                                "</tr>";

                            $("#table-personal tbody").append(tr_str);
                        }
                    } else if (response['data'] != null) {
                        var tr_str = "<tr>" +
                            "<td align='center'>1</td>" +
                            "<td align='center'>" + response['data'].name + "</td>" +
                            "<td align='center'>" + "<form action='/patientassignationedit/" +{{$user->id}} +"/add/" +  response['data'].id  + "method='post'><button type='submit' class='btn btn-danger'>Add</button></form></td>" +
                            "</tr>";

                        $("#userTable tbody").append(tr_str);
                    } else {
                        var tr_str = "<tr>" +
                            "<td align='center' colspan='4'>No record found.</td>" +
                            "</tr>";

                        $("#table-personal tbody").append(tr_str);
                    }

                }
            });
        }
    });



    

</script>

</div>

@stop
