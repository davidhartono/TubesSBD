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

            <div class="row mt-4 justify-content-center">
                <div class="col text-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner mx-auto">
                            <div class="carousel-item active">
                                <img src="img\banner.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img\banner1.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="col text-center">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == '' || request()->segment('1') == 'recipes' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/recipes') }}">Recipes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == 'tips' ? 'active' : '' }}" aria-current="page"
                                href="{{ url('/tips') }}">Tips</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == 'ingredients' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/ingredients') }}">Ingredients</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                @foreach ($data as $item)
                    <div class="col-3 mb-4">
                        <a href="{{ url('recipes/' . $item->id) }}">
                            <div class="card h-100 text-dark" style="max-height: 250px;">
                                @if ($item->image)
                                    <img src="{{ asset('img/recipe/' . $item->image) }}" class="card-img-top"
                                        style="object-fit: cover; width: 100%; height: 150px;" alt="{{ $item->title }}">
                                @else
                                    <img src="{{ asset('img/tipsplaceholder.png') }}" class="card-img-top"
                                        style="object-fit: cover; width: 100%; height: 150px;" alt="Placeholder Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $item->duration }} ago</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
