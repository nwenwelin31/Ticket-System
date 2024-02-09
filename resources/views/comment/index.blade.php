@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="p-2 btn-dark text-center">Comment List</h3>
                    <div class="card-body">
                        @foreach ($comments as $comment)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        {{-- <i class="fa fa-user"></i> --}}
                                        <h5> {{ $comment->user->name }}</h5>
                                        <p>{{ $comment->name }}</p>
                                        <small>{{ $comment->created_at}}</small>
                                    </div>
                                    <div class="d-flex">
                                        {{-- <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-warning mx-2"><i class="fa fa-info"></i></a> --}}
                                        @if(auth()->user()->role == '0' || auth()->user()->id == $comment->user_id)
                                            <a href="{{ route('comment.edit', $comment->id) }}"
                                                class="btn btn-warning-outline mx-2"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger-outline mx-2"><i
                                                        class="fa fa-trash-can text-danger"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr/>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
