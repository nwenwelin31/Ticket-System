@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mt-2 p-3">
                <h3 class="bg-dark p-3">Ticket Data Lists</h3>
                <div>
                    @if (Session::has('delete'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                            {{ session('delete') }}
                        </div>
                    @endif
                    {{-- detail ticket info --}}
                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Message</th>
                                <th scope="col">Priority</th>
                                <th scope="col">File</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->title }}</td>
                                    <td>{{ $ticket->message }}</td>
                                    <td>{{ $ticket->priority }}</td>
                                    {{-- multiple file show --}}
                                    <td>
                                        @if ($ticket->file)
                                            @foreach (explode(',', $ticket->file) as $file)
                                                <img src="{{ asset('/storage/uploads/' . $file) }}" alt=""
                                                    style="max-width: 15%; max-height: 15%;">
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-outline-primary">
                                            <i class="fa fa-info"></i>
                                        </a>

                                        @if (Auth::user()->id == "0")
                                            <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post"
                                                class="d-inline-block">
                                                @method('delete')
                                                @csrf
                                                <button type="" class="btn btn-outline-danger">
                                                    {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif

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
