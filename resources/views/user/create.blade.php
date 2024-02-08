@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    {{-- validation error message --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="text-center p-2 btn-dark">Add New User</h3>
                    <form action="{{ route('user.store') }}" method="post" class="p-3">
                        @csrf
                        {{-- Name filed --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="input" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" name="name" placeholder="User Name">
                            </div>
                        </div>

                        {{-- Email filed --}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" name="email" placeholder="Email">
                            </div>
                        </div>

                        {{-- Password filed --}}
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}" name="password" placeholder="Password">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm Password">
                        </div>
                    </div> --}}

                        {{-- user role filed --}}
                        <div class="form-group row">
                            <label for="userRole" class="col-sm-3 col-form-label">User Role</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="userRole" id="userRole"
                                    aria-label="Default select example">
                                    <option name="userRole" value="2">Regular user</option>
                                    <option name="userRole" value="1">Agent</option>
                                </select>
                            </div>
                        </div>

                        {{-- login button --}}
                        <div class="form-group row text-center">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
