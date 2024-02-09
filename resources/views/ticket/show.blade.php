@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 mt-2 p-3">
                <div class="shadow">
                    {{-- @isset($isEditing)
                    @if ($isEditing)
                        @include('comment.edit')
                    @else --}}
                    @include('comment.create', ['tickek_id' => $ticket->id])
                    {{-- @endif
                    @endisset --}}
                </div>
            </div>
            <div class="col-md-9 mt-2 p-3 border border-info shadow">
                <h3 class="text-center mb-2">Ticket Detail</h3>
                <div class="row p-2">
                    <div class="col-sm-5">
                        <p><span>Title : </span>
                            <span>{{ $ticket->title }}</span>
                        </p>
                        <p>
                            <span>Description : </span>
                        <span>{{ $ticket->message }}</span>
                        </p>
                        <p>
                            <span>Priority : </span>
                        <span>{{ $ticket->priority }}</span>
                        </p>
                        <p>
                            <span>Category : </span>
                        <span>
                            @foreach ($ticket->category as $category)
                            <button type="button" class="btn btn-outline-info" data-mdb-ripple-init data-mdb-ripple-color="dark">
                                {{ $category->name }}
                            </button>
                            @endforeach
                        </span>
                        </p>
                        <p>
                            <span>Label : </span>
                        <span>
                            @foreach ($ticket->label as $label)
                            <button type="button" class="btn btn-outline-info" data-mdb-ripple-init data-mdb-ripple-color="dark">
                                {{ $label->name }}
                            </button>
                            @endforeach
                        </span>
                        </p>
                    </div>
                    <div class="col-sm-7">
                        @if ($ticket->file)
                            <div class="d-flex">
                                @foreach (explode(',', $ticket->file) as $file)
                                    <img src="{{ asset('/storage/uploads/' . $file) }}" alt="">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <hr/>
                {{-- comments --}}
                <div class="col-sm-5">
                    @foreach ($ticket->comment as $comment)
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center  btn btn-outline-info">
                                <div>
                                    {{-- <i class="fa fa-user"></i> --}}
                                    <h6> {{ $comment->user->name }}</h6>
                                    <p>{{ $comment->name }}</p>
                                    <small>{{ $comment->created_at}}</small>
                                </div>
                                <div class="d-flex">
                                    {{-- <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-warning mx-2"><i class="fa fa-info"></i></a> --}}
                                    @if(auth()->user()->id == $comment->user_id)
                                        <a href="{{ route('comment.edit', $comment->id) }}"
                                            class="btn btn-warning-outline mx-2" ><i class="fa fa-pencil"></i></a>
                                            @endif
                                        @if(auth()->user()->role == '0' || auth()->user()->id == $comment->user_id)
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger-outline mx-2"><i
                                                    class="fa fa-trash-can text-dark"></i></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach
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

                <a href="{{ route('ticket.index') }}"><i class="fa-solid fa-arrow-left fa-xs"></i> Back</a>
            </div>
        </div>
@endsection

