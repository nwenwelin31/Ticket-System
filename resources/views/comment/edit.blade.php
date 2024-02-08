@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 card mt-2">
                <div class="card-body">
                    <form class="row g-2" action="{{ route('comment.update', $comment->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-auto">
                            <label for="message" class="">Comment</label>
                            {{-- validation error message --}}
                            @if ($errors->any())
                                <div class="text-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <input type="text" class="form-control mb-3" placeholder="Add comment" name="name"
                                value="{{ $comment->name }}">
                            <input type="hidden" name="ticket_id" value="{{ $comment->ticket_id }}">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
