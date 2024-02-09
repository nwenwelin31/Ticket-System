@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-2 p-3">
                <div class="card">
                    {{-- @isset($isEditing)
                    @if ($isEditing)
                        @include('comment.edit')
                    @else --}}
                    @include('comment.create', ['tickek_id' => $ticket->id])
                    {{-- @endif
                    @endisset --}}
                </div>
            </div>
            <div class="col-md-7 mt-2 p-3 border border-info">
                <h3 class="text-center">Ticket Detail</h3>
                <div class="text-start">
                    <h5>{{ $ticket->title }}</h5>

                    <p>{{ $ticket->message }}</p>

                    <p>{{ $ticket->priority }}</p>
                    <p>
                        @foreach ($ticket->category as $category)
                            {{ $category->name }}
                        @endforeach
                    </p>
                    <p>
                        @foreach ($ticket->label as $label)
                            {{ $label->name }}
                        @endforeach
                    </p>
                    <div class="d-flex">
                        @if ($ticket->file)
                        @foreach (explode(',', $ticket->file) as $file)
                            <img src="{{ asset('/storage/uploads/' . $file) }}" alt=""
                                style="max-width: 50%; max-height: 50%; margin:1px">
                        @endforeach
                    @endif
                    </div>

                        {{-- <a href="{{ route('comment.show',$ticket->id) }}">see all comments</a> --}}
                        {{-- @php
                        $comments= \App\Models\Comment::where('ticket_id',$ticket->id)->get();
                        $comments = $ticket->comment;
                    @endphp
                    @foreach ($comments as $comment)
                        <div>{{ $comment }}</div>
                    @endforeach
@include('comment.show',['ticket_id'=>$ticket_id]) --}}

                        {{-- comments --}}
                        <div class="card-body">
                            @foreach ($ticket->comment as $comment)
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
                        <a href="{{ route('ticket.index') }}"><i class="fa-solid fa-arrow-left fa-xs"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
