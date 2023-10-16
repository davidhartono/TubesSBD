@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-10 items-center text-center">
                    <img src="{{ asset($image) }}" alt="{{ $title }}" class="img-fluid rounded mx-auto d-block">
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-10 items-center text-left">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center fs-4">{{ $title }}</h3>
                            <p class="mt-3">{{ $description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
