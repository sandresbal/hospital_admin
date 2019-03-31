@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Delete one of the doctors assigned</h3>
    <table class="table">
        <div class="form-group">
            <tr>
                <td>
                    Doctors assigned for {{$user->name}};
                </td>
            </tr>
            @foreach($assignations as $doctor)
            <td>
                Dr. {{$doctor->name}}
            </td>
            <td>
                Dr. {{$doctor->name}}
            </td>
            <td>
                <form action="/patientassignationedit/{{$user->id}}/delete/{{$doctor->id}}" method="post">
                    <button type="submit" class="btn btn-danger" value="{{ csrf_token() }}">Delete</button>
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
    <input type="submit" id="list-personal" value="Search">
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
            var user_id = {!!$user->id!!} ;
            console.log("user:" + user_id)
            getPersonalFromDep(id);
        });

        function getPersonalFromDep(id) {
            $.ajax({
                _token: '{{ csrf_field() }}',
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
                            var user_id = $('#id_user').html();
                            console.log(user_id)


                            var tr_str = "<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td> Dr." + name + "</td>" +
                                "<td>" + '<form action="/patientassignationedit/{{$user->id}}/add/' +  id  + '" method="post">@csrf<button type="submit" class="btn btn-primary">Assign doctor to {{$user->name}}</button></form></td></tr>';

                            $("#table-personal tbody").append(tr_str);
                        }
                    } else if (response['data'] != null) {
                        var tr_str = "<tr>" +
                            "<td>1</td>" +
                            "<td>" + response['data'].name + "</td>" +
                            "<td>" + "<form action='/patientassignationedit/{{$user->id}}/add/" +  response['data'].id  + " method='post'><button type='submit' class='btn btn-danger'>Add2</button> </form></td>" +
                            "</tr>";
                            console.log(response['data'].id);

                        $("#userTable tbody").append(tr_str);
                    } else {
                        var tr_str = "<tr>" +
                            "<td  colspan='4'>No record found.</td>" +
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
