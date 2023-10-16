@extends('layout.main')

@section('konten')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col-10 text-end">
                    @if (Auth::check() && $author_id === Auth::user()->id)
                        <button class="btn btn-secondary me-2"
                            onclick="window.location='{{ url('recipes/' . $id . '/edit') }}'">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <form class="d-inline" action="{{ url('recipes/' . $id) }}" method="post"
                            onsubmit="return deleteData('{{ $title }}')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col items-center text-center">
                    <img src="{{ asset('img/recipe/' . $image) }}" alt="{{ $title }}" width="660" class="rounded">
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $title }}</h2>
                            <p>{{ $description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-8 items-center text-left">
                    <div class="card">
                        <div class="card-body d-flex align-items-start">
                            <div class="row">
                                <div class="col d-flex my-3 align-items-center mx-3">
                                    <div class="my-1"
                                        style="width: 54px; height: 54px; overflow: hidden; border-radius: 50%;">
                                        @if ($author_image == null)
                                            <img src="{{ asset('img/user/userplaceholder.jpg') }}"
                                                style="object-fit: cover; width: 100%; height: 100%;" />
                                        @else
                                            <img src="{{ asset('img/user/' . $author_image) }}"
                                                style="object-fit: cover; width: 100%; height: 100%;" />
                                        @endif
                                    </div>
                                    <div class="mx-3">
                                        <h6 class="card-title mb-1">{{ $author }}</h6>
                                        <p class="card-text"><small class="text-muted">&#64;{{ $username }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-8 items-center text-left">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ingredients</h5>
                                <h6 class="text-muted fs-7 mt-3"><i class="bi bi-person"></i> {{ $portion }} people
                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-clock"></i> {{ $time }} minutes</h6>
                                <p style="white-space: pre-wrap;">{{ $ingredient }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-8 items-center text-left">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cooking Instructions</h5>
                                <p class="mt-3" style="white-space: pre-wrap;">{{ $step }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div class="col-8 items-center text-left">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-chat-right-dots mx-2"></i> Comments</h5>
                                @foreach ($comments as $comment)
                                    <div class="row">
                                        <div class="col d-flex my-3 align-items-center mx-3">
                                            <div class="my-1"
                                                style="width: 54px; height: 54px; overflow: hidden; border-radius: 50%;">
                                                @if ($comment->author->image == null)
                                                    <img src="{{ asset('img/user/userplaceholder.jpg') }}"
                                                        style="object-fit: cover; width: 100%; height: 100%;" />
                                                @else
                                                    <img src="{{ asset('img/user/' . $comment->author->image) }}"
                                                        style="object-fit: cover; width: 100%; height: 100%;" />
                                                @endif
                                            </div>

                                            <div class="mx-3">
                                                <h6 class="card-title mb-1">{{ $comment->author->name }} <small
                                                        class="text-muted mx-1">&#64;{{ $comment->author->username }}</small>
                                                </h6>
                                                <p class="m-0">{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @auth
                                    <form action="{{ route('comments.recipe') }}" class="form-inline" method="POST">
                                        @csrf
                                        @include('komponen.pesan')
                                        <div class="input-group w-100">
                                            <input type="hidden" name="recipe_id" value="{{ $id }}">
                                            <input type="text" name="komentarresep"
                                                class="form-control rounded border-right-0" placeholder="Add a comment"
                                                style="border-radius: 0;">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-secondary rounded">Post</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <p class="text-muted">Please <a href="{{ url('/login') }}" class="text-warning">login</a>
                                        to
                                        leave a comment.</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteData(name) {
            pesan = confirm(`Are you sure on deleting ${name}?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
