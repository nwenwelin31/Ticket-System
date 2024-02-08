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
                <div>
                    <table class="text-center">
                        <tbody>
                            <tr>
                                {{-- <td>Title</td> --}}
                                <td>
                                    <h5>{{ $ticket->title }}</h5>
                                </td>
                            </tr>
                            <tr>
                                {{-- <td>Message</td> --}}
                                <td>{{ $ticket->message }}</td>
                            </tr>
                            <tr>
                                {{-- <td>Priority</td> --}}
                                <td>{{ $ticket->priority }}</td>
                            </tr>
                            <tr>
                                <td>
                                    {{-- <td>File</td> --}}
                                    @if ($ticket->file)
                                        @foreach (explode(",",$ticket->file) as $file)
                                            <img src="{{ asset('/storage/uploads/' . $file) }}" alt="" style="max-width: 50%; max-height: 50%;">
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @foreach ($ticket->category as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @foreach ($ticket->label as $label)
                                        {{ $label->name }}
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>

                    </table>
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
                        @foreach ($comments as $comment)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5><i class="fa fa-user"></i> {{ $comment->user->name }}</h5>
                                        <p>{{ $comment->name }}</p>
                                    </div>
                                    <div class="d-flex">
                                        {{-- <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-warning mx-2"><i class="fa fa-info"></i></a> --}}
                                        <a href="{{ route('comment.edit', $comment->id) }}"
                                            class="btn btn-warning-outline mx-2"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger-outline mx-2"><i
                                                    class="fa fa-trash-can text-danger"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('ticket.index') }}"><i class="fa-solid fa-arrow-left fa-xs"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
