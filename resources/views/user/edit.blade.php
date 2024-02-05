@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5">
                <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="input" class="form-control" name="name" placeholder="User Name" value='{{ $user->name }}'>
                        </div>
                      </div>

                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Password" value='{{ $user->password }}'>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="userRole">User Role</label>
                        <select class="form-control" name="userRole" id="userRole" aria-label="Default select example" value='{{ $user->role }}'>
                            <option name="userRole" value="1">Regular user</option>
                            <option name="userRole" value="2">Agent</option>
                            <option name="userRole" value="2">Admin</option>
                        </select>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
