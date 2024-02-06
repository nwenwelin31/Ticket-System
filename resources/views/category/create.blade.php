@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7 mt-2">
                <h3 class="bg-dark p-2">Create New Category</h3>
                <form action="{{ route('category.store') }}" method="post" class="card p-3">

                    @csrf
                    {{-- Category Name field --}}
                    <div class="form-group">
                        <label for="category">Name</label>
                        {{-- validation error message --}}
                        @if ($errors->any())
                            <div class="text-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input type="input" class="form-control" id="category" name="name" />
                    </div>

                    {{-- add button --}}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
