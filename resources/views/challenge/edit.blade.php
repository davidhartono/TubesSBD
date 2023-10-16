@extends('layout.admin')

@section('konten')
    <div>
        <h1 class="mt-4">Edit Challenge</h1>
        <div class="card mb-4">
            <div class="card-body">
                <a href="/admin/challenges" class="btn btn-secondary mb-3">Return</a>
                <form method="POST" action="{{ url('/challenge/' . $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $data->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description" rows="10"  id="description">{{ $data->description }}</textarea>
                    </div>
                    @if ($data->image)
                        <div class="mb-3">
                            <img style="max-width: 50px; max-height:50px"
                                src="{{ url('img/challenge') . '/' . $data->image }}" alt="">
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
