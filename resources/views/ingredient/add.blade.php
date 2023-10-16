@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">Add Ingredient</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="/ingredients" enctype="multipart/form-data">
                @csrf
                @include('komponen.pesan')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="10" >{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
