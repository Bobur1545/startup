@extends('admin.layout.app')
@section('content')

    <form method="post" action="{{route('users_list.update', $user->id) }}">
        @csrf
        @method("PUT")
        <input value="{{$user->id}}" style="display: none" required name="id">
        <div class="modal-body">
            <div class="col-md-12">
                <label class="form-label">Name</label>
                <input type="text"  value="{{$user->name}}" class="form-control" name="name" placeholder="Update name" required>
            </div>

            <div class="col-md-12">
                <label class="form-label">Email</label>
                <input type="email"  value="{{$user->email}}" class="form-control" name="email" placeholder="Update email" required>
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
                <label class="form-label">Group</label>
                <input type="text"  value="{{$user->group}}" class="form-control" name="group" placeholder="Update group" required>
            </div>

        </div>

            <a href="{{route('users_list.index')}}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>

    </form>

@endsection

