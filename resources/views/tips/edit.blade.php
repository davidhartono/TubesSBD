@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-8">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="card-title">Publish your tips</h3>
                            @include('komponen.pesan')
                            <form method="POST" action="{{ url('/tips/' . $data->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <input type="text" name="title" class="form-control form-control-lg"
                                        placeholder="Title: Tips to peel an egg" value="{{ $data->title }}">
                                </div>

                                <div class="mb-3">
                                    <label for="step" class="form-label fs-4">Steps</label>
                                    <textarea name="step" class="form-control form-control-md" cols="30" rows="10"
                                        placeholder="Knock the egg on a hard surface">{{ $data->step }}</textarea>
                                </div>
                                @if ($data->image)
                                    <div class="mb-3">
                                        <img style="max-width: 150px; max-height:150px"
                                            src="{{ url('img/tip') . '/' . $data->image }}" alt="">
                                    </div>
                                @endif
                                <div class="mb-5">
                                    <label for="foto" class="form-label fs-4">Photo</label><br>
                                    <input type="file" name="image" id="foto" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-dark form-control">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
