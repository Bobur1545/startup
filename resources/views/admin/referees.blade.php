@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <!-- Button trigger modal -->
                        <button type="button" style="margin: 30px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add user
                        </button>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Group</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referees as $referee)
                                <tr>
                                    <th scope="row">{{$referee->id}}</th>
                                    <td>{{$referee->name}}</td>
                                    <td>{{$referee->email}}</td>
                                    <td>{{$referee->group}}</td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <form action="{{route('users_update', $referee->id)}}" method="GET">
                                                <button type="submit" class="btn btn-warning" style="margin-right: 5px;"><i class="fa fa-pencil"></i></button>
                                            </form>

                                            <form action="{{route('users_destroy', $referee->id)}}" method="GET">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">User save</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('users_list.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Confirm password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" name="group" placeholder="Enter department" required>
                        </div>

                        <div class="col-md-12" style="display: none">
                            <label class="form-label">Role</label>
                            <select class="custom-select" style="" id="selectBox" required name="role">
                                <option value="2">Referee</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
