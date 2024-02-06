@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <h3 class="p-2 btn-dark text-center">Category List</h3>
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
                    <thead class="table">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('category.show',$category->id) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fa fa-info"></i>
                                </a>
                                <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline-block">
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
