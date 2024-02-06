@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('user.index')}}" class="col-sm-1 btn btn-dark m-2">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
