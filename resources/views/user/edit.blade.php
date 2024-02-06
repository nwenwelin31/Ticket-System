@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <h3 class="text-center p-2 btn-dark">Update User Info</h3>
                    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data" class="p-3">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="input" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}" name="name" placeholder="User Name"
                                    value='{{ $user->name }}'/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}" name="email" placeholder="Email"
                                    value="{{ $user->email }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('password') is-invalid @enderror" value = "{{ old('email') ?? decrypt($user->password) }}" name="password" placeholder="Password"
                                    value='{{ $user->password }}'/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="userRole" class="col-sm-3 col-form-label">User Role</label>
                            <div class="col-sm-9">
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
                        <div class="form-group row text-center">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-dark">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
