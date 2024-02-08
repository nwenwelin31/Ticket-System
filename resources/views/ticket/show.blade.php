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
                        @include('comment.create',['tickek_id'=>$ticket->id])
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
                                <td><h5>{{ $ticket->title }}</h5></td>
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
                                {{-- <td>File</td> --}}
                                <td><img src="{{ asset('/storage/uploads/'. $ticket->file) }}" alt="{{ $ticket->name }}" style="max-width: 50%; max-height: 50%;" ></td>
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
                    @endforeach --}}
{{-- @include('comment.show',['ticket_id'=>$ticket_id]) --}}
                </div>
            </div>
        </div>
    </div>
@endsection
