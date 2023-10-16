@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col offset-1 items-center">
                    <div class="mt-4 mb-4">
                        <h3>Activity</h3>
                    </div>
                </div>
                @if ($data->isEmpty())
                    <div class="col-10">
                        <p>No activity.</p>
                    </div>
                @else
                    @foreach ($data->take(2) as $item)
                        <div class="col-10 mb-3">
                            <a href="{{ url('activity/' . $item->id) }}">
                                <div class="card mb-2 text-dark">
                                    <div class="row justify-content-center">
                                        <div class="col-1 text-center">
                                            @if ($item->author->image)
                                                <div class="my-3"
                                                    style="width: 54px; height: 54px; overflow: hidden; border-radius: 50%;">
                                                    <img src="{{ asset('img/user/' . $item->author->image) }}"
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
                                                    <h6 class="card-title">{{ $item->author->name }} <small
                                                            class="fs-6 fw-normal">
                                                            left you a message </small></h6>
                                                    <p class="card-text fs-7">{{ Str::limit($item->message, 50) }}</p>
                                                    <small class="text-muted">{{ $item->duration }} ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
