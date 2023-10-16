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
                            <form method="POST" action="/tips" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" name="title" class="form-control form-control-lg"
                                        placeholder="Title: Tips to peel an egg" value="{{ old('title') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="step" class="form-label fs-4">Steps</label>
                                    <textarea name="step" class="form-control form-control-md" cols="30" rows="10"
                                        placeholder="Knock the egg on a hard surface">{{ old('step') }}</textarea>
                                </div>

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
