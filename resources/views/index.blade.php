@extends('layouts.layout')

@section('title')
    <title>Phone Book</title>
@endsection

@section('content')
    @include('modal.editModal')
    @include('modal.alertModal')
    @include('modal.succesModal')
    <div class="container">
        <div class="container h-100">

            <div class="alert alert-primary col-12">
                <h3>Phone Book</h3>
            </div>
            <form action="{{route('create_user')}}" id="save_user" method="post">
                {{csrf_field()}}
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name_add">First name</label>
                        <input type="text" class="form-control" minlength="3" id="first_name_add" name="first_name"
                               placeholder="first name">
                    </div>
                    <div class="form-group">
                        <label for="first_name_add">Last name</label>
                        <input type="text" class="form-control" minlength="3" id="first_name_add" name="last_name"
                               placeholder="last name">
                    </div>
                    <div class="form-group">
                        <label for="first_name_add">Phone number</label>
                        <input type="number" maxlength="10" class="form-control" id="first_name_add" name="phone[]"
                               placeholder="add phone">
                    </div>
                    <div id="add_result"></div>
                    <div class="form-group">
                        <button class="btn" id="add_phone" title="add number"><i class="fas fa-plus-circle"></i>
                        </button>
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>

            <div class="row h-100 justify-content-center align-items-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody id="result">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>@foreach($user->phone as $phone)
                                        {{$phone->phone}};
                                    @endforeach
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary edit_btn"
                                            data-action="{{route('edit_user',$user->id)}}" data-toggle="modal"
                                            data-target="#EditModal">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-primary dell_btn"
                                            data-action="{{route('delete_user',$user->id)}}" data-toggle="modal"
                                            data-target="#AlertModal">
                                        Delete
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{mix('js/app.js')}}"></script>
@stop

