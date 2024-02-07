@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 bg-dark mt-2 p-3">
                <h3>Ticket Data Lists</h3>
                <div>
                    <table class="table">
                        <thead class="table">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Message</th>
                                <th scope="col">Label</th>
                                <th scope="col">Category</th>
                                <th scope="col">Priority</th>
                                <th scope="col">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)

                            <tr>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->message }}</td>
                                <td>{{ $ticket->priority }}</td>
                                <td>{{ $ticket->file }}</td>
                                <td>
                                @foreach ($ticket->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                                </td>
                                {{-- @foreach ($ticket->label as $label)
                                    <td>{{ $label->name }}</td>
                                @endforeach --}}
                                <td>
                                    <a href="#"
                                        class="btn btn-outline-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#"
                                        class="btn btn-outline-primary">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <form action="#" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button type="" class="btn btn-outline-danger">
                                            {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
