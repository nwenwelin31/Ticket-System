@extends('dashboard.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 bg-dark mt-2 p-3">
                <h3>Ticket</h3>
                <form action="{{ route('ticket.update', $ticket->id) }}" method="post" class="p-3 rounded bg-white"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- title field --}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        {{-- validation error message --}}
                        @error('title')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                        <input type="input" class="form-control" name="title" value="{{ $ticket->title }}" />
                    </div>

                    {{-- message field --}}
                    <div class="form-group">
                        <label for="message">Message</label>
                        {{-- validation error message --}}
                        @error('message')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                        <textarea class="form-control" name="message" rows="3">{{ $ticket->message }}</textarea>
                    </div>

                    {{-- label checkbox group --}}
                    <div class="form-group">
                        <label for="labels">Labels</label>
                        {{-- validation error message --}}
                        @error('label_id')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                        <br>
                        @foreach ($labels as $label)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="label_id[]"
                                    value="{{ $label->id }}" {{ $ticket->label->contains($label->id) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $label->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    {{-- categories checkbox group --}}
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        {{-- validation error message --}}
                        @error('category_id')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                        <br>
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="category_id[]"
                                    value="{{ $category->id }}"
                                    {{ $ticket->category->contains($category->id) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    {{-- priority dropdown list --}}
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        {{-- validation error message --}}
                        @error('priority')
                            <small class="text-danger"> {{ $message }}</small>
                        @enderror
                        <select class="form-control" name="priority">
                            <option name="priority" value="High" {{ $ticket->priority == 'High' ? 'selected' : '' }}>High
                            </option>
                            <option name="priority" value="Middle" {{ $ticket->priority == 'Middle' ? 'selected' : '' }}>
                                Middle</option>
                            <option name="priority" value="Low" {{ $ticket->priority == 'Low' ? 'selected' : '' }}>Low
                            </option>
                        </select>
                    </div>
                    {{-- ticket assign agent --}}
                    <div class="form-group">
                        <label for="agent_id">Assign Agent</label>
                        <select name="agent_id" class="form-select">
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- browse file --}}
                    <div class="form-group"><input class="form-control" type="file" name="file[]" multiple="multiple">
                        <img src="{{ asset('/storage/uploads/' . $ticket->file) }}" alt="{{ $ticket->name }}"
                            style="max-width: 50px; max-height: 50px;">
                        {{-- <label for="file" class="form-label">Drag & Drop your files or Browse</label> --}}
                    </div>

                    {{-- submit button --}}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
