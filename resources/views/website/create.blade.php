@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-8 items-center text-center border-gray-50 rounded shadow-sm">
                    <div class="mt-5">
                        <img src="img\cooking-note.svg" alt="Create">
                        <div class="mt-4 fw-semibold fs-5">
                            Store your cooking notes
                        </div>
                        <div class="mt-2 fw-normal fs-6">
                            Help our community find new ideas
                        </div>
                        <div class="my-5">
                            @auth
                                <a class="btn-dark fs-6 mx-3 px-3 py-2 border rounded-3"
                                    href="{{ url('create/recipe') }}"><i class="bi bi-journal-plus mx-1"></i>Recipe</a>
                                <a class="btn-dark fs-6 mx-3 px-3 py-2 border rounded-3"
                                    href="{{ url('create/tips') }}"><i class="bi bi-lightbulb mx-1"></i>Tips</a>
                            @else
                                <a class="btn-dark fs-6 mx-3 px-3 py-2 border rounded-3"
                                    href="/login"><i class="bi bi-journal-plus mx-1"></i>Recipe</a>
                                <a class="btn-dark fs-6 mx-3 px-3 py-2 border rounded-3"
                                    href="/login"><i class="bi bi-lightbulb mx-1"></i>Tips</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-4">
                <div class="col items-center">
                    <div class="mt-4 mb-2 d-flex justify-content-between">
                        <h1 class="fs-5">Join a cooking challenge</h1>
                        <a href="/challenges"><i class="bi bi-chevron-right text-dark"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-1"></div>
                @foreach ($data->take(2) as $item)
                    <div class="col-5">
                        <a href="{{ url('challenges/' . $item->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <img src="{{ $item->image }}" class="card-img-top img-fluid"
                                    alt="{{ $item->title }}" style="max-height: 144px;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark fs-5">{{ $item->title }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </div>
@endsection
