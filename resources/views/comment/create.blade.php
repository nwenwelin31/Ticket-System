<div class="card-body">
    <form class="row g-2" action="{{ route('comment.store') }}" method="post">
        @csrf
        <div class="col-auto">
            <label for="message" class="">Comment</label>
            <input type="text" class="form-control mb-3" placeholder="Write a comment" name="name">
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>
