@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-2 p-3">
                <div class="card">
                    <div class="card-body">
                        <form class="row g-2" action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <div class="col-auto">
                              <label for="message" class="">Comment</label>
                              <input type="text" class="form-control mb-3"  placeholder="Add comment" name="name">
                              <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                              <button type="submit" class="btn btn-primary">Send</button>
                              </div>
                        </form>
                    </div>
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
                            {{-- <tr>
                                <td>
                                @foreach ($ticket->category as $category)
                                    {{ $category->name }}
                                @endforeach
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <div class="row mt-4 justify-content-center">

                        <div class="col-ms-4">
                            @foreach($ticket->comment as $comment)
                            <div class="border border-info rounded-pill p-3 mt-2">
                                <div class="row justify-content-around">
                                    <div class="col-auto">
                                        <h5 class="card-title">{{ $comment->user->name}}</h5>
                                        <p class="card-text">{{ $comment->name }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <form method="post" action = "{{ route('comment.destroy', $comment->id) }}" class="d-inline-block">
                                            @method('delete')
                                            @csrf
                                            <button  class="btn btn-primary-outline" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash fa-lg text-danger"></i> </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
