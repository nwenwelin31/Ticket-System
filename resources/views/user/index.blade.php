@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="p-2">User List</h3>
            <div class="card">

                <table class="table">
                    {{-- delete confirm message --}}
                    @if (Session::has('delete'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            {{ session('delete') }}
                        </div>
                    @endif

                    {{-- update confirm message --}}
                    @if (Session::has('update'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            {{ session('update') }}
                        </div>
                    @endif

                    {{-- create confirm message --}}
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- User Info Table --}}
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-primary">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role == 0 ? "Admin" : ($user->role == 1 ? "Agent" : "Normal User")}}</td>
                            <td>
                                <a href="{{ route('user.edit',$user->id) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('user.show',$user->id) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fa fa-info"></i>
                                </a>
                                <form action="{{ route('user.destroy',$user->id) }}" method="post" class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="" class="btn btn-outline-danger">
                                        {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
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
