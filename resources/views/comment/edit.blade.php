<div class="card-body">
    <form class="row g-2" action="{{ route('comment.update',$comment->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-auto">
            <label for="message" class="">Comment</label>
            <input type="text" class="form-control mb-3" placeholder="Add comment" name="name" value="{{ $comment->name }}">
            <input type="hidden" name="ticket_id" value="{{ $comment->ticket_id }}">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>
