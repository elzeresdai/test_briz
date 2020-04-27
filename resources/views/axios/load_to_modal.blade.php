<form action="{{route('update_user_info')}}" id="update_form" method="post">
    {{csrf_field()}}
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Edit</th>
    </tr>
    </thead>
        <tr>
            <td><input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" required></td>
            <td> <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" required></td>
            <td>@foreach($user->phone as $phone)
                    <input type="text" name="phone[{{$phone->id}}]" class="form-control" value="{{$phone->phone}}" required>
                @endforeach
            </td>
            <td><button type="button" id="save_changes">Save</button></td>
        </tr>
</table>
</form>
