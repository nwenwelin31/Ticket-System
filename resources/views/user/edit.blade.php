@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-5">
                    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="input" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}" name="name" placeholder="User Name"
                                    value='{{ $user->name }}'>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}" name="email" placeholder="Email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') ?? $user->password }}" name="password" placeholder="Password"
                                    value='{{ $user->password }}'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userRole" class="col-sm-2 col-form-label">User Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="userRole" id="userRole"
                                    aria-label="Default select example">
                                    <option name="userRole" {{ $user->role == 0 ? 'selected' : '' }} value="0">Admin
                                    </option>
                                    <option name="userRole" {{ $user->role == 1 ? 'selected' : '' }} value="1">Regular
                                        user</option>
                                    <option name="userRole" {{ $user->role == 2 ? 'selected' : '' }} value="2">Agent
                                    </option>
                                </select>
                            </div>
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
