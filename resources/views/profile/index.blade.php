@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-10">
                    @include('komponen.pesan')
                    <div class="card mb-3">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-2 text-center">
                                @if (Auth::user()->image)
                                    <div class="my-3"
                                        style="width: 108px; height: 108px; overflow: hidden; border-radius: 50%;">
                                        <img src="{{ asset('img/user/' . Auth::user()->image) }}"
                                            style="object-fit: cover; width: 100%; height: 100%;" />
                                    </div>
                                @else
                                    <div class="my-3"
                                        style="width: 108px; height: 108px; overflow: hidden; border-radius: 50%;">
                                        <img src="{{ asset('img/user/userplaceholder.jpg') }}"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                @endif
                            </div>
                            <div class="col-9">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                        <p class="card-text"><small class="text-muted">@</small><small
                                                class="text-muted">{{ Auth::user()->username }}</small></p>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-link text-dark"
                                            href="{{ url('profile/' . Auth::user()->id . '/edit') }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a class="btn btn-link text-dark" href="#"
                                            onclick="event.preventDefault(); confirmLogout();">
                                            <i class="bi bi-box-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col">
                                <ul class="nav nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment('1') == 'profile' || request()->segment('1') == 'profile/recipes' ? 'active' : '' }}"
                                            aria-current="page" href="{{ url('/profile/recipes') }}">Recipes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->segment('1') == 'profile/tips' ? 'active' : '' }}"
                                            aria-current="page" href="{{ url('/profile/tips') }}">Tips</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col">
                            <h1 class="fs-6">{{ count($data) }} Recipe{{ count($data) > 1 ? 's' : '' }}</h1>
                        </div>
                    </div>
                    <div class="row mt-2">
                        @foreach ($data as $item)
                            <div class="col-4 mb-4">
                                <a href="{{ url('tips/' . $item->id) }}">
                                    <div class="card h-100 text-dark" style="max-height: 300px;">
                                        <img src="{{ asset('img/recipe/' . $item->image) }}" class="card-img-top"
                                            style="object-fit: cover; width: 100%; height: 150px;"
                                            alt="{{ $item->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                            <p class="card-text">
                                                <small class="text-muted fs-7">
                                                    <i class="bi bi-person"></i> {{ $item->portion }} people
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "/logout";
            }
        }
    </script>
@endsection
