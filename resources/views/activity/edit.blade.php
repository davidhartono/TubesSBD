@extends('layout.admin')

@section('konten')
    <div>
        <h1 class="mt-4">Edit Activity</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a href="/admin/activity" class="btn btn-secondary mb-3">Return</a>
                <form method="POST" action="{{ url('/activity/' . $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $data->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea type="text" class="form-control" rows="10" name="message" id="message">{{ $data->message}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
