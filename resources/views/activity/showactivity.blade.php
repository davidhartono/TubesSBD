@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5" >
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col offset-1 items-center">
                    <div class="mt-4 mb-4">
                        <h3>Activity</h3>
                    </div>
                </div>
                <div class="col-10">
                    <div class="card mb-3 text-dark">
                        <div class="row justify-content-center">
                            <div class="col-1 text-center">
                                @if ($author_image)
                                    <div class="my-3"
                                        style="width: 54px; height: 54px; overflow: hidden; border-radius: 50%;">
                                        <img src="{{ asset('img/user/' . $author_image) }}"
                                            style="object-fit: cover; width: 100%; height: 100%;" />
                                    </div>
                                @else
                                    <div class="my-3"
                                        style="width: 54px; height: 54px; overflow: hidden; border-radius: 50%;">
                                        <img src="{{ asset('img/user/userplaceholder.jpg') }}"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                @endif
                            </div>
                            <div class="col-10">
                                <div class="card-body d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="card-title">{{ $author }}</h5>
                                        <p class="card-text fs-6 fw-semibold">{{ $title }}</p>
                                        <p class="card-text fs-6" style="white-space: pre-wrap;">{{ $message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
