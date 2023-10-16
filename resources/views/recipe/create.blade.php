@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-8">
                    <div class="card p-2">
                        <div class="card-body">
                            <h3 class="card-title">Publish your recipe</h3>
                            @include('komponen.pesan')
                            <form method="POST" action="/recipes" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" name="title" class="form-control form-control-lg"
                                        placeholder="Title: Boiled Egg" value="{{ old('title') }}">
                                </div>
                                <div class="mb-3">
                                    <textarea name="description" class="form-control form-control-md" rows=10 placeholder="Tell us something about your recipe">{{ nl2br(old('description')) }}</textarea>
                                </div>
                                <div class="mb-3 row justify-content-between">
                                    <label for="portion" class="col-sm-2 col-form-label">Serves</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="portion" class="form-control" placeholder="2 people"
                                            value="{{ old('portion') }}">
                                    </div>
                                </div>
                                <div class="mb-3 row justify-content-between">
                                    <label for="portion" class="col-sm-2 col-form-label">Duration</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="time" class="form-control" placeholder="15 minutes"
                                            value="{{ old('time') }}">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-8">
                    <div class="card p-2">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="portion" class="form-label fs-4">Ingredients</label>
                                <textarea name="ingredient" class="form-control" cols="30" rows="10" placeholder="An egg">{{ old('ingredient') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="portion" class="form-label fs-4">Steps</label>
                                <textarea name="step" class="form-control" cols="30" rows="10" placeholder="Crack an egg">{{ old('step') }}</textarea>
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
