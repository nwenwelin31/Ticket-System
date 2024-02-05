@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-5">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="input" class="form-control" name="name" placeholder="User Name">
                        </div>
                      </div>

                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="userRole">User Role</label>
                        <select class="form-control" name="userRole" id="userRole" aria-label="Default select example">
                            <option name="userRole" value="1">Regular user</option>
                            <option name="userRole" value="2">Agent</option>
                        </select>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
