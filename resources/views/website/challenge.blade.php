@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-4">
                <div class="col items-center">
                    <div class="mt-4 mb-2">
                        <h1 class="fs-6">{{ count($data) }} Live Challenge{{ count($data) > 1 ? 's' : '' }}</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                @foreach ($data->take(2) as $item)
                    <div class="col-6 mt-3">
                        <a href="{{ url('challenges/' . $item->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <img src="{{ $item->image }}" class="card-img-top img-fluid" alt="{{ $item->title }}"
                                    style="max-height: 144px;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fs-5">{{ $item->title }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
