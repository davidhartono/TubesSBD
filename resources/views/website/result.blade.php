@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col offset-1 items-center">
                    <div class="mt-4 mb-2">
                        <h1 class="fs-4">Keyword: {{ $query }} ({{ $totalResults }} Result{{ $totalResults > 1 ? 's' : '' }})</h1>
                    </div> 
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
                @if ($results->isEmpty())
                    <p>No results found.</p>
                @else
                    @foreach ($results as $data)
                        <div class="col-10 mt-3">
                            @if ($data instanceof App\Models\Recipe)
                                <a href="{{ url('recipes/' . $data->id) }}" class="text-decoration-none">
                                @elseif ($data instanceof App\Models\Tip)
                                    <a href="{{ url('tips/' . $data->id) }}" class="text-decoration-none">
                            @endif
                            <div class="card h-100 text-dark">
                                <div class="row g-0">
                                    <div class="col-8">
                                        <div class="row card-body h-100 align-items-center">
                                            <h5 class="card-title fs-5">{{ $data->title }}</h5>
                                            <div class="col-1 text-center">
                                                @if ($data->author->image)
                                                    <div class="my-3"
                                                        style="width: 54px; height: 54px; overflow: hidden; border-radius: 50%;">
                                                        <img src="{{ asset('img/user/' . $data->author->image) }}"
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
                                            <div class="col-8">
                                                <h5 class="card-title fs-6 mb-0 mx-3">{{ $data->author->name }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        @if ($data instanceof App\Models\Recipe)
                                            <img src="{{ asset('img/recipe/' . $data->image) }}"
                                                class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 100%;"
                                                alt="{{ $data->title }}">
                                        @elseif ($data instanceof App\Models\Tip)
                                            <img src="{{ asset('img/tip/' . $data->image) }}" class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 100%;"
                                                alt="{{ $data->title }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-4">
                        {{ $results->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
