@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col items-center text-center">
                    <div>
                        <img src="img\cookpadwtext.png" width="235">
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col text-center">
                    <div class="align-items-center border shadow-sm d-inline-flex rounded-2" style="max-width: 500px;">
                        <form action="{{ url('/result') }}" method="GET" class="d-flex align-items-center flex-grow-1">
                            <input type="text" name="query" class="form-control" placeholder="Type ingredients..."
                                style="height: 3.5rem; border: none; width: 430px;" />
                            <button type="submit" class="btn btn-secondary" style="border-radius: 8px; height: 2.5rem;">
                                <i class="bi bi-search px-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5 justify-content-center">
                <div class="col">
                    <h1 class="fs-5">Recommended searches</h1>
                </div>
            </div>
            <div class="row mt-4">
                @foreach ($data->take(6) as $item)
                    <div class="col-4 mb-4">
                        <a href="{{ url('recipes/' . $item->id) }}">
                            <div class="card text-white position-relative">
                                <img src="{{ asset('img/recipe/' . $item->image) }}" class="card-img-top"
                                    style="object-fit: cover; width: 100%; height: 150px;" alt="{{ $item->title }}">
                                <div class="card-img-overlay">
                                    <h6 class="card-title fw-semibold"
                                        style="position: absolute; bottom: 0; left: 0; margin: 10px;">{{ $item->title }}
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
