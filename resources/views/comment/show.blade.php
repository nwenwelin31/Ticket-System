
<div class="row mt-4 justify-content-center">
    <div class="col-ms-4">
        @foreach($comments as $comment)
        <div class="border border-info rounded-pill p-3 mt-2">
            <div class="row justify-content-around">
                <div class="col-auto">
                    <h5 class="card-title">{{ $comment->user->name}}</h5>
                    <p class="card-text">{{ $comment->name }}</p>
                </div>

                <div class="col-auto">
                    <a href="{{ route('comment.edit',$comment->id) }}" class="btn btn-primary-outline">
                        <i class="fa fa-edit text-info"></i>
                    </a>
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
