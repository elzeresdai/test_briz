<form action="{{route('update_user_info')}}" id="update_form" method="post">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$user->id}}">
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
            <td><input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" required></td>
            <td>@foreach($user->phone as $phone)
                    <div class="input-group"><input type="text" name="phone[{{$phone->id}}]" class="form-control"
                                                    value="{{$phone->phone}}" required>
                        <button data-id="{{$phone->id}}" data-action="{{route('del_number')}}" class="btn del_number"><i class="fas fa-minus-circle"></i>
                        </button>
                    </div>
                @endforeach
                <div id="add_number"></div>
                <button class="btn" id="add_new_number"><i class="fas fa-plus-circle"></i></button>
            </td>
            <td>
                <button type="button" id="save_changes">Save</button>
            </td>
        </tr>
    </table>
</form>
