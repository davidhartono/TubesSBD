@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">Add Activity</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="/activity" enctype="multipart/form-data">
                @csrf
                @include('komponen.pesan')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea type="text" class="form-control" rows="10" name="message" id="message">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
