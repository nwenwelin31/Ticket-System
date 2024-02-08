@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="p-2 btn-dark text-center">Comment List</h3>
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            @foreach ($comments as $comment)
                                <div class="p-3 mt-1">
                                    <table>
                                        <tr>
                                            <td>
                                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                                <p class="card-text">{{ $comment->name }}</p>
                                            </td>

                                            <td>
                                                <a href="{{ route('comment.edit', $comment->id) }}"
                                                    class="btn btn-primary-outline">
                                                    <i class="fa fa-edit text-info"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="post" action = "{{ route('comment.destroy', $comment->id) }}"
                                                    class="d-inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-primary-outline"
                                                        onclick="return confirm('Are you sure you want to delete?')"><i
                                                            class="fa fa-trash fa-lg text-danger"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
