@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="mb-4">
                    @if (!empty(Auth::user()->image))
                        <div class="my-3" style="width: 108px; height: 108px; overflow: hidden; border-radius: 50%;">
                            <img src="{{ asset('img/user/' . Auth::user()->image) }}"
                                style="object-fit: cover; width: 100%; height: 100%;" />
                        </div>
                        <form action="{{ route('users.delete_image', Auth::user()) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete your profile picture?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete Photo</button>
                        </form>
                    @else
                        <div class="my-3" style="width: 108px; height: 108px; overflow: hidden; border-radius: 50%;">
                            <img src="{{ asset('img/user/userplaceholder.jpg') }}"
                                style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                    @endif

                </div>
                <form method="POST" action="{{ route('profile.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        @include('komponen.pesan')
                    </div>
                    <div class="mb-4">
                        <input type="hidden" class="form-control-plaintext" name="id" value="{{ $data->id }}">
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="nama"
                            value="{{ $data->name }}">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" name="username" value="{{ $data->username }}">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="mb-4">
                        <label for="foto" class="form-label">Photo</label><br>
                        <input type="file" name="image" id="foto">
                    </div>
                    <div class="flex-nowrap py-2 d-flex justify-content-between">
                        <button type="submit" name="submit" class="btn btn-dark" style="width: 49%">Update</button>
                        <a href="/profile" class="btn btn-outline-dark no-hover" style="width: 49%">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
