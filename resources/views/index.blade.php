@extends('layouts.layout')

@section('title')
    <title>Phone Book</title>
@endsection

@section('content')
    @include('modal.editModal')
    <div class="container">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="alert alert-primary col-12">
                    <h3>Phone Book</h3>
                </div>
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
                                <td><button type="button"   class="btn btn-primary edit_btn" data-action="{{route('edit_user',$user->id)}}" data-toggle="modal" data-target="#EditModal">
                                        Edit
                                    </button></td>
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

