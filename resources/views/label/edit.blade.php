@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 card mt-2">
                <h3 class="p-2">Create New Label</h3>
                <form action="{{ route('label.update', $label->id) }}" method="post" class="p-3"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- Label Name field --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        {{-- validation error message --}}
                        @if ($errors->any())
                            <div class="text-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input type="input" class="form-control" name="name"
                            value="{{ old('name') ?? $label->name }}" />
                    </div>

                    {{-- add button --}}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
