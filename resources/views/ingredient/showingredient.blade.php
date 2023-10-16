@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col items-center text-center">
                    <img src="{{ asset('img/ingredient/'.$image) }}" alt="{{ $title }}" class="img-fluid rounded mx-auto d-block">
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $title }}</h3>
                            <p class="mt-3">{{ $description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body d-flex align-items-start">
                            <div class="row">
                                <div class="col text-center">
                                    <img src="{{ url('img\cooking-note.svg') }}" class="img-fluid rounded mx-auto d-block"
                                        width="54px">
                                </div>
                                <div class="col">
                                    <h6 class="card-title">{{ $author }}</h6>
                                    <p class="card-text"><small class="text-muted">&#64;{{ $username }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ingredients</h5>
                            <h6 class="text-muted fs-7 mt-3"><i class="bi bi-person"></i> {{ $portion }} people
                                &nbsp;&nbsp;&nbsp;<i class="bi bi-clock"></i> {{ $time }} minutes</h6>
                            <p>{{ $ingredient }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="mt-3">{{ $description }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="bi bi-chat-right-dots mx-2"></i> Comments</h5>
                            <div class="row">
                                <div class="col d-flex my-4">
                                    <img src="{{ url('img\cooking-note.svg') }}" class="img-fluid rounded d-block mx-3"
                                        width="54px">
                                    <div class="d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="card-title">{{ $author }} <small
                                                    class="text-muted mx-1">&#64;{{ $username }}</small>
                                            </h6>
                                        </div>
                                        <div>
                                            <p class="m-0">Tempor sint ex consequat aute irure ad dolor sunt
                                                reprehenderit ipsum elitculpa consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="" class="form-inline">
                                <div class="input-group w-100">
                                    <input type="text" name="komentarresep" class="form-control rounded border-right-0"
                                        placeholder="Add a comment" style="border-radius: 0;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary rounded">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}



        </div>
    </div>
@endsection
