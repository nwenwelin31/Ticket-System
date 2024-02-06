@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 bg-dark mt-2 p-3">
                <h3>Create Ticket</h3>
                <form action="{{ route('ticket.store') }}" method="post" class="p-3 rounded bg-white" enctype="multipart/form-data">
                    @csrf
                    {{-- title field --}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="input" class="form-control" name="title" />
                    </div>

                    {{-- message field --}}
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" rows="3"></textarea>
                    </div>

                    {{-- label checkbox group --}}
                    <div class="form-group">
                        <label for="labels">Labels</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="label[]" value="bug">
                            <label class="form-check-label" for="bug">bug</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="label[]" value="question">
                            <label class="form-check-label" for="question">question</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="label[]" value="enhancement">
                            <label class="form-check-label" for="enhancement">enhancement</label>
                          </div>
                    </div>

                    {{-- categories checkbox group --}}
                    <div class="form-group">
                        <label for="categories">Categories</label><br>
                        @foreach ($categories as $category)
                            {{ $categories }}
                        @endforeach
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="category[]" value="Uncategorized">
                            <label class="form-check-label" for="uncategorized">Uncategorized</label>
                          </div>
                          {{-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="category[]" value="Billing/Payments">
                            <label class="form-check-label" for="billPay">Billing/Payments</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="category[]" value="Technical question">
                            <label class="form-check-label" for="technical">Technical question</label>
                          </div> --}}
                    </div>

                    {{-- priority dropdown list --}}
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="form-control" name="priority">
                          <option name="priority" value="High">High</option>
                          <option name="priority" value="Middle">Middle</option>
                          <option name="priority" value="Low">Low</option>
                        </select>
                    </div>

                    {{-- browse file --}}
                    <div class="form-group">
                        <input class="form-control" type="file" name="file">
                        {{-- <label for="file" class="form-label">Drag & Drop your files or Browse</label> --}}
                    </div>

                    {{-- submit button --}}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
